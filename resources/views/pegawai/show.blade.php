@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Buat Akun Pegawai</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Data Pegawai</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nama">Nama</label>
                            <input id="nama" disabled type="text" class="form-control" name="nama" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-6">
                            <label for="nip">NIP</label>
                            <input id="nip" disabled type="text" class="form-control" name="nip" value="{{ $user->nip }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <a href="{{ url("pegawai/$user->id/edit") }}" class="btn btn-lg btn-outline-secondary">Edit</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection