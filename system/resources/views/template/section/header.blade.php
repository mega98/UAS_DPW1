<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i data-feather="settings" class="svg-icon"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</li>
</ul>
<!-- ============================================================== -->
<!-- Right side toggle and nav items -->
<!-- ============================================================== -->
<ul class="navbar-nav float-right">
<!-- ============================================================== -->
<!-- Search -->
<!-- ============================================================== -->
<li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                       

 <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                 @if(Auth::check())
                                {{request()->user()->nama}}
                                @elseif(Auth::guard('pembeli')->check())
                                {{Auth::guard('pembeli')->user()->nama}}
                                <br>Pembeli
                                @elseif(Auth::guard('penjual')->check())
                                {{Auth::guard('penjual')->user()->nama}}
                                <br>Penjual
                                @else
                                    Silahkan Login
                                @endif
                              
                        <img src="{{url('public')}}/assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                                    width="40">

                              
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('setting')}}"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                   Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('login')}}"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View Profile</a></div>
                            </div>
</li>