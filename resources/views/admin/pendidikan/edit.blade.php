@extends('layouts.backend.main') 
@section('konten') 
<div class="container-fluid">
  <div class="col-lg-12">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Edit Pendidikan</h2>
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
              <form action="{{ route('pendidikan.update', $educations->id) }}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')

                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Tahun Masuk</strong>
                              <input type="text" name="tahun_masuk" value="{{ $educations->tahun_masuk }}"
                                  class="form-control" placeholder="Input kan tahun masuk">
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Tahun Selesai</strong>
                                    <input type="text" name="tahun_selesai" value="{{ $educations->tahun_selesai }}"
                                        class="form-control" placeholder="Input tahun selesai">
                                </div>
                                <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                          <strong>Instusi</strong>
                                          <input type="text" name="instusi" value="{{ $educations->instusi }}"
                                              class="form-control" placeholder="Input nama instusi">
                                      </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Perusahan</strong>
                              <input type="text" name="perusahan" value="{{ $educations->perusahan }}"
                                  class="form-control" placeholder="Input perusahan">
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Jurusan</strong>
                              <input type="text" name="jurusan" value="{{ $educations->jurusan }}"
                                  class="form-control" placeholder="Input jurusan">
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-right mb-3">
                          <a class="btn btn-dark" href="{{ route('pendidikan.index') }}">Back</a>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection