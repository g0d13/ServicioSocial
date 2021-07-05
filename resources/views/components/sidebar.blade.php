<nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl text-white mr-4">
                    <div style="height: 40px;width: 40px; background-color: darkslategray;text-align: center;color: white;font-weight: bold;text-transform: uppercase;border-radius: 50%;padding:8px">
                        <span>{{substr(Auth::user()->nombre ?? '', 0, 1)}}</span>
                    </div>
                </div>
                <div class="d-block">
                    <h2 class="h6">Hola, {{Auth::user()->nombre}}</h2>
                    <a href="/pages/examples/sign-in.html" class="btn btn-secondary text-dark btn-xs"><span
                            class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out</a>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse"
                   data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                   aria-label="Toggle navigation"></a>
            </div>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item {{ active(route('dashboard'), Request::url()) }}">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                    <span>Inicio</span>
                </a>
            </li>
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-black"></li>
            @if (auth()->user()->rol_id == 1 || auth()->user()->rol_id == 2)
                <li class="nav-item {{ active(route('bitacoras.index'), Request::url()) }}">
                    <a href="{{route('bitacoras.index')}}" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-book "></span></span>
                        <span>Bitácoras</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->rol_id == 1)
                <li class="nav-item {{ active(route('usuarios.index'), Request::url()) }}">
                    <a href="{{route('usuarios.index')}}" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-user"></span></span>
                        <span>Usuarios</span>
                    </a>
                </li>
            @endif
            <li class="nav-item {{ active(route('solicitudes.index'), Request::url()) }}">
                <a href="{{route('solicitudes.index')}}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-paperclip"></span></span>
                    <span>Solicitudes</span>
                </a>
            </li>
            @if (auth()->user()->rol_id == 1)
                <li class="nav-item {{ active(route('reparaciones.index'), Request::url()) }}">
                    <a href="{{route('reparaciones.index')}}" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-hammer"></span></span>
                        <span>Reparaciones</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->rol_id == 1)
                <li class="nav-item {{ active(route('maquinas.index'), Request::url()) }}">
                    <a href="{{route('maquinas.index')}}" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-tools"></span></span>
                        <span>Maquinas</span>
                    </a>
                </li>
                <li class="nav-item {{ active(route('plantas.index'), Request::url()) }}">
                    <a href="{{route('plantas.index')}}" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-building"></span></span>
                        <span>Plantas</span>
                    </a>
                </li>
                <li class="nav-item {{ active(route('configuracion'), Request::url()) }}">
                    <a href="{{route('configuracion')}}" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-cog"></span></span>
                        <span>Configuracion</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</nav>
