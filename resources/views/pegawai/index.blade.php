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
              <a href="" class="btn btn-info px-5 pull-right">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Hadir</th>
                        <th>Tidak hadir</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td> 1 </td>
                          <td>Joni</td>
                          <td>
                              <img alt="image" src="{{ asset("assets/img/avatar/avatar-5.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                          </td>
                          <td>Ujung batu</td>
                          <td>Ujung batu</td>
                          <td>5 </td>
                          <td>1 </td>
                          <td>
                              <a href="{{ url("/pegawai/show") }}" class="btn btn-secondary">Detail</a>
                              <a href="#" class="btn btn-primary">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                          </td>
                      </tr>
  
                      <tr>
                          <td> 2 </td>
                          <td>Jono</td>
                          <td>
                            <img alt="image" src="{{ asset("assets/img/avatar/avatar-5.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                          </td>
                          <td>Ujung batu</td>
                          <td>Ujung batu</td>
                          <td>6</td>
                          <td>0</td>
                          <td>
                              <a href="{{ url("/pegawai/show") }}" class="btn btn-secondary">Detail</a>
                              <a href="#" class="btn btn-primary">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
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