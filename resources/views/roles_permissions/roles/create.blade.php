@extends('custom_layout.master')
@section('title')
    Create - Role
@endsection
@section('main_content')
<div class="col-lg-12 mx-auto">
    <a href="{{ route('roles.index') }}" >Go Back</a>
</div>

<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Role Name</label>
                        <input type="text" name="name" class="form-control" {{ old('name') }} placeholder="Role name here">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Click to add</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('customJs')
    <script></script>
@endsection