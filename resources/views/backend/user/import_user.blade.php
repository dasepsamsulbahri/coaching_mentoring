
@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Management Users</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Import User</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.store_import')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-5 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control" name="file" required="required">
                            </div>    
                        </div>
    
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-user-check"></i> Import users</button>
                        <a href="{{route('users.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-window-close"></i> Cancel</a>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection