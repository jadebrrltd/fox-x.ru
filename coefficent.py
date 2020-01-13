import random

inputdata = {
    "maxk": 12,
    "mink": 0.1,
    "c": 3,
    "users": [
        {
            "id": "p1",
            "crash_bet": 500,
            "rate_user": 6,
        },
        {
            "id": "p2",
            "crash_bet": 100,
            "rate_user": 2,
        },
        {
            "id": "p3",
            "crash_bet": 10,
            "rate_user": 8,
        },
        {
            "id": "p4",
            "crash_bet": 100,
            "rate_user": 5,
        }
    ]
}


class GameCounter():

    def __init__(self, inputdata):
        self.game_count = 0
        self.games_history = {} 
        self.inputdata = inputdata
        self.maxk = self.inputdata['maxk']
        self.mink = self.inputdata['mink']

    @staticmethod
    def count_potential_profit(usersdata):
        result = []
        for user in usersdata:
            newuserdata = {
                "id": user['id'],
                "crash_bet": float(user['crash_bet']),
                "rate_user": float(user['rate_user']),
                "potential_profit_user": float(user['crash_bet']) * float(user['rate_user'])
            }
            result.append(newuserdata)
        return result

    @staticmethod
    def get_potential_profit(userprofitdata):
        tz = { x['id']: x['potential_profit_user'] for x in  userprofitdata}
        return tz

    @staticmethod
    def get_bets_sum(usersdata):
        bets_list = [x['crash_bet'] for x in usersdata]
        sx = sum(bets_list)
        return sx

    @staticmethod
    def get_potential_profit_sum(profitdata):
        bets_list = [x['potential_profit_user'] for x in profitdata]
        sz = sum(bets_list)
        return sz

    @staticmethod
    def get_tk(sx):
        return (sx - sx*0.3 )

    def set_coefficients(self, profitdata):
        result = []
        for item in profitdata:
            coef = random.uniform(self.maxk, self.mink)
            item['k'] = round(coef, 2)
            result.append(item)
        return result

    @staticmethod
    def sort_from(listdata, key_="k", type_="max"):
        print(type_)
        if type_ == "max":
            return sorted(listdata, key=lambda x: (x[key_] < 0, abs(x[key_])), reverse=True)
        elif type_ == "min":
            return sorted(listdata, key=lambda x: (x[key_] < 0, abs(x[key_])))

    def more_sort(self, datalist, tk):
        result = []
        sort = self.sort_from(datalist, "potential_profit_user", "max")
        print(sort)
        for i in datalist:
            if tk >= i['potential_profit_user']:
                result.append(i)
        return result

    def get_min_max_coeffs(self, datalist):
        maxk = max(x['rate_user'] for x in datalist)
        mink = min(x['rate_user'] for x in datalist)
        if mink >= maxk:
            mink = 1
        return maxk, mink

    @staticmethod
    def get_win_coeff(maxk, mink):
        maxk = round(maxk - 0.01, 2)
        mink = round(mink + 0.01, 2)
        c = random.uniform(mink, maxk)
        return round(c, 2)

    @staticmethod
    def get_winners(datalist, wink):
        winners = []
        for i in datalist:
            if float(i['rate_user']) <= float(wink):
                winners.append(i)
        return winners


    def handle(self):
        result = {}
        usersdata = self.inputdata['users']
        profitdata = self.count_potential_profit(usersdata)
        tz = self.get_potential_profit(profitdata)
        sx = self.get_bets_sum(usersdata)
        sz = self.get_potential_profit_sum(profitdata)
        tk = self.get_tk(sx)
        midres = self.more_sort(profitdata, tk)
        maxk, mink = self.get_min_max_coeffs(midres)
        print(maxk, mink)
        wink = self.get_win_coeff(maxk, mink)
        print(wink)
        winners = self.get_winners(midres, wink)
        print(winners)
       # _sorted = self.sort_from_min(tk)
        #print(_sorted)
        result = {
            "sz": sz,
            "sx": sx,
            "tz": tz,
            "tk": tk
        }
        return result


gc = GameCounter(inputdata)

res = gc.handle()
print('hello')
