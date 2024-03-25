@extends('layouts.backend.main') 
@section('konten') 
<div class="container-fluid">
  <div class="col-lg-12">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Add New Pengalaman</h2>
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
              <form action="{{ route('kontak.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Nomor Hp</strong>
                              <input type="text" name="nomor_hp" class="form-control"
                                  placeholder="Input nomor hp">
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Email</strong>
                              <input type="text" name="email" class="form-control" placeholder="Input email anda">
                          </div>
                        </div>
                        
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Lokasi</strong>
                                <input type="text" name="lokasi" class="form-control" placeholder="Input lokasi anda">
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
   
</div> 
@endsection