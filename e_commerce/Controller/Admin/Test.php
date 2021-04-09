<?php
namespace Controller\Admin;

class Test extends \Controller\Core\Admin {
	protected $a = [] ;
	public function lcmAction()
	{
		$number = 20;
		$factor = 2;
		while ($number != 1) {
			
			if(!($number % $factor) == 0)
			{
				$factor +=1; 
				continue;
			}
			$reminder = $number%$factor;
			$number = $number/$factor;
			array_push($this->a, $factor);
		}
		print_r($this->a);
	}

public function testAction()
{
	
}
}
// PHP program to implement division
// with large number

// A function to perform division of
// large numbers
function longDivision($number, $divisor)
{
	// As result can be very large
	// store it in string
	$ans = "";
	
	// Find prefix of number that is
	// larger than divisor.
	$idx = 0;
	$temp = ord($number[$idx]) - 48;
	while ($temp < $divisor)
		$temp = $temp * 10 +
			ord($number[++$idx]) - 48;
	
	// Repeatedly divide divisor with temp.
	// After every division, update temp to
	// include one more digit.
	++$idx;
	while (strlen($number) > $idx)
	{
		// Store result in answer i.e. temp / divisor
		$ans .= chr((int)($temp / $divisor) + 48);
		
		// Take next digit of number
		$temp = ($temp % $divisor) * 10 +
			ord($number[$idx]) - 48;
		++$idx;
	}
	$ans .= chr((int)($temp / $divisor) + 48);
	
	// If divisor is greater than number
	if (strlen($ans) == 0)
		return "0";
	
	// else return ans
	return $ans;
}

// Driver Code
$number = "456";
$divisor = 21;
print(longDivision($number, $divisor));

// This code is contributed by mits
?>
