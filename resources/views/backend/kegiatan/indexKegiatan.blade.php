@extends('backend.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Kegiatan Management</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

    <div class="row">
        <div class="col-lg-6">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @if (auth()->user()->hasRole(['Super Admin|Admin']))
                    <a href="{{route('kegiatan.create')}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-user-plus"></i>&nbsp; Add Kegiatan
                    </a>
                    @endif

                    @if (auth()->user()->hasRole(['Mentor']))
                    <h6 class="m-0 font-weight-bold text-primary">Form Add Kegiatan</h6>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mentor</th>
                                    <th>ID - Nama Kegiatan</th>
                                    <th>Jml Pertemuan</th>
                                    <th>Metode</th>
                                    @if (auth()->user()->hasRole(['Super Admin|Admin']))
                                    <th>Add/ Import</th>
                                    @endif
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @forelse ($kegiatan as $keg)
                                <tr>
                                    <td>{{ $keg->name}}</td>
                                    <td>{{ $keg->id}} - {{ $keg->nama_kegiatan}}</td>
                                    <td>{{ $keg->jml_pertemuan}}</td>
                                    <td>{{ $keg->metode_diskusi }}</td>
                                    @if (auth()->user()->hasRole(['Super Admin|Admin']))
                                    <td>
                                        <a href="{{ route('peserta.create_peserta', $keg->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-user-plus"></i>
                                        </a>
                                    
                                        <a href="{{ route('peserta.import') }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-import"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kegiatan.destroy', $keg->id) }}" method="POST">
                                            <a href="{{ route('kegiatan.edit', $keg->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen-square"></i>
                                            </a>
                                            @if (auth()->user()->hasRole(['Admin']))
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Belum ada data kegiatan.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection