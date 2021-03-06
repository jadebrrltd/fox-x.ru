<div class="main__right chat">
    <div class="chat__top">
        <p class="chat__title">ОНЛАЙН ЧАТ</p>
        <a href="#" data-izimodal-open="#chatRules" data-izimodal-transitionin="fadeInDown" class="chat__rules">Правила чата</a>
        <div class="chat__close"></div>
    </div>
    <div class="chat__body" @if(auth()->check() && auth()->user()->id != 4 && getBalance(auth()->user(), 'onlyChat') >= 3000) style="height:calc(100% - 127px)" @endif>
        <div class="chat__body-wrap nano">
            <div class="nano-content">
                @foreach($messages->reverse() as $message)
                    @include('blocks.message')
                @endforeach
            </div>
        </div>
    </div>
    <div class="chat__bottom">
        @if(auth()->check() && auth()->user()->id != 4 && getBalance(auth()->user(), 'onlyChat') >= 3000)
            <div class="chat__bottom-wrap">
                <div class="chat-form">
                    <input type="text" class="chat-form__inp" placeholder="Введите сообщение" onkeyup="Message.sendMessage(event)">
                    <button class="chat-form__btn" onclick="Message.sendMessage()"><i class="ic-chat"></i></button>
                </div>
            </div>
        @else
            <div class="chat__bottom-wrap">
                <p class="chat__bottom-text">Для общения в чате внесите депозит не менее 3000 coins</p>
                <i class="ic-deposit-warning"></i>
            </div>
            <div class="chat__bottom-wrap">
                @if(auth()->user() && auth()->user()->id != 4)
                    <a class="button chat__bottom-button" data-izimodal-open="#inputModal" data-izimodal-transitionin="fadeInDown">ПОПОЛНИТЬ</a>
                @else
                    <a class="button chat__bottom-button" data-izimodal-open="#auth" data-izimodal-transitionin="fadeInDown">ПОПОЛНИТЬ</a>
                @endif
            </div>
        @endif
    </div>
</div>

<div class="main__right chat mobile chat--close">
    <div class="chat__top">
        <p class="chat__title">ОНЛАЙН ЧАТ</p>
        <a href="#" data-izimodal-open="#chatRules" data-izimodal-transitionin="fadeInDown" class="chat__rules">Правила чата</a>
        <div class="chat__close chat__open"></div>
    </div>
    <div class="chat__body" @if(auth()->check() && auth()->user()->id != 4 && getBalance(auth()->user(), 'onlyChat') >= 3000) style="height:calc(100% - 150px)" @endif>
        <div class="chat__body-wrap nano">
            <div class="nano-content">
                @foreach($messages->reverse() as $message)
                    @include('blocks.message')
                @endforeach
            </div>
        </div>
    </div>
    <div class="chat__bottom">
        @if(auth()->check() && auth()->user()->id != 4 && getBalance(auth()->user(), 'onlyChat') >= 3000)
            <div class="chat__bottom-wrap">
                <div class="chat-form">
                    <input type="text" class="chat-form__inp" placeholder="Введите сообщение" onkeyup="Message.sendMessage(event)">
                    <button class="chat-form__btn" onclick="Message.sendMessage()"><i class="ic-chat"></i></button>
                </div>
            </div>
        @else
            <div class="chat__bottom-wrap">
                <p class="chat__bottom-text">Для общения в чате внесите депозит не менее 3000 coins</p>
                <i class="ic-deposit-warning"></i>
            </div>
            <div class="chat__bottom-wrap">
                @if(auth()->user() && auth()->user()->id != 4)
                    <a class="button chat__bottom-button" data-izimodal-open="#inputModal" data-izimodal-transitionin="fadeInDown">ПОПОЛНИТЬ</a>
                @else
                    <a class="button chat__bottom-button" data-izimodal-open="#auth" data-izimodal-transitionin="fadeInDown">ПОПОЛНИТЬ</a>
                @endif
            </div>
        @endif
    </div>
</div>