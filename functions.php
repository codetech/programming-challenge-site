<?php
/*
 * Application-specific utility functions.
 */

// Parses comma-separated values into an array of strings.
// Pass a callback function to modify the array.
function csv_to_array($csv, $callback = null)
{
	if (is_null($csv) || $csv === '') {
		$ret = array();
	}
	elseif (is_array($csv)) {
		$ret = $csv;
	}
	elseif (is_string($csv)) {
		$ret = explode(',', $csv);
		if (!is_null($callback)) {
			foreach ($ret as &$value) {
				$value = $callback($value);
			}
		}
	}
	return $ret;
}

// Convert an array to a comma-separated value string.
function array_to_csv($arr)
{
	return implode(',', $arr);
}

// Format a DateTime object to a MySQL-compatible datetime string.
function datetime_to_string($datetime)
{
	return $datetime->format('Y-m-d H:i:s');
}


/*
 * Testing functions
 */

function pre_var_dump($obj)
{
	echo '<pre>';
	var_dump($obj);
	echo '</pre>';
}
