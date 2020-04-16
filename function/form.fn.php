<?php 

function checkChecked($value,$field){
	if(isset($_POST[$field])){
		if($_POST[$field]==$value){
			return "checked";
		}
	}

	return "";
}
function checkSelected($value,$field){
	if(isset($_POST[$field])){
		if($_POST[$field]==$value){
			return "selected";
		}
	}

	return "";
}