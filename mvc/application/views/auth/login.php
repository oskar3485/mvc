<div class="container">
    <div class="row main-form">
        <form class="" method="post" action="register/auth">
            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <button type="submit"  id="button" class="btn btn-primary btn-lg btn-block login-button">Authorize</button>
            </div>
        </form>
    </div>
    <a href="register/showRegister">Еще не зарегестрированы?</a>
</div>