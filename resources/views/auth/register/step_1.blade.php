@extends('layouts.register')

@section("prc")40% @endsection

@section('step')
    <div class="quest__item active">
        <div class="quest__home">
            <div class="quest__home-block">
                <div class="quest__home-logo"><img src="./img/logo.svg" alt=""></div>
                <div class="quest__home-title">Opening an account takes just a few minutes.</div>
                <div class="quest__home-sub">Quick and Easy Process</div>
                <div class="quest__home-desc">The application process is straightforward and will not take more
                    than 10 minutes of your time. We value your convenience and have streamlined every step to
                    get you started as quickly as possible.
                </div>
                <div class="quest__home-btn" style="display: flex;justify-content: center">
                    <a href="/" class="btn" style="border: 1px solid #466BF0;background-color: #fff;color: #466BF0;margin: 10px!important;">Back</a>
                    <div style="margin: 10px!important;" class="btn account_type_modal_button">Сontinue</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal ajax account_type_modal hide">
        <div class="modal__bg"></div>
        <div class="modal__cot">
            <div class="modal__block">
                <div class="modal__close"></div>
                <div class="modal__title">
                    <h4 class="modal__title-name">Please select account Type.</h4>
                </div>
                <div class="modal__list">

                </div>
                <div class="modal__btns" style="justify-content: space-between">
                    <a href="{{ route("register.step",[2,"account=personal"]) }}" class="btn">Personal Account</a>
                    <a href="{{ route("register.step",[2,"account=joint"]) }}" class="btn">Joint Account</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector(".account_type_modal_button").addEventListener("click",function(){
            document.querySelector(".account_type_modal").classList.remove("hide");
        })
    </script>
@endsection
