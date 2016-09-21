@include('layout.header')
<div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 "  style="margin-top:5%;">
        <div class="form-group">            
            <h3>Create an Account</h3>
            Already have an Account? <a href="{{{ URL::to('/login') }}}">LOGIN</a>
        </div>
            @if (Session::get('error'))
                <div class="alert alert-error alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong> 
                    @if (is_array(Session::get('error')))
                        {{ head(Session::get('error')) }}
                     @endif 
                   </strong>    
                </div>                                  
            @endif
            @if (Session::get('notice'))
                <div class="alert">{{ Session::get('notice') }}</div>
            @endif
        <form role="form" method="POST" action="{{{ URL::to('/sign_up') }}}">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">            
            <div class="form-group">
                <label class="">Email Address: </label>
                <input class="form-control" type="email" name="email" value="" placeholder="Email Address" required>
            </div>                
            <div class="form-group">
                <label class="">Password: </label>
                <input class="form-control" type="password" name="password" value="" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label class="">Confirm Password: </label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
            </div>                                          
            <div class="form-group text-right">
                <input class="btn btn-primary btn-block" type="submit" name="btn-register" value="Create Account">
            </div>
        </form>
    </div>
</div>
@include('layout.footer')