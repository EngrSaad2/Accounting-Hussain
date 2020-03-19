<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
<?=validation_errors();?>
			<div class="card">
				<div class="card-header">
					<h2>Create New User</h2>
				</div>
				<div class="card-body">
					<?=form_open(current_url());?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="First Name" name="userFirstName" type="text" required autofocus data-toggle="tooltip" data-placement="left" title="User First Name" />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Last Name" name="userLastName" type="text" required data-toggle="tooltip" data-placement="left" title="User Last Name" />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="userEmail" type="email" required data-toggle="tooltip" data-placement="left" title="User Email" />
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Submit Changes" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
