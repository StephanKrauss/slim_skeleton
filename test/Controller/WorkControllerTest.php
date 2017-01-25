<?php
	/**
	 * Kurzbeschreibung
	 * Ausführliche Beschreibung
	 * der Klasse
	 *
	 * @author User
	 * @date 25.01.2017
	 * @time 10:29
	 * @package front | admin | plugin | data | tabelle | tool
	 * @subpackage controller | model | filter | validate
	 */

	namespace App\Controller;

	class WorkControllerTest extends \PHPUnit_Framework_TestCase
	{
		/** @var  \App\Controller\WorkController */
		protected $class;

		public function setUp()
		{
			$container=new \Slim\Container();
			$container[\App\Model\Part1::class] = true;

			$this->class=new \App\Controller\WorkController($container);
		}

		public function testSluggifyReturnsSluggifiedString()
		{
			$originalString='This string will be sluggified';
			$expectedResult='this-string-will-be-sluggified';

			$result = $this->class->sluggify($originalString);

			$this->assertEquals($expectedResult, $result);
		}

		public function testSluggifyReturnsExpectedForStringsContainingNumbers()
		{
			$originalString='This1 string2 will3 be 44 sluggified10';
			$expectedResult='this1-string2-will3-be-44-sluggified10';

			$result = $this->class->sluggify($originalString);

			$this->assertEquals($expectedResult, $result);
		}

		public function testSluggifyReturnsExpectedForStringsContainingSpecialCharacters()
		{
			$originalString='This! @string#$ %$will ()be "sluggified';
			$expectedResult='this-string-will-be-sluggified';

			$result = $this->class->sluggify($originalString);

			$this->assertEquals($expectedResult, $result);
		}

		public function testSluggifyReturnsExpectedForStringsContainingNonEnglishCharacters()
		{
			$originalString="Tänk efter nu – förr'n vi föser dig bort";
			$expectedResult='tank-efter-nu-forrn-vi-foser-dig-bort';

			$result = $this->class->sluggify($originalString);

			$this->assertEquals($expectedResult, $result);
		}

		public function testSluggifyReturnsExpectedForEmptyStrings()
		{
			$originalString='';
			$expectedResult='';

			$this->expectException(WorkControllerException::class);
			$result = $this->class->sluggify($originalString);

			// $this->assertEquals($expectedResult, $result);
		}

	}
