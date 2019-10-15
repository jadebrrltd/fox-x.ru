@extends('admin.layout')
@section('content')

	<!-- Start main -->
	<main class="main">

		<!-- Start sidebar -->
	@include('admin.blocks.left-menu')
		<!-- End sidebar -->

		<!-- Start content -->
		<div class="base">
			<div class="base__wrapper base__wrapper--games">
				<div class="nano base__games">
					<div class="nano-content">
						<div class="games__wrap">

							<div class="container-crash" id="cr">
								<div class="crash-game">
									@if($mode == 0)
										<div class="total"><spnan id="total_x">0.00</spnan>X</div>
										<div class="info">{{$info}}</div>

										<div class="table-bets">
											<table class="table table-hover">
											  	<thead>
											    	<tr>
											      		<th scope="col">Коэффициент</th>
											      		<th scope="col">Ставка</th>
											      		<th scope="col">Возможный выигрыш</th>
											    	</tr>
											  	</thead>
											  	<tbody id="result">
											  		
											  	</tbody>
											</table>
										</div>
										<button class="btn btn-stop-game" disabled="disabled">Остановить график?</button>
									@else
										<div class="info">
											<div class="game-id">Номер игры: {{$info->id}}</div>
											<div class="total"><spnan id="total_x">{{number_format((float)$profit, 2, '.', '')}}</spnan>X</div>
										</div>

										<div class="table-bets">
											<table class="table table-hover">
											  	<thead>
											    	<tr>
											      		<th scope="col">Коэффициент</th>
											      		<th scope="col">Ставка</th>
											      		<th scope="col">Возможный выигрыш</th>
											    	</tr>
											  	</thead>
											  	<tbody id="result">
											  		@foreach($bets as $bet)
											  			<?php
											  				if($info->profit > $bet->number){
											  					$z = '+';
											  				}else{
											  					$z = '-';
											  				}
											  			?>
												    	<tr>
												      		<th scope="row">{{$bet->number}}X</th>
												      		<td>{{$bet->price}}</td>
												      		<td>{{$z}}{{$bet->number * $bet->price - $bet->price}}</td>
												    	</tr>
											    	@endforeach
											  	</tbody>
											</table>
										</div>
										<button onclick="stop_game();" class="btn btn-stop-game">Остановить график?</button>
									@endif
								</div>
							</div>
							<div id="s_g"></div>
							<div id="app">
								<admin-crash></admin-crash>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End content -->

	</main>
	<!-- End main -->
	<style>
		.game__table--seven .game__table-col2, .game__table-col2 {
			font-size: 13px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script>
		<?php if($info != 'Онлайн в Crash: 0'): ?>
			i = parseInt(<?= time() - $info->create_game; ?>) + 1;
			var max = <?= $info->profit; ?>;
			var co = <?= $info->number; ?>;
		<?php else: ?>
			var i = 0;
		<?php endif; ?>
		var step = 0.1;
		var pr, x = 0, y, drawY;

		var intS;

		function initGraph(curentX){
		    drawX = x;  
		    while (drawX <= curentX) {
		        drawY = getCrashGraphicY(drawX);
		        drawX += step;
		    }
		    $('#total_x').html(drawY.toFixed(2));
		}

		function interval(){
			i = i + 0.025;
			if(i < co){
				initGraph(i);
			}else{
				clearInterval(int);
			}
		}
		var int = setInterval(interval, 25);

		function getCrashGraphicY(x) {
    		return Math.pow(1.06, x);
		}

		function getLastBets (){
		    $.ajax({
		        type: 'GET',
		        url: "/admin/crash/bets",
		        data: $('#s_g').serialize(),
		        success: function(result){

		        	$('#result').html(result);
		        }
		    });
		}

		function stop_game(){
			if(typeof intS == 'undefined'){
				clearInterval(int);
			}else{
				clearInterval(intS);
			}

			clearInterval(intS);
			clearInterval(int);

			var r = $('#total_x').text();
			$.ajax({
		        type: 'GET',
		        url: "/admin/crash/stop-game?r="+r,
		        data: $('#s_g').serialize(),
		        success: function(result){

		        }
		    });
		}
	</script>

@endsection