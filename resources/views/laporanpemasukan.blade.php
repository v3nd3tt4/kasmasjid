@extends('templates.wrapper')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">Laporan Pemasukan</h3>
                <p>Tanggal Hari ini: {{date('d-m-Y')}}</p>
            </div>
            <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 d-flex grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{url('laporanpemasukan/proses')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Dari:</label>
                                <input type="date" name="dari" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Sampai:</label>
                                <input type="date" name="sampai" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Proses</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    @endsection