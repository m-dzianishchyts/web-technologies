<?php
// Function filters values which are integer
// and round floating-point number to precision
// of 2 digits after the decimal point.
// All other lines will be formatted to uppercase. 
function filter($values) {
	$result = [];
	foreach ($values as $value) {
		$trimmed_value = trim($value);
		if (ctype_digit($trimmed_value)) {
			continue;
		}
		if (is_numeric($trimmed_value)) {
			$result[] = round(floatval($trimmed_value), 2);
			continue;
		}
		$result[] = strtoupper($trimmed_value);
	}
	return $result;
}
?>