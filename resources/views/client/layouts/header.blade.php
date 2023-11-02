<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('client.home') }}"
                class="navbar-brand w-100% h-100% m-0 p-0 d-flex align-items-center justify-content-center">
                <img id="img_logo" src="{{ asset('client/img/logoXTMN.png') }}" alt="logo">
            </a>
        </div>
        <div class="col-lg-9">

            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="" class="navbar-brand d-block d-lg-none">
                    <img id="img_logo" src="{{ asset('client/img/logoXTMN.png') }}" alt="logo">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('client.home') }}" class="nav-item nav-link ">Trang chủ</a>
                        <a href="{{ route('client.fields.index') }}" class="nav-item nav-link active">Danh sách sân</a>
                        <a href="" class="nav-item nav-link">Tìm kèo</a>
                        <a href="" class="nav-item nav-link">Liên hệ</a>
                        
                    </div>
                    @if (session('username'))
                        @php
                            $user = \App\Models\User::where('username', session('username'))->first();
                        @endphp
                        <div class="nav-item dropdown">
                            <a href="#" style="height: 100%;" class="nav-link dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <img src="{{ $user->avt }}" alt="" class="rounded-circle"
                                    style="width: 40px;"> {{ $user->account_name }}
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Thông tin cá nhân</a>
                                <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" id="loginButton"
                            class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">
                            Đăng nhập<i class="fa fa-user ms-3"></i>
                        </a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>
