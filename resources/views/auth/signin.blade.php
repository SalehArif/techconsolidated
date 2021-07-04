<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Consolidated</title>
	<link
	rel="stylesheet" 
	href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
	integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
	crossorigin="anonymous"/>
	<link rel="stylesheet" href="/css/signin-style.css"/>
</head>
	<body>
	<div class="container" id="container">
            <div class="form-container sign-up-container" >
            <form action="{{ route('auth.save') }}" method="post">
            @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible" >
                <strong style="color:green;">{{Session::get('success')}}</strong> 
                  <br>
                  <br>
                </div>
                    
            @endif
 
            @if(Session::get('fail'))
            <div class="alert alert-success alert-dismissible" >
                <strong style="color:red;">{{Session::get('fail')}}</strong> 
                </div>
            @endif
 
            @csrf
            <form action="#" id ="SignUpform" name='registration'>
                    <h1>Create Account</h1>
                    <span>or use your email for registration</span>
                    <input type="text" name="username" id="name" placeholder="Name" />
                    <div class="alert alert-success alert-dismissible" >
                    <light style="color:red;">@error('username') {{ $message }} @enderror</light> 
                    </div>
                    <input type="email"  name="email" id="email"  placeholder="Email"/>
                    <div class="alert alert-success alert-dismissible" >
                    <light style="color:red;">@error('email') {{ $message }} @enderror</light> 
                      </div>
                    <input type="password" placeholder="Password" name="password" id="password" />
                    <div class="alert alert-success alert-dismissible" >
                    <light style="color:red;">@error('password') {{ $message }} @enderror</light> 
                      </div>
                    
                    <button type="submit" id="SignUpbutton">Sign Up</button>
                    </form>
                </form>
            </div>
			<div class="form-container sign-in-container ">
            <form action="{{route('auth.check')}}" method="post">
            @if(Session::get('fail'))
            <div class="alert alert-success alert-dismissible" >
                <strong style="color:red;">{{Session::get('fail')}}</strong> 
                  <br>
                  <br>
                </div>
            @endif
            @csrf
 
                <form action="#" name="registration-sign">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input type="email" name="email" id="email" placeholder="Email" value= "{{old('email')}}"/>
                    <div class="alert alert-success alert-dismissible" >
                    <light style="color:red;">@error('email') {{ $message }} @enderror</light> 
                      </div>
                    <input type="password" placeholder="Password" name="password" id="password" />
                    <div class="alert alert-success alert-dismissible" >
                    <light style="color:red;">@error('password') {{ $message }} @enderror</light> 
                      </div>
                    <a href="#">Forgot your password?</a>
                    <button type="submit" id="SignInbutton" >Sign In</button>
                </form>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button  class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script src="/js/jquery.validate.min.js"></script>
		<script src=/js/signin.js></script>
	</body>
</html>




