<br>
<br>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Scan</b> eFaktur</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="<?php echo base_url('auth/login') ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="uname" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="pass" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-12">
                    <input value="Sign In" type="submit" class="btn btn-primary btn-block btn-flat">
                </div>
                <!-- /.col -->
            </div>
        </form>




    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->