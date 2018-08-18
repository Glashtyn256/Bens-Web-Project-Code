<?php
function safeInt($int){
	return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
}
function safeString($str){
	return filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
}
function safeFloat($float){
return filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
}

function safeEmail($email){
return filter_var($email, FILTER_SANITIZE_EMAIL);
}

function validEmail($email){
return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validFloat($float){
return filter_var($float, FILTER_VALIDATE_FLOAT);
}

function ValidInt($int){
	return filter_var($int, FILTER_VALIDATE_INT);
}
?>


