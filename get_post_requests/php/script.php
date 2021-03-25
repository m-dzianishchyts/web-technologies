<?php 
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