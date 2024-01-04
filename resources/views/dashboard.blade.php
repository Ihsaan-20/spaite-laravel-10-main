<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") ." ". Auth::user()->name }}
                </div>
                
                <div class="p-6 text-gray-900">
                    {{ __("You can") }}
                    <div class="mb-3">
                        @can('all.post')
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">All</button>
                        @endcan

                        @can('edit.post')
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</button>
                        @endcan

                        @can('update.post')
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Update</button>
                        @endcan

                        @can('delete.post')
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Delete</button>
                        @endcan
                
                
                        @can('read.post')
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Read</button>
                        @endcan
                
                    </div>
                </div>
                @php 
                    $roles = Spatie\Permission\Models\Role::get();
                    $permissions = Spatie\Permission\Models\Permission::orderBy('created_at')->get();
                    
                @endphp
                
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    @if($user = Auth::user()->id === 1 || $user = Auth::user()->id === 2 )
                        <form action="{{ route('assign.permission') }}" method="post">
                            @csrf
                            <div class="inline-block relative w-64 my-3">
                                @if($roles->isNotEmpty())
                                <select name="role_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-4">
                                    <option disabled selected>Select role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                                
                            </div>
                           
                            <div class="inline-block relative w-64 my-3">
                                @if($permissions->isNotEmpty())
                                <select name="permission_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-4">
                                    <option disabled selected>Select Permission</option>
                                    @foreach ($permissions as $perm)
                                        <option value="{{ $perm->id }}">{{ $perm->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                                
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 
                                font-semibold hover:text-white py-2 px-4 border border-blue-500 
                                hover:border-transparent rounded">
                                Assign
                            </button>
                            </div>

                            
                        </form>
                    @endif
                    

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
