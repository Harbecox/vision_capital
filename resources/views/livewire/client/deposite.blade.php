<div>
    <div class="hat__btn">
        <div class="btn white" wire:click="openModal">New Deposit</div>
    </div>
    @if($step == 1)
        <div class="modal ajax">
            <div class="modal__bg"></div>
            <div class="modal__cot">
                <div class="modal__block">
                    <div class="modal__close"></div>
                    <div class="modal__title">
                        <h4 class="modal__title-name">Please choose the following deposit option</h4>
                    </div>
                    <div class="modal__btns">
                        @if(Auth::user()->bank)
                            <div wire:click="setType('{{ \App\Models\Deposit::TYPE_WIRE_TRANSFER }}')"
                                 class="btn open-modal">Wire Transfer
                            </div>
                        @endif
                        @if(Auth::user()->bank && Auth::user()->check)
                            <p>or</p>
                        @endif
                        @if(Auth::user()->check)
                            <div wire:click="setType('{{ \App\Models\Deposit::TYPE_CHECK }}')" class="btn open-modal">
                                Check
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @elseif($step == 2)
        <div class="modal ajax">
            <div class="modal__bg"></div>
            <div class="modal__cot">
                <div class="modal__block" id="deposit_modal_step_2">
                    <div class="modal__close"></div>
                    <div class="modal__title">
                        <div class="modal__title-desc">
                            <p>The minimum amount to fund your account is <b>$5,000</b>.</p>
                            <p>Additional deposits must be at least <b>$100.00</b>.</p>
                        </div>
                    </div>
                    <div class="modal__form">
                        <div class="form-group small @error("sum") error @enderror">
                            <label>Amount</label>
                            <input type="text" wire:model="sum" required>
                            @error("sum")
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn" wire:click="next">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    @elseif($step == 3)
        @if($type == \App\Models\Deposit::TYPE_WIRE_TRANSFER)
            <div class="modal ajax">
                <div class="modal__bg"></div>
                <div class="modal__cot">
                    <div class="modal__block">
                        <div class="modal__close"></div>
                        <div class="modal__title">
                            <h4 class="modal__title-name">To finalize your deposit, please wire the funds using the instructions provided below.</h4>
                        </div>
                        <div class="modal__list">
                            <div class="modal__list-item">
                                <p>Amount</p>
                                <p><b>${{ $sum }}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Bank Name:</p>
                                <p><b>{{Auth::user()->bank_profile->name}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Bank Address</p>
                                <p><b>{{Auth::user()->bank_profile->address}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Beneficiary Name</p>
                                <p><b>{{Auth::user()->bank_profile->beneficiary}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Account Number</p>
                                <p><b>{{Auth::user()->bank_profile->account}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Routing/ABA</p>
                                <p><b>{{Auth::user()->bank_profile->r_aba}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Wire Details / Memo</p>
                                <p><b>Ref- {{Auth::user()->account}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Include only the reference number in the wire details to prevent any potential loss or mishandling of the transfer</p>
                            </div>
                        </div>
                        <div class="modal__btns">
                            <div class="btn" onclick="window.print()"><i><img src="/img/icon-pring.svg" alt=""></i>Print</div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($type == \App\Models\Deposit::TYPE_CHECK)
            <div class="modal ajax">
                <div class="modal__bg"></div>
                <div class="modal__cot">
                    <div class="modal__block">
                        <div class="modal__close"></div>
                        <div class="modal__title">
                            <h4 class="modal__title-name">To complete your deposit please follow the instructions below</h4>
                        </div>
                        <div class="modal__list">
                            <div class="modal__list-item">
                                <p>Amount</p>
                                <p><b>${{$sum}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Make Your Check Payable To</p>
                                <p><b>{{$settings['Company_Name']}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Address</p>
                                <p><b>{{$settings['Address']}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>Memo</p>
                                <p><b>Ref- {{\Illuminate\Support\Facades\Auth::user()->account}}</b></p>
                            </div>
                            <div class="modal__list-item">
                                <p>The process of clearing your check and crediting the founds to your account may take
                                    between 5 to 10
                                    business day. For a more secure and trackable option, we suggest opting for courier
                                    delivery
                                    services that provide a tracking number</p>
                            </div>
                        </div>
                        <div class="modal__btns">
                            <div class="btn" onclick="window.print()"><i><img src="/img/icon-pring.svg" alt=""></i>Print</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @elseif($step == 4)
        <div class="col-md-8 col-12 offset-md-2 mb-3">
            <div class="d-flex align-items-center justify-content-center flex-column">
                <h1>Success</h1>
                <a href="{{ route("dashboard.index") }}">Back to dashboard</a>
            </div>
        </div>
    @endif
</div>
