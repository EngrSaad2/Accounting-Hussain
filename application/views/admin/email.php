<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
<?=validation_errors();?>
			<div class="card">
				<div class="card-header">
					<h2>Email User: <?=$emailInfo['userFirstName'];?> <?=$emailInfo['userLastName'];?> #<?=$emailInfo['userID'];?></h2>
				</div>
				<div class="card-body">
					<?=form_open(current_url());?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" name="emailEmail" type="text" value="<?=$emailInfo['userEmail'];?>" required disabled data-toggle="tooltip" data-placement="left" title="Email Receiver" />
							</div>
							<div class="form-group">
								<input class="form-control" name="emailSubject" type="text" required autofocus data-toggle="tooltip" data-placement="left" title="Email Subject" />
								<textarea class="form-control" name="emailBody" id="emailBody" rows="6" placeholder="Your email body text goes here..." required data-toggle="tooltip" data-placement="left" title="Email Body"></textarea>
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Send Email" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
