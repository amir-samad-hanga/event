<body id="signin-page">
<div class="page-form">
    <form method="post" <?php echo isset($action)? 'action="'.$action.'"' :''; ?> class="form" id="<?php echo $form_id; ?>">
        <div class="header-content"><h1>Log In</h1></div>

			<?php if(isset($errorMsg) AND !empty($errorMsg)){  
				echo "<div class='errorMsg alert alert-danger'>{$errorMsg}</div>";
			} 
			if(validation_errors() != ''){
				echo '<div class="errorMsg alert alert-danger">'.validation_errors().'</div>';
			}?>
			
		
        <div class="body-content"><p>Log in with a social network:</p>

            <div class="row mbm text-center">
                <div class="col-md-4"><a href="#" class="btn btn-sm btn-twitter btn-block"><i class="fa fa-twitter fa-fw"></i>Twitter</a></div>
                <div class="col-md-4"><a href="#" class="btn btn-sm btn-facebook btn-block"><i class="fa fa-facebook fa-fw"></i>Facebook</a></div>
                <div class="col-md-4"><a href="#" class="btn btn-sm btn-google-plus btn-block"><i class="fa fa-google-plus fa-fw"></i>Google Plus</a></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Username" name="username" class="form-control"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Password" name="password" class="form-control"></div>
            </div>
            <div class="form-group pull-left">
                <div class="checkbox-list"><label><input type="checkbox">&nbsp;
                    Keep me signed in</label></div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success">Log In
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
            <div class="clearfix"></div>
            <div class="forget-password"><h4>Forgotten your Password?</h4>

                <p>no worries, click <a href='#' class='btn-forgot-pwd'>here</a> to reset your password.</p></div>
            <hr>
            <p>Don't have an account? <a id="btn-register" href="extra-signup.html">Register Now</a></p></div>
    </form>
</div>
