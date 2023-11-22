
@extends('client.layouts.app-login')
@section('content')

<section class="vh-100">
    <!--Image--><br>
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="client/img/pic-login.jpg"
            class="img-fluid" alt="Sample image">
        </div>

       
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="{{ route('login-user') }}">
            
            <!-- ... -->

            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }} </div>
            @endif

            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }} </div>
            @endif
            @csrf
            <!--Tieude-->
            <div class="divider d-flex align-items-center my-6" style="color: #e77f10f8 ;">
              <p class="fw-bold" style="font-size: 22px;">Đăng nhập</p>
            </div>
  
            <!-- Username input -->
            <div class="form-outline mb-4">
                        <label class="form-label" for="username">Tên tài khoản</label>
              <input type="username" id="form3Example3" class="form-control form-control-lg" placeholder="username" @error('username') is-invalid @enderror
              name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

              @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              
            </div>

              <!---->
             
            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="password">Mật khẩu</label>               
               
                  <div class = "input-icon">
              
                  <input type="password" id= "password" class="form-control form-control-lg " placeholder="password"@error('password') is-invalid @enderror
                  name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
    
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                 
                  
                  <i id="togglePassword" class="fas fa-regular fa-eye-slash"></i> 
                  </div>
                </div>
           

              
              
          

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3" name ='remember'>
                  Ghi nhớ mật khẩu
                </label>
              </div>
              <a href="#!"  class="link-danger">Quên mật khẩu ?</a>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">

              <!--BTN- ĐĂNG NHẬP-->
              <button type="submit" class="btn" style="background-color: #15b601; color: white; font-family: 'Arial', sans-serif;">
                {{ __('Đăng nhập') }}
              </button>
              

            <!-- -->
            <div>
              <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="{{ route('register') }}" class="link-danger">Đăng ký tài khoản</a></p>
            </div>
            <br>
            <!-- -->
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-end">

                <p class="lead fw-normal mb-0 me-3" style="font-size: 18px;">Đăng nhập với</p>

                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-facebook"></i>
                </button>
    
                <a href="{{ route('google-auth') }}" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </a>              
            </div>
  
          </form>
        </div>
      </div>
    </div>
   
      
  
      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>

    
  </section>

@endsection
 