<?php

	// schreiben json PimpleDumper
	use JBZoo\PimpleDumper\PimpleDumper;

	// Konfiguration
	$container['config'] = array(
		'bla' => 'bla',
		'blub' => 'blub'
	);


	// Tools

	// Model
	$container[\App\Model\Part1::class] = function($c){
		return new \App\Model\Part1();
	};

	$container[\App\Model\Part2::class] = function($c){
		return new \App\Model\Part2();
	};


	// Mapper

	// Service

	// Manually (in the end of script!)
	// $dumper = new PimpleDumper();
	// $dumper->dumpPimple($container); // Create new pimple.json
	// $dumper->dumpPhpstorm($container);