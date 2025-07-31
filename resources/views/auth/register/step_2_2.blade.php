@extends('layouts.register')

@section("prc")60% @endsection

@section('step')
    <div class="quest__item active">
        <div class="quest__page">
            <div class="quest__page-bg">
                <img src="/img/quest-bg.jpg" alt="">
            </div>
            <div class="quest__page-form">
                <div class="quest__page-cot">
				@php
/* 				echo "<pre>";
print_r($user_data);
echo "</pre>";	 */
				@endphp
                    <div class="quest__page-title">Step 3</div>
                    <div class="quest__page-title">Identity verification</div>
                    <div class="quest__form-title" style="text-align:center;font-weight: normal!important;">We're required by law to collect this information, and we'll use it to verify your identity.</div>
                    @if($account == "joint")
                        <div class="quest__page-title">Account Holder {{ $holder }}</div>
                    @endif
                    <form class="quest__form" method="POST" action="{{ route("register.step",'2_2') }}">
                        @csrf

						 @if($account == "joint")
                            <input type="hidden" name="holder" value="{{ $holder }}">
                        @endif
						<input type="hidden" name="account" value="{{ $account }}">
                        <div class="form-group medium">
                            <label>Birth Date</label>
                            <div class="form-group-block">
                                <select name="month" class="medium @error("month") error @enderror" id="monthDropdown">
                                    <option disabled selected value="0">Month</option>
                                </select>


                                <select name="day" class="small @error("day") error @enderror" id="dayDropdown">
                                    <option disabled selected value="0">Day</option>
                                </select>


                                <select name="year" class="small @error("year") error @enderror" id="yearDropdown">
                                    <option disabled selected value="0">Year</option>
                                </select>

                            </div>
                            @error("month") <small>{{ $message }}</small> @enderror
                            @error("day") <small>{{ $message }}</small> @enderror
                            @error("year") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group medium">
                            <label>ID (Driver License or SSN)</label>
                            <input type="text" value="{{ old("ss_dl") }}" name="ss_dl">
                        </div>
                        <div class="quest__form-btn">
                            <button class="btn" type="submit">Сontinue</button>
                        </div>
                        <div style="display: flex;align-items: center;width: 100%;margin-top: 50px;flex-direction: column">
                            <img src="/img/secure.jpg" style="width: 200px">
                            <h4 style="text-align: left;margin: 20px;width: 100%">Important information about procedures for opening a new account:</h4>
                            <p>To help the government fight the funding of terrorism and money laundering activities, Federal law requires all financial institutions to obtain, verify, and record information that identifies each person who opens an account.</p>
                            <h4  style="text-align: left;margin: 20px;width: 100%">What this means for you:</h4>
                            <p>When you open an account, we will ask for your name, address, date of birth, and other information that will allow us to identify you. We may also utilize a third-party information provider for verification purposes and/or ask for a copy of your driver's license or other identifying documents.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let country_old = "{{ old('country') }}";
        let regions = @json($regions);
        let regions_old = "{{ old('state') }}";
        let co_sel = document.getElementById("countries");
        let reg_sel = document.getElementById("regions");

        let month = "{{ old('month') }}";
        let year = "{{ old('year') }}";
        let day = "{{ old('day') }}";

        setTimeout(function (){
            document.dispatchEvent(new CustomEvent("setBDate",{
                detail:{
                    month:month,
                    day:day,
                    year:year
                }
            }))
        },1000);

        co_sel.addEventListener("change",function (){
            serRegions(this.value)
        })

        if(country_old){
            serRegions(country_old)
        }

        function serRegions(country_id){
            reg_sel.innerHTML = "";
            for(let i in regions[country_id]){
                let reg = regions[country_id][i];
                let opt = document.createElement("option");
                opt.setAttribute("value",reg.name);
                opt.textContent = reg.name;
                reg_sel.appendChild(opt)
            }
        }
    </script>
@endsection
