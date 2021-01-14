<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link {{ (request()-> is('')) ? 'active' : '' }}" href="{{route('UserIndex')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ (request()-> is('wisata*')) ? 'active' : '' }}" href="{{route('UserWisata')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div>
                    Wisata
                </a>
                <a class="nav-link {{ (request()-> is('lokasi*')) ? 'active' : '' }}" href="{{route('UserLokasi')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-map-marker"></i></div>
                    Lokasi
                </a>
                <a class="nav-link {{ (request()-> is('tentang*')) ? 'active' : '' }}" href="{{route('UserTentang')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                    Tentang
                </a>

            </div>
        </div>

    </nav>
</div>