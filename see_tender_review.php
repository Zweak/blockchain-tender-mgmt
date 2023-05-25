<?php 

	session_start();

	require "blockchain/blockchain.php";



	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))

	{

		$jsondata = new Block_chain;

		$reviews = $jsondata->read_data('json/tender_review.json');
		$users = $jsondata->read_data('json/user.json');



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

											<th width="5%"><small><b>No</b></small></th>
											<th width="15%"><small><b>Rate</b></small></th>
											<th width="65%"><small><b>Comment</b></small></th>
											<th width="15%"><small><b>Given By</b></small></th>

										</tr>

									</thead>

									<tbody>

										<?php 

											if($reviews)

											{

												foreach($reviews as $key => $val)

												{
													if($val->tender_id == $_GET['tid']) {
										?>

														<tr>

															<td><?php echo $key+1; ?></td>
															<td>
																<?php 
																	for($i = 1; $i <= 5; $i ++) {
																		if($i <= $val->rate)
																			echo "<i class='fa fa-star'></i>&nbsp;";
																		else 
																			echo "<i class='fa fa-star-o'></i>&nbsp;";
																	}
																?>
															</td>
															<td><?php echo $val->comment; ?></td>
															<td>
																<?php 
																	$name = "";
																	if($users) {
																		foreach($users as $user) {
																			if($user->id == $val->created_by)
																				$name = $user->name;
																		}
																	}
																	echo $name;
																?>
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