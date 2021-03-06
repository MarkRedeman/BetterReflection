--TEST--
ReflectionObject::IsInstantiable() - invalid params
--FILE--
<?php require 'vendor/autoload.php';
class privateCtorOld {
	private function privateCtorOld() {}
	public static function reflectionObjectFactory() {
		return \BetterReflection\Reflection\ReflectionObject::createFromInstance(new self);
	}	
}
$reflectionObject =  privateCtorOld::reflectionObjectFactory();

// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($reflectionObject->IsInstantiable('X'));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($reflectionObject->IsInstantiable(0, null));

?>
--EXPECTF--
Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP; privateCtorOld has a deprecated constructor in %s on line %d

Warning: ReflectionClass::isInstantiable() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionClass::isInstantiable() expects exactly 0 parameters, 2 given in %s on line %d
NULL
