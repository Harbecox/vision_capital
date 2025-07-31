<div class="hat__item">
        <div class="hat__item-circle">
            <s><svg width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="42" stroke-dasharray="264 0" style="fill: transparent; stroke: #58B9FF; stroke-width: 3; stroke-dashoffset: 66;"></circle></svg></s>
            <i><img src="./img/icon-check.svg"></i>
        </div>
        <div class="hat__item-info">
            <i></i>
            <p>Let your earnings work for you! Enabling this option reinvests your dividends, accelerating the growth of your investment over time. Note: This option can only be turned off on the 5th of each month.</p>
        </div>
        <div class="hat__item-check">
            <input wire:click="show_modal" wire:model="com" name="div_comp" @if(!$is_x_date && $settings->div_comp) disabled @endif @if($com) checked @endif type="checkbox" id="flexSwitchCheckDefault">
            <p>Activate Compounding</p>
        </div>
</div>


