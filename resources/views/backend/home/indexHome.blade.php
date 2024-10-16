@extends('backend.layouts.main')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5 mb-2" width="150px" src="/storage/mentor/{{Auth::user()->image}}">
                <span class="font-weight-bold">{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span>
            </div>
        </div>
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile</h4>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">NIP</label>
                        <input type="text" class="form-control" value="{{Auth::user()->nip}}" readonly>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                    </div>
                
                </div>
                
                {{-- <div class="mt-5">
                    <button class="btn btn-primary btn-sm profile-button" type="button">Save Profile</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>























{{-- <div class="container-fluid">
    
    <img src="" width="50px" class="img-circle" alt="tag">
    
    <h1 class="h3 mb-2 text-gray-800">Welcome back <strong>{{Auth::user()->name}}</strong>!</h1>
    
</div> <!-- container-fluid --> --}}
    
@endsection