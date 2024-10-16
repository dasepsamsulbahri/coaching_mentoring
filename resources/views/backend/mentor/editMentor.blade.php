@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Mentor Management</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Mentor</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('mentor.update', $mentor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$mentor->nip}}" name="nip">
                                @error('nip')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$mentor->name}}" name="name">
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fas fa-user-check"></i>
                            </button>&nbsp;
                            <a href="{{route('mentor.index')}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-user-times"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection