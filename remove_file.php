<?php 
	session_start();

	require "blockchain/blockchain.php";

	$jsondata = new Block_chain;
	$workdata = $jsondata->read_data('json/works.json');
	if($workdata)
	{
		$newdata = [];
		foreach($workdata as $key => $val)
		{
			if($val->id != $_GET['file_id'])
			{
				$tmp['id'] = $val->id;
				$tmp['document_name'] = $val->document_name;
				$tmp['document_file'] = $val->document_file;
				$tmp['document_addedBy'] = $val->document_addedBy;
				$newdata[] = $tmp;
			}
		}
	}
	$jsondata->remove_data('json/works.json',$newdata);
	header("Location: works.php");
