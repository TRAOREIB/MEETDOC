<?php

require(app_path()."\ligdicash\pay\dependency_check.php");

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

abstract class Pay {
  const VERSION = "1.0.0";
  const SUCCESS = "success";
  const FAIL = "fail";
  const PENDING = "pending";
}

if (strnatcmp(phpversion(),'5.3.0') >= 0) {
  define('JSON_ENCODE_PARAM_SUPPORT',   true);
}else{
  define('JSON_ENCODE_PARAM_SUPPORT',   false);
}

require(app_path() .'\ligdicash\pay\setup.php');
require(app_path() .'\ligdicash\pay\customdata.php');
require(app_path() .'\ligdicash\pay\checkout.php');
require(app_path() .'\ligdicash\pay\checkout\store.php');
require(app_path() .'\ligdicash\pay\checkout\checkout_invoice.php');
require(app_path() .'\ligdicash\pay\libraries\Requests.php');
require(app_path() .'\ligdicash\pay\utilities.php'); 