@extends('templates.wrapper')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">Data User</h3>
                <p>Tanggal Hari ini: <?= date('d-m-Y') ?></p>
            </div>
            <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                    <!-- <div class="mb-3 mb-xl-0 pr-1">
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
                    </div> -->
                    <div class="pr-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-sm bg-success btn-icon-text border btn-tambah">
                            <i class="typcn typcn-plus mr-2"></i>Tambah
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex grid-margin stretch-card">
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
                        <table class="table table-striped" id="dataTables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($no=1)
                            @foreach ($row as $r)
                                <tr>
                                    <td>{{$no++}}.</td>
                                    <td>{{$r->nama}}</td>
                                    <td>{{$r->username}}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm btn-edit" data-id="{{$r->id}}">Edit</button>
                                        <button class="btn btn-danger btn-sm btn-hapus" data-id="{{$r->id}}">Hapus</button>
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
    <!-- content-wrapper ends -->
    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-tambah">
               
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label for="">Nama:</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>   
                        <div class="form-group">
                            <label for="">Ulangi Password:</label>
                            <input type="password" name="ulangi_password" class="form-control" required>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit">
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label for="">Nama:</label>
                            <input type="hidden" id="id" name="id">
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Password: (*Isi jika hanya ingin mengubah password)</label>
                            <input type="password" name="password" class="form-control">
                        </div>   
                        <div class="form-group">
                            <label for="">Ulangi Password:</label>
                            <input type="password" name="ulangi_password" class="form-control">
                        </div>                                   
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection