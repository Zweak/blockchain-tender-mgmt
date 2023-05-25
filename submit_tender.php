<?php 

	session_start();



	require "blockchain/blockchain.php";

	$jsondata = new Block_chain;



	$post = $_POST;

	if($post['action'] == "add")
	{
		$docs = "";
		if($_FILES['file']['name'] != "") {
			$docs = "assets/".$_FILES['file']['name'];
  			move_uploaded_file($_FILES['file']['tmp_name'], $file);
		}
		$post['docs'] = $docs;
		$post['apply_list'] = json_encode(array());
		$post['bid_received'] = 0;
		$post['created_at'] = date("Y-m-d H:i:s");
		$post['updated_at'] = date("Y-m-d H:i:s");
		$response = $jsondata->add_data('json/tender.json',$post);
	} else {
		$photos = [];
		$docs = $post["old_docs"];
		if($_FILES['file']['name'] != "") {
			$docs = "assets/".$_FILES['file']['name'];
  			move_uploaded_file($_FILES['file']['tmp_name'], $file);
		}
		$tender = $jsondata->read_data('json/tender.json');

		if($tender)

		{

			$flag = 1;

			foreach($tender as $key => $val)
			{
				if($val->id == $post['id'])
				{
					$val->name = $post['name'];
					$val->town = $post['town'];
					$val->beneficiary_name = $post['beneficiary_name'];
					$val->beneficiary_email = $post['beneficiary_email'];
					$val->beneficiary_fax_id = $post['beneficiary_fax_id'];
					$val->tender_notice = $post['tender_notice'];
					$val->open_date = $post['open_date'];
					$val->close_date = $post['close_date'];
					$val->estimated_cost = $post['estimated_cost'];
					$val->period = $post['period'];
					$val->status = $post['status'];
					$val->apply_list = $val->apply_list;
					$val->bid_received = $val->bid_received;
					$val->descripttion = $post['descripttion'];
					$val->ptype = $post['ptype'];
					$val->docs = $docs;
					$val->photos = empty($photos) ? "" : json_encode($photos);
					$val->created_at = $val->created_at;
					$val->updated_at = date('Y-m-d H:i:s');
				}

			}

			$jsondata->update_data('json/tender.json',$tender);

		}

	}

	header("Location: tenders.php");	

