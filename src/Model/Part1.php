<?php

	namespace App\Model;

	/**
	 * Beschreibung der Klasse
	 * Ausführliche Beschreibung der Klasse
	 * Ausführliche Beschreibung der Klasse
	 * Ausführliche Beschreibung der Klasse
	 *
	 * @author User
	 * @date 12.01.2017
	 * @file Part1.php
	 * @package front | admin | tabelle | data | tools | plugins
	 * @subpackage model | controller | filter | validator
	 */
	class Part1
	{
		protected $container;


		/** @var array */
		public $data = array(
			'aaa' => 111,
			'bbb' => 'abc',
			'ccc' => array(
				'xxx' => 'xxx',
				'yyy' => 'yyy',
				'zzz' => 'zzz'
			)
		);

		public function __construct() {
			// $this->container = $container;
		}

		public function methode1($aaa){
            return $aaa;
		}

		public function methode2($bbb){
		    return $bbb;
        }

        public function methode3($ccc){
		    return $ccc;
        }

	} // end class
