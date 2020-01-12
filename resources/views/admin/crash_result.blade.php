<div class="left">
    @if($mode == 0)
        <div class="total"><spnan id="total_x">0.00</spnan>X</div>
        <div class="info">Онлайн в Crash: 0</div>
        <script>
            var co = 0;
            var intS  = 0;
        </script>
    @else
        <div class="info">
            @if(isset($info->id))
                <div class="game-id">Номер игры: {{$info->id}}</div>
                <div class="total">
                    @if($info->rand_number)
                        ~<snan id="total_x" title="Текущий коэфициент">{{number_format((float)$rand_number, 2, '.', '')
                        }}</snan>X
                    @endif
                    <small id="total_x" style="color: #1f92bf;" title="Профит">{{number_format((float)$profit, 2, '.',
                     '')
                    }}X</small>
                </div>
            @endif
        </div>

        <div class="user-info" style="width: 200px">
            <div class="user-info__top">
                <div class="user-info__box">
                    <input type="number" min="0" step="0.1" class="user-info__field"
                           name="profit"
                           value=""
                           placeholder="Коэфициент игры">
                </div>
                <button class="btn btn-stop-game btn-crash-coef">Установить</button>
                <span></span>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function(){
                $(document).on('click', '.btn-crash-coef', function() {
                    $('.btn-crash-coef').next().text('');
                    var profit = $('[name=profit]').val();
                    if(profit.length) {
                        $.ajax({
                            type: 'GET',
                            url: "/crash/set-profit?profit=" + profit,
                            success: function(result){
                                console.log('Профит установлен: ', profit);
                                $('.btn-crash-coef').next().html('Профит установлен');
                            }
                        });
                    }
                    else {
                        $('.btn-crash-coef').next().html('Укажите коэфициент!');
                    }

                });
            });
        </script>
        <script>

            var co = 5;
            var max = <?= $info->profit; ?>;
            var co = <?= $info->number; ?>;
            var i = <?= $info->rand_number; ?>;
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

            // function interval(){
            //     i = i + 0.025;
            //     if(i < co){
            //         initGraph(i);
            //     }else{
            //         clearInterval(int);
            //     }
            // }
            // var int = setInterval(interval, 25);

            function getCrashGraphicY(x) {
                return Math.pow(1.06, x);
            }

            function getLastBets (){
                // $.ajax({
                //     type: 'GET',
                //     url: "/admin/crash/bets",
                //     data: $('#s_g').serialize(),
                //     success: function(result){
                //
                //         $('#result').html(result);
                //     }
                // });
            }

        </script>



    @endif
        <button onclick="stop_game();" class="btn btn-stop-game hidden">Остановить график?</button>

</div>

<div class="right">
    @if(isset($bets))
        @if(count($bets))
            <div class="table-bets">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID пользователя</th>
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
                            <th scope="row">{{$bet->user_id}}</th>
                            <td>{{$bet->number}}X</td>
                            <td>{{$bet->price}}</td>
                            <td>{{$z}}{{$bet->number * $bet->price - $bet->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
</div>
