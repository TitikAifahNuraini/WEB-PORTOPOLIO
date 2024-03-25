@extends('layouts.backend.main') 
@section('konten') 
<div class="container-fluid">
  <div class="col-lg-12">

      <div class="row my-3">
          <div class="col-lg-6">
              <h2>Education</h2>
          </div>
          <div class="col-lg-6 text-right">
              <a class="btn btn-success" href="{{ route('pendidikan.create') }}">
                  <i class="fas fa-plus"></i> Add Education
              </a>
          </div>
      </div>

      @if ($message = Session::get('success'))
          <div class="alert alert-success text-center">
              <h6>{{ $message }}</h6>
          </div>
      @endif

      <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Edukasi</h6>
          </div>
          <div class="table-responsive p-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                      <tr>
                          <th width="30px">No</th>
                          <th>Tahun Masuk</th>
                          <th>Tahun Selesai</th>
                          <th>Instusi</th>
                          <th>perusahan</th>
                          <th>Jurusan</th>
                          <th width="150px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($educations as $education)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $education->tahun_masuk }}</td>
                              <td>{{ $education->tahun_selesai }}</td>
                              <td>{{ $education->instusi }}</td>
                              <td>{{ $education->perusahan }}</td>
                              <td>{{ $education->jurusan }}</td>

                              <td>
                                  <form action="{{ route('pendidikan.destroy', $education->id) }}" method="POST">
                                      <a class="btn btn-primary"
                                          href="{{ route('pendidikan.edit', $education->id) }}">Edit</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>

                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>

              </table>
          </div>
      </div>
  </div>
</div>
@endsection