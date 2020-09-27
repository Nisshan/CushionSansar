<div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <x-label for="name"/>
                    <x-input name="name" wire:model="name" class="form-control" autofocus required  />
                    <x-error field="name" class="error required" />
                </div>
                <div class="mb-2">
                    <x-label for="image"/>
                    <div class="form-group">
                        <x-input type="file" name="image" wire:model="image" required class="mb-1"/>
                        <x-error field="image" class="error required"/> <br>

                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" style="height: 100px; width:100px">
                        @endif

                    </div>
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
