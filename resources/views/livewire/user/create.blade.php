<div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <x-label for="name"/>
                    <x-input name="name" wire:model="user.name" class="form-control" autofocus required  />
                    <x-error field="user.name" class="error required" />
                </div>
                <div class="form-group">
                    <x-label for="email"/>
                    <x-email name="email" wire:model="user.email" class="form-control"  required  />
                    <x-error field="user.email" class="error required" />
                </div>

                <div class="form-group">
                    <x-label for="password"/>
                    <x-password name="password" wire:model="user.password" class="form-control" required/>
                    <x-error field="user.password" class="error required" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>

                    <a href="/" class="btn btn-danger">
                        cancel
                    </a>

                </div>
            </form>
        </div>
    </div>
</div>
