<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{route('site.index')}}"><img src="/uploads/setting/{{$setting->logo}}" class="logo-1" target="_blank" alt="logo"></a>
                <a href="{{route('site.index')}}"><img src="/uploads/setting/{{$setting->logo}}" class="dark-logo-1" alt="logo"></a>
                <a href="{{route('site.index')}}"><img src="/admin/img/brand/favicon.png" class="logo-2" alt="logo"></a>
                <a href="{{route('site.index')}}"><img src="/admin/img/brand/favicon.png" class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">

            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
                        </div>
                    </form>
                </div>
                <div class="dropdown nav-item main-header-notification show">


 <a href="{{route('site.index')}} " target="_blank"  > <i class="bx bx-home-circle"> </i> </a>

                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="#"><img alt="" src="/admin/img/faces/6.jpg"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="/admin/img/faces/6.jpg" class=""></div>
                                <div class="ml-3 my-auto">
                                    <h6>{{Auth::guard('admin')->user()->name}}</h6><span>@if(Auth::guard('admin')->user()->role == 1) Yönetici @endif</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#"><i class="bx bx-user-circle"></i>Profil</a>
                        <a class="dropdown-item" href="#"><i class="bx bx-cog"></i> Profili Düzenle</a>
                        <a class="dropdown-item" href="#"><i class="bx bxs-inbox"></i>Gelen Kutusu</a>
                        <a class="dropdown-item" href="#"><i class="bx bx-envelope"></i>Mesajlar</a>
                        <a class="dropdown-item" href="#"><i class="bx bx-slider-alt"></i> Hesap Ayarları</a>
<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form-submit').submit()"><i class="bx bx-log-out"></i> Çıkış Yap</a>

                        <form action="{{route('admin.logout')}}" method="post" id="form-submit" style="display: hidden;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


