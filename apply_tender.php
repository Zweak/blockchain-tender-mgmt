<?php 

	session_start();

	require 'constants.php';

	require "blockchain/blockchain.php";



	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))
	{
		$get = $_POST;
		
  		$file = "assets/".$_FILES['file']['name'];
  		move_uploaded_file($_FILES['file']['tmp_name'], $file);
  			
		if(isset($get['id']))
		{
			$jsondata = new Block_chain;
			$tenders = $jsondata->read_data('json/tender.json');
			if($tenders)
			{
				foreach($tenders as $key => $val)
				{
					if($val->id == $get['id'])
					{
						$appliers = json_decode($val->apply_list,true);
						if($appliers)
						{
							$userdata = $jsondata->read_row_data('json/user.json',$_SESSION['userdata']->id);
							$userdata->is_accept = 0;
							$userdata->file = $file;
							$userdata->amount = $_POST['your_amount'];
							$userdata->no_project = $_POST['no_project'];
							array_push($appliers,$userdata);
							$tenders[$key]->apply_list = json_encode($appliers);
						} else {
							$userdata = $jsondata->read_row_data('json/user.json',$_SESSION['userdata']->id);				
							$userdata->is_accept = 0;
							$userdata->file = $file;
							$userdata->amount = $_POST['your_amount'];
							$userdata->no_project = $_POST['no_project'];
							$tenders[$key]->apply_list = json_encode(array($userdata));
						}
					}
				}	
			}
			$jsondata->update_data('json/tender.json',$tenders);
		}
	}
	header("Location: view_tender.php?tid=".$get['id']);