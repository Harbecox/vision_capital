

<section class="quest">
    <div class="quest__progress"><span style="width: {{ $w }}%;"></span></div>
    <div class="quest__block">
        @if($step == 1)
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
                        <div class="quest__home-btn">
                            <div class="btn" wire:click="next">Сontinue</div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($step == 2)
            <div class="quest__item active">
                <div class="quest__page">
                    <div class="quest__page-bg">
                        <img src="./img/quest-bg.jpg" alt="">
                    </div>
                    <div class="quest__page-form">
                        <div class="quest__page-cot">
                            <div class="quest__page-title">First, we'll need a few details</div>
                            <div class="quest__form">
                                <div class="form-group small @error("first_name") error @enderror">
                                    <label>First Name</label>
                                    <input type="text" wire:model="first_name" required>
                                    @error("first_name") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group small @error("middle_name") error @enderror">
                                    <label>Middle Name</label>
                                    <input type="text" wire:model="middle_name" required>
                                    @error("middle_name") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group small @error("last_name") error @enderror">
                                    <label>Last Name</label>
                                    <input type="text" wire:model="last_name" required>
                                    @error("last_name") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group medium @error("phone") error @enderror">
                                    <label>Phone Number</label>
                                    <input type="text" wire:model="phone" required>
                                    @error("phone") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group medium @error("email") error @enderror">
                                    <label>E-mail</label>
                                    <input type="text" wire:model="email" required>
                                    @error("email") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group medium">
                                    <label>Birth Date</label>
                                    <div class="form-group-block">
                                        <select wire:model.live="month" class="medium">
                                            <option value="0">Month</option>
                                            @foreach($months as $k => $mount)
                                                <option value="{{ $k }}">{{ $mount }}</option>
                                            @endforeach
                                        </select>
                                        <select wire:model="day" class="small">
                                            <option value="0">Day</option>
                                            @foreach($days as $day)
                                                <option value="{{ $day }}">{{ $day }}</option>
                                            @endforeach
                                        </select>
                                        <select wire:model="year" class="small">
                                            <option value="0">Year</option>
                                            @foreach($years as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group medium">
                                    <label>ID (Driver License or SSN)</label>
                                    <input type="text" wire:model="ss_dl">
                                </div>
                                <div class="quest__form-title">Where do you live?</div>
                                <div class="form-group large">
                                    <label>Address Street</label>
                                    <input type="text" wire:model="address">
                                </div>
                                <div class="form-group min">
                                    <label>City</label>
                                    <input type="text" wire:model="city">
                                </div>
                                <div class="form-group min">
                                    <label>State</label>
                                    <input type="text" wire:model="state">
                                </div>
                                <div class="form-group min">
                                    <label>Zip Code</label>
                                    <input type="text" wire:model="zip">
                                </div>
                                <div class="form-group min">
                                    <label>Country</label>
                                    <input type="text" wire:model="country">
                                </div>
                                <div class="quest__form-btn">
                                    <button class="btn" wire:click="next">Сontinue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($step == 3)

            <div class="quest__item active">
                <div class="quest__page">
                    <div class="quest__page-bg">
                        <img src="./img/quest-bg.jpg" alt="">
                    </div>
                    <div class="quest__page-form">
                        <div class="quest__page-cot">
                            <div class="quest__page-title">Choose your username and password</div>
                            <div class="quest__form">
                                <div class="form-group small @error("username") error @enderror">
                                    <label>Username* </label>
                                    <input type="text" wire:model="username" required>
                                    @error("username") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group small @error("password") error @enderror">
                                    <label>Password*</label>
                                    <input type="password" wire:model="password" required>
                                    @error("password") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group small @error("password") error @enderror">
                                    <label>Password*</label>
                                    <input type="password" wire:model="password_confirmation" required>
                                    @error("password") <small>{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group large">
                                    <label>Choose a Security Question</label>
                                    <input type="text" wire:model="secret_question">
                                </div>
                                <div class="form-group large">
                                    <label>Choose an Answer</label>
                                    <input type="text" wire:model="secret_answer">
                                </div>
                                <div class="quest__form-btn">
                                    <button class="btn" >Сontinue</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @elseif($step == 4)
            <div class="quest__item active">
                <div class="quest__success">
                    <div class="quest__success-block">
                        <div class="quest__success-title">Vision Capital Growth Fund Terms and Conditions</div>
                        <div class="quest__success-desc">
                            <h2>Introduction</h2>
                            <p>Welcome to the Vision Capital Growth Fund, an investment product offered by Vision Capital, designed to provide monthly dividends to its investors. This fund primarily invests in securities of large-scale, growth-oriented companies, aiming to achieve long-term capital appreciation and consistent dividend income. By investing in the Growth Fund, you agree to the following terms and conditions.</p>
                            <h2>Dividend Policy</h2>
                            <p>The Growth Fund pays dividends on the 5th of each month. Investors have the option to either withdraw these dividends or reinvest them back into the fund (compound). Please note, dividends that are reinvested will be subject to the same terms as the principal investment, including the lock-in period.</p>

                            <h2>Lock-in Period</h2>
                            <p>The principal amount invested in the Growth Fund is subject to a 90-day lock-in period from the date of investment. During this period, investors cannot withdraw the principal amount invested. However, dividends generated during this period can be withdrawn unless they are reinvested (compounded), in which case they are also locked for 90 days.</p>

                            <h2>Fees</h2>
                            <p>The Growth Fund applies the following fee structure:</p>
                            <ul>
                                <li><strong>Performance Fee:</strong> The performance fee is based on the total amount invested:</li>
                                <ul>
                                    <li>$5,000 - $24,999: 15%</li>
                                    <li>$25,000 - $74,999: 10%</li>
                                    <li>$75,000 - $249,999: 7.5%</li>
                                    <li>$250,000 and above: 5%</li>
                                </ul>
                                <li><strong>Outgoing Wire Transfer Fee:</strong> A fee of $30.00 will be charged for any outgoing wire transfers.</li>
                            </ul>

                            <h2>Investment Risks</h2>
                            <p>Investing in the Growth Fund involves risks, including the potential loss of principal. The fund invests in growth-oriented companies, which may involve greater volatility and risk than investments in more diversified portfolios. While the fund aims for consistent dividend payments, there is no guarantee of dividend payment amounts, as they depend on the performance of the underlying investments.</p>
                            <p>The Growth Fund is not publicly traded, which may limit the liquidity and marketability of your investment. Before investing, consider your financial situation, investment objectives, and risk tolerance.</p>

                            <h2>General Terms</h2>
                            <p>The fund reserves the right to modify terms, conditions, fees, and charges at any time with prior notice to investors. The investment in the Growth Fund does not constitute a deposit or obligation of, or guaranteed by, Vision Capital, nor is it insured by any government agency. Investors are responsible for understanding the tax implications of their investment, including dividend income and capital gains.</p>

                            <h2>Acceptance of Terms</h2>
                            <p>By investing in the Growth Fund, you acknowledge that you have read, understood, and agreed to these terms and conditions. You also acknowledge that you are aware of the inherent risks involved in this investment and have made your investment decision based on your judgment and advice from financial advisors, as necessary.</p>
                            <p>For further inquiries or more information regarding the Growth Fund, please contact our customer service team at <a href="mailto:info@visioncapitalgf.com">info@visioncapitalgf.com</a>.</p>

                        </div>
                        <div class="quest__success-btn">
                            <div class="btn" wire:click="next">I aaaa agree</div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($step == 5)

            <div class="quest__item active">
                <div class="quest__success">
                    <div class="quest__success-block">
                        <div class="quest__success-logo"><img src="/img/logo.svg" alt=""></div>
                        <div class="quest__success-text">
                            <p>Thank you for submitting your application for an account with us. A representative will
                                be in contact with you within the next 24 hours to discuss the next steps and answer any
                                questions you may have.</p>
                        </div>
                        <div class="quest__success-btn"><a href="/" class="btn">Сontinue</a></div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</section>

