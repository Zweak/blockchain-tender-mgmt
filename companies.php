<?php 
	session_start();
	require "blockchain/blockchain.php";

	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))
	{
		require 'constants.php';
		require "include/header.php";

		$jsondata = new Block_chain;
		$companies = $jsondata->read_data('json/user.json');
?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h1><i class="fa fa-dashboard"></i> Company List</h1>
					<p></p>
				</div>
				<ul class="app-breadcrumb breadcrumb side">
					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					<li class="breadcrumb-item">Company List</li>
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
											<th width="5%">No</th>
											<th width="15%">Company Name</th>
											<th width="40%">Company Email</th>
											<th width="25%">Location</th>
											<th width="10%">Experience</th>
											<th width="5%">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											if($companies)
											{
												foreach($companies as $key => $val)
												{
													if($val->role == 'company')
													{
										?>
														<tr>
															<td><?php echo $key+1; ?></td>
															<td><?php echo ucwords($val->name); ?></td>
															<td><?php echo $val->email; ?></td>
															<td><?php echo ucwords($val->city.", ".$val->state.", ".$val->country); ?></td>
															<td><?php echo $val->year; ?> Year(s)</td>
															<td>
																<a href="view_company.php?company_id=<?php echo $val->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye" style="margin-right: 0px;"></i></a>
															</td>
														</tr>
										<?php
													}
												}
											}
										?>
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