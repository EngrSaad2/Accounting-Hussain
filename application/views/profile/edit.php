<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<?=validation_errors();?>
	<div class="card">
		<div class="card-header">
			<h2>Change Your Information</h2>
		</div>
		<div class="card-body">
			<?=form_open(current_url());?>
			<fieldset>
				<div class="form-group">
					<input class="form-control" placeholder="First Name" name="userFirstName" type="text" required autofocus value="<?=$userData['userFirstName'];?>" data-toggle="tooltip" data-placement="left" title="First Name" />
				</div>
				<div class="form-group">
					<input class="form-control" placeholder="Last Name" name="userLastName" type="text" required value="<?=$userData['userLastName'];?>" data-toggle="tooltip" data-placement="left" title="Last Name" />
				</div>
				<div class="form-group">
					<input class="form-control" placeholder="Email" name="userEmail" type="email" required value="<?=$userData['userEmail'];?>" data-toggle="tooltip" data-placement="left" title="Email Address" />
				</div>
				<div class="form-group">
					<input class="form-control" placeholder="Password" name="userPassword" type="password" data-toggle="tooltip" data-placement="left" title="(Optional)" />
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
					<input class="form-control" placeholder="Confirm Password" name="userPasswordConfirm" type="password" data-toggle="tooltip" data-placement="left" title="(Optional)" />
				</div>
				<input class="btn btn-lg btn-success btn-block" type="submit" value="Submit Changes" />
			</fieldset>
		</form>
	</div>
</div>
</div>
