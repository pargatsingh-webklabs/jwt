   <div class="login-box">
        <div class="logo ">
            <a href="javascript:void(0);" style="color:#8bc34a !important" ><?php echo SITENAME;?></b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="form_login_smooth_" method="POST" action="<?php echo BASEURL; ?>/login">
                    <div class="msg"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username"  autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" value="1" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn bg-light-green waves-effect btn-lg " type="submit">SIGN IN</button>							
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
