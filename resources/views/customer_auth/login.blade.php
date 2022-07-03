
<!--
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->


<!DOCTYPE html>
<html lang="en">
<head>
@include('head')
    
</head>

<body id="body">

<section class="signin-page account">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <a class="logo" href="index.html">
                        <img src="images/logo.png" alt="">
                    </a>
                    <h2 class="text-center">Welcome Back</h2>
                    @include('alert.alert')
                    <form class="text-left clearfix" action="{{route('login.authenticate')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control"  placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="text-center ">      
                            <button type="submit" class="btn btn-main text-center" >Login</button>
                        </div>
                        <div class="text-center form-group ">
                            <p>- OR -</p>
                            
                            <a href="{{route('auth.google')}}" class="btn  btn-danger">
                                <i class="tf-ion-social-google"></i> Sign in using Google+
                            </a>
                        </div>                       
                    </form>
                    <p class="mt-20">New in this site ?<a href="{{route('register')}}"> Create New Account</a></p>
                    <p class="mt-20"><a href="#">Forgot your password </a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')

</body>
</html>
