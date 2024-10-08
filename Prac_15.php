<?php
function isPrime($number) { if ($number < 2) {
return false;
}

for ($i = 2; $i <= sqrt($number); $i++) { if ($number % $i == 0) {
return false;
}
}

return true;
}
echo "Enter a number: ";
$number = trim(fgets(STDIN));

if (is_numeric($number)) { if (isPrime($number)) {
echo "$number is a prime number.\n";
} else {
echo "$number is not a prime number.\n";
}
} else {
echo "Please enter a valid number.\n";
}
?>