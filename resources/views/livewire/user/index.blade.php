<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h5>Users</h5>
            </div>

            <div class="col">
                <h5 class="float-right text-muted">users/<a  href="{{route('users.create')}}">create</a></h5>
            </div>
        </div>
        <x-alert type="success" class="alert alert-success"/>
        <x-alert type="danger" class="alert alert-danger"/>
    </div>
    <div class="card ">
        <div class="card-header ">
            <div class="row ">
                <div class="col form-inline ">
                    Per Page: &nbsp;
                    <select wire:model="perPage" class="form-control form-inline">
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    </select>
                </div>

                <div class="col">
                    <input wire:model="search" type="text" placeholder="Search" class="float-right">
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>
                        <a wire:click.prevent="sortBy('name')" role="button" href="#" style="color: black">
                            Name
                            @include('includes._sort-icon', ['field' => 'name'])
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('email')" role="button" href="#" style="color: black">
                            Email
                            @include('includes._sort-icon', ['field' => 'email'])
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('created_at')" role="button" href="#" style="color: black">
                            Created At
                            @include('includes._sort-icon', ['field' => 'created_at'])
                        </a>
                    </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <livewire:user.delete :user="$user" :key="$loop->index"/>
                            {{-- this seems like error but solves the error--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                {{ $users->links() }}
            </div>

            <div class="col text-right text-muted">
                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} out of {{ $users->total() }} results
            </div>
        </div>
    </div>
</div>
