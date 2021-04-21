<?php
require(dirname(__FILE__).'/../pay-php-gateway.php');

// configuration du setup de l'API
$setup = new Pay_Setup();
$setup->setApi_key("2PDFA81DJPBPZD3W5");
$setup->setMode("test"); // live ou test
$setup->setToken("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF9hcHAiOiI0MzMiLCJpZF9hYm9ubmUiOiI2MzcxMCIsImRhdGVjcmVhdGlvbl9hcHAiOiIyMDIwLTEyLTE2IDE1OjMxOjM4In0.EGP4ET9H2LdZr4yFT4Mrprwb2sCtSakhoJi3XqBSA6c");


//Configuration des informations de votre boutique/service
$store = new Pay_Checkout_Store();
$store->setName("Meetdocbf");
$store->setWebsiteUrl("meetdoc.site");
$store->setCancelUrl("meetdoc.cancel");
$store->setCallbackUrl("meetdoc.callback");
$store->setReturnUrl("meetdoc.return");
