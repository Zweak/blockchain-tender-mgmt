<?php 

	session_start();

	require "blockchain/blockchain.php";



	if(isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))

	{

		$jsondata = new Block_chain;

		$tender = $jsondata->read_row_data('json/tender.json',$_GET['tid']);



		$appliers = json_decode($tender->apply_list,true);



		require 'constants.php';

		require "include/header.php";

?>

		<main class="app-content">

			<div class="app-title">

				<div>

					<h1><i class="fa fa-dashboard"></i> BID Received</h1>

					<p></p>

				</div>

				<ul class="app-breadcrumb breadcrumb side">

					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

					<li class="breadcrumb-item">BID Received</li>

				</ul>

			</div>

			<div class="row">

				<div class="col-md-12">

					<div class="tile">

						<div class="tile-body">

							<h3 >

								<small>Project Name : </small> <?php echo $tender->name; ?>

								<small style="float: right;"><b>BID Received : <?php echo count($appliers); ?></b></small>

							</h3>

							<hr>

							<b id="allocated_to"></b>

							<a id="allocate_tender" class="btn btn-success text-white" href="allocate_tender.php?tid=<?php echo $tender->id; ?>" style="float: right;">Allocate</a>

							<br><br>

							<div class="table-responsive">

								<table class="table table-hover table-bordered" id="sampleTable">

									<thead>

										<tr>

											<th width="5%">No</th>
											<th width="10%">File</th>

											<th width="20%">Company Name</th>

											<th width="15%">Company Email</th>

											<th width="20%">Company Location</th>
											<th width="10%">Amount</th>

											<th width="10%">Experience</th>
											<th width="10%">No. of Projects</th>

											<th width="10%">Works</th>

										</tr>

									</thead>

									<tbody>

										<?php 

											$is_allocated = 0;

											$allocated_to = "";

											if($appliers)

											{

												foreach($appliers as $key => $val)

												{

													if(isset($val['is_accept']) && $val['is_accept'] == 1) {

														$is_allocated = 1;

														$allocated_to = $val['name'];

													}

										?>

													<tr>

														<td><?php echo $key+1; ?></td>
														<td><a href="<?php echo $val['file']; ?>" download><img src="<?php echo $val['file']; ?>" style="width: 100px;height: 100px;" /></a></td>

														<td><?php echo $val['name']; ?></td>

														<td><?php echo $val['email']; ?></td>

														<td><?php echo $val['city'].", ".$val['state'].", ".$val['country']; ?></td>
														<td>₹ <?php echo $val['amount']; ?></td>
														<td><?php echo $val['year']; ?> Year(s)</td>
														<td><?php echo $val['no_project']; ?></td>

														<td>

															<a class="btn btn-sm btn-warning" href="view_company.php?company_id=<?php echo $val['id']; ?>"><i class="fa fa-eye text-white" style="margin-right: 0px;"></i></a>

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

		<script type="text/javascript">

			var is_allocated = "<?php echo $is_allocated; ?>";

			var allocated_to = "<?php echo $allocated_to; ?>";

			if(parseInt(is_allocated) == 1)

			{

				document.getElementById("allocate_tender").style.display = 'none';

				document.getElementById("allocated_to").innerHTML = 'Tender allocated to '+allocated_to+".";



			}

		</script>

<?php

		require "include/footer.php";

	} else {

		header("Location: login.php");

	}