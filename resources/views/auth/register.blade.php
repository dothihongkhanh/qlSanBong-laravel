@extends('client.layouts.app2')

@section('left-content')
    <div class="row justify-content-center align-items-center" >
        <img src="client/img/img_register.png" alt="Bức hình" width="100%" >
        
    </div> 
@endsection

@section('right-content')
    <div class="container">
        <div class="row justify-content-center align-items-center" >
            <div class="card" style="border: 0;border-radius: 10px;">
                <div class="col-md-7 offset-md-5 text-primary mt-4"><strong>{{ __('ĐĂNG KÝ KHÁCH HÀNG') }}</strong></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-4">
                            <label for="Tên tài khoản" class="col-md-4 col-form-label text-md-end">{{ __('Tên đăng nhập') }}</label>
                            <div class="col-md-7">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>     
                                            
                        <div class="row mb-4">
                            <label for="Số điện thoại" class="col-md-4 col-form-label text-md-end">{{ __('Số điện thoại') }}</label>
                            <div class="col-md-7">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  
                        
                        <div class="row mb-4">
                            <label for="Mật khẩu" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <div class="input-icon ">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <i id="togglePassword" class="fas fa-regular fa-eye-slash"></i> 
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-4">
                            <label for="Nhập lại mật khẩu" class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại mật khẩu') }}</label>
                            <div class="col-md-7">
                            <div class="input-group">
                                <div class="input-icon ">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" required oninput="checkPasswordMatch()">
                                    <i id="toggleConfirmPassword" class="fas fa-regular fa-eye-slash"></i>
                                </div>
                            </div>
                            <span id="password-match-error" class="text-warning"></span>
                        </div>
                        <div class="col-md-7 offset-md-6 mt-2"> 
                            <p>Bạn có tài khoản? <a class="text-primary" href="{{ route('login') }}" >Đăng nhập</a></p>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-7 offset-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>                          
                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection