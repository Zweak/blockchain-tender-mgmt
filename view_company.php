<?php 
	session_start();
	require 'constants.php';
	require "blockchain/blockchain.php";

	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))
	{
		$jsondata = new Block_chain;
		$userinfo = $jsondata->read_row_data('json/user.json',$_GET['company_id']);
		$works = $jsondata->read_data('json/works.json');		

		require "include/header.php";
?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h1><i class="fa fa-user"></i> Company</h1>
					<p></p>
				</div>
				<ul class="app-breadcrumb breadcrumb side">
					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					<li class="breadcrumb-item">Company</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-8">
					<form action="submit_profile.php" method="post" id="profileForm">
						<input type="hidden" class="form-control" id="company_id" name="company_id" value="<?php echo $userdata->id; ?>" />
						<div class="tile">
							<div class="row">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Company Name</label>
												<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?php echo $userinfo->name; ?>" disabled="true" />
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Company Email</label>
												<input type="text" class="form-control" id="company_email" name="company_email" placeholder="Enter company email" value="<?php echo $userinfo->email; ?>" disabled="true" />
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Company Phone</label>
												<input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="Enter company phone" value="<?php echo $userinfo->phone; ?>" disabled="true" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group">
												<label for="exampleInputEmail1">Company Country</label>
												<input type="text" class="form-control" id="company_country" name="company_country" placeholder="Enter company country" value="<?php echo $userinfo->country; ?>" disabled="true" />
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="exampleInputEmail1">Company State</label>
												<input type="text" class="form-control" id="company_state" name="company_state" placeholder="Enter company state" value="<?php echo $userinfo->state; ?>" disabled="true" />
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="exampleInputEmail1">Company City</label>
												<input type="text" class="form-control" id="company_city" name="company_city" placeholder="Enter company city" value="<?php echo $userinfo->city; ?>" disabled="true" />
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="exampleInputEmail1">Year of Experience</label>
												<input type="text" class="form-control" id="year" name="year" placeholder="Enter Year of experience" value="<?php echo isset($userinfo->year) ? $userinfo->year : ''; ?>" disabled="true" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Company Address</label>
												<input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter company address" value="<?php echo $userinfo->address; ?>" disabled="true" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<div class="tile">
						<div class="tile-header"><h3>Past Works</h3><hr></div>
						<div class="table-responsive">
							<table class="table table-default table-bordered">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="90%">Name</th>
										<th width="5%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if($works)
										{
											foreach($works as $key => $val)
											{
												if($val->document_addedBy == $_GET['company_id'])
												{
									?>
													<tr>
														<td><?php echo $key+1; ?></td>
														<td><?php echo $val->document_name; ?></td>
														<td>
															<a href="assets/uploads/<?php echo $val->document_file; ?>" download><i class="fa fa-download"></i></a>
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
		</main>
<?php
		require "include/footer.php";
	} else {
		header("Location: login.php");
	}