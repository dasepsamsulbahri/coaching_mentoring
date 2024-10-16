@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Users Management</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                name="nip" value="{{$user->nip}}">
                                @error('nip')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{$user->name}}">
                                @error('name')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                value="{{$user->email}}" name="email">
                                @error('email')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Picture</label>
                            <div class="col-sm-4">
                                <img width="200px" src="/storage/mentor/{{ $user->image }}" alt="profile-picture">
                                <input type="file" class="mt-3 form-control" name="image">
                                @error('image')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
    
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-user-check"></i></button>
                        <a href="{{route('users.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></a>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection