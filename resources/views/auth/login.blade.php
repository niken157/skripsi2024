@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-11 ">
                <div class="wrap d-md-flex shadow-lg">
                    <div class="img" style="background-image: url('logi/images/wall.jpg');">
              </div>
                    <div class="login-wrap p-4 p-md-5 shadow-lg height">
                  <div class="d-flex">
                      <div class="w-100">
                          <h3 >Login to <strong>CiptoBeton</strong></h3>
                      </div>
                  </div>
                  @error('email')
                        <div class="alert alert-danger  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ "Pastikan Username dan Password Benar"}} </strong>
                        </div>
                        @enderror
                        @error('password')
                        <div class="alert alert-danger  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ "Pastikan Password Benar"}} </strong>
                        </div>
                        @enderror
                  <form method="post" action="/login">
                    @csrf
                      <div class="form mb-3">
                          <label class="label" for="email"><strong>User Name</strong></label>
                          <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>
                      </div>
                     <div class="form mb-3">
                         <label class="label" for="password"><strong>Password</strong></label>
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus>
                     </div>
                <div class="form-group">
                    <button type="submit" value="Log In" class="form-control btn btn-primary rounded submit px-3">Log In</button>
                </div>
              </form>
              <p class="text-center">Belum Terdaftar? <a href="/register">Daftar Sekarang</a></p>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>

@endsection

