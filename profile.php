<?php 

	session_start();

	require 'constants.php';

	require "blockchain/blockchain.php";



	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))

	{



		$userid = 0;

		if(isset($_SESSION['userdata']->id))

			$userid = $_SESSION['userdata']->id;



		$jsondata = new Block_chain;

		$userdata = $jsondata->read_row_data('json/user.json',$userid);		



		require "include/header.php";

?>

		<main class="app-content">

			<div class="app-title">

				<div>

					<h1><i class="fa fa-user"></i> Profile</h1>

					<p></p>

				</div>

				<ul class="app-breadcrumb breadcrumb side">

					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

					<li class="breadcrumb-item">Profile</li>

				</ul>

			</div>

			<div class="row">

				<div class="col-md-12">

					<form action="submit_profile.php" method="post" id="profileForm">

						<input type="hidden" class="form-control" id="company_id" name="company_id" value="<?php echo $userdata->id; ?>" />

						<div class="tile">

							<div class="row">

								<div class="col-lg-12">

									<div class="row">

										<div class="col-lg-6">

											<div class="form-group">

												<label for="exampleInputEmail1">Company Name</label>

												<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?php echo $userdata->name; ?>" />

											</div>

										</div>

										<div class="col-lg-3">

											<div class="form-group">

												<label for="exampleInputEmail1">Company Email</label>

												<input type="text" class="form-control" id="company_email" name="company_email" placeholder="Enter company email" value="<?php echo $userdata->email; ?>" />

											</div>

										</div>

										<div class="col-lg-3">

											<div class="form-group">

												<label for="exampleInputEmail1">Company Phone</label>

												<input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="Enter company phone" value="<?php echo $userdata->phone; ?>" />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-6">

											<div class="form-group">

												<label for="exampleInputEmail1">Company Country</label>

												<input type="text" class="form-control" id="company_country" name="company_country" placeholder="Enter company country" value="<?php echo $userdata->country; ?>" />

											</div>

										</div>

										<div class="col-lg-3">

											<div class="form-group">

												<label for="exampleInputEmail1">Company State</label>

												<input type="text" class="form-control" id="company_state" name="company_state" placeholder="Enter company state" value="<?php echo $userdata->state; ?>" />

											</div>

										</div>

										<div class="col-lg-3">

											<div class="form-group">

												<label for="exampleInputEmail1">Company City</label>

												<input type="text" class="form-control" id="company_city" name="company_city" placeholder="Enter company city" value="<?php echo $userdata->city; ?>" />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-9">

											<div class="form-group">

												<label for="exampleInputEmail1">Company Address</label>

												<input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter company address" value="<?php echo $userdata->address; ?>" />

											</div>

										</div>

										<div class="col-lg-3">

											<div class="form-group">

												<label for="exampleInputEmail1">Year of Experience</label>

												<input type="text" class="form-control" id="year" name="year" placeholder="Enter Year of experience" value="<?php echo isset($userdata->year) ? $userdata->year : ''; ?>" />

											</div>

										</div>

									</div>

								</div>

							</div>						

							<div class="tile-footer">

								<button class="btn btn-warning" type="submit">Save</button>

				            </div>

						</div>

					</form>

				</div>

			</div>

		</main>

<?php

		require "include/footer.php";

	} else {

		header("Location: login.php");

	}