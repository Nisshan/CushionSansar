<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save" enctype=multipart/form-data>
                <div class="form-group">
                    <x-label for="name"/>
                    <span class="required"> *</span>
                    <x-input name="name" wire:model="name" class="form-control" value="name" autofocus required/>
                    <x-error field="name" class="error required"/>
                </div>

                <div class="form-group" wire:ignore>
                    <label>Category:</label><br>
                    <select class="category" multiple required>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}"> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <x-error field="category" class="error required"/>

                <div class="form-group" wire:ignore>
                    <x-label for="description"/>
                    <span class="required"> *</span>
                    <trix-editor
                        x-data
                        x-on:trix-change="$dispatch('input', event.target.value)"
                        wire:model.debounce.1000ms="description"
                        wire:key="uniqueKey"
                    ></trix-editor>
                </div>
                <x-error field="description" class="error required"/>

                <div class="form-group">
                    <x-label for="price"/>
                    <span class="required"> *</span>
                    <x-input name="price" wire:model="price" class="form-control" required/>
                    <x-error field="price" class="error required"/>
                </div>

                <div class="mb-2">
                    <x-label for="image"/>
                    <span class="required"> *</span>
                    <div class="form-group">
                        <x-input type="file" name="image" wire:model="image" required class="mb-1"/>
                        <x-error field="image" class="error required"/>
                        <br>

                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" style="height: 100px; width:100px">
                        @endif

                    </div>
                </div>

                <div class="mb-2">
                    <x-label for="images"/>
                    <span class="required"> *</span>
                    <div class="form-group">
                        <x-input type="file" name="image" wire:model="images" required multiple class="mb-1"/>
                        <x-error field="image" class="error required"/>
                        <br>

                        @if ($images)
                            @foreach($images as $image)
                                <img src="{{ $image->temporaryUrl() }}" style="height: 100px; width:100px">
                            @endforeach
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <div class="mb-3">
                        <b>Is Popular<span class="required"> *</span> : </b>
                    </div>
                    <label>
                        <input type="radio" wire:model="is_popular"
                               value="1"
                        > &nbsp; Yes
                    </label> &nbsp; &nbsp; &nbsp;
                    <label>
                        <input type="radio" wire:model="is_popular" value="0"
                        > &nbsp; No
                    </label> &nbsp;
                </div>

                <div class="form-group">
                    <div class="mb-3">
                        <b>Is Hero<span class="required"> *</span> : </b>
                    </div>
                    <label>
                        <input type="radio" wire:model="is_hero"
                               value="1"
                        > &nbsp; Yes
                    </label> &nbsp; &nbsp; &nbsp;
                    <label>
                        <input type="radio" wire:model="is_hero" value="0"
                        > &nbsp; No
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

        @section('js')
            <script>

                $(document).ready(function () {
                    $('.category').select2({width: "100%"});
                    $('.category').on('change', function (e) {
                        var data = $(this).select2("val");
                    @this.set('category', data);
                    });
                });
            </script>
        @endsection
    </div>
</div>
