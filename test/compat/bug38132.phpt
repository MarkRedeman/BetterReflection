--TEST--
Reflection Bug #38132 (ReflectionClass::getStaticProperties() retains \0 in key names)
--FILE--
<?php require 'vendor/autoload.php';
class foo {
	static protected $bar = 'baz';
	static public $a = 'a';
}

$class = \BetterReflection\Reflection\ReflectionClass::createFromName('foo');
$properties = $class->getStaticProperties();
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($properties, array_keys($properties));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump(isset($properties['*bar']));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump(isset($properties["\0*\0bar"]));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump(isset($properties["bar"]));
?>
--EXPECT--
array(2) {
  ["bar"]=>
  string(3) "baz"
  ["a"]=>
  string(1) "a"
}
array(2) {
  [0]=>
  string(3) "bar"
  [1]=>
  string(1) "a"
}
bool(false)
bool(false)
bool(true)
