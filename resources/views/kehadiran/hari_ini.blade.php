@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Daftar Kehadiran Hari ini</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="#">Kehadiran</a></div>
        <div class="breadcrumb-item">Sekarang</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Pegawai</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>status kehadiran</th>
                        <th>Foto</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($places as $item)
                        <tr>
                            <td> 1 </td>
                            <td> {{ $item->user->name }}</td>
                            <td> {{ $item->user->nip }}</td>
                            <td> Hadir </td>
                            <td>
                                <img alt="image" src="{{ asset("assets/img/avatar/avatar-5.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>Ujung batu</td>
                            <td>Ujung batu</td>                          
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
    <script src="{{ asset("assets/js/page/modules-datatables.js")}}"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection