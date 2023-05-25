<?php 
	session_start();

	require "blockchain/blockchain.php";

	$jsondata = new Block_chain;
	$tender = $jsondata->read_data('json/tender.json');
	if($tender)
	{
		$newdata = [];
		foreach($tender as $key => $val)
		{
			if($val->id != $_GET['tid'])
			{
				$tmp['id'] = $val->id;
				$tmp['name'] = $val->name;
				$tmp['town'] = $val->town;
				$tmp['beneficiary_name'] = $val->beneficiary_name;
				$tmp['beneficiary_email'] = $val->beneficiary_email;
				$tmp['beneficiary_fax_id'] = $val->beneficiary_fax_id;
				$tmp['tender_notice'] = $val->tender_notice;
				$tmp['open_date'] = $val->open_date;
				$tmp['close_date'] = $val->close_date;
				$tmp['estimated_cost'] = $val->estimated_cost;
				$tmp['period'] = $val->period;
				$tmp['status'] = $val->status;
				$tmp['apply_list'] = $val->apply_list;
				$tmp['bid_received'] = $val->bid_received;
				$tmp['created_at'] = $val->created_at;
				$tmp['updated_at'] = $val->updated_at;
				$newdata[] = $tmp;
			}
		}
	}
	$jsondata->remove_data('json/tender.json',$newdata);
	header("Location: tenders.php");
