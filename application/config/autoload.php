<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();


$autoload['libraries'] = array('session', 'database', 'form_validation', 'email');

$autoload['drivers'] = array();


$autoload['helper'] = array('url', 'form');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('user_model', 'account_model', 'log_model');
