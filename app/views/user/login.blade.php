@include('layout.header')
<!--PAGE CONTENT-->
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 " style="margin-top:5%;">
    <div class="form-group">
        <br>
        <br>
        <h3>Login to System</h3>
        Don't have an Account? <a href="{{{ URL::to('/sign_up') }}}">SIGNUP</a>
    </div>
    <form role="form" method="POST" action="{{{ URL::to('/login') }}}">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
        <div class="form-group">
            <label for="">Email Address: </label>
            <input class="form-control" type="text" name="username" value="" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="">Password: </label>
            <input class="form-control" type="password" name="password" value="" placeholder="Password" required>
        
            <p class="help-block">
                <a href="{{{ URL::to('/forgot_pwd') }}}">(Forgot Password)</a>
            </p>
        </div>
        <div class="checkbox">
            <label for="remember">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> Remember Me
            </label>
        </div>
        
        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
            <div class="alert alert-success">{{{ Session::get('notice') }}}</div>
        @endif

        <div class="form-group text-right">
            <input class="btn btn-primary btn-block" type="submit" name="btn-register" value="Login">
        </div>
    </form>
</div>
@include('layout.footer')