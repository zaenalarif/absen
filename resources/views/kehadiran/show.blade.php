@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset("assets/daterangepicker.css")}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Kehadiran</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">kehadiran</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Kehadiran </h4>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <h3>{{ $kehadiran->user->name }}</h3>
              </div>
              <div class="d-flex justify-content-center">
                <h3>{{ $kehadiran->user->jabatan }}</h3>
              </div>
              <div class="d-flex justify-content-center">
                <h3>{{ $kehadiran->time }}</h3>
              </div>
                            
              <div class="d-flex justify-content-center">
                <img src="{{ asset("/storage/presensi/$kehadiran->image") }}" alt="">
              </div>
              <div class="d-flex justify-content-center">
                <h3>{{ $kehadiran->lokasi }}</h3>
              </div>

              <div class="d-flex justify-content-between">
                @if ($next == null)
                  <a href="{{ url("/kehadiran/terkini/$previous") }}" class="btn btn-outline-primary">Sebelumnya</a>
                  <span></span>
                @elseif($previous == null)
                  <span></span>
                  <a href="{{ url("/kehadiran/terkini/$next") }}" class="btn btn-outline-primary">Selanjutnya</a>
                @else
                  <a href="{{ url("/kehadiran/terkini/$previous") }}" class="btn btn-outline-primary">Sebelumnya</a>
                  <a href="{{ url("/kehadiran/terkini/$next") }}" class="btn btn-outline-primary">Selanjutnya</a>
                @endif
              </div>
              
              <div class="d-flex justify-content-center mt-5">
                <a href="{{ url("/kehadiran/terkini") }}" class="btn btn-block btn-outline-secondary">Kembali ke daftar</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
    <script src="{{ asset("assets/daterangepicker.js")}}"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
@endsection