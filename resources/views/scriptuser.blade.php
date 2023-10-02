<link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.css')}}" />

<script src="{{asset('assets/js/jquery.dataTables.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#dataTables').DataTable();

        $(document).on('click', '.btn-hapus', function(e) {
            var id = $(this).attr('data-id');
            swal({
                title: 'Apakah anda yakin ?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                    cancel: {
                        text: "Tidak",
                        value: null,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Ya",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                        closeModal: true
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{url("user/destroy")}}',
                        type: 'POST',
                        data: {"id":id},
                        dataType: "JSON",
                        success: function(msg) {
                            if (msg.status == 'success') {
                                swal({
                                    title: 'Sukses!',
                                    text: 'Data berhasil dihapus',
                                    icon: 'success',
                                    button: {
                                        text: "Tutup",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-success"
                                    }
                                })
                                location.reload();
                            } else if (msg.status == 'failed') {
                                swal({
                                    title: 'Gagal!',
                                    text: 'Data gagal dihapus',
                                    icon: 'error',
                                    button: {
                                        text: "Tutup",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-danger"
                                    }
                                })
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-tambah', function(e) {
            e.preventDefault();
            $('#exampleModal-2').modal();
        });

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            $('#modalEdit').modal();
            var id = $(this).attr('data-id');
            $('#id').val(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("user/getdata")}}',
                type: 'POST',
                data: {
                    "id": id
                },
                dataType: "JSON",
                success: function(msg) {
                    $('#nama').val(msg.nama);
                    $('#username').val(msg.username);
                }
            });
        });

        $(document).on('click', '.btn-tambah1', function(e) {
            e.preventDefault();
            swal({
                title: 'Sukses!',
                text: 'Data berhasil disimpan',
                icon: 'success',
                button: {
                    text: "Tutup",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            })
        });

        $(document).on('submit', '#form-tambah', function(e) {
            e.preventDefault();
            var data = new FormData(document.getElementById('form-tambah'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{url("user")}}',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(msg) {
                    if (msg.status == 'success') {
                        swal({
                            title: 'Sukses!',
                            text: 'Data berhasil disimpan',
                            icon: 'success',
                            button: {
                                text: "Tutup",
                                value: true,
                                visible: true,
                                className: "btn btn-success"
                            }
                        })
                        location.reload();
                    } else if (msg.status == 'failed') {
                        swal({
                            title: 'Gagal!',
                            text: msg.pesan,
                            icon: 'error',
                            button: {
                                text: "Tutup",
                                value: true,
                                visible: true,
                                className: "btn btn-danger"
                            }
                        })
                    }
                }
            });
        });

        $(document).on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var data = new FormData(document.getElementById('form-edit'));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("user/update")}}',
                type: 'POST',
                // data : {"_token": "{{password_hash('test', PASSWORD_DEFAULT)}}","data": data},
                data: data,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(msg) {
                    if (msg.status == 'success') {
                        swal({
                            title: 'Sukses!',
                            text: 'Data berhasil diupdate',
                            icon: 'success',
                            button: {
                                text: "Tutup",
                                value: true,
                                visible: true,
                                className: "btn btn-success"
                            }
                        })
                        location.reload();
                    } else if (msg.status == 'failed') {
                        swal({
                            title: 'Gagal!',
                            text: 'Data gagal diupdate',
                            icon: 'error',
                            button: {
                                text: "Tutup",
                                value: true,
                                visible: true,
                                className: "btn btn-danger"
                            }
                        })
                    }
                }
            });
        });
    });
</script>