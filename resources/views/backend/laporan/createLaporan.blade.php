@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Laporan Peserta</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Upload Laporan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" name="id_peserta" value="{{$peserta->id}}" >
                                <input type="hidden" class="form-control" name="id_kegiatan" value="{{$peserta->id_kegiatan}}" >
                                <input type="hidden" class="form-control" name="id_mentor" value="{{$peserta->id_mentor}}" >
                                <input type="hidden" class="form-control" name="status" value="Belum diperiksa" >
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                @error('title')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" value="{{old('description')}}">
                                @error('description')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Laporan</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="file">
                                @error('file')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        
    
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-user-check"></i></button>
                        <a href="{{route('laporan.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-window-close"></i></a>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection