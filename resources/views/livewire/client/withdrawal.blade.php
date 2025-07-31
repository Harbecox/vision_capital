<div>
    <div class="hat__btn">
        <div class="btn white" wire:click="openModal">New Withdrawal</div>
    </div>
    @if($step == 1)
        <div class="modal ajax">
            <div class="modal__bg"></div>
            <div class="modal__cot">
                <div class="modal__block">
                    <div class="modal__close"></div>
                    <div class="modal__title">
                        <h4 class="modal__title-name">Please choose the following withdrawal option</h4>
                    </div>
                    <div class="modal__btns">
                        <div wire:click="setType('{{ \App\Models\Deposit::TYPE_WIRE_TRANSFER }}')"
                             class="btn open-modal">Wire Transfer
                        </div>
                        <p>or</p>
                        <div wire:click="setType('{{ \App\Models\Deposit::TYPE_CHECK }}')" class="btn open-modal">
                            Check
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif($step == 2)

        @if($type == \App\Models\Withdrawal::TYPE_WIRE_TRANSFER)
            <div class="modal ajax">
                <div class="modal__bg"></div>
                <div class="modal__cot">
                    <div class="modal__block">
                        <div class="modal__close"></div>
                        <div class="modal__title">
                            <div class="modal__title-name">Please enter your bank details</div>
                        </div>
                        <div class="modal__form">
                            <div class="form-group small @error("sum") error @enderror">
                                <label>Amount</label>
                                <input type="text" wire:model="sum" required>
                                @error("sum")
                                <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group small">
                                <label>Benefeciary Bank Name</label>
                                <input type="text" wire:model="bank_name" required>
                            </div>
                            <div class="form-group small">
                                <label>Beneficiary Bank Address</label>
                                <input type="text" wire:model="bank_address" required>
                            </div>
                            <div class="form-group small">
                                <label>Beneficiary Name</label>
                                <input type="text" wire:model="payee_name" required>
                            </div>
                            <div class="form-group small">
                                <label>Beneficiary Address</label>
                                <input type="text" wire:model="address" required>
                            </div>
                            <div class="form-group small">
                                <label>Routing/ABA</label>
                                <input type="text" wire:model="bank_aba" required>
                            </div>
                            <div class="form-group small">
                                <label>Account Number</label>
                                <input type="text" wire:model="bank_account" required>
                            </div>

                            <button class="btn" wire:click="next">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($type == \App\Models\Withdrawal::TYPE_CHECK)
            <div class="modal ajax">
                <div class="modal__bg"></div>
                <div class="modal__cot">
                    <div class="modal__block">
                        <div class="modal__close"></div>
                        <div class="modal__title">
                            <div class="modal__title-name">Please input the name of the Payee and the mailing address for the check.</div>
                        </div>
                        <div class="modal__form">
                            <div class="form-group small @error("sum") error @enderror">
                                <label>Amount</label>
                                <input type="text" wire:model="sum" required>
                                @error("sum")
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group small">
                                <label>Payee</label>
                                <input type="text" wire:model="payee_name" required>
                            </div>
                            <div class="form-group small">
                                <label>Address</label>
                                <input type="text" wire:model="address" required>
                            </div>
                            <button class="btn" wire:click="next">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    @endif

</div>
