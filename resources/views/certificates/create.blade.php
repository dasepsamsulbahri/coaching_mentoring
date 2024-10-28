@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Buat Sertifikat Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('certificates.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="participant_name">Nama Peserta</label>
                <input type="text" class="form-control" id="participant_name" name="participant_name" required>
            </div>

            <div class="mb-3">
                <label for="course_name">Nama Kursus</label>
                <input type="text" class="form-control" id="course_name" name="course_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Buat Sertifikat</button>
        </form>
    </div>
@endsection