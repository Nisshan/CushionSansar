<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
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
                    <span class="required"> *</span>
                    <div class="form-group">
                        <x-input type="file" name="image" wire:model="updated_image" class="mb-1"/>
                        <x-error field="updated_image" class="error required"/> <br>

                        <img src="{{$updated_image ? $updated_image->temporaryurl() : url('storage/categories/'.$image)}}" style="height: 100px; width:100px">
                    </div>
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
                    <a href="/" class="btn btn-danger">
                        cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
