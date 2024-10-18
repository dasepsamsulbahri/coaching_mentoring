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
                        <iframe src="{{asset('/storage/laporan/'.$laporan->file)}}" width="100%" height="1000" frameborder='0'></iframe>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection