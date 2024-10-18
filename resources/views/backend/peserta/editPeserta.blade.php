@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Peserta Kegiatan</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Update Peserta</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('peserta.update', $peserta->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="nip" value="{{$peserta->nip}}">
                                @error('nip')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_peserta" value="{{$peserta->nama_peserta}}">
                                @error('nama_peserta')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Unit Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$peserta->unit_kerja}}" name="unit_kerja">
                                @error('unit_kerja')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Satuan Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$peserta->satuan_kerja}}" name="satuan_kerja">
                                @error('satuan_kerja')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$peserta->jabatan}}" name="jabatan">
                                @error('jabatan')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pangkat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$peserta->pangkat}}" name="pangkat">
                                @error('email')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                value="{{$peserta->golongan}}" name="golongan">
                                @error('golongan')
                                    &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
    
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-user-check"></i></button>
                        <a href="{{route('peserta.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></a>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection