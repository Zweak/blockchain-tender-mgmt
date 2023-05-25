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

							<h3 id="total_tender">Total Tender : 0</h3><hr>

							<div class="table-responsive">

								<table class="table table-hover table-bordered" id="sampleTable">

									<thead>

										<tr>

											<th width="5%"><small><b>No</b></small></th>

											<th width="35%"><small><b>Project Name</b></small></th>

											<th width="10%"><small><b>Estimate Cost</b></small></th>

											<th width="10%"><small><b>Open Date</b></small></th>

											<th width="10%"><small><b>Close Date</b></small></th>

											<th width="15%"><small><b>Action</b></small></th>

										</tr>

									</thead>

									<tbody>

										<?php 

											$no = 0;

											if($tenders)

											{

												foreach($tenders as $key => $val)

												{

													$date = date('Y-m-d');

													$odate = $val->open_date;

													$cdate = $val->close_date;

													if($val->status == 1 && strtotime($date) >= strtotime(date($odate)) && strtotime($date) <= strtotime(date($cdate))) {

														$no++;

										?>

														<tr>

															<td><?php echo $key+1; ?></td>

															<td><?php echo $val->name; ?></td>

															<td>₹ <?php echo number_format($val->estimated_cost,2); ?></td>

															<td><?php echo date('d M, Y',strtotime($val->open_date)); ?></td>

															<td><?php echo date('d M, Y',strtotime($val->close_date)); ?></td>

															<td>

																<a class="btn btn-sm btn-primary text-white" href="view_tender.php?tid=<?php echo $val->id; ?>">View</a>
																<a class="btn btn-sm btn-primary text-white" href="tender_review.php?tid=<?php echo $val->id; ?>">Review</a>

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

		<script type="text/javascript">

			document.getElementById("total_tender").innerHTML = "Total Tender : <?php echo $no; ?>";

		</script>

<?php

		require "include/footer.php";

	} else {

		header("Location: login.php");

	}