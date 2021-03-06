<body id="signup-page">
<div class="page-form">
    <form <?php echo isset($action)? 'action="'.$action.'"' :''; ?> method="post" id="<?php echo $form_id; ?> class="form">
        <div class="header-content"><h1>Register</h1></div>
		<?php if(isset($response)){  
			$class = $response['result']? 'alert-success' : 'alert-danger';
			echo "<div class='errorMsg alert ".$class."'>{$response['msg']}</div>";
		} 
		if(validation_errors() != ''){
			echo '<div class="errorMsg alert alert-danger">'.validation_errors().'</div>';
		}?>
		
        <div class="body-content">
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Username" name="username" class="form-control"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-envelope"></i><input type="email" placeholder="Email address" name="email" class="form-control"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input id="password" type="password" placeholder="Password" name="password" class="form-control"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Confirm Password" name="passwordConfirm" class="form-control"></div>
            </div>
            <hr>
            <div style="margin-bottom: 15px" class="row">
                <div class="col-lg-6"><label><input type="text" placeholder="First Name" name="firstname" class="form-control"></label></div>
                <div class="col-lg-6"><label><input type="text" placeholder="Last Name" name="lastname" class="form-control"></label></div>
            </div>
            <div class="form-group"><label style="display: block" class="select"><select name="gender" class="form-control">
                <option value="0" selected disabled>Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select></label></div>
            <div class="form-group">
                <div class="checkbox-list"><label><input id="subscription" type="checkbox" name="subscription">&nbsp;
                    I want to receive news and special offers</label></div>
            </div>
            <div class="form-group">
                <div class="checkbox-list"><label><input id="terms" type="checkbox" name="terms">&nbsp;
                    I agree with the Terms and Conditions</label></div>
            </div>
            <hr>
            <div class="form-group mbn"><a href="#" class="btn btn-warning"><i class="fa fa-chevron-circle-left"></i>&nbsp;
                Back</a>
                <button type="submit" class="btn btn-info pull-right">Submit
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
        </div>
    </form>
</div>
