<?php 

	session_start();

	require "blockchain/blockchain.php";



	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))

	{

		$jsondata = new Block_chain;

		$tenders = $jsondata->read_data('json/tender.json');



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

							<a class="btn btn-sm btn-success text-white" href="tender.php">New Tender</a><hr><br>

							<div class="table-responsive">

								<table class="table table-hover table-bordered" id="sampleTable">

									<thead>

										<tr>

											<th width="5%"><small><b>No</b></small></th>

											<th width="25%"><small><b>Project Name</b></small></th>

											<th width="15%"><small><b>Estimate Cost</b></small></th>

											<th width="15%"><small><b>Open Date</b></small></th>

											<th width="15%"><small><b>Close Date</b></small></th>

											<th width="10%"><small><b>BID Received</b></small></th>

											<th width="25%"><small><b>Action</b></small></th>

										</tr>

									</thead>

									<tbody>

										<?php 

											if($tenders)

											{

												foreach($tenders as $key => $val)

												{

										?>

													<tr>

														<td><?php echo $key+1; ?></td>

														<td><?php echo $val->name; ?></td>

														<td>₹ <?php echo number_format($val->estimated_cost,2); ?></td>

														<td><?php echo date('d M, Y',strtotime($val->open_date)); ?></td>

														<td><?php echo date('d M, Y',strtotime($val->close_date)); ?></td>

														<td>

															<a href="view_requests.php?tid=<?php echo $val->id; ?>">

																<?php 

																	$appliers = json_decode($val->apply_list,true);

																	echo count($appliers);

																?>

															</a>

														</td>

														<td>
															<a class="btn btn-sm btn-warning" href="see_tender_review.php?tid=<?php echo $val->id; ?>">Review</a>
															<a class="btn btn-sm btn-warning" href="tender.php?tid=<?php echo $val->id; ?>"><i class="fa fa-pencil text-white" style="margin-right: 0px;"></i></a>

															<a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to remove this tender?')" href="remove_tender.php?tid=<?php echo $val->id; ?>"><i class="fa fa-trash text-white" style="margin-right: 0px;"></i></a>

														</td>

													</tr>

										<?php

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