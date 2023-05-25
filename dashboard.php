<?php 
	session_start();
	require "blockchain/blockchain.php";

	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))
	{
		require 'constants.php';
		require "include/header.php";
?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h1><i class="fa fa-dashboard"></i> Tenders</h1>
					<p></p>
				</div>
				<ul class="app-breadcrumb breadcrumb side">
					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					<li class="breadcrumb-item">Tenders</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered" id="sampleTable">
									<thead>
										<tr>
											<th width="10%"><small><b>Project No</b></small></th>
											<th width="25%"><small><b>Project Name</b></small></th>
											<th width="15%"><small><b>Project Estimate Cost</b></small></th>
											<th width="15%"><small><b>Opening Tender Date</b></small></th>
											<th width="15%"><small><b>Tender Notice Date</b></small></th>
											<th width="15%"><small><b>BID Received</b></small></th>
											<th width="10%"><small><b>Action</b></small></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
<?php
		require "include/footer.php";
	} else {
		header("Location: login.php");
	}