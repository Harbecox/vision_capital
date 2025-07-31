@extends('front.layouts.front')
<title>Vision Capital - Contact Us</title>
@section('content')
    <section class="cap">
        <div class="cap__bg">
            <img src="/img/cap4.jpg" alt="">
        </div>
        <div class="row">
            <div class="cap__bread">
                <ul>
                    <li><a href="/">Home page</a></li>
                    <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                </ul>
            </div>
            <h1 class="cap__title">Contact Us</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="contact">
                <div class="contact__info">
                    <div class="contact__title">Contact Information</div>
                    <div class="contact__info-block">
                        <div class="contact__info-item">
                            <i><img src="/img/icon-geo.svg" alt=""></i>
                            <p>Adress:</p>
                            <a href="mailto:info@visioncapitalgf.com">1201 N Market St, Wilmington, DE 19801</a>
                        </div>
                        <div class="contact__info-item">
                            <i><img src="/img/icon-email.svg" alt=""></i>
                            <p>Email:</p>
                            <a href="#"><b><span>info@visioncapitalgf.com</span></b></a>
                        </div>
                        <div class="contact__info-item">
                            <i><img src="/img/icon-phone.svg" alt=""></i>
                            <p>Phone:</p>
                            <a href="tel:+18772252155"><b>+1-877-225-2155</b></a>
{{--                            <a href="tel:+13023308633"><b>+1-302-330-8633</b></a>--}}
                        </div>
                    </div>
                </div>
                <div class="contact__form">
                    <div class="contact__title">CONNECT WITH US</div>
                    <form action="{{route('client.contact_us')}}" method="post" class="contact__form-block">
                        @csrf
                        <div class="form-group">
                            <label>Your name*</label>
                            <input type="text" name="name" >
                        </div>
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label>Subject of the application</label>
                            <select name="subject" required>
                                <option value="Account Opening">Account Opening</option>
                                <option value="Deposits & Withdrawals">Deposits & Withdrawals</option>
                                <option value="Trust, Business Application, TOD and other forms">Trust, Business Application, TOD and other forms</option>
                            </select>
                            @error('subject')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="ip" value="{{$ipAddress = request()->ip()}}" id="ip" >
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="url" value="{{request()->headers->get('referer')}}" id="url">
                        </div>
                        <div class="form-group">
                            <label>Your message</label>
                            <textarea name="text"></textarea>
                            @error('text')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="contact__form-btn">
                            <div class="check">
                                <input type="checkbox" name="check" id="check">
                                <p>I consent to the processing of my personal data</p>
                            </div>

                            <button class="btn" type="submit" id="submitButton" disabled>Submit</button>
                        </div>
                        @error('check')
                        <span class="text-danger" style="color: red">{{ $message }}</span>
                        @enderror
                    </form>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let checkbox = document.getElementById('check');
                            let submitButton = document.getElementById('submitButton');

                            checkbox.addEventListener('change', function() {
                                if (checkbox.checked) {
                                    submitButton.disabled = false;
                                } else {
                                    submitButton.disabled = true;
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="info">
                <x-footer-info></x-footer-info>
            </div>
        </div>
    </section>
    @if(\Illuminate\Support\Facades\Session::has("Success"))
        <div class="modal ajax">
            <div class="modal__bg"></div>
            <div class="modal__cot">
                <div class="modal__block">
                    <div class="modal__close"></div>
                    <div class="modal__title">
                        <h4 class="modal__title-name">Your request has been received</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
