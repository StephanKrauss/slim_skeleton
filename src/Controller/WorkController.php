<?php

	namespace App\Controller;

	class WorkController
	{
		protected $container;
		protected $startParams = [];

		public function __construct(\Slim\Container $container, array $startParams)
		{
			$this->container=$container;
			$this->startParams = $startParams;
		}

		public function part1Action()
		{
			$modelPart1=new $this->container[\App\Model\Part1::class];

			$test=123;

		}

		/**
		 * Test eines Service
		 *
		 * @return array
		 * @throws \Exception
		 */
		public function serviceAction()
		{
			try{
				/** @var $servicePersonalData \App\Service\servicePersonalData */
				$servicePersonalData = $this->container[\App\Service\servicePersonalData::class];
				$personalData = $servicePersonalData->setStartParams($this->startParams)->getPersonalData();

				return $personalData;
			}
			catch(Exception $e){
				throw $e;
			}

		}

		public function templateAction()
		{
			try{
				// Start Transaktion

				$view=$this->container['view'];

				$test=123;

				// Service Person
				$person=[
					'name'=>'Krauss',
					'firstName'=>'Stephan'
				];

				// Commit

				// Montagepunkt
				$result=[];

				$result['person']=$person;

				return $result;
			} catch(Exception $e){
				// Rollback
				throw $e;
			}
		}

		public function sluggify($string, $separator='-', $maxLength=96)
		{
			if(empty($string)){
				throw new WorkControllerException('missing string', 3);
			}

			$title=iconv('UTF-8', 'ASCII//TRANSLIT', $string);
			$title=preg_replace("%[^-/+|\w ]%", '', $title);
			$title=strtolower(trim(substr($title, 0, $maxLength), '-'));
			$title=preg_replace("/[\/_|+ -]+/", $separator, $title);

			return $title;
		}

	} // end class
