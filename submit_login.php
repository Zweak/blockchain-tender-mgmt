<?php 

	session_start();



	require "blockchain/blockchain.php";



	$post = $_POST;

	$flag = 1;



	$jsondata = new Block_chain;

	$response = $jsondata->read_data('json/user.json');

	if($response)

	{

		$found = 0;

		foreach($response as $key => $val)

		{

			if($val->email == $post['company_email'] && $val->password == md5($post['company_password']))

			{

				$found = 1;

				$_SESSION['userdata'] = $val;

				break;			

			}

		}

		if($found == 1)

		{

			if($_SESSION['userdata']->role == "admin")

				header('Location: tenders.php');

			else 

				header('Location: all_tenders.php');

		} else {

			$_SESSION['error'] = "Email or password is wrong.";

			header('Location: index.php');

		}

	}

