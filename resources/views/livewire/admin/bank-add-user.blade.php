<div class="row align-items-end">
    <x-form.select col="10" offset="0" id="select_user" name="selected_id" label="Select Account" :options="$users"></x-form.select>
    <div class="col-2"><button wire:click="addUser" type="button" id="select_user_add_btn" class="btn btn-primary mb-3">+</button> </div>

    <div class="col-12">
        @foreach($bank_users as $user)
            <div class="mb-2">
                {{ $user->first_name." ".$user->last_name." #".$user->account }}
                <button wire:click="removeUser({{ $user->id }})" type="button" class="btn btn-danger">X</button>
            </div>
        @endforeach
    </div>
</div>
