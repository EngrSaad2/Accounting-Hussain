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
					<h2>User Login</h2>
				</div>
				<div class="card-body">
					<?=form_open(current_url());?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="userEmail" type="email" required autofocus />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="userPassword" type="password" required />
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" />
						</fieldset>
					</form>
				</div>
				<div class="card-footer text-center">
					<a href="<?=site_url('users/register');?>">User Registration</a> | <a href="<?=site_url('users/forgot');?>">Forgot Password?</a>
				</div>
			</div>
		</div>
