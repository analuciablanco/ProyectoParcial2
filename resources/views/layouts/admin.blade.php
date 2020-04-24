<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome5-overrides.min.css">
    @yield('estilos')
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('ordenes.index') }}">
                    <div class="sidebar-brand-icon"><i class="fas fa-mug-hot"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Cafetería</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                @if(Auth::user()->id_user_type != 3)
                    <li class="nav-item has-treeview" role="presentation">
                        <a class="nav-link" href="{{ route('ordenes.create') }}">
                            <i class="fas fa-tachometer-alt"></i><span>Registrar pedido</span>
                        </a>
                    </li>
                @endif
                    <li class="nav-item has-treeview" role="presentation">
                        <a class="nav-link" href="{{ route('ordenes.index') }}">
                            <i class="fas fa-tachometer-alt"></i><span>Lista de pedidos</span>
                        </a>
                    </li>


                @if(Auth::user()->id_user_type == 1)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('usuarios.create') }}">
                            <i class="fas fa-user"></i><span>Nuevo usuario</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('usuarios.index') }}">
                            <i class="fas fa-user"></i><span>Lista de usuarios</span>
                        </a>
                    </li>
                @endif
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">{{Auth::user()->name}}
                                        </span>
                                        <img class="border rounded-circle img-profile" src="/storage/perfil/{{Auth::user()->picture}}">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" id="linkLogout" role="presentation" href="{{route('logout')}}">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">
                                            </i> &nbsp;Cerrar Sesion
                                        </a>
                                        <form id="formLogout" action="{{route('logout')}}" method="POST"> 
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
            </div>
            </nav>
            <div class="container-fluid">
                @yield('contenido')
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Cafetería de Ana Lucia xd 2020</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/js/theme.js"></script>

    <script>
        function doClickLinkLogout(e) {
            e.preventDefault();
            $("#formLogout").submit();
        }

        $(function() {
            $("#linkLogout").click(doClickLinkLogout);
        });
    </script>
    @yield('scripts')
</body>

</html>