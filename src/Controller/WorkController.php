<?php

	namespace App\Controller;

	/**
	 * Beschreibung der Klasse
	 * Ausführliche Beschreibung der Klasse
	 * Ausführliche Beschreibung der Klasse
	 * Ausführliche Beschreibung der Klasse
	 *
	 * @author User
	 * @date 12.01.2017
	 * @file WorkController.php
	 * @package front | admin | tabelle | data | tools | plugins
	 * @subpackage model | controller | filter | validator
	 */
	class WorkController
	{
		protected $container;

		public function __construct(\Slim\Container $container) {
			$this->container = $container;

			/** @var $dataModel1 \App\Model\Part1::class */
			$dataModel1 = $container[\App\Model\Part1::class];

			foreach($dataModel1->data as $key => $value){
				if($key == 'aaa'){
					$wert = 'aaa';
				}
			}
			$dataModel1->data['new1'] = 'new1';
			$dataModel1->data['new2'] = 'new2';

			$test = 123;

			// $dataModel1->data[]





			// $container[\App\Model\Part1::class]->methode1($aaa, $bbb, $ccc);

			$test = 123;
		}

		public function part1Action(){
			$modelPart1 = new $this->container[\App\Model\Part1::class];

			$test = 123;
		}

	} // end class
