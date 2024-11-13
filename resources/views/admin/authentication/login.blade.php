    <!doctype html>
    <html lang="en">

        <head>
            
            <meta charset="utf-8" />
            <title>Login | Admin </title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- App favicon -->
            <link rel="shortcut icon" href="{{ asset('backend/assets/images/cloudrevel.jpg') }}">

            <!-- Bootstrap Css -->
            <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
            <!-- Icons Css -->
            <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
            <!-- App Css-->
            <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

            <style>
    

            </style>

        </head>

        <body class="">
            <div class=""></div>
            <div class="wrapper-page">
                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-body">
                            <!-- Validation Errors -->
                    
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="index.html" class="auth-logo">
                                        <img src="{{ asset('backend/assets/images/cloudrevel.jpg') }}" height="70" class="logo-dark mx-auto" alt="">
                                        <img src="{{ asset('backend/assets/images/cloudrevel.jpg') }}" height="70" class="logo-light mx-auto" alt="">
                                    </a>
                                    
                                </div>
                            </div>
        
            
        
                            <div class="p-3">
{{-- if (session()->hasOldInput()) {
    dd(session()->getOldInput());
} --}}

    <form class="form-horizontal mt-3" method="POST" action="{{ route('admin.login') }}">
                @csrf

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="username" name="username" type="text" placeholder="username" value="{{ old('username') }}"  required="">
                </div>
@if ($errors->has('username'))
<div class="col-12 mt-2">
<span class="text-danger">{{ $errors->first('email') }}</span>
</div>
@endif
        
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="password" name="password" type="password"  placeholder="Password" required="">
                </div>
                @if ($errors->has('password'))
                <div class="col-12 mt-2">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
            @endif
                
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        
                        
                    </div>
                </div>
            </div>

            <div class="form-group mb-3 text-center row mt-3 pt-1">
                <div class="col-12">
                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>
            </div>
        </form>
                            </div>
                            <!-- end -->
                        </div>
                        <!-- end cardbody -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end container -->
            </div>
            <!-- end -->

            <!-- JAVASCRIPT -->
            <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
            <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
            <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
            <script src="{{ asset('backend/assets/js/app.js') }}"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
    }
    @endif 

    </script>

        </body>
    </html>
