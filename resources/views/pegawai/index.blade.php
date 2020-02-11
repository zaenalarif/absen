@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Daftar Pegawai</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                <div class="card-body">
                    <div class="row center">
                    <div class="col">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select class="form-control selectric">
                                <option>Januari</option>
                                <option>Februari</option>
                                <option>Maret</option>
                                <option>April</option>
                                <option>Mei</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>Agustus</option>
                                <option>September</option>
                                <option>Oktober</option>
                                <option>November</option>
                                <option>Desember</option>
                                <option>Semua</option>
                            </select>
                            <label>Tahun</label>
                            <select class="form-control selectric">
                              <option>2020</option>
                              <option>2019</option>
                              <option>2018</option>
                            </select>
                          </div>
                        <a href="#" class="btn btn-secondary px-5" >Download</a>
                        <a href="#" class="btn btn-primary px-5" >Cari</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Pegawai</h4>
              <a href="{{ url("pegawai/create") }}" class="btn btn-info px-5 pull-right">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>status</th>
                        <th>Foto</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Hadir</th>
                        <th>Tidak hadir</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $item)
                        <tr>
                          <td> 1 </td>
                          <td> {{ $item->name }}</td>
                          <td> {{ $item->nip }}</td>
                          <td> 
                            @if ($item->role == 0)
                                Admin
                            @elseif ($item->role == 1)
                                Kepala
                            @else
                                Pegawai
                            @endif
                          </td>
                          <td>
                              <img alt="image" src="{{ asset("assets/img/avatar/avatar-5.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                          </td>
                          <td>Ujung batu</td>
                          <td>Ujung batu</td>
                          <td>5 </td>
                          <td>1 </td>
                          <td>
                              <a href="{{ url("/pegawai/show") }}" class="btn btn-secondary btn-sm">Detail</a>
                              <a href="{{ url("/pegawai/$item->id/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                              <form action="{{ url("pegawai/$item->id") }}" method="post" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-sm"> Hapus </button>
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
      </div>
    </div>
  </section>
@endsection

@section('script')
    <!-- Page Specific JS File -->
    <script src="../assets/js/page/modules-datatables.js"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection