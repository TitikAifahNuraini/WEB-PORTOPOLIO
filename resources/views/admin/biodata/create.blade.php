@extends('layouts.backend.main') 
@section('konten') 

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add Biodata Diri</h2>
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
                <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama</strong>
                                <input type="text" name="nama" class="form-control" placeholder="Input nama">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" class="form-control" placeholder="Input Email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Alamat</strong>
                                <input type="text" name="alamat" class="form-control" placeholder="Input Alamat">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jurusan</strong>
                                <input type="text" name="jurusan" class="form-control" placeholder="Input Jurusan">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Foto</strong>
                                <input type="file" class="form-control form-control-md" name="foto"
                                    placeholder="Foto" accept="foto/png, foto/jpeg, foto/jpg" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
  </div> 
@endsection