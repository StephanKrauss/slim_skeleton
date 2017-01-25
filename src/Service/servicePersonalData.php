<?php

	namespace App\Service;

	class servicePersonalData
	{
		protected $startParams;
		protected $container;

		public function __construct(\Slim\Container $container)
		{
			$this->container = $container;
		}

		public function getPersonalData()
		{


			return array(
				'name' => 'Krauss',
				'vorname' => 'Stephan'
			);
		}

		/**
		 * @param array $startParams
		 *
		 * @return $this
		 */
		public function setStartParams(array $startParams){
			$this->startParams = $startParams;

			return $this;
		}

	} // end class
