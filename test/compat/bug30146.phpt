--TEST--
Reflection Bug #30146 (ReflectionProperty->getValue() requires instance for static property)
--FILE--
<?php require 'vendor/autoload.php';
class test {
  static public $a = 1;
}

$r = \BetterReflection\Reflection\ReflectionProperty::createFromName('test', 'a');
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($r->getValue(null));

$r->setValue(NULL, 2);
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($r->getValue());

$r->setValue(3);
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($r->getValue());
?>
===DONE===
--EXPECT--
int(1)
int(2)
int(3)
===DONE===
