<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{ asset('/admins/img/admins/usuario.png') }}" width="90" height="90" alt="logo">
                <h6 class="">Amayco</h6>
                <p class="">Sistema de Gestión</p>
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

            <li class="menu {{ active('admin/home', 0) }}">
                <a href="{{ route('home.index') }}" aria-expanded="{{ menu_expanded('admin/home', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-home"></i> Home Page</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/about', 0) }}">
                <a href="{{ route('about.index') }}" aria-expanded="{{ menu_expanded('admin/about', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-users"></i> ¿Quiénes Somos?</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/excursion', 0) }}">
                <a href="{{ route('excursion.index') }}" aria-expanded="{{ menu_expanded('admin/excursion', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-map"></i> Excursiones</span>
                    </div>
                </a>
            </li>
            
            <li class="menu {{ active('admin/galery', 0) }}">
                <a href="#gallery" data-toggle="collapse" aria-expanded="{{ menu_expanded('admin/galery', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-images"></i> Galería de Fotos</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ submenu('admin/galery', 0) }} }}" id="gallery" data-parent="#accordionExample">
                    <li {{ submenu('admin/galeria/categorias') }}>
                        <a href="{{ route('category.index') }}"> Categorías</a>
                    </li>
                    <li {{ submenu('admin/galeria') }}>
                        <a href="{{ route('galery.index') }}"> Fotos</a>
                    </li>                           
                </ul>
            </li>

            <li class="menu {{ active('admin/activity', 0) }}">
                <a href="{{ route('activity.index') }}" aria-expanded="{{ menu_expanded('admin/activity', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-bicycle"></i> Actividades</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/transfer', 0) }}">
                <a href="{{ route('transfer.index') }}" aria-expanded="{{ menu_expanded('admin/transfer', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-plane"></i> Traslados</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/office', 0) }}">
                <a href="{{ route('office.index') }}" aria-expanded="{{ menu_expanded('admin/office', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-university"></i> Oficinas</span>
                    </div>
                </a>
            </li>

             <li class="menu {{ active('admin/attention', 0) }}">
                <a href="{{ route('attention.index') }}" aria-expanded="{{ menu_expanded('admin/attention', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-history"></i> Horario de Atención</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ active('admin/reservation', 0) }}">
                <a href="{{ route('reservation.index') }}" aria-expanded="{{ menu_expanded('admin/reservation', 0) }}" class="dropdown-toggle">
                    <div class="">
                        <span><i class="fa fa-folder"></i> Reservaciones</span>
                    </div>
                </a>
            </li>

        </ul>

    </nav>

</div>