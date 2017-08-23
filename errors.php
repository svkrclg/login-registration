<?php
function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		echo $error, ', ';
	}
}
?>