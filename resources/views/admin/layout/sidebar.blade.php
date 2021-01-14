<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link {{ (request()-> is('admin/dashboard*')) ? 'active' : '' }}" href="{{route('AdminIndex')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ (request()-> is('admin/wisata*')) ? 'active' : '' }}" href="{{route('wisata.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div>
                    Wisata
                </a>
                <a class="nav-link {{ (request()-> is('admin/lokasi*')) ? 'active' : '' }}" href="{{route('AdminLokasi')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-map-marker"></i></div>
                    Lokasi
                </a>
                <a class="nav-link {{ (request()-> is('admin/tentang*')) ? 'active' : '' }}" href="{{route('AdminTentang')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                    Tentang
                </a>

            </div>
        </div>

    </nav>
</div>