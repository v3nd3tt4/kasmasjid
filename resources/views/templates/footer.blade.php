<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright ©
            <a href="https://pilopa.my.id" target="_blank">pilopa.my.id</a>
            2023</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free
            <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from Bootstrapdash.com</span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<script src="{{asset('assets/js/settings.js')}}"></script>
<script src="{{asset('assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.js')}}"></script>
<!-- End custom js for this page-->
@if(!empty($script))
@include($script)
@endif

<script>
    $(document).on('click', '#btn-logout', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{url("login/logout")}}',
            type: 'POST',
            success: function(msg) {
                // location.reload();
                swal({
                    title: 'Sukses!',
                    text: 'Berhasil logout',
                    icon: 'success',
                    button: {
                        text: "Tutup",
                        value: true,
                        visible: true,
                        className: "btn btn-success"
                    }
                })
                window.location.href = "{{url('login')}}";
            }
        });
    });
</script>
</body>

</html>