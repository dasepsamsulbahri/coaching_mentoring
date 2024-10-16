<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{date('Y')}} &copy; BPSDM Hukum dan HAM</title>
    
    <!-- Icon-->
    <link href="https://casn.kemenkumham.go.id/assets/inpassing/images/icon_kumham.png" 
    rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <!-- Custom fonts for this template-->
    <link href="/assets/templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/templates/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6 d-flex justify-content-center"  style="padding-left: 5%">
                                <img src="/assets/templates/img/6333040.jpg" alt="" style="width:80%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2 class="h4 text-gray-900 mb-4">Please login!</h2>
                                    </div>
                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input id="nip" name="nip" type="text" class="form-control form-control-user" 
                                            value="{{old('nip')}}" autocomplete="nip" autofocus placeholder="Nip...">
                                            @error('nip')
                                                &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="position:relative" id="show_hide_password">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password...">
                                            @error('password')
                                            &nbsp;<span class="mt-2 badge badge-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="captcha">
                                                <span>{!! captcha_img() !!}</span>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-md btn-primary btn-refresh">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </div><br>
                  
                                            <input id="captcha" type="text" class="form-control form-control-user" 
                                            placeholder="Captcha..." name="captcha">
                                            @if ($errors->has('captcha'))
                                            &nbsp;<span class="mt-2 badge badge-danger">{{ $errors->first('captcha') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--Card Body-->
                </div><!--Card-->
            </div><!--Col-->
        </div><!--Row-->
    </div><!--Container-->

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/templates/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(".btn-refresh").click(function(){
          $.ajax({
             type:'GET',
             url:'/refresh_captcha',
             success:function(data){
                $(".captcha span").html(data.captcha);
             }
          });
        });
    </script>
    <script src="/assets/templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/templates/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/templates/js/sb-admin-2.min.js"></script>

</body>

</html>