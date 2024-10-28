@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Sertifikat</h1>

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Nama Kursus</th>
                    <th scope="col">QR CODE</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($certificates as $certificate)
                <tr class="text-center">
                    <td>{{ $certificate->participant_name }}</td>
                    <td>{{ $certificate->course_name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $certificate->qr_code_path) }}" alt="QR Code Sertifikat" width="100">
                    </td>
                    <td>
                        <a href="{{ route('certificates.shareQrCode', $certificate->id) }}" class="btn btn-primary">Unduh QR Code</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="4">Belum ada data sertifikat</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection