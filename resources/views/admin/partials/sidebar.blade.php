<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{ image_exist('/admins/img/admins/', Auth::user()->photo, true) }}" width="90" height="90" alt="logo">
                <h6 class="">{{ Auth::user()->name." ".Auth::user()->lastname }}</h6>
                <p class="">{!! typeUser(Auth::user()->type) !!}</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ active('admin') }}">
                <a href="{{ route('admin') }}" aria-expanded="{{ menu_expanded('admin') }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span> Inicio</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/administradores', 0) }}">
                <a href="{{ route('administradores.index') }}" aria-expanded="{{ menu_expanded('admin/administradores', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-user-tie"></i> Administradores</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/banners', 0) }}">
                <a href="{{ route('banners.index') }}" aria-expanded="{{ menu_expanded('admin/banners', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-images"></i> Banners</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/quienes-somos', 0) }}">
                <a href="{{ route('nosotros.index') }}" aria-expanded="{{ menu_expanded('admin/quienes-somos', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-users"></i> Quiénes Somos</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/excursiones', 0) }}">
                <a href="{{ route('excursiones.index') }}" aria-expanded="{{ menu_expanded('admin/excursiones', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-map"></i> Excursiones</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/categorias', 0) }}">
                <a href="{{ route('categorias.index') }}" aria-expanded="{{ menu_expanded('admin/categorias', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fab fa-dropbox"></i> Categorías</span>
                    </div>
                </a>
            </li>
            
            <li class="menu {{ active('admin/galeria', 0) }}">
                <a href="{{ route('galeria.index') }}" aria-expanded="{{ menu_expanded('admin/galeria', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-images"></i> Galería de Fotos</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/actividades', 0) }}">
                <a href="{{ route('actividades.index') }}" aria-expanded="{{ menu_expanded('admin/actividades', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-bicycle"></i> Actividades</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/traslados', 0) }}">
                <a href="{{ route('traslados.index') }}" aria-expanded="{{ menu_expanded('admin/traslados', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-plane"></i> Traslados</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/atenciones', 0) }}">
                <a href="{{ route('atenciones.index') }}" aria-expanded="{{ menu_expanded('admin/atenciones', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-history"></i> Horario de Atención</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active(['admin/imagenes', 'admin/politicas', 'admin/contactos'], 0) }}">
                <a href="#cog" data-toggle="collapse" aria-expanded="{{ menu_expanded(['admin/imagenes', 'admin/politicas', 'admin/contactos'], 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-cogs"></i> Ajustes</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ submenu(['admin/imagenes', 'admin/politicas', 'admin/contactos'], 0) }} }}" id="cog" data-parent="#accordionExample">
                    <li {{ submenu('admin/imagenes') }}>
                        <a href="{{ route('imagenes.edit') }}"> Imagenes</a>
                    </li>
                    <li {{ submenu('admin/politicas') }}>
                        <a href="{{ route('politicas.index') }}"> Politicas</a>
                    </li>
                    <li {{ submenu('admin/contactos') }}>
                        <a href="{{ route('contactos.edit') }}"> Contactos</a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

</div>