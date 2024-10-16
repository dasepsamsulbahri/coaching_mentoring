@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Activity Management</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Kegiatan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">ID Mentor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$kegiatan->id_mentor}}" name="id_mentor">
                                @error('id_mentor')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$kegiatan->nama_kegiatan}}" name="nama_kegiatan">
                                @error('nama_kegiatan')
                                &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Pertemuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$kegiatan->jml_pertemuan}}" name="jml_pertemuan">
                                @error('jml_pertemuan')
                                &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Metode Diskusi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$kegiatan->metode_diskusi}}" name="metode_diskusi">
                                @error('metode_diskusi')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fas fa-user-check"></i>
                            </button>&nbsp;
                            <a href="{{route('kegiatan.index')}}" class="btn btn-sm btn-danger">
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