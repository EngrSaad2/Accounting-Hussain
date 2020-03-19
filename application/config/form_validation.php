<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	$config = array(
		# Registration Form Validation Rules
		'users/register' => array(
			array(
				'field'  => 'userFirstName',
				'label'  => 'First Name',
				'rules'  => 'trim|required|min_length[1]|max_length[25]',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
				),
			),

			array(
				'field'  => 'userLastName',
				'label'  => 'Last Name',
				'rules'  => 'trim|required|min_length[1]|max_length[25]',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
				),
			),

			array(
				'field'  => 'userEmail',
				'label'  => 'Email',
				'rules'  => 'trim|required|min_length[3]|max_length[255]|valid_email|is_unique[users.userEmail]',
				'errors' => array(
					'required'    => 'You must provide a %s for your account.',
					'min_length'  => 'You have too few characters for your %s.',
					'max_length'  => 'You have too many characters for your %s.',
					'valid_email' => 'The %s provided was not valid.',
					'is_unique'   => 'The %s provided was not unique.'
				),
			),

			array(
				'field'  => 'userPassword',
				'label'  => 'Password',
				'rules'  => 'required|min_length[3]|callback_password_check',
				'errors' => array(
					'required'       => 'You must provide a %s for your account.',
					'min_length'     => 'You have too few characters for your %s.',
					'password_check' => 'You do not have the correct amount of letters, numbers, or special characters in your password.'
				),
			),

			array(
				'field'  => 'userPasswordConfirm',
				'label'  => 'Password Confirmation',
				'rules'  => 'required|matches[userPassword]',
				'errors' => array(
					'required'              => 'You must provide a %s for your account.',
					'matches[userPassword]' => 'Your %s did not match.'
				),
			),
		),

		'users/forgotConfirm' => array(
			array(
				'field'  => 'userPassword',
				'label'  => 'Password',
				'rules'  => 'required|min_length[3]|callback_password_check',
				'errors' => array(
					'required'       => 'You must provide a %s for your account.',
					'min_length'     => 'You have too few characters for your %s.',
					'password_check' => 'You do not have the correct amount of letters, numbers, or special characters in your password.'
				),
			),

			array(
				'field'  => 'userPasswordConfirm',
				'label'  => 'Password Confirmation',
				'rules'  => 'required|matches[userPassword]',
				'errors' => array(
					'required'              => 'You must provide a %s for your account.',
					'matches[userPassword]' => 'Your %s did not match.'
				),
			),
		),


		# Update Account Form Validation Rules
		'profile/edit' => array(
			array(
				'field'  => 'userFirstName',
				'label'  => 'First Name',
				'rules'  => 'trim|required|min_length[1]|max_length[25]',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
				),
			),

			array(
				'field'  => 'userLastName',
				'label'  => 'Last Name',
				'rules'  => 'trim|required|min_length[1]|max_length[25]',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
				),
			),

			array(
				'field'  => 'userEmail',
				'label'  => 'Email',
				'rules'  => 'trim|required|min_length[3]|max_length[255]|valid_email',
				'errors' => array(
					'required'    => 'You must provide a %s for your account.',
					'min_length'  => 'You have too few characters for your %s.',
					'max_length'  => 'You have too many characters for your %s.',
					'valid_email' => 'The %s provided was not valid.'
				),
			),

			array(
				'field'  => 'userPassword',
				'label'  => 'Password',
				'rules'  => 'min_length[20]|callback_password_check|callback_password_unique',
				'errors' => array(
					'min_length'      => 'You have too few characters for your %s.',
					'password_check' => 'You do not have the correct amount of letters, numbers, or special characters in your password.',
					'password_unique' => 'The %s entered has been used before. Please use a password that has not been used before with this account.'
				),
			),

			array(
				'field'  => 'userPasswordConfirm',
				'label'  => 'Password Confirmation',
				'rules'  => 'matches[userPassword]',
				'errors' => array(
					'matches[userPassword]' => 'Your %s did not match.'
				),
			)
		),


		# Account Creation Form Validation Rules
		'accounts/create' => array(
			array(
				'field'  => 'accountID',
				'label'  => 'Account ID',
				'rules'  => 'trim|required|min_length[3]|max_length[8]|callback_is_uniqueId',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
					'is_uniqueId' => 'The Account ID provided was not unique.',
				),
			),

			array(
				'field'  => 'accountName',
				'label'  => 'Account Name',
				'rules'  => 'required|min_length[3]|max_length[50]|callback_is_uniqueName',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
					'is_uniqueName'   => 'The Account Name provided was not unique.',
				),
			),

			array(
				'field'  => 'accountBalance',
				'label'  => 'Account Balance',
				'rules'  => 'required|greater_than_equal_to[0]',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'greater_than_equal_to' => 'Your %s is less than the minimum amount required.',
				),
			),

			array(
				'field'  => 'accountCategory',
				'label'  => 'Account Category',
				'rules'  => 'required',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'in_list' => 'Your %s is not a valid option.',
				),
			),

			array(
				'field'  => 'accountCategorySub',
				'label'  => 'Account Sub-Category',
				'rules'  => 'required',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'in_list' => 'Your %s is not a valid option.',
				),
			),
		)
	);

	$config['error_prefix'] = '<div class="alert alert-danger alert-dismissible fade show print-error-msg" role="alert">';
	$config['error_suffix'] = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
