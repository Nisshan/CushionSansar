<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">General</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <x-label for="name"/> <span class="required">* </span>:
                    <x-input name="name" wire:model="name" class="form-control" autofocus required/>
                    <x-error field="name" class="error required"/>
                </div>
                <div class="form-group">
                    <x-label for="email"/> <span class="required">* </span>:
                    <x-email name="email" wire:model="email" class="form-control" required disabled/>
                    <x-error field="email" class="error "/>
                </div>
                <div class="form-group">
                    <x-label for="password"/>:
                    <x-password name="password" wire:model="password" class="form-control" />
                    <x-error field="password" class="error required"/>
                    <span style="color: green">Leave Password field empty to keep old password</span>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <b>Status <span class="required"> *</span> : </b>
                    </div>
                    <label>
                        <input type="radio" wire:model="status"
                               value="1" checked

                        > &nbsp; Active
                    </label> &nbsp; &nbsp; &nbsp;
                    <label>
                        <input type="radio" wire:model="status"  value="0"

                        > &nbsp; Inactive
                    </label> &nbsp;
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>

                    <a href="{{route('users.index')}}" class="btn btn-danger">
                        cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
