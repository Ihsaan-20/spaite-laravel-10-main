@extends('custom_layout.master')
@section('title')
    Create - Permission
@endsection
@section('main_content')
<div class="col-lg-12 mx-auto">
    <a href="{{ route('all.roles.permissions') }}" >Go Back</a>
</div>
<div class="page-content">

    <div class="row">
      <div class="col-12 grid-margin">
      </div>
    </div>
    <div class="row profile-body">

      <!-- right wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Add Role in Permission</h6>
                <form id="myForm" action="{{ route('store.role.permission') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <select class="form-select" name="role_id">
                            <option selected="" disabled >Select Role in Permission</option>
                            @foreach ($roles as $role )
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            
                        </select>
                    </div> 
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" name="" id="checkDefaultMain">
                        <label class="form-check-label">Permission All</label>
                    </div> 
                    <hr>
                    {{-- row --}}
                    @foreach ($permission_groups as $perm )
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="checkDefault">
                                <label class="form-check-label">{{$perm->group_name}}</label>
                            </div>  
                        </div>

                        <div class="col-9">
                            @php
                            $permissions= App\Models\User::getpermissionByGroup($perm->group_name);
                            @endphp
                            @foreach ($permissions as $permission )   
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" 
                                        name="permission[]" value="{{$permission->id}}" 
                                        id="checkDefault{{$permission->id}}" />
                                <label class="form-check-label" for="checkDefault{{$permission->id}}">{{$permission->name}}</label>
                            </div> 
                            @endforeach
                            <br>

                        </div>
                    </div> 
                        {{-- end row --}}
                    @endforeach

                    <button type="submit" class="btn btn-primary me-2 px-4">Add Role in Permission</button>
                </form>
                
                
            </div>
          </div>    

      </div>
      <!-- right wrapper end -->


    </div>
</div>
@endsection
@section('customJs')
<script>
    $('#checkDefaultMain').click(function(){
        if ($(this).is(':checked')) {
            $('input[type="checkbox"]').prop('checked', true);
        } else {
            $('input[type="checkbox"]').prop('checked', false);
        }
    });

</script>
@endsection
