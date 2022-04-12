<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ isset($title) ? $title . ' | GestEtud' : 'Gestion des étudiants' }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href={{ asset("assets/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/plugins/fontawesome/css/fontawesome.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/plugins/fontawesome/css/all.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/feathericon.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/plugins/datatables/datatables.min.css") }}>
    <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
    <link rel="stylesheet" href={{ asset("assets/plugins/morris/morris.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/style.css") }}>
</head>

{{-- message toastr --}}
<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
<script src="{{ asset('assets/js/toastr_jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.html" class="logo"> <img src={{ asset("assets/img/hotel_logo.png") }} width="50"
                        height="70" alt="logo"> <span class="logoclass">GESTION</span> </a>
                <a href="index.html" class="logo logo-small"> <img src={{ asset("assets/img/hotel_logo.png") }}
                        alt="Logo" width="30" height="30"> </a>
            </div>
            {{-- Message --}}
            {!! Toastr::message() !!}
            {{-- Message --}}
            <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
            {{-- DebutMenuDeroulant --}}
            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img
                                class="rounded-circle" src={{ asset("assets/img/profiles/avatar-01.jpg") }} width="31"
                                alt="Soeng Souy"></span> </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm"> <img src={{ asset("assets/img/profiles/avatar-01.jpg") }}
                                    alt="User Image" class="avatar-img rounded-circle"> </div>
                            <div class="user-text">
                                <h6><strong>{{ Auth::user()->name }}</strong></h6>
                                <p class="mb-0 text-muted">Administrator</p>
                            </div>
                        </div> <a class="dropdown-item" href="#">My Profile</a> <a class="dropdown-item"
                            href="#">Account Settings</a> <a class="dropdown-item"
                            href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
            {{-- FinMenuDeroulant --}}

            {{-- BarreDeRecherche --}}
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            {{-- BarreDeRecherche --}}
        </div>

        {{-- DebutSidebar --}}
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active"> <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a> </li>
                        <li class="list-divider"></li>
                        <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Niveaux </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href="{{ route('ajouterNiveau') }}"> Ajouter </a></li>
                                <li><a href="{{ route('listeNiveau') }}"> Liste </a></li>
                            </ul>
                        </li>
                        <li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Communes </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href=""> Ajouter </a></li>
                                <li><a href=""> Liste </a></li>
                            </ul>
                        </li>
                        <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Élèves </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href=""> Ajouter </a></li>
                                <li><a href="">Liste</a></li>
                            </ul>
                        </li>
                        @yield('sidebar')
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- FinSidebar --}}
    <script data-cfasync="false" src={{ asset("../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js")
        }}></script>
    <script src={{ asset("assets/js/jquery-3.5.1.min.js") }}></script>
    <script src={{ asset("assets/js/popper.min.js") }}></script>
    <script src={{ asset("assets/js/bootstrap.min.js") }}></script>
    <script src={{ asset("assets/plugins/slimscroll/jquery.slimscroll.min.js") }}></script>
    <script src={{ asset("assets/plugins/raphael/raphael.min.js") }}></script>
    <script src={{ asset("assets/plugins/morris/morris.min.js") }}></script>
    <script src={{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}></script>
    <script src={{ asset("assets/plugins/datatables/datatables.min.js") }}></script>
    <script src={{ asset("assets/js/chart.morris.js") }}></script>
    <script src={{ asset("assets/js/script.js") }}></script>
    @yield('scripts')
</body>

</html>
