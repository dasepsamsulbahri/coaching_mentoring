@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Peserta Kegiatan</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peserta</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('peserta.store', $kegiatan->id)}}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">ID Kegiatan</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="id_kegiatan" value="{{$kegiatan->id}}" readonly>
                            </div>    
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" 
                                name="nip" value="{{old('nip')}}">
                                @error('nip')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                name="name" value="{{old('nip')}}">
                                @error('name')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" 
                                value="{{old('email')}}" name="email">
                                @error('email')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
    
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-user-check"></i></button>
                        <a href="{{route('kegiatan.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></a>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection