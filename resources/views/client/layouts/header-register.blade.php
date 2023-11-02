<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="" class="navbar-brand w-100% h-100% m-0 p-0 d-flex align-items-center justify-content-center">
                <img id="img_logo" src="{{ asset('client/img/logoXTMN.png') }}" alt="logo">
            </a>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="" class="navbar-brand d-block d-lg-none">
                    <img id="img_logo" src="{{ asset('client/img/logoXTMN.png') }}" alt="logo">
                </a>
                <?php
                    // Lấy URL hiện tại
                    $currentURL = url()->current();

                    // Kiểm tra nếu URL chứa "registerOwner"
                    if (strpos($currentURL, 'registerOwner') !== false) {
                        $link = route('register');
                        $text = "Bạn muốn đăng ký khách hàng?";
                    } else {
                        $link = route('registerOwner');
                        $text = "Bạn muốn trở thành chủ sân?";
                    }
                ?>
                <a class="text-primary py-4 px-md-10 justify-content-end" style="justify-content-end" href="{{ $link }}">{{ $text }}</a>
            </nav>
        </div>
    </div>
</div>