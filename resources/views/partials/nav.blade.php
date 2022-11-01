{{-- main-header --}}
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="index.html"><img src="../../assets/img/brand/logo.png" class="logo-1"
                        alt="logo"></a>
                <a href="index.html"><img src="../../assets/img/brand/logo-white.png" class="dark-logo-1"
                        alt="logo"></a>
                <a href="index.html"><img src="../../assets/img/brand/favicon.png" class="logo-2"
                        alt="logo"></a>
                <a href="index.html"><img src="../../assets/img/brand/favicon-white.png" class="dark-logo-2"
                        alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
        </div>
        <div class="main-header-right">
            <ul class="nav nav-item  navbar-nav-right ms-auto">
                <li class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg
                            xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </li>
                <li class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="../../assets/img/faces/user-512.png"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">
                                    <img alt="" src="{{ asset('assets/img/faces/user-512.png') }}" class="">
                                </div>
                                <div class="ms-3 my-auto">
                                    <h6>{{ (auth()->user())->name }}</h6><span>{{ (auth()->user())->jabatan }}</span>
                                    {{-- <h6>{{ $em }}</h6> --}}
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('editprofile') }}"><i class="bx bx-user-circle"></i>Profil</a>
                        {{-- <a class="dropdown-item" href="{{ route('editprofile') }}"><i class="bx bx-cog"></i>Kemaskini Profil</a> --}}
                        <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i>Tetapan</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>Log Keluar</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
{{-- end main-header --}}
