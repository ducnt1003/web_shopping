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
              <form action="{{route('resetpassword.post')}}" method="post" class="text-left clearfix">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <p>You are only one step a way from your new password, recover your password now.</p>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Conformation">
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-main text-center">Reset password password</button>
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
