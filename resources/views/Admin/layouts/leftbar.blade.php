<style>
    .app-sidebar .side-item.side-item-category {
        padding: 14px 20px 28px 25px !important;
    }
</style>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active"  href="{{route('admin.home')}}"><img src="/uploads/setting/{{$setting->logo}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active"   href="{{route('admin.home')}}"><img src="/uploads/setting/{{$setting->logo}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{route('admin.home')}}""><img src="/admin/img/brand/favicon.png" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{route('admin.home')}}""><img src="/admin/img/brand/favicon-white.png" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="/admin/img/faces/6.jpg"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">Kullanıcı Adı</h4>
                    <span class="mb-0 text-muted">Premium Üye</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Menu</li>


            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.home') }}"> <span class="side-menu__label">Ana Sayfa</span><span class="badge badge-success side-badge">1</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('statistics.index')}}"> <span class="side-menu__label">Google İstatistikleri</span> </a>
            </li>



            <li class="side-item side-item-category  bg-secondary "><span class=" text-white">Ürün İşlemleri <i class="angle fe fe-chevron-down"> </i></span></li>

            <li class="slide">
                <a class="side-menu__item"   data-toggle="slide" href="index-2.html#"> <span class="side-menu__label"> Kategori ve Seçenekler</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    <li><a class="slide-item" href="{{route('category.index')}}">Kategoriler</a></li>
                    <li><a class="slide-item" href="{{route('options.index')}}">Seçenekler</a></li>
                    <li><a class="slide-item" href="{{route('additionaloptions.index')}}">Ek Seçenekler</a></li>

                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item"   data-toggle="slide" href="index-2.html#"> <span class="side-menu__label">Ürünler</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    <li><a class="slide-item" href="{{route('product.create')}}">Ürün ekle</a></li>
                    <li><a class="slide-item" href="{{route('product.index')}}">Ürünler</a></li>

                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item"   data-toggle="slide" href="index-2.html#"> <span class="side-menu__label">Siparişler</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    <li><a class="slide-item" href="chart-morris.html">Yeni Siparişler</a></li>
                    <li><a class="slide-item" href="chart-morris.html">Onaylanmış Şiparişler</a></li>
                    <li><a class="slide-item" href="chart-morris.html">Onaylanmamış Şiparişler</a></li>
                    <li><a class="slide-item" href="chart-morris.html">Teslim edilen Şiparişler</a></li>

                </ul>
            </li>


            <li class="side-item side-item-category  bg-secondary "><span class=" text-white">Üye İşlemleri <i class="angle fe fe-chevron-down"> </i></span></li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('user.create')}}"> <span class="side-menu__label">Yeni üye ekle</span> </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('user.index')}}"> <span class="side-menu__label">Site Üyeleri</span> </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('user.admins')}}"> <span class="side-menu__label">Yöneticiler</span> </a>
            </li>

            <li class="side-item side-item-category  bg-secondary "><span class=" text-white">Site Ayarları<i class="angle fe fe-chevron-down"> </i></span></li>


            <li class="slide">
                <a class="side-menu__item" href="{{route('references.index')}}">

                    <span class="side-menu__label">Referanslar</span> </a>
            </li>

            <li class="slide">
                <a class="side-menu__item"   data-toggle="slide" href="index-2.html#"> <span class="side-menu__label">Galeri</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    <li><a class="slide-item" href="{{route('gallery.create')}}">Resim Ekle</a></li>
                    <li><a class="slide-item" href="{{route('gallery.index')}}">Resimler</a></li>

                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('slider.index')}}"> <span class="side-menu__label">Slider</span> </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('services.index')}}"> <span class="side-menu__label">Hizmetler</span> </a>
            </li>

            <li class="slide">
                <a class="side-menu__item"   data-toggle="slide" href="index-2.html#"> <span class="side-menu__label">Bilgilendirme</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('information.index')}}">Bilgilendirme listesi</a></li>
                    <li><a class="slide-item" href="{{route('inform.category')}}">Kategori Ekle</a></li>
                    <li><a class="slide-item" href="{{route('information.create')}}">İçerik bölümü</a></li>

                </ul>
            </li>



            <li class="slide">
                <a class="side-menu__item"   data-toggle="slide" href="index-2.html#"> <span class="side-menu__label">Ayarlar</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    <li><a class="slide-item" href="{{ route('about.index') }}">Hakkmızda</a></li>
                    <li><a class="slide-item" href="{{ route('setting.index') }}">Firma Bilgileri</a></li>

                </ul>
            </li>




        </ul>
    </div>
</aside>
