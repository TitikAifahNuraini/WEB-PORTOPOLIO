@extends('layouts.backend.main') 
@section('konten') 
<div class="container-fluid">
    
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Kontak</h2>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Something went wrong.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mb-4">
            <div class="col-lg-12 mt-4">
                <form action="{{ route('kontak.update', $kontak->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nomor Hp</strong>
                                <input type="text" name="nomor_hp" value="{{ $kontak->nomor_hp }}"
                                    class="form-control" placeholder="Input pengalaman">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="text" name="email" value="{{ $kontak->email }}"
                                    class="form-control" placeholder="Input tahun">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Lokasi</strong>
                                <input type="text" name="lokasi" value="{{ $kontak->lokasi }}"
                                    class="form-control" placeholder="Input lokasi">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right mb-3">
                            <a class="btn btn-dark" href="{{ route('kontak.index') }}">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection