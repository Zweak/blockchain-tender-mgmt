<?php 

	session_start();

	require 'constants.php';

	require "blockchain/blockchain.php";



	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))

	{

		$get = $_GET;

		$is_apply = 1;

		$is_accept = 0;
		$is_other_accept = 0;

		if(isset($get['tid']))

		{

			$jsondata = new Block_chain;

			$tender = $jsondata->read_row_data('json/tender.json',$get['tid']);		

			if($tender)

			{

				$appliers = json_decode($tender->apply_list);

				if($appliers)

				{

					foreach($appliers as $applier)

					{

						if($applier->id == $_SESSION['userdata']->id)

							$is_apply = 0;



						if($applier->id == $_SESSION['userdata']->id && $applier->is_accept == 1)

							$is_accept = 1;

						if($applier->id != $_SESSION['userdata']->id && $applier->is_accept == 1)

							$is_other_accept = 1;

					}

				}

			}

		}



		require "include/header.php";

?>

		<main class="app-content">

			<div class="app-title">

				<div>

					<h1><i class="fa fa-user"></i> Tender</h1>

					<p></p>

				</div>

				<ul class="app-breadcrumb breadcrumb side">

					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

					<li class="breadcrumb-item">Tender</li>

				</ul>

			</div>

			<div class="row">

				<div class="col-md-12">

					<form action="apply_tender.php" method="post" id="tenderForm" enctype="multipart/form-data">

						<input type="hidden" name="action" value="<?php echo isset($tender->id) ? "edit" : "add"; ?>" />

						<input type="hidden" name="id" value="<?php echo isset($tender->id) ? $tender->id : time(); ?>" />



						<div class="tile">

							<h4>Project Number: <?php echo isset($tender->id) ? $tender->id : time(); ?></h4><hr>

							<div class="row">

								<div class="col-lg-12">

									<div class="row">

										<div class="col-lg-12">

											<div class="form-group">

												<label for="exampleInputEmail1">Project Name</label>

												<input type="text" class="form-control" id="name" name="name" placeholder="Enter project name" value="<?php echo isset($tender->name) ? $tender->name : ''; ?>" disabled />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Town/Country</label>

												<input type="text" class="form-control" id="town" name="town" placeholder="Enter town/country" value="<?php echo isset($tender->town) ? $tender->town : ''; ?>" disabled />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Estimated Cost</label>

												<input type="text" class="form-control" id="estimated_cost" name="estimated_cost" placeholder="Enter Project Estimated Cost" value="<?php echo isset($tender->estimated_cost) ? $tender->estimated_cost : ''; ?>" disabled />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Implementation Period</label>

												<input type="text" class="form-control" id="period" name="period" placeholder="Enter Implementation Period" value="<?php echo isset($tender->period) ? $tender->period : ''; ?>" disabled />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Beneficiary Name</label>

												<input type="text" class="form-control" id="beneficiary_name" name="beneficiary_name" placeholder="Enter Beneficiary Name" value="<?php echo isset($tender->beneficiary_name) ? $tender->beneficiary_name : ''; ?>" disabled />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Beneficiary Email</label>

												<input type="text" class="form-control" id="beneficiary_email" name="beneficiary_email" placeholder="Enter Beneficiary Email" value="<?php echo isset($tender->beneficiary_email) ? $tender->beneficiary_email : ''; ?>" disabled />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Beneficiary Fax ID</label>

												<input type="text" class="form-control" id="beneficiary_fax_id" name="beneficiary_fax_id" placeholder="Enter Beneficiary Fax ID" value="<?php echo isset($tender->beneficiary_fax_id) ? $tender->beneficiary_fax_id : ''; ?>" disabled />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Date of Tender Notice</label>

												<input type="date" class="form-control" id="tender_notice" name="tender_notice" value="<?php echo isset($tender->tender_notice) ? $tender->tender_notice : ''; ?>" disabled />

											</div>

										</div>

										<div class="col-lg-2">

											<div class="form-group">

												<label for="exampleInputEmail1">Opening Tender Date</label>

												<input type="date" class="form-control" id="open_date" name="open_date" value="<?php echo isset($tender->open_date) ? $tender->open_date : ''; ?>" disabled />

											</div>

										</div>

										<div class="col-lg-2">

											<div class="form-group">

												<label for="exampleInputEmail1">Closing Tender Date</label>

												<input type="date" class="form-control" id="close_date" name="close_date" value="<?php echo isset($tender->close_date) ? $tender->close_date : ''; ?>" disabled />

											</div>

										</div>
										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Type</label>

												<input type="text" class="form-control" id="ptype" name="ptype" value="<?php echo isset($tender->ptype) ? $tender->ptype : ''; ?>" disabled />

											</div>

										</div>
										<div class="col-lg-12">

											<div class="form-group">

												<label for="exampleInputEmail1">Description</label>

												<textarea class="form-control" id="description" name="description" disabled><?php echo isset($tender->descripttion) ? $tender->descripttion : ''; ?></textarea>

											</div>

										</div>
										<div class="col-lg-12">

											<div class="form-group">

												<label for="exampleInputEmail1">Your amount</label>

												<input type="number" class="form-control" id="your_amount" name="your_amount" required />

											</div>

										</div>

										<div class="col-lg-12">

											<div class="form-group">

												<label for="exampleInputEmail1">No. of Successfully Implemented Project</label>

												<input type="number" class="form-control" id="no_project" name="no_project" min="0" required />

											</div>

										</div>

										<div class="col-lg-12">

											<div class="form-group">

												<label for="exampleInputEmail1">Files</label>

												<input type="file" class="form-control" id="file" name="file" required />

											</div>

										</div>

									</div>

								</div>

							</div>					

							<div class="tile-footer">

							<?php

								if($tender->status == 1 && strtotime(date('Y-m-d')) >= strtotime(date($tender->open_date)) && strtotime(date('Y-m-d')) <= strtotime(date($tender->close_date)) && $is_apply == 1) {

									if($_SESSION['userdata']->country == "")

									{

							?>

										<a class="btn btn-warning" href="profile.php">Apply</a>

							<?php

									} else {

							?>

										<button class="btn btn-warning" type="submit">Save</button>

							<?php

									}

									echo '<a href="all_tenders.php" class="btn btn-danger">Back</a>';

								} else {

									if($is_accept == 0)

									{
										if($is_other_accept == 1) {
											echo '<p class="alert alert-warning">This tender to allocated to someone. <a href="all_tenders.php">Go Back</a></p>';
										} else {
											echo '<p class="alert alert-warning">You already applied for this tender. Please wait for confirmation. <a href="all_tenders.php">Go Back</a></p>';
										}

									} else {

										echo '<p class="alert alert-success">Congratulations, This tender is allocated to you.</p>';

									}

								}

							?>

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