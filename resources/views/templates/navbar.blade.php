<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html" style="color:#F2125E;font-weight:bold">
            <!-- <img src="{{asset('assets/images/logo.svg')}}" alt="logo" /> -->
            Kas Masjid
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html" style="color:#F2125E">
            <!-- <img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /> -->
            Kas Masjid
        </a>
        <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item d-none d-lg-flex">
                <a class="nav-link" href="#"> Calendar </a>
            </li>
            <li class="nav-item d-none d-lg-flex">
                <a class="nav-link active" href="#"> Statistic </a>
            </li>
            <li class="nav-item d-none d-lg-flex">
                <a class="nav-link" href="#"> Employee </a>
            </li>
        </ul> -->
        <ul class="navbar-nav navbar-nav-right">            
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                    <i class="typcn typcn-user-outline mr-0"></i>
                    <span class="nav-profile-name">{{ @Auth::user()->nama }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">                    
                    <a class="dropdown-item" id="btn-logout">
                        <i class="typcn typcn-power text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>