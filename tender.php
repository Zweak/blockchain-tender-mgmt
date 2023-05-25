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

			$tender = $jsondata->read_row_data('json/tender.json',$get['tid']);		

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

					<form action="submit_tender.php" method="post" id="tenderForm" enctype="multipart/form-data">

						<input type="hidden" name="action" value="<?php echo isset($tender->id) ? "edit" : "add"; ?>" />

						<input type="hidden" name="id" value="<?php echo isset($tender->id) ? $tender->id : time(); ?>" />
						<input type="hidden" name="old_docs" value="<?php echo isset($tender->docs) ? $tender->docs : ""; ?>" />



						<div class="tile">

							<h4>Project Number: <?php echo isset($tender->id) ? $tender->id : time(); ?></h4><hr>

							<div class="row">

								<div class="col-lg-12">

									<div class="row">

										<div class="col-lg-8">

											<div class="form-group">

												<label for="exampleInputEmail1">Project Name</label>

												<input type="text" class="form-control" id="name" name="name" placeholder="Enter project name" value="<?php echo isset($tender->name) ? $tender->name : ''; ?>" />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Town/Country</label>

												<input type="text" class="form-control" id="town" name="town" placeholder="Enter town/country" value="<?php echo isset($tender->town) ? $tender->town : ''; ?>" />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Beneficiary Name</label>

												<input type="text" class="form-control" id="beneficiary_name" name="beneficiary_name" placeholder="Enter Beneficiary Name" value="<?php echo isset($tender->beneficiary_name) ? $tender->beneficiary_name : ''; ?>" />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Beneficiary Email</label>

												<input type="text" class="form-control" id="beneficiary_email" name="beneficiary_email" placeholder="Enter Beneficiary Email" value="<?php echo isset($tender->beneficiary_email) ? $tender->beneficiary_email : ''; ?>" />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Beneficiary Fax ID</label>

												<input type="text" class="form-control" id="beneficiary_fax_id" name="beneficiary_fax_id" placeholder="Enter Beneficiary Fax ID" value="<?php echo isset($tender->beneficiary_fax_id) ? $tender->beneficiary_fax_id : ''; ?>" />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Date of Tender Notice</label>

												<input type="date" class="form-control" id="tender_notice" name="tender_notice" value="<?php echo isset($tender->tender_notice) ? $tender->tender_notice : ''; ?>" />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Date of Opening tenders</label>

												<input type="date" class="form-control" id="open_date" name="open_date" value="<?php echo isset($tender->open_date) ? $tender->open_date : ''; ?>" />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Date of Closing tenders</label>

												<input type="date" class="form-control" id="close_date" name="close_date" value="<?php echo isset($tender->close_date) ? $tender->close_date : ''; ?>" />

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Estimated Cost</label>

												<input type="text" class="form-control" id="estimated_cost" name="estimated_cost" placeholder="Enter Project Estimated Cost" value="<?php echo isset($tender->estimated_cost) ? $tender->estimated_cost : ''; ?>" />

											</div>

										</div>

										<div class="col-lg-4">

											<div class="form-group">

												<label for="exampleInputEmail1">Implementation Period</label>

												<input type="text" class="form-control" id="period" name="period" placeholder="Enter Implementation Period" value="<?php echo isset($tender->period) ? $tender->period : ''; ?>" />

											</div>

										</div>

										<div class="col-lg-2">

											<div class="form-group">

												<label for="exampleInputEmail1">Project Status</label>

												<select class="form-control" id="status" name="status">

													<option value="1" <?php echo isset($tender->status) && $tender->status == 1 ? 'selected' : ''; ?>>Active</option>

													<option value="0" <?php echo isset($tender->period) && $tender->status == 0 ? 'selected' : ''; ?>>Inactive</option>

												</select>

											</div>

										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label for="exampleInputEmail1">Project Type</label>
												<select class="form-control" id="ptype" name="ptype">
													<option value="Constratction" <?php echo isset($tender->ptype) && $tender->ptype == "Constratction" ? 'selected' : ''; ?>>Constratction</option>
													<option value="Supply" <?php echo isset($tender->ptype) && $tender->ptype == "Supply" ? 'selected' : ''; ?>>Supply</option>
													<option value="Repairing" <?php echo isset($tender->ptype) && $tender->ptype == "Repairing" ? 'selected' : ''; ?>>Repairing</option>
												</select>
											</div>
										</div>		
									</div>
									<div class="row">

										<div class="col-lg-12">

											<div class="form-group">

												<label for="exampleInputEmail1">Description</label>

												<textarea class="form-control" id="description" name="description" placeholder="Enter Project Description"><?php echo isset($tender->descripttion) ? $tender->descripttion : ''; ?></textarea>

											</div>

										</div>
										<div class="col-lg-12">

											<div class="form-group">

												<label for="exampleInputEmail1">Files</label>

												<input type="file" class="form-control" id="file" name="file" required />
												<?php 
													if(isset($tender->docs) && $tender->docs != "") {
														echo "<img src='".$tender->docs."' />";
													}
												?>

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