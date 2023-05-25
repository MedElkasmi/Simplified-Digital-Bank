<!DOCTYPE html>
<html lang="en" class="h-100">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="robots" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
      <meta property="og:title" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
      <meta property="og:description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
      <meta property="og:image" content="https://w3crm.dexignzone.com/xhtml/social-image.png">
      <meta name="format-detection" content="telephone=no">
      <!-- PAGE TITLE HERE -->
      <title>Create An Account</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="images/favicon.png">
      <link href="{{ asset('backend/assets/css/style.css')}}" rel="stylesheet">
   </head>
   <body class="vh-100">
      <div class="authincation h-100">
         <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
               <div class="col-md-6">
                  <div class="authincation-content">
                     <div class="row no-gutters">
                        <div class="col-xl-12">
                           <div class="auth-form">
                              <div class="text-center mb-3">
                                 <a href=""><img src="images/logo/logo-full.png" alt=""></a>
                              </div>
                              <h4 class="text-center mb-4">Create new account</h4>
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

                                 <div class="mb-3">
                                    <label class="mb-1"><strong>Name</strong></label>
                                    <input type="text" name="name" class="form-control">
                                 </div>
                                 <div class="mb-3">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control">
                                 </div>
                                 <div class="mb-3">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" name="password" class="form-control">
                                 </div>
                                 <div class="mb-3">
                                    <label class="mb-1"><strong>Password Confirmation</strong></label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                 </div>
                                 <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                 </div>
                                 
                              </form>
                              <div class="new-account mt-3">
                                 <p>already have an account? <a class="text-primary" href="{{ route('login') }}">Login here</a></p>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--**********************************
         Scripts
         ***********************************-->
      <!-- Required vendors -->
      <script src="{{ asset('backend/asstes/vendor/global/global.min.js')}}"></script>
      <script src="{{ asset('backend/asstes/./js/custom.js')}}"></script>
      <script src="{{ asset('backend/asstes/./js/deznav-init.js')}}"></script>
   </body>
</html>