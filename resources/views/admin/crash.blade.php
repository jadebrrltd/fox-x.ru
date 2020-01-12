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
                                    @include('admin.crash_result', [
                                    'mode' => null,
                                    'info' => $info,
                                    'bets' => null,
                                    ])
								</div>
							</div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function gameInfoInterval(){
            $.ajax({
                type: 'GET',
                url: '/crash/get-info?admin=1',
                success: function(result){
                    console.log('Game info updated');
                    $('.crash-game').html(result);
                    // console.log('profit - ' + result.profit);
                    // console.log('rand_number - ' + result.rand_number);
                    // if(rand_number > result.profit) {
                    //     $('body').data('coeff', 0).attr('data-coeff', 0);
                    //     // console.log('rand_number reload');
                    //     crushGraph(i_int, null, 1);
                    //     location.reload();
                    // }
                }
            });
        }
        var int = setInterval(gameInfoInterval, 1000);
        function stop_game(){

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
