@extends('layouts.backend.main') 
@section('konten') 
<div class="container-fluid">
  <div class="col-lg-12">

      <div class="row my-3">
          <div class="col-lg-6">
              <h2>Kontak</h2>
          </div>
          <div class="col-lg-6 text-right">
              <a class="btn btn-success" href="{{ route('kontak.create') }}">
                  <i class="fas fa-plus"></i> Add Kontak
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
                          <th>Nomor Hp</th>
                          <th>Email </th>
                          <th>Lokasi </th>
                          <th width="150px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($kontaks as $kontak)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $kontak->nomor_hp }}</td>
                              <td>{{ $kontak->email }}</td>
                              <td>{{ $kontak->lokasi }}</td>

                              <td>
                                  <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST">
                                      <a class="btn btn-primary"
                                          href="{{ route('kontak.edit', $kontak->id) }}">Edit</a>
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