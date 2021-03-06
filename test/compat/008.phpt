--TEST--
ReflectionMethod::__construct() tests
--FILE--
<?php require 'vendor/autoload.php';

$a = array("", 1, "::", "a::", "::b", "a::b");

foreach ($a as $val) {
	try {
		new \BetterReflection\Reflection\ReflectionMethod($val);
	} catch (Exception $e) {
		// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
	}
}
 
$a = array("", 1, "");
$b = array("", "", 1);
 
foreach ($a as $key=>$val) {
	try {
		new \BetterReflection\Reflection\ReflectionMethod($val, $b[$key]);
	} catch (Exception $e) {
		// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
	}
}

echo "Done\n";
?>
--EXPECTF--	
string(20) "Invalid method name "
string(21) "Invalid method name 1"
string(21) "Class  does not exist"
string(22) "Class a does not exist"
string(21) "Class  does not exist"
string(22) "Class a does not exist"
string(21) "Class  does not exist"
string(66) "The parameter class is expected to be either a string or an object"
string(21) "Class  does not exist"
Done
