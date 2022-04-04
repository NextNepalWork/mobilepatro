<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',$title)</title>
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">

            <img src="{{url('images/misc/logo.png')}}" alt="Avatar"
                 class="avatar">
            <h3>Login to your Horoscope Dashboard</h3>


            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <form method="post" href="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Your Username *" value=""/>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first('username')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" id="password" class="form-control" name="password" data-toggle="password"
                           placeholder="Your Password *" value=""/>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first('password')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember">Remember Me
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login"/>
                </div>

                <div class="form-group">
                    <a href="#" class="ForgetPwd">Forget Password?</a>
                </div>
            </form>
        </div>

    </div>
</div>



</body>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script type="text/javascript">
    $("#password").password('toggle');
</script>
<script src="{{url('js/app.js')}}"></script>
</html>