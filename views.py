from aiohttp import web
import aioredis
import random
import json


REDIS_SERVER = 'redis://localhost'

ROOT_KEY = "gambleservice"

class IndexView(web.View):

    async def get(self):
        # return context for render
        res = {'foo': 'boo'}        
        return web.json_response(res)


class CoeffView(web.View):

    async def post(self):
        # return context for render

        data = await self.request.json()
        users = data['users']

        game_count = await self.handle_game_count()
        ids = await self.get_users(users)


        each_ten = str(game_count/10).split('.')[1] == '0'
        each_fifty = str(game_count/50).split('.')[1] == '0'
        

        profit_data = await self.count_potential_profit(users)
        
        tz = await self.format_potential_profit(profit_data)

        sx = await self.get_bets_sum(users)

        sz = await self.get_potential_profit_sum(profit_data)

    
        if each_ten:
            tk =  await self.get_tk(sx, True)
        else:
            tk =  await self.get_tk(sx)

        midresult = await self.more_sort(profit_data, tk)
        maxk, mink = await self.get_min_max_coeffs(midresult)

        saved_winners = await self.get_saved_winners()
        
        short_seq = await self.find_winner_sequence(saved_winners)

        long_seq = await self.find_winner_sequence(saved_winners, 7)

        if short_seq and short_seq[0] in ids:
            maxk = await self.get_maxk_if_seq(users, short_seq[0])
            mink = mink if maxk > mink else 1 
            print(f'if short_sec maxk={maxk}, mink={mink}')

        if long_seq and long_seq[0] in ids:
            maxk = await self.get_maxk_if_seq(users, long_seq[0])
            mink = mink if maxk > mink else 1 

        if each_fifty:
            c = await self.get_win_coeff(1.01, 1000)
        else:
            c = await self.get_win_coeff(maxk, mink)
  
        winners = await self.get_winners(midresult, c)

        r = await self.get_profit(winners, sx)

        print(f'profit = {r}')

        await self.handle_profit(r, game_count)

        winners = await self.format_potential_profit(winners)

        await self.handle_winners(winners, game_count)

        return web.json_response(winners)


    async def get_maxk_if_seq(self, users: list, target_user: str):
        res = list(filter(lambda x: str(x['id']) == target_user, users))[0]
        maxk = float(res['rate_user']) - 0.01
        return round(maxk, 2)

    async def find_winner_sequence(self, saved_winners, sequence_len = 3):
        result = []
        all_winners = [i['winners'] for i in saved_winners]
        all_winners = [item for innerlist in all_winners for item in innerlist]
        all_winners = list(set(all_winners))
        sorted_winners = await self.sort_from(saved_winners, 'game_count', 'max')
        sorted_winners = sorted_winners[:sequence_len]
        for winner in all_winners:
            count = 0
            for i in sorted_winners:
                if winner in i['winners']:
                    count += 1
                    if count == sequence_len:
                        result.append(winner)
                        count = 0
                        break
        return result

    async def get_users(self, usersdata):
        ids = [str(i['id']) for i in usersdata]
        return ids

    async def count_potential_profit(self, usersdata):
        result = []
        for user in usersdata:
            newuserdata = {
                "id": str(user['id']),
                "crash_bet": float(user['crash_bet']),
                "rate_user": float(user['rate_user']),
                "potential_profit_user": float(user['crash_bet']) * float(user['rate_user'])
            }
            result.append(newuserdata)
        return result


    async def format_potential_profit(self, userprofitdata):
        tz = { x['id']: x['potential_profit_user'] for x in  userprofitdata}
        return tz

    async def get_profit(self, winners, sx: float):
        winners_bets = [x['crash_bet'] for x in winners]
        sa = sum(winners_bets)
        profit = float(sx) - float(sa)
        return profit

    async def get_bets_sum(self, usersdata):
        bets_list = [x['crash_bet'] for x in usersdata]
        sx = sum(bets_list)
        return float(sx)

    async def  get_potential_profit_sum(self, profitdata):
        bets_list = [x['potential_profit_user'] for x in profitdata]
        sz = sum(bets_list)
        return sz

    async def get_tk(self, sx, each_ten=False):
        if each_ten:
            saved_profit = await self.get_saved_profit()
            profit = sum([float(i['profit']) for i in saved_profit])
            return ((profit + sx) - profit*sx*0.3)
        else:
            return (sx - sx*0.3)

    async def more_sort(self, datalist, tk):
        result = []
        sorted_list = await self.sort_from(datalist, "potential_profit_user", "max")
        for i in sorted_list:
            if tk >= i['potential_profit_user']:
                result.append(i)
        return result

    async def sort_from(self, listdata, key_="k", type_="max"):
        if type_ == "max":
            return sorted(listdata, key=lambda x: (x[key_] < 0, abs(x[key_])), reverse=True)
        elif type_ == "min":
            return sorted(listdata, key=lambda x: (x[key_] < 0, abs(x[key_])))

    async def get_min_max_coeffs(self, datalist):
        maxk = max(x['rate_user'] for x in datalist)
        mink = min(x['rate_user'] for x in datalist)
        if mink >= maxk:
            mink = 1
        return maxk, mink

    async def get_win_coeff(self, maxk, mink):
        maxk = round(maxk - 0.01, 2)
        mink = round(mink + 0.01, 2)
        c = random.uniform(mink, maxk)
        return round(c, 2)

    async def get_winners(self, datalist, wink):
        winners = []
        for i in datalist:
            if float(i['rate_user']) <= float(wink):
                winners.append(i)
        return winners

    async def handle_game_count(self):
        game_count = await self.get_game_count()
        if not game_count:
            game_count = 1
            await self.set_game_count(game_count)
        else:
            game_count += 1
            await self.set_game_count(game_count)
        return game_count

    async def get_game_count(self):
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        val = await redis.get(f'{ROOT_KEY}:gamecount')
        redis.close()
        await redis.wait_closed()
        return int(str(val.decode())) if val else None

    async def set_game_count(self, count=0):
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        await redis.set(f'{ROOT_KEY}:gamecount', count)
        redis.close()
        await redis.wait_closed()

    async def handle_winners(self, winners: list, game_count: int):
        prepared_data = {
            "game_count": game_count,
            "winners": list(winners.keys())
        }
        winners_data = await self.get_saved_winners()
        if winners_data:
            if len(winners_data) == 7:
                await self.stack_winners(winners_data, prepared_data)
            else:
                winners_data.append(prepared_data)
                await self.save_winners_bulk(winners_data)
        else:
            await self.save_winners_first(prepared_data)
        winners = await self.get_saved_winners()
        return winners

    async def save_winners_first(self, profit):
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        winners_str = json.dumps([profit])
        await redis.set(f'{ROOT_KEY}:winners', winners_str)
        redis.close()
        await redis.wait_closed()

    async def stack_winners(self, all_winners: list, input_winners: dict):
        sorted_winners = await self.sort_from(all_winners, "game_count", "min")
        del sorted_winners[0]
        sorted_winners.append(input_winners)
        await self.save_winners_bulk(sorted_winners)

    async def save_winners_bulk(self, winners_data: list):
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        winners_str = json.dumps(winners_data)
        await redis.set(f'{ROOT_KEY}:winners', winners_str)
        redis.close()
        await redis.wait_closed()

    async def save_winners(self, winners: dict, game_count: int):
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        winners_str = json.dumps(winners)
        await redis.set(f'{ROOT_KEY}:winners', winners_str)
        redis.close()
        await redis.wait_closed()

    async def get_saved_winners(self):
        result = []
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        winners_str = await redis.get(f'{ROOT_KEY}:winners')
        if winners_str:
            winners_str = winners_str.decode()
            result = json.loads(winners_str)
        redis.close()
        await redis.wait_closed()
        return result

    async def handle_profit(self, profit: float, game_count: int):
        profit_dict = {
            "game_count": game_count,
            "profit": profit
        }
        profit_data = await self.get_saved_profit()
        if profit_data:
            if len(profit_data) == 3:
                await self.stack_profit(profit_data, profit_dict)
            else:
                profit_data.append(profit_dict)
                await self.save_profit_bulk(profit_data)
        else:
            await self.save_profit_first(profit_dict)
        profit_result = await self.get_saved_profit()
        return profit_result
        

    async def stack_profit(self, all_profit: list, input_profit: dict):
        sorted_profit = await self.sort_from(all_profit, "game_count", "min")
        del sorted_profit[0]
        sorted_profit.append(input_profit)
        await self.save_profit_bulk(sorted_profit)

    async def save_profit_first(self, profit):
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        profit_str = json.dumps([profit])
        await redis.set(f'{ROOT_KEY}:profit', profit_str)
        redis.close()
        await redis.wait_closed()

    async def save_profit_bulk(self, profit_data: list):
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        profit_str = json.dumps(profit_data)
        await redis.set(f'{ROOT_KEY}:profit', profit_str)
        redis.close()
        await redis.wait_closed()

    async def get_saved_profit(self):
        result = []
        redis = await aioredis.create_redis_pool(REDIS_SERVER)
        profit_str = await redis.get(f'{ROOT_KEY}:profit')
        if profit_str:
            profit_str = profit_str.decode()
            result = json.loads(profit_str)
        redis.close()
        await redis.wait_closed()
        return result
