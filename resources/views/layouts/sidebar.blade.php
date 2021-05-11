<!-- Sidebar -->

<div id="sidebar-container" class="sidebar-expanded d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>{{ __('MENÚ PRINCIPAL') }}</small>
            </li>
            <!-- /END Separator -->

            <a href="{{ url('/') }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-home mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Inicio') }}</span>
                </div>
            </a>
        
            <!--<a  data-bs-toggle="collapse" href="#collapseGestio" class="list-group-item list-group-item-action flex-column align-items-start" role="button" aria-expanded="false" aria-controls="estadistiques">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-chart-bar mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Gestió') }}</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>-->

            <a class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-clock mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Más recientes') }}</span>
                </div>
            </a>

            <a  class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-star mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Favoritos') }}</span>
                </div>
            </a>


            
            <!-- Submenu content 
            <div class="collapse" id="collapseGestio">
                <a class="list-group-item list-group-item-action bg-dark text-white" href="">
                    <span class="menu-collapsed">{{ __('Productes') }}</span>
                </a>
                <a class="list-group-item list-group-item-action bg-dark text-white" href="">
                    <span class="menu-collapsed">{{ __('Ingredients') }}</span>
                </a>
                <a class="list-group-item list-group-item-action bg-dark text-white" href="">
                    <span class="menu-collapsed">{{ __('Al·lèrgens') }}</span>
                </a>
                <a class="list-group-item list-group-item-action bg-dark text-white" href="">
                    <span class="menu-collapsed">{{ __('Pàgines') }}</span>
                </a>
                <a class="list-group-item list-group-item-action text-white" href="">
                    <span class="menu-collapsed">{{ __('Usuaris') }}</span>
                </a>
            </div>-->
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>{{ __('MI CUENTA') }}</small>
            </li>
            <!-- /END Separator -->
            <a class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-scroll mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Mis artículos') }} <span class="badge badge-pill badge-primary ml-2"></span></span>
                </div>
            </a>
            <a class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-layer-group mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Mis planes') }} <span class="badge badge-pill badge-primary ml-2"></span></span>
                </div>
            </a>

            <a class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-gem mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Mis suscripciones') }} <span class="badge badge-pill badge-primary ml-2"></span></span>
                </div>
            </a>
            <a href="/perfil" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Mi perfil') }} <span class="badge badge-pill badge-primary ml-2"></span></span>
                </div>
            </a>

            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                
            </li>

            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>{{ __('OPCIONES') }}</small>
            </li>
            <!-- /END Separator -->
            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-power-off mt-1 fa-fw mr-3"></span>
                    <span class="menu-collapsed">{{ __('Cerrar sesión') }} <span class="badge badge-pill badge-primary ml-2"></span></span>
                </div>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <a href="#" data-toggle="sidebar-colapse" class="list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">{{ __('Minimizar ') }}</span>
                </div>
            </a>
            
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->