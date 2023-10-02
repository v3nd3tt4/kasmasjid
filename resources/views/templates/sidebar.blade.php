<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger">
            <i class="typcn typcn-cog-outline"></i>
        </div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>
                Light
            </div>
            <div class="sidebar-bg-options " id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles primary"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default border"></div>
            </div>
        </div>
    </div> -->
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <div class="d-flex sidebar-profile">
                    <div class="sidebar-profile-image">
                        <img src="{{asset('assets/images/faces/face29.png')}}" alt="image" />
                        <span class="sidebar-status-indicator"></span>
                    </div>
                    <div class="sidebar-profile-name">
                        <p class="sidebar-name">{{ @Auth::user()->nama }}</p>
                        <p class="sidebar-designation">Welcome</p>
                    </div>
                </div>                
                <p class="sidebar-menu-title">menu</p>
            </li>
            <li class="nav-item @if($link == 'home') active @endif ">
                <a class="nav-link" href="{{url('halamanutama')}}">
                    <i class="typcn typcn-device-desktop menu-icon"></i>
                    <span class="menu-title">Halaman Utama
                        <!-- <span class="badge badge-primary ml-3">New</span> -->
                    </span>
                </a>
            </li>
            <li class="nav-item @if($link == 'profil') active @endif ">
                <a class="nav-link" href="/profil">
                    <i class="typcn typcn-home-outline menu-icon"></i>
                    <span class="menu-title">Profil Masjid</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="@if($link=='pemasukan'|| $link=='pengeluaran')true @else false @endif" aria-controls="ui-basic">
                    <i class="typcn typcn-credit-card menu-icon"></i>
                    <span class="menu-title">Keuangan</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse @if($link=='pemasukan' || $link=='pengeluaran') show @endif" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item @if($link=='pemasukan') active @endif">
                            <a class="nav-link" href="{{url('pemasukan')}}">Pemasukan</a>
                        </li>
                        <li class="nav-item @if($link=='pengeluaran') active @endif">
                            <a class="nav-link" href="{{url('pengeluaran')}}">Pengeluaran</a>
                        </li>
                    </ul>
                </div>
            </li>    
            <li class="nav-item @if($link == 'user') active @endif ">
                <a class="nav-link" href="{{url('user')}}">
                    <i class="typcn typcn-user-outline menu-icon"></i>
                    <span class="menu-title">User</span>
                </a>
            </li>        
        </ul>
        
    </nav>