@include('layout.header')
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 " style="margin-top:5%;">
        <div class="form-group">            
            <h3>Forgot Password</h3>
            Don't have an Account? <a href="{{{ URL::to('/sign_up') }}}">SIGNUP</a>
        </div>
        <form role="form" method="POST" action="{{{ URL::to('/forgot_pwd') }}}">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

            <div class="form-group">
                <label for="email">Email:</label>
                <div class="input-append input-group">
                    <input class="form-control" placeholder="Enter email" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                    <span class="input-group-btn">
                        <input class="btn btn-default btn-block" type="submit" value="Continue">
                    </span>
                </div>
            </div>

            @if (Session::get('error'))
                <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
            @endif

            @if (Session::get('notice'))
                <div class="alert">{{{ Session::get('notice') }}}</div>
            @endif
        </form>
    </div>
</div>
@include('layout.footer')