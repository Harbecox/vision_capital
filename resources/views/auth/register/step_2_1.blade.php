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
                    <div class="quest__page-title">Step 2</div>


                    <form class="quest__form" method="POST" action="{{ route("register.step",'2_1') }}">
                        @csrf
                        <div class="quest__form-title">Where do you live?</div>
                        <div class="form-group large">
                            <label>Address Street</label>
                            <input type="text" value="{{ old("address") }}" name="address">
                        </div>
                        <div class="form-group min">
                            <label>City</label>
                            <input type="text" value="{{ old("city") }}" name="city">
                        </div>
                        <div class="form-group min">
                            <label>State</label>
                            <select class="small" name="state" id="regions">
                                @foreach($regions[1] as $region)
                                    <option @if(old("state") == $region->name) selected @endif value="{{ $region->name }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group min">
                            <label>Zip Code</label>
                            <input type="text" value="{{old("zip")}}" name="zip">
                        </div>
                        <div class="form-group min">
                            <label>Country</label>
                            <select name="country" class="small" id="countries">
                                @foreach($countries as $country)
                                    <option @if(old("country") == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
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
