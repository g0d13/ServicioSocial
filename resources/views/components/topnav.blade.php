<!-- Top navigation-->
<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark pl-0 pr-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex">
            </div>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link pt-1 px-0" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <div class="avatar avatar-xl text-white d-sm-none d-lg-block">
                                <div style="height: 40px;width: 40px; background-color: darkslategray;text-align: center;color: white;font-weight: bold;text-transform: uppercase;border-radius: 50%;padding:8px">
                                    <span>{{substr(Auth::user()->nombre ?? '', 0, 1)}}</span>
                                </div>
                            </div>
                            <div class="media-body ml-2 text-dark align-items-center d-none d-lg-block">
                                <span class="mb-0 font-small font-weight-bold">{{ auth()->user()->nombre }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-right mt-2">
                        <a class="dropdown-item font-weight-bold" href="{{route('configuracion')}}"><span
                                class="fas fa-cog"></span>Ajustes</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item font-weight-bold" href="{{route('logout')}}"><span
                                class="fas fa-sign-out-alt text-danger"></span>Salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
