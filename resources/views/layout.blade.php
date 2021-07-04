
<?php
    Session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="shop electronics brand">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
    <link rel="icon" href="/img/logo.png" type="image/x-icon">
    
</head>
<body>
    
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="\"><img src="/img/logo.png" class="img-responsive" height="30px" width="40px"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="\">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="products">Products</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(Session()->has('LoggedUser'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.logout')}}">Logout</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart">Cart</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="auth/signin">Sign up</a></li>
                @endif
                
            </ul>
        </div>
    </nav>
    <br>
    @yield('content')
    <br>
    <div class="container-fluid">
    <footer class="row">
        <div class="col-3 col-md-2">
            <br>
            <h4>Links</h4>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="products">Products</a></li>
                <!-- <li><a href="about">About</a></li> -->
                <li><a href="mailto:consolidated@tech.net">Contact</a></li>
            </ul>
        </div>
        <div class="col-5 col-md-3 offset-4 offset-md-2">
            <br>
            <h4>Our HQ</h4>
            <p>121, Street Abc, Faisalabad Pakistan</p>
            <p>Tel: +925 1234 5678</p>
            <p>Fax: +925 6765 4321</p>
            <p>Email: <a href="mailto:consolidated@tech.net">consolidated@tech.net</a></p>
        </div>
        <div class="col-4 col-md-2 offset-md-2">
            <br>
            <!-- add icons for these -->
            <a href="">Facebook</a>
            <a href="">Instagram</a>
            <a href="">Twitter</a>
            <a href="">Youtube</a>
        </div>
        <div class="col-8 offset-4">
            <p> &copy; Tech Consolidated 2021 </p>
        </div>
    </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
