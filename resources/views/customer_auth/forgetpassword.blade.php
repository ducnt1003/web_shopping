<!DOCTYPE html>
<html lang="en">
<head>
@include('head')
    
</head>

<body id="body">
  @include('alert.alert')
    <section class="forget-password-page account">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6 col-md-offset-3">
            <div class="block text-center">
              <a class="logo" href="index.html">
                <img src="images/logo.png" alt="">
              </a>
              <h2 class="text-center">Welcome Back</h2>
              <form action="{{route('forgetpassword.post')}}" method="post" class="text-left clearfix">
                @csrf
                <p>Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.</p>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Account email address">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-main text-center">Request password reset</button>
                </div>
              </form>
              <p class="mt-20"><a href="{{route('login')}}">Back to log in</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

@include('footer')

</body>
</html>
