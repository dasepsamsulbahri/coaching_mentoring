<style>
    .table{
        font-size: 12px;
    }
</style>
@extends('backend.layouts.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Laporan Peserta</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kegiatan</th>
                                        <th>Nama Peserta</th>
                                        <th>NIP</th>
                                        <th>Title</th>
                                        <th>Descirption</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1 ?>
                                    @forelse ($laporan as $lap)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ $lap->id_kegiatan}} - {{$lap->nama_kegiatan}}</td>
                                        <td>{{ $lap->nama_peserta}}</td>
                                        <td>{{ $lap->nip}}</td>
                                        <td>{{ $lap->title}}</td>
                                        <td>{{ $lap->description}}</td>
                                        <td>{{ $lap->status}}</td>
                                        <td class="d-flex justify-content-center">

                                            <a href="{{ route('laporan.show', $lap->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i> Laporan
                                            </a>

                                            @if (auth()->user()->hasRole(['Super Admin|Admin']))
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('peserta.destroy', $pes->id) }}" method="POST">
                                                <a href="{{ route('peserta.edit', $pes->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>&nbsp;

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        Not yet users.
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