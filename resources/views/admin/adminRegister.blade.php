<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote-django/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jul 2023 05:57:46 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Register | Skote - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('/') }}/admin/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{ url('/') }}/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ url('/') }}/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ url('/') }}/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free Skote account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ url('/') }}/admin/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                
                                <div class="p-2">
                                    <form class="needs-validation" action="{{ route('admin-register') }}" method="POST">
                                        @csrf
                                                       
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                                            <div class="invalid-feedback">
                                                Please Enter Username
                                            </div>  
                                        </div>
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter email" required>  
                                            <div class="invalid-feedback">
                                                Please Enter Email
                                            </div>      
                                        </div>
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Contact Number</label>
                                            <input type="number" name="contact" class="form-control" id="usercontact" placeholder="Enter Contact" required>  
                                            <div class="invalid-feedback">
                                                Please Enter Contact Number
                                            </div>      
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>       
                                        </div>
                    
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                        </div>                
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Already have an account ? <a href="{{ route('admin-login') }}" class="fw-medium text-primary"> Login</a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Sk Hasan</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ url('/') }}/admin/libs/jquery/jquery.min.js"></script>
        <script src="{{ url('/') }}/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('/') }}/admin/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ url('/') }}/admin/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ url('/') }}/admin/libs/node-waves/waves.min.js"></script>

        <!-- validation init -->
        <script src="{{ url('/') }}/admin/js/pages/validation.init.js"></script>
        
        <!-- App js -->
        <script src="{{ url('/') }}/admin/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote-django/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jul 2023 05:57:47 GMT -->
</html>
