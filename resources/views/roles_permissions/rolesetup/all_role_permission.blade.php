@extends('custom_layout.master')
@section('title')
    Create - Permission
@endsection
@section('main_content')
<div class="col-lg-12 mx-auto">
    <a href="{{ route('add.role.permission') }}" >Add Role Permission</a>
</div>

<div class="page-content">

   
    {{-- <div class="mb-3">
        <a href="{{route('add.permission')}}" class="btn btn-inverse-warning me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Permission
        </a>
        <a href="{{route('import.permission')}}" class="btn btn-inverse-danger me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
            Import file
        </a>
        <a href="{{route('export')}}" class="btn btn-inverse-success me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
            Export file
        </a>
    </div> --}}

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All Roles</h6>
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach ($roles as $role )
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $role->name}}</td>
                        <td>
                            @foreach ($role->permissions as $perm  )
                                <span class="badge bg-danger">{{$perm->name}}</span>
                            @endforeach
                            {{ $role->group_name}}
                        </td>
                        <td>
                            <a href="{{route('edit.role.permission',$role->id)}}" class="btn btn-inverse-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                Edit
                            </a>
                            <a href="{{ route('delete.role.permission',$role->id) }}" class="btn btn-inverse-danger" id="delete">
                                Delete
                                
                                
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('customJs')
    <script></script>
@endsection
