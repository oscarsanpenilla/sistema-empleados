<?php

/**
* 
*/
class Employee 
{
	
	var $user;
	var $user_id;
	var $password;
	var $name;
	var $rate_hour;
	var $task;
	var $type_of_payment;
	var $payment_week;
	var $status;

	function __construct($user,$user_id,$password,$name,$rate_hour,$task,$type_of_payment,$payment_week,$status)
	{
		$this->user = $user;
		$this->user_id = $user_id;
		$this->password = $password;
		$this->name = $name;
		$this->rate_hour = $rate_hour;
		$this->type_of_payment;
		$this->status = $status;
	}
}




?>

