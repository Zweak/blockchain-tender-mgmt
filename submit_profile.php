<?php 
	session_start();

	require "blockchain/blockchain.php";

	$post = $_POST;
	$jsondata = new Block_chain;
	$response = $jsondata->read_data('json/user.json');
	if($response)
	{
		$flag = 1;
		foreach($response as $key => $val)
		{
			if($val->id == $post['company_id'])
			{
				$val->name = $post['company_name'];
				$val->email = $post['company_email'];
				$val->phone = $post['company_phone'];
				$val->country = $post['company_country'];
				$val->state = $post['company_state'];
				$val->city = $post['company_city'];
				$val->address = $post['company_address'];
				$val->year = $post['year'];
				$val->role = $_SESSION['userdata']->role;
				$val->created_at = $_SESSION['userdata']->created_at;
				$val->updated_at = date('Y-m-d H:i:s');
				$_SESSION['userdata'] = $val;
			}
		}
		$jsondata->update_data('json/user.json',$response);
	}
	header("Location: profile.php");
