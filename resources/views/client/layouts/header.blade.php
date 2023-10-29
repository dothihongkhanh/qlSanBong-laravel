<div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="{{ route('client.home') }}" class="navbar-brand w-100% h-100% m-0 p-0 d-flex align-items-center justify-content-center">
                        <img id="img_logo" src="{{ asset('client/img/logoXTMN.png') }}" alt="logo">
                    </a>
                </div>
                <div class="col-lg-9">
                    
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="" class="navbar-brand d-block d-lg-none">
                            <img id="img_logo" src="{{ asset('client/img/logoXTMN.png') }}" alt="logo">
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="{{ route('client.home') }}"  class="nav-item nav-link ">Trang chủ</a>
                                <a href="{{ route('client.fields.index') }}" class="nav-item nav-link active">Danh sách sân</a>
                                <a href="" class="nav-item nav-link">Tìm kèo</a>
                                <a href="" class="nav-item nav-link">Liên hệ</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Khác</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Giới thiệu</a>
                                        <a href="" class="dropdown-item">Về chúng tôi</a>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Đăng nhập<i class="fa fa-user ms-3"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>