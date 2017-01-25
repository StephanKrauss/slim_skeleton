<?php

	namespace Test;

	class phpUnitTool
	{
		/**
		 * Dummy function
		 *
		 * @return int
		 */
		public function blub()
		{
			return 4;
		}

		/**
		 * Testen einer protected / private Class
		 *
		 * @param $obj
		 * @param $methodName
		 * @param array $args
		 *
		 * @return mixed
		 */
		public static function callMethod($obj, $methodName, array $args)
		{
			$class=new \ReflectionClass($obj);
			$method=$class->getMethod($methodName);
			$method->setAccessible(true);

			return $method->invokeArgs($obj, $args);
		}
	}
