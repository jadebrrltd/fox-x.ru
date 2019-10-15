<?php

namespace App\Http\Controllers;

use App\User;
use App\CrashGame;
use App\CrashBet;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Cache;
use App\Events\JoinCrash;
use App\Events\AdmCrash;

use Auth;
use App\Payment;

use Storage;
use DB;

class CrashController extends Controller {
	const NEW_BET_CHANNEL = 'betCrash';
	const WINNER_CHANNEL = 'winnerCrash';
	public $game;
	
	public function __construct()
    {
        parent::__construct();
        $this->game = $this->getLastGame();
    }
	
	public function generateSecret(){
  		$chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
  		$numChars = strlen($chars);
  		$string = '';
  		for ($i = 0; $i < 16; $i++) {
    		$string .= substr($chars, rand(1, $numChars) - 1, 1);
  		}
  		return $string;
	}

	public function getLastGame()
    {
        $game = CrashGame::orderBy('id', 'desc')->first();
		$i_int = time() - $game->create_game;

		return response()->json(['i_int' => $i_int, 'curent' => time(), 'n' => $game->number, 'stop_game' => $game->stop_game, 'start_game' => $game->create_game]);
    }

	public function newGame()
    {
    	$game = CrashGame::orderBy('id', 'desc')->first();

    	$stop = $game->stop_game - 10;

    	if($stop < time() OR $game->status == 1){

    		$i = 1;
			$x_int = rand(1, 1000);
			$x_float = rand(10, 100);
			$x = $x_int . '.' . $x_float;
			$y = 1;

			while($i <= 1000){
				$y = $y * 1.06;
				if($y >= $x){
					break;
				}
				$i++;
			}

			CrashGame::create([
				'number' => $i,
				'create_game' => time() + 10,
				'profit' => $y,
				'stop_game' => time() + $i + 27
			]);

			$game = CrashGame::orderBy('id', 'desc')->first();

			$adm = time() - $game->create_game;
			AdmCrash::dispatch($adm);

			return "success";

    	}else{
    		return "error";
    	}
    }

	public function setGameStatus(Request $request)
    {
        $this->game->status = $request->get('status');
        $this->game->save();
        return $this->game;
    }

	public function index(){

		$pageName = 'Crash';

        $game = CrashGame::orderBy('id', 'desc')->first();

        $games = array();

		$_games = CrashGame::Where('stop_game', '<', time())->orderBy('id', 'desc')->take(20)->get();
		foreach ($_games as $value) {
			$bt = DB::table('crashbets')->where('crash_game_id', $value->id)->get();

			$games[] = [
				'game' => $value,
				'bets' => $bt
			];
		}

		$bets = null;

		if($game->stop_game < time() OR $game->status == 1){

			$i = 1;
			$x_int = rand(1, 1000);
			$x_float = rand(10, 100);
			$x = $x_int . '.' . $x_float;
			$y = 1;

			while($i <= 1000){
				$y = $y * 1.06;
				if($y >= $x){
					break;
				}
				$i++;
			}

			CrashGame::create([
				'number' => $i,
				'create_game' => time(),
				'profit' => $y,
				'stop_game' => time() + $i + 17
			]);

			$game = CrashGame::orderBy('id', 'desc')->first();

			$adm = time() - $game->create_game;
			AdmCrash::dispatch($adm);

		}

		$bets = DB::table('crashbets')->where('crash_game_id', $game->id)->get();
		$price = 0;

		$ubets = array();

		foreach ($bets as $key) {
			$price = $price + $key->price;

			$ubets[] = [
				'bet' => $key,
				'user' => User::Where('id', $key->user_id)->first()
			];
		}

		//var_dump(getBalance());

		return view('crash', compact('pageName', 'game','bets', 'games', 'price', 'ubets'));
	}

	public function info(){

		$games = CrashGame::Where('stop_game', '<', time())->orderBy('id', 'desc')->take(20)->get();

		$content = "";

		foreach ($games as $gf) {

            if($gf->profit < 3){
                $color = 1;
            }else if($gf->profit > 3 AND $gf->profit < 4){
                $color = 2;
            }else if($gf->profit > 4 AND $gf->profit < 100){
                $color = 3;
            }else if($gf->profit > 100 AND $gf->profit < 200){
                $color = 4;
            }else if($gf->profit > 200){
                $color = 5;
            }

            
            $content .= '<li class="color-' . $color .'">';
            $content .= '<a href="javascript:void(0);" data-info="' . $gf->profit . '">' . $gf->profit . '</a>';
            $content .= '</li>';

		}

		return $content;

	}

	public function newBet(Request $request)
    {
        $user = Auth::user();
        $game = CrashGame::orderBy('id', 'desc')->first();

        DB::table('crashbets')->insert([
		 	'user_id' => $user->id,
    		'number' => $request->get('cashout'),
    		'crash_game_id' => $game->id,
    		'price' => $request->get('bet')
		]);

		DB::table('payments')->insert([
			'account_id' => Auth::user()->id,
			'price' => '-'.$request->get('bet') / 10
		]);

		JoinCrash::dispatch($user, $request->get('cashout'), $request->get('bet'));

		echo $request->get('bet');

    }

    public function updateBalace(Request $request)
    {
    	DB::table('payments')->insert([
			'account_id' => $request->get('id'),
			'price' => $request->get('price') / 10
		]);

    	return response()->json(['id' => $request->get('id'), 'price' => $request->get('price')]);
    }
}