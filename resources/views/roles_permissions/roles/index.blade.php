@extends('custom_layout.master')
@section('title')
All Roles 
@endsection
@section('main_content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <a href="{{ route('role.create') }}">Add New Role</a>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-lg-8 mx-auto">
            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $key => $role )
                        <tr class="">
                            <td>{{ $key+1 }}</td>
                            <td>{{ ucfirst($role->name) }}</td>
                            <td>
                                <a href="#" class="btn btn-info">Assign permissions</a>
                                <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('role.destroy', ['id' => $role->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger d-inline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <p class="text-muted text-center">No records found!</p>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('customJs')
    <script></script>
@endsection
