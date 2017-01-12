<?php

	include_once('../vendor/autoload.php');

	$test = 123;

	$logger = new \Monolog\Logger("log");
	$logger->pushHandler(new \Monolog\Handler\ErrorLogHandler());

	$logger->addInfo("Something happened");

	$test = 123;