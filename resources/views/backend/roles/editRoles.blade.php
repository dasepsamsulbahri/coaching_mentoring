@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Roles Management</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Role</h6>
                </div>
                <div class="card-body">
                    @foreach($role as $p)
                    <form action="{{route('role.update')}}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">User ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $p->model_id }}" name="model_id" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Role ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $p->role_id }}" name="role_id">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Model Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $p->model_type }}" name="model_type" readonly>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-md" value="Simpan Data">
                        <a href="{{ route('role.index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                    @endforeach
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection