<style>
    .table{
        font-size: 12px;
    }
</style>
@extends('backend.layouts.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Peserta</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the.</p>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Peserta Kegiatan</h6>
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
                                        <th>Keg</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Uke</th>
                                        <th>Satker</th>
                                        <th>Jabatan</th>
                                        <th>Pangkat/ Gol</th>
                                        @if (auth()->user()->hasRole(['Super Admin|Admin|Peserta']))
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1 ?>
                                    @forelse ($peserta as $pes)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ $pes->nama_kegiatan}}</td>
                                        <td>{{ $pes->nip}}</td>
                                        <td>{{ $pes->nama_peserta}}</td>
                                        <td>{{ $pes->unit_kerja}}</td>
                                        <td>{{ $pes->satuan_kerja}}</td>
                                        <td>{{ $pes->jabatan}}</td>
                                        <td>{{ $pes->golongan}}/ {{ $pes->pangkat}}</td>

                                        @if (auth()->user()->hasRole(['Peserta']))
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('laporan.create_laporan', $pes->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-cloud-upload-alt"></i> Laporan
                                            </a>
                                        </td>
                                        @endif


                                        @if (auth()->user()->hasRole(['Super Admin|Admin']))
                                        <td class="d-flex justify-content-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('peserta.destroy', $pes->id) }}" method="POST">
                                                <a href="{{ route('peserta.edit', $pes->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>&nbsp;

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></button>
                                            </form>
                                        </td>
                                        @endif
                                        {{-- @endif --}}
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