--TEST--
ReflectionClass::getMethod()
--CREDITS--
Robin Fernandes <robinf@php.net>
Steve Seear <stevseea@php.net>
--SKIPIF--
skip
<?php
// Skipping this as too slow currently :(
// see https://github.com/Roave/BetterReflection/issues/146
--FILE--
<?php require 'vendor/autoload.php';
class pubf {
	public function f() {}
	static public function s() {}	
}
class subpubf extends pubf {
}

class protf {
	protected function f() {}
	static protected function s() {}	
}
class subprotf extends protf {
}

class privf {
	private function f() {}
	static private function s() {}
}
class subprivf extends privf  {
}

$classes = array("pubf", "subpubf", "protf", "subprotf", 
				 "privf", "subprivf");
foreach($classes as $class) {
	echo "Reflecting on class $class: \n";
	$rc = \BetterReflection\Reflection\ReflectionClass::createFromName($class);
	echo "  --> Check for f(): ";
	// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->getMethod("f"));
	echo "  --> Check for s(): ";
	// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->getMethod("s"));
	echo "  --> Check for F(): ";
	// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->getMethod("F"));
	echo "  --> Check for doesntExist(): ";
	try {
		// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->getMethod("doesntExist"));
	} catch (Exception $e) {
		echo $e->getMessage() . "\n"; 
	}
}
?>
--EXPECTF--
Reflecting on class pubf: 
  --> Check for f(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(4) "pubf"
}
  --> Check for s(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "s"
  [%u|b%"class"]=>
  %unicode|string%(4) "pubf"
}
  --> Check for F(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(4) "pubf"
}
  --> Check for doesntExist(): Method doesntExist does not exist
Reflecting on class subpubf: 
  --> Check for f(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(4) "pubf"
}
  --> Check for s(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "s"
  [%u|b%"class"]=>
  %unicode|string%(4) "pubf"
}
  --> Check for F(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(4) "pubf"
}
  --> Check for doesntExist(): Method doesntExist does not exist
Reflecting on class protf: 
  --> Check for f(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "protf"
}
  --> Check for s(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "s"
  [%u|b%"class"]=>
  %unicode|string%(5) "protf"
}
  --> Check for F(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "protf"
}
  --> Check for doesntExist(): Method doesntExist does not exist
Reflecting on class subprotf: 
  --> Check for f(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "protf"
}
  --> Check for s(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "s"
  [%u|b%"class"]=>
  %unicode|string%(5) "protf"
}
  --> Check for F(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "protf"
}
  --> Check for doesntExist(): Method doesntExist does not exist
Reflecting on class privf: 
  --> Check for f(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "privf"
}
  --> Check for s(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "s"
  [%u|b%"class"]=>
  %unicode|string%(5) "privf"
}
  --> Check for F(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "privf"
}
  --> Check for doesntExist(): Method doesntExist does not exist
Reflecting on class subprivf: 
  --> Check for f(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "privf"
}
  --> Check for s(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "s"
  [%u|b%"class"]=>
  %unicode|string%(5) "privf"
}
  --> Check for F(): object(ReflectionMethod)#%d (2) {
  [%u|b%"name"]=>
  %unicode|string%(1) "f"
  [%u|b%"class"]=>
  %unicode|string%(5) "privf"
}
  --> Check for doesntExist(): Method doesntExist does not exist
