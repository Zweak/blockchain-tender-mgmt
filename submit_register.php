<?php 

	session_start();



	require "blockchain/blockchain.php";
	require "blockchain/new_blockchain.php";



	$post = $_POST;

	$flag = 1;

	

	$jsondata = new Block_chain;

	$response = $jsondata->read_data('json/user.json');

	if($response)

	{

		foreach($response as $key => $val)

		{

			if($val->email == $post['company_email'])

			{

				$flag = 0;

				break;

			}

		}

	}

	if($flag == 1)

	{

		$postdata['id'] = time();

		$postdata['name'] = $post['company_name'];

		$postdata['email'] = $post['company_email'];

		$postdata['phone'] = "";

		$postdata['password'] = md5($post['company_password']);

		$postdata['role'] = "company";

		$postdata['country'] = "";

		$postdata['state'] = "";

		$postdata['city'] = "";

		$postdata['year'] = "";

		$postdata['address'] = "";

		$postdata['created_at'] = date("Y-m-d H:i:s");

		$postdata['updated_at'] = date("Y-m-d H:i:s");

		$testCoin = new BlockChain();
		$time = time();
		$testCoin->push(new Block(1, $time, json_encode($postdata)));
		$postdata['jsondata'] = isset($testCoin->chain[1]) ? json_encode($testCoin->chain[1]) : '';
		$response = $jsondata->add_data('json/user.json',$postdata);



		$_SESSION['userdata'] = $postdata;

		header("Location: index.php");	

	}

