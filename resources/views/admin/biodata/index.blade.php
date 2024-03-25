@extends('layouts.backend.main') 
@section('konten') 
<div class="container-fluid">
    <div class="col-lg-12">

        <div class="row my-3">
            <div class="col-lg-6">
                <h2>Biodata Diri</h2>
            </div>
            <div class="col-lg-6 text-right">
                <a class="btn btn-success" href="{{ route('biodata.create') }}">
                    <i class="fas fa-plus"></i> Add Biodata Diri
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
                <h6 class="m-0 font-weight-bold text-primary">Data Header</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="30px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>Foto</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biodatas as $biodata)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $biodata->nama }}</td>
                                <td>{{ $biodata->email }}</td>
                                <td>{{ $biodata->alamat }}</td>
                                <td>{{ $biodata->jurusan }}</td>
                                <td><img src="{{ url('gambar/foto_biodata/' . $biodata->foto) }}" alt="Product Thumb"
                                        width="100" height="100" /></td>

                                <td>
                                    <form action="{{ route('biodata.destroy', $biodata->id) }}" method="POST">
                                        <a class="btn btn-primary"
                                            href="{{ route('biodata.edit', $biodata->id) }}">Edit</a>
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