@extends('back.layout.auth')
@section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Login Page')
<link rel="manifest" href="{{ asset('/manifest.json') }}">
<script src="{{ asset('/sw.js') }}"></script>
@section('content')
<div class="container py-5 vh-100 d-flex align-items-center">
  <div class="container my-3">
      <div class="row justify-content-center">
          <div class="col-lg-8"> <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                  <div class="row g-0">

                      <div class="col-md-5 d-flex flex-column justify-content-center align-items-center p-5 text-white" style="background-color: #38a169;">
                          <a href="." class="navbar-brand mb-4">
                              <img src="{{ asset('images/smartwaste_logo.png') }}" width="150" height="150" alt="Smart Waste Logo" class="rounded-circle shadow-sm">
                          </a>
                          <h1 class="h3 fw-bold text-center mb-2">Welcome Back!</h1>
                          <p class="text-center opacity-75">
                              Your smart solution for a cleaner environment.
                          </p>
                      </div>

                      <div class="col-md-7 p-5">
                          <h2 class="h4 fw-normal mb-4 text-center">Login to your account</h2>

                          @if(Session::get('fail'))
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <i class="bi bi-exclamation-triangle-fill me-2"></i>
                              {{ Session::get('fail') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif

                          @if(Session::get('ban'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <i class="bi bi-x-octagon-fill me-2"></i>
                              {{ Session::get('ban') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif

                          <form action="{{ route('custom.login') }}" method="POST">
                              @csrf

                              <div class="mb-4">
                                  <label for="userNameInput" class="form-label visually-hidden">User Name</label>
                                  <div class="input-group input-group-lg">
                                      <span class="input-group-text"><i class="bi bi-person"></i></span>
                                      <input type="text"
                                          class="form-control @error('user_name') is-invalid @enderror"
                                          id="userNameInput"
                                          placeholder="User Name" name="user_name"
                                          value="{{ old('user_name') }}"
                                          autocomplete="off" autofocus>
                                      @error('user_name')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                              <div class="mb-5">
                                  <label for="passwordInput" class="form-label visually-hidden">Password</label>
                                  <div class="input-group input-group-lg">
                                      <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                      <input type="password"
                                          class="form-control @error('password') is-invalid @enderror"
                                          id="passwordInput"
                                          placeholder="Password" name="password" autocomplete="off">
                                      @error('password')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                              <div class="d-grid gap-3">
                                  <button type="submit" class="btn btn-primary btn-lg rounded-pill" style="background-color: #38a169; border-color: #38a169;">
                                      Sign In
                                  </button>

                                  <p class="text-center mt-3 mb-0 text-muted">
                                      Don't have an account?
                                      <a href="" class="text-decoration-none fw-bold" style="color: #38a169;">
                                          Register Here
                                      </a>
                                  </p>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<script>
 if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("PWA is now fully prepared for use!");
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
			);
		} else {
			 console.error("Service workers are not supported.");
		}
</script>
@endsection
