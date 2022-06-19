<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.customers.head')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <div class="block-head">
        <div class="block-head-left">
            <a href="{{ route('home') }}">Trang chủ</a>&emsp;
            <a href="#">Giới thiệu</a>&emsp;
            <a href="#">Dịch vụ in ấn</a>
        </div>

        <div class="block-head-right">
            <a href="#"><i class="fas fa-envelope"></i> Mail</a>&emsp;
            <span class="time"><i class="fas fa-clock"></i> 06:30 - 21:00</span>&emsp;
            <span><i class="fas fa-phone-alt"></i> 0368822642</span>
        </div>
    </div>
    <div class="block-header">
        <div class="block-1">
            <div class="block-1-image">
                <a href="{{ route('home') }}"><img src="/template/admin/images/gg.png" alt="Smiley face"></a>
            </div>

            <div class="block-1-right">
                <form method="GET" action="/search/">
                    <div class="search-bar">
                        <input class="text-search" value="{{ request()->input('content-search') }}"
                            placeholder="Nhập tìm kiếm" name="content-search">
                        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <div class="in_right">
                    @php
                        $user = Session::get('user');
                    @endphp
                    @if (!is_null($user))
                        @if ($user->roles == 0)
                            <a href="{{ route('change-pass') }}"><i class="fas fa-user-circle"></i>
                                {{ $user->name }}
                            </a>&ensp;
                        @else
                            <a href="{{ route('admin') }}"><i class="fas fa-user-circle"></i>
                                {{ $user->name }}
                            </a>&ensp;
                        @endif
                    @else
                        <a href="{{ route('login') }}"><i class="fas fa-user-circle"></i> Tài khoản
                        </a>&ensp;
                    @endif
                    <a href="/carts" id="giohang"><i class="fas fa-shopping-cart"></i><sup
                            style="font-size: 15px">{{ Session::get('carts') === null ? 0 : count(Session::get('carts')) }}</sup>
                        Giỏ
                        hàng</a>
                    &ensp;
                    <a onclick="return confirm('Bạn có muốn đăng xuất?')" href="{{ route('logout') }}" id=><i
                            class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                </div>
            </div>
        </div>
        <div class="menu">
            <ul>
                <li class="in-menu" style="width: 140px"><a href="{{ route('home') }}"><i
                            class="nav-icon fas fa-bars"></i>
                        Trang chủ</a></li>
                {!! App\Helpers\Helper::menus($menus) !!}
            </ul>
        </div>
    </div>
    @yield('content')
    <div class="block-about" id="lienhe">
        <div class="in-about">
            <div class="about-left">
                <p class="text-head">Thông tin liên hệ</p>
                <hr>
                <div class="list-infor">
                    <i class="fas fa-map-marker-alt">&ensp;Địa chỉ: Quốc Oai, Hà Tây</i><br>
                    <i class="fas fa-envelope">&ensp;Email: duongvankhai2022001@gmail.com</i><br>
                    <i class="fas fa-phone">&ensp;Số điện thoại: 0368822642</i><br>
                    <i class="fas fa-globe">&ensp;Website: khaikheoandfriends.com</i>
                </div>
            </div>
            <div class="about-mid">
                <p class="text-head">Liên kết hữu ích</p>
                <hr>
                <ul>
                    @foreach ($menuParents as $key => $menuP)
                        <li>
                            <a
                                href="/danh-muc/{{ $menuP->id . '-' . Str::slug($menuP->name, '-') }}">{{ $menuP->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="about-right">
                <p class="text-head">Kết nối với chúng tôi</p>
                <hr>
                <div class="list-mxh">
                    <a href="https://www.facebook.com/duongvan.khai.547"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="block-end">
        <div class="end-text">© 2021 Khải Khéo and Friends</div>
    </div>
    @include('admin.customers.foot')
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
