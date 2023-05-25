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
		$works = $jsondata->read_data('json/works.json');

		require "include/header.php";
?>
		<main class="app-content">
			<div class="app-title">
				<div>
					<h1><i class="fa fa-user"></i> My Works</h1>
					<p></p>
				</div>
				<ul class="app-breadcrumb breadcrumb side">
					<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					<li class="breadcrumb-item">My Works</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form action="submit_works.php" method="post" id="workForm" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="company_id" name="company_id" value="<?php echo $userid; ?>" />
						<div class="tile">
							<div class="row">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Document Name</label>
												<input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter Document Name" />
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Document File</label>
												<input type="file" class="form-control" id="document_file" name="document_file" />
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
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<div class="table-responsive">
							<table class="table table-default table-bordered" id="sampleTable">
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
												if($val->document_addedBy == $userid)
												{
									?>
													<tr>
														<td><?php echo $key+1; ?></td>
														<td><?php echo $val->document_name; ?></td>
														<td>
															<a href="assets/uploads/<?php echo $val->document_file; ?>" download><i class="fa fa-download"></i></a>&nbsp;&nbsp;
															<a onclick="return confirm('Are you sure to remove this document?')" href="remove_file.php?file_id=<?php echo $val->id?>"><i class="fa fa-trash"></i></a>
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