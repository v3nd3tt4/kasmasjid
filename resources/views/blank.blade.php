@extends('templates.wrapper')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">Profil Masjid </h3>
                <p>Tanggal Hari ini: <?= date('d-m-Y') ?></p>
            </div>
            <div class="col-sm-6">
                <!-- <div class="d-flex align-items-center justify-content-md-end">
                    <div class="mb-3 mb-xl-0 pr-1">
                        <div class="dropdown">
                            <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="typcn typcn-calendar-outline mr-2"></i>Last 7
                                days
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                                <h6 class="dropdown-header">Last 14 days</h6>
                                <a class="dropdown-item" href="#">Last 21 days</a>
                                <a class="dropdown-item" href="#">Last 28 days</a>
                            </div>
                        </div>
                    </div>
                    <div class="pr-1 mb-3 mr-2 mb-xl-0">
                        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                            <i class="typcn typcn-arrow-forward-outline mr-2"></i>Export
                        </button>
                    </div>
                    <div class="pr-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                            <i class="typcn typcn-info-large-outline mr-2"></i>info
                        </button>
                    </div>
                </div> -->
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
                        <form action="{{ route('profil.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Masjid:</label>
                                <input type="text" class="form-control" name="nama_masjid" value="@if(!empty($tb_profil_masjid->nama_masjid)){{ $tb_profil_masjid->nama_masjid }}@endif" >
                            </div>
                            <div class="form-group">
                                <label for="">Alamat:</label>
                                <textarea name="alamat_masjid" class="form-control" >@if(!empty($tb_profil_masjid->alamat_masjid)){{ $tb_profil_masjid->alamat_masjid }}@endif</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
    @endsection