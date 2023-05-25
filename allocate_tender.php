<?php 
	session_start();
	require 'constants.php';
	require "blockchain/blockchain.php";

	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))
	{
		$get = $_GET;
		if(isset($get['tid']))
		{
			$jsondata = new Block_chain;
			$tenders = $jsondata->read_data('json/tender.json');

			if($tenders)
			{
				foreach($tenders as $key => $val)
				{
					if($val->id == $get['tid'])
					{
						$appliers = json_decode($val->apply_list,true);
						if($appliers)
						{
							$userArr = [];
							foreach($appliers as $k => $v)
							{
								$userArr[$v['id']] = $v['year'];
							}
							$max_key = array_keys($userArr, max($userArr));
							foreach($appliers as $k => $v)
							{
								if($v['id'] == $max_key[0])
									$appliers[$k]['is_accept'] = 1;
							}
							$tenders[$key]->apply_list = json_encode($appliers);
						}
					}
				}	
			}
			$jsondata->update_data('json/tender.json',$tenders);
		}
	}
	header("Location: view_requests.php?tid=".$get['tid']);