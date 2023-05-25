<?php 
	session_start();
	require "blockchain/blockchain.php";
	$jsondata = new Block_chain;

	if(isset($_POST['submit'])) 
	{
		$post['id'] = time();
		$post['tender_id'] = $_POST['tender_id'];
		$post['rate'] = $_POST['rate'];
		$post['comment'] = $_POST['comment'];
		$post['created_by'] = $_SESSION['userdata']->id;
		$post['comment'] = $_POST['comment'];
		$post['created_at'] = date("Y-m-d H:i:s");
		$post['updated_at'] = date("Y-m-d H:i:s");
		$response = $jsondata->add_data('json/tender_review.json',$post);
		
		header("Location: all_tenders.php");
	}

	require 'constants.php';
	require "include/header.php";

	$tender = $jsondata->read_row_data('json/tender.json',$_GET['tid']);	
	$reviews = $jsondata->read_data('json/tender_review.json');	
	$is_given = 0;
	$rate = 0;
	$comment = "";
	if($reviews) {
		foreach($reviews as $review) {
			if($review->tender_id == $tender->id && $review->created_by == $_SESSION['userdata']->id) {
				$is_given = 1;
				$rate = $review->rate;
				$comment = $review->comment;
			}
		}
	}
?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Tender Review</h1>
			<p></p>
		</div>
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Review</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form action="tender_review.php" method="post" id="profileForm">
				<input type="hidden" class="form-control" id="tender_id" name="tender_id" value="<?php echo $tender->id; ?>" />
				<div class="tile">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="exampleInputEmail1">Tender</label>
										<input type="text" class="form-control" placeholder="Enter company name" value="<?php echo $tender->name; ?>" readonly />
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="exampleInputEmail1">Rate</label>
										<select name="rate" id="rate" class="form-control" <?php echo $is_given == 1 ? 'disabled' : ''; ?>>
											<option value="">Option</option>
											<option value="1" <?php echo $rate == 1 ? 'selected' : ''; ?>>1</option>
											<option value="2" <?php echo $rate == 2 ? 'selected' : ''; ?>>2</option>
											<option value="3" <?php echo $rate == 3 ? 'selected' : ''; ?>>3</option>
											<option value="4" <?php echo $rate == 4 ? 'selected' : ''; ?>>4</option>
											<option value="5" <?php echo $rate == 5 ? 'selected' : ''; ?>>5</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="exampleInputEmail1">Comment</label>
										<textarea class="form-control" id="comment" name="comment" placeholder="Enter comment" <?php echo $is_given == 1 ? 'disabled' : ''; ?>><?php echo $comment; ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if($is_given == 0) { ?>
					<div class="tile-footer">
						<button class="btn btn-warning" type="submit" name="submit">Submit</button>
					</div>
					<?php } ?>
				</div>
			</form>
		</div>
	</div>
</main>