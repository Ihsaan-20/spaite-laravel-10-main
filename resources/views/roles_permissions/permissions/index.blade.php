@extends('custom_layout.master')
@section('title')
All Permission 
@endsection
@section('main_content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <a href="{{ route('permission.create') }}">Add New Permission</a>
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
                        @forelse ($permissions as $key => $permission )
                        <tr class="">
                            <td>{{ $key+1 }}</td>
                            <td>{{ ucfirst($permission->name) }}</td>
                            <td>
                                <a href="#" class="btn btn-info">Assign permissions</a>
                                <a href="{{ route('permission.edit', ['id' => $permission->id]) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('permission.destroy', ['id' => $permission->id]) }}" method="POST" class="d-inline">
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
