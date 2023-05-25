<?php 
	session_start();

	require "blockchain/blockchain.php";

	$post = $_POST;
	$jsondata = new Block_chain;
	$upload_dir = 'assets/uploads/'.basename($_FILES["document_file"]["name"]);

	$postdata['id'] = time();
	$postdata['document_name'] = $post['document_name'];
	$postdata['document_file'] = $_FILES['document_file']['name'];
	$postdata['document_addedBy'] = $post['company_id'];
	move_uploaded_file($_FILES["document_file"]["tmp_name"], $upload_dir);
	$jsondata->add_data('json/works.json',$postdata);

	header("Location: works.php");
