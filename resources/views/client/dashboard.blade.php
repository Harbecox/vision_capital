@extends("layouts.app")

@section("content")


<section class="hat">
    <div class="hat__bg">
        <img src="/img/cap5.jpg" alt="">
    </div>
    <div class="row min">
        <h1 class="hat__title">Welcome, @if(\Illuminate\Support\Facades\Auth::user()){{\Illuminate\Support\Facades\Auth::user()->info[0]->first_name}} <span style="padding-left:20px;font-size: 0.8em">Account Number: {{ \Illuminate\Support\Facades\Auth::user()->account }}</span> @endif</h1>
        <div class="hat__block">
            <div class="hat__item">
                <div class="hat__item-circle">
                    <s><svg width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="42" stroke-dasharray="250 14" style="fill: transparent; stroke: #466BF0; stroke-width: 3; stroke-dashoffset: 66;"></circle></svg></s>
                    <i><img src="/img/icon-arrow1.svg"></i>
                </div>
                <div class="hat__item-block">
                    <div class="hat__item-name">Total Invested Balance</div>
                    <div class="hat__item-price">@cur_format($balance->total())</div>
                </div>
            </div>
            <div class="hat__item">
                <div class="hat__item-circle">
                    <s><svg width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="42" stroke-dasharray="250 14" style="fill: transparent; stroke: #58B9FF; stroke-width: 3; stroke-dashoffset: 66;"></circle></svg></s>
                    <i><img src="/img/icon-arrow1.svg"></i>
                </div>
                <div class="hat__item-block">
                    <div class="hat__item-name">Available Balance</div>
                    <div class="hat__item-price">@cur_format($balance->available())</div>
                </div>
            </div>
            <livewire:client.compound/>
        </div>
    </div>
</section>
<section class="content bg top">
    <livewire:client.transfers></livewire:client.transfers>
</section>

<script>
    window.addEventListener("show_compound_modal",function (){
        document.querySelector(".compound_modal").classList.remove("hide");
    })
</script>
<div class="modal ajax hide compound_modal">
    <div class="modal__bg"></div>
    <div class="modal__cot">
        <div class="modal__block">
            <div class="modal__close"></div>
            <div class="modal__title">
                <h4 class="modal__title-name">Let your earnings work for you! Enabling this option reinvests your dividends, accelerating the growth of your investment over time. Note: This option can only be turned off on the 5th of each month.</h4>
            </div>
            @if($is_x_date || $comp == false)
            <div class="modal__btns">
                <a href="{{ route("dashboard.comp",['comp' => 'true']) }}" class="btn">Turn On</a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
