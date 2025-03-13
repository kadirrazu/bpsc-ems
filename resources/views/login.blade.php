<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="BPSC - Exam Management System">
  <meta name="author" content="BPSC ICT Division">
  <link href="{{ asset('assets/img/logo/favicon.ico') }}" rel="icon">
  <title>BPSC EMS - Login</title>
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/ruang-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-9 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <div class="login-logo-area">
                      <img src="{{ asset('assets/img/govt-logo-2.png') }}" alt="Govt Logo">
                    </div>
                    <h1 class="h4 text-gray-900 mb-1">Bangladesh Public Service Commission (BPSC)</h1>
                    <h1 class="h4 text-gray-900 mb-1">Exam Management System</h1>
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  
                  <div class="text-center">
                    <x-flash/>
                  </div>

                  <form class="user" method="POST" action="{{ url('login') }}">
                    
                    @csrf

                    <div class="form-group">
                        <x-form.input name="email" type="email" placeholder="Enter Email Address" required />
                        <x-form.error name="email"/>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                      <x-form.error name="password"/>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>