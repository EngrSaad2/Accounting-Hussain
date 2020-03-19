<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
<?=validation_errors();?>
			<div class="row" style="padding-bottom: 20px;">
				<img src="<?=base_url('/assets/img/logo.png');?>" class="mx-auto" />
			</div>

			<div class="card">
				<div class="card-header">
					<h2>User Registration</h2>
				</div>
				<div class="card-body">
					<?=form_open(current_url()); ?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="First Name" name="userFirstName" type="text" required autofocus />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Last Name" name="userLastName" type="text" required />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="userEmail" type="email" required />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="userPassword" type="password" required />
								<p class="help-text">
									Your password has to meet the following requirements:
									<ul>
										<li>Must start with a letter</li>
										<li>Must include a number</li>
										<li>Must include one of the following special characters:
											<strong>.</strong>
											<strong>1</strong>
											<strong>@</strong>
											<strong>#</strong>
											<strong>$</strong>
											<strong>?</strong>
										</li>
									</ul>
								</p>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="userPasswordConfirm" type="password" required />
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" />
						</fieldset>
					</form>
				</div>
				<div class="card-footer text-center">
					<a href="<?=site_url('users/login');?>">User Login</a> | <a href="<?=site_url('users/forgot');?>">Forgot Password?</a>
				</div>
			</div>
		</div>
