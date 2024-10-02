<style>
	.product-details-btn ul {
		display: flex;
		align-items: center;
		justify-content: center;
	}

	@media (max-width: 429px) {
		td:not(:first-child) {
			clear: both;
			margin-left: 100px;
			padding: 0px !important;
			position: relative;
			text-align: left;
		}
	}

	.popup_content .list-group a.active {
		background-color: red !important;
	}

	.sidebar .sidebar-default {
		background: #f5f5f5;
		padding: 10px;
		margin-bottom: 0px !important;
		width: 100%;
	}

	.accordion.accordion_style1.mt-0.sidebar-default {

		margin-bottom: 2px !important;
		padding: 10px auto !important;
	}

	@media (min-width:991px) {
		.mobilebottom {
			display: none;
		}
	}

	.card {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;

		background-clip: border-box;
		border: 1px solid rgba(0, 0, 0, .125);
		border-radius: .25rem;
		border-left: none;
		border-right: none;
	}

	.card-body {
		-ms-flex: 1 1 auto;
		flex: 1 1 auto;
		min-height: 1px;
		padding: 0px !important;
	}

	.card-header {
		padding: .75rem 1.25rem;
		margin-bottom: 0;
		background: none !important;
		border-bottom: 1px solid rgba(0, 0, 0, .125);
	}

	.card-header:first-child {
		border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
	}

	.accordion {
		overflow-anchor: none;
	}

	.accordion>.card {
		overflow: hidden;
	}

	.accordion>.card:not(:last-of-type) {
		border-bottom: 0;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}

	.accordion>.card:not(:first-of-type) {
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}

	.accordion>.card>.card-header {
		border-radius: 0;
		margin-bottom: -1px;
	}


	@media (min-width:992px) {
		.mt-lg-0 {
			margin-top: 0 !important;
		}

		.pt-lg-0 {
			padding-top: 0 !important;
		}
	}


	.ui-slider {
		position: relative;
		text-align: left;
	}

	.ui-slider .ui-slider-handle {
		position: absolute;
		z-index: 2;
		width: 1.2em;
		height: 1.2em;
		cursor: default;
		-ms-touch-action: none;
		touch-action: none;
	}

	.ui-slider .ui-slider-range {
		position: absolute;
		z-index: 1;
		font-size: .7em;
		display: block;
		border: 0;
		background-position: 0 0;
	}

	.ui-slider-horizontal {
		height: .8em;
	}

	.ui-slider-horizontal .ui-slider-handle {
		top: -.3em;
		margin-left: -.6em;
	}

	.ui-slider-horizontal .ui-slider-range {
		top: 0;
		height: 100%;
	}

	.ui-widget {

		font-size: 1em;
	}

	.ui-widget.ui-widget-content {
		border: 1px solid #c5c5c5;
	}

	.ui-widget-content {
		border: 1px solid #dddddd;
		background: #ffffff;
		color: #333333;
	}

	.ui-widget-header {
		border: 1px solid #dddddd;
		background: #e9e9e9;
		color: #333333;
		font-weight: bold;
	}

	.ui-state-default,
	.ui-widget-content .ui-state-default {
		border: 1px solid #c5c5c5;
		background: #f6f6f6;
		font-weight: normal;
		color: #454545;
	}

	.ui-corner-all {
		border-top-left-radius: 3px;
	}

	.ui-corner-all {
		border-top-right-radius: 3px;
	}

	.ui-corner-all {
		border-bottom-left-radius: 3px;
	}

	.ui-corner-all {
		border-bottom-right-radius: 3px;
	}

	.colorcheckboxes .colorspann::before {
		content: "";
		border: 2px solid #fff;
		position: absolute;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		margin: -3px;
		border-radius: 100%;
		box-shadow: 0 0 5px rgb(0 0 0 / 50%);
	}

	@media (max-width: 991px) {
		.desktopfilterlist {
			display: none;
		}
	}

	.scrollbarr::-webkit-scrollbar {
		width: 0.2125rem;
	}

	.scrollbarr::-webkit-scrollbar-track {
		background-color: transparent;
	}

	.scrollbarr::-webkit-scrollbar-thumb {
		background: #c68fa6;
	}

	.accordion .card .card-header {
		background-color: transparent;
		padding: 0px;
		margin: 0;
		border: 0px;
	}

	.accordion .card-header a {

		display: block;
		line-height: normal;
	}

	.accordion .card-body p:last-child {
		margin: 0;
	}

	.card-body p {
		margin-bottom: 1px;
	}

	.accordion_style1.accordion .card {

		margin-bottom: 15px;
		border-radius: 0;
		border: 0;


		background: #f5f5f5;

	}

	.accordion_style1.accordion .card:last-child {
		margin-bottom: 0;
	}



	.accordion.accordion_style1 .card-header a {
		padding-left: 0;
		padding-top: 0;
		font-weight: 500 !important;
		text-transform: capitalize;
		font-family: 'Montserrat', sans-serif;
		font-size: 16px;
		line-height: 30px;
		margin-bottom: 0px !important;

		color: inherit !important;
	}

	.accordion_style1 .card-header a::after {
		content: "\f106";

		font-family: "FontAwesome";
		font-size: 16px;
		font-weight: normal;
		position: absolute;
		right: 15px;
		top: 1px;
	}

	.accordion_style1 .card-header a[aria-expanded="false"]::after {
		content: "\f107";
	}

	.product_color_switch span {
		height: 15px;
		width: 15px;
		display: inline-block;
		vertical-align: middle;
		margin: 5px;
		position: relative;
		cursor: pointer;
		border-radius: 100%;
	}

	.product_color_switch span:first-child {
		-webkit-transition: all 0.2s ease 0s;
		-o-transition: all 0.2s ease 0s;
		transition: all 0.2s ease 0s;
	}

	.product_color_switch span:nth-child(2) {
		-webkit-transition: all 0.3s ease 0s;
		-o-transition: all 0.3s ease 0s;
		transition: all 0.3s ease 0s;
	}

	.list_brand li {
		list-style: none;
		margin-bottom: 10px;
	}

	.list_brand li:last-child {
		margin-bottom: 0;
	}

	.list_brand .custome-checkbox .form-check-label {
		color: #292b2c;
	}

	.filter_price .ui-widget.ui-widget-content {
		border: 0;
		border-radius: 0;
		background-color: #ddd;
		height: 4px;
		margin-bottom: 20px;
	}

	.ui-slider-horizontal .ui-slider-range {
		top: 0;
		height: 100%;
	}

	.filter_price .ui-slider .ui-slider-range {
		background-color: #c68fa6;
		border-radius: 0;
	}

	.filter_price .ui-slider .ui-slider-handle {
		cursor: pointer;
		background-color: #fff;
		border-radius: 100%;
		border: 0;
		height: 18px;
		top: -8px;
		width: 18px;
		margin: 0;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	}

	.price_range {
		color: #292b2c;
	}

	#flt_price {
		margin-left: 5px;
		font-weight: 600;
	}

	.widget_title {
		margin-bottom: 25px;
		text-transform: capitalize;
		font-weight: 600;
		letter-spacing: 0.3px;
	}

	.custome-checkbox .form-check-label {
		position: relative;
		cursor: pointer;
		color: #687188;
		padding: 0;
		vertical-align: middle;
	}

	.custome-checkbox .form-check-input {
		display: none;
	}

	.custome-checkbox .form-check-label span {
		vertical-align: middle;
	}

	.custome-checkbox .form-check-label::before {
		content: "";
		border: 2px solid #ced4da;
		height: 17px;
		width: 17px;
		margin: 0px 8px 0 0;
		display: inline-block;
		vertical-align: middle;
	}

	.custome-checkbox input[type="checkbox"]:checked+.form-check-label::after {
		opacity: 1;
	}

	.custome-checkbox input[type="checkbox"]+.form-check-label::after {
		content: "";
		width: 11px;
		position: absolute;
		top: 50%;
		left: 3px;
		opacity: 0;
		height: 6px;
		border-left: 2px solid #fff;
		border-bottom: 2px solid #fff;
		-moz-transform: translateY(-65%) rotate(-45deg);
		-webkit-transform: translateY(-65%) rotate(-45deg);
		transform: translateY(-65%) rotate(-45deg);
	}

	.colorcheckboxess input[type="checkbox"]+.form-check-label::after {
		content: "";
		width: 11px;
		position: absolute;
		top: 40% !important;
		left: 3px;
		opacity: 0;
		height: 6px;
		border-left: 2px solid #fff;
		border-bottom: 2px solid #fff;
		-moz-transform: translateY(-65%) rotate(-45deg);
		-webkit-transform: translateY(-65%) rotate(-45deg);
		transform: translateY(-65%) rotate(-45deg);
	}

	.custome-checkbox input[type="checkbox"]:checked+.form-check-label::before {
		background-color: #c68fa6;
		border-color: #c68fa6;
	}

	.custome-checkbox .form-check-input {
		display: none;
	}

	.custome-checkbox .form-check-label {
		position: relative;
		cursor: pointer;
	}


	/* tableTabs */
	.popup_content .list-group a {
		text-align: left;
		padding: 12px 20px;
		border-radius: 0;
		border-bottom: 1px solid #efefef;
		color: #2b2f4c;
	}


	.list-group-content {
		border-radius: 0;
		border: 0;

	}

	.subscribe_popup {
		margin: 40px 0;
	}

	.banner-22 {
		height: 100%;
		position: relative;
		margin-top: 174px;
	}


	p {
		color: #687188;
		line-height: 28px;
		margin-bottom: 25px;
	}

	.tab-pane .justify-content-center .card {
		border-radius: 0;
		border: 0;
		box-shadow: 0 0px 4px 0 #e9e9e9;
	}

	.btn {
		border-width: 1px;
		cursor: pointer;
		line-height: normal;
		padding: 12px 35px;
		text-transform: capitalize;
		transition: all 0.3s ease-in-out;
	}

	.btn-fill-out {
		background-color: transparent;
		border: 1px solid #c68fa6;
		color: #fff;
		position: relative;
		overflow: hidden;
		z-index: 1;
	}

	.btn-fill-out:hover {
		color: #ffffff !important;
	}

	.btn-fill-out::before,
	.btn-fill-out::after {
		content: "";
		position: absolute;
		left: 0;
		top: 0;
		bottom: 0;
		background-color: #c68fa6;
		z-index: -1;
		transition: all 0.3s ease-in-out;
		width: 51%;
	}

	.btn-fill-out::before,
	.btn-fill-out::after {
		content: "";
		position: absolute;
		left: 0;
		top: 0;
		bottom: 0;
		background-color: #c68fa6;
		z-index: -1;
		transition: all 0.3s ease-in-out;
		width: 51%;
	}

	.btn-fill-out::after {
		right: 0;
		left: auto;
	}

	.popup_content .list-group a i {
		margin-right: 8px;
		vertical-align: middle;
		font-size: 16px;
	}



	@media only screen and (max-width: 575px) {
		p {
			margin-bottom: 15px;
		}

		.widget_title {
			margin-bottom: 20px;
		}
	}

	@media only screen and (max-width: 480px) {
		p {
			line-height: 24px;
		}

		h6 {
			font-size: 14px;
		}

		p {
			margin-bottom: 15px;
		}
	}


	@media (max-width:980px) {
		.contant {
			margin-top: 100px !important;
		}

		.inner-banner {
			padding: 1px 0 !important;
		}

		.inner-banner {
			padding: 26px 0 !important;
		}

		.banner-22 {
			height: 100%;
			position: relative;
			margin-top: 0px !important;
		}
	}

	@media (max-width: 768px) {
		.banner-21 {
			height: 100%;
			position: relative;
			margin-top: 91px !important;
		}

		.banner {
			margin-top: 90px !important;
		}

		.contant {
			margin-top: 90px !important;
		}
	}

	@media (max-width: 425px) {
		.banner {
			margin-top: 99px !important;
		}
	}

	@media (max-width: 375px) {
		.banner {
			margin-top: 91px !important;
		}
	}

	@media (max-width: 320px) {
		.banner-21 {
			height: 100%;
			position: relative;
			margin-top: 81px !important;
		}

		.banner {
			margin-top: 80px !important;
		}
	}
</style>
<div class="main_content banner-22 ">
	<!-- START DESKTOP SECTION SHOP -->
	<div class="main_content">
		<!-- START SECTION BREADCRUMB -->
		<div id="banner-part  " class="banner inner-banner inner-banner mb-3">
			<div class="container">
				<div class="bread-crumb-main">
					<h1 class="banner-title">Orders Detail </h1>
					<div class="breadcrumb">
						<ul class="inline">
							<li><a rel="canonical" href="<?= base_url() ?>">Home</a></li>
							<li><a rel="canonical" href="<?= base_url() ?>my_profile/order">My Orders</a></li>
							<li><a rel="canonical" href="#"> Orders Detail </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION BREADCRUMB -->

		<div class="container">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr class="text-center" style="vertical-align: top;">
								<th>S.No.</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Size</th>
								<th>Color</th>
								<th>Quantity</th>
								<th>Selling Price</th>
								<th>Total</th>
								<th>Refund Amount</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<? $i = 1;
							foreach ($order_detail->result() as $details) {
								$return_data = $this->db->get_where('tbl_replacement_order', array('order2_id' => $details->id))->result();
							?>
								<tr class="text-center" style="border-bottom: 2px solid #dee2e6;">
									<td><?= $i; ?></td>
									<td><? $product_name = $this->db->get_where('tbl_product', array('id = ' => $details->product_id))->result();
										if (!empty($product_name)) {
											echo $product_name[0]->name;
										} else {
											echo "NA";
										}
										?>
									</td>
									<? $type_data = $this->db->get_where('tbl_type', array('id = ' => $details->type_id))->result();
									if (!empty($type_data)) {
										$sizeOfType = $this->db->get_where('tbl_size', array('id = ' => $type_data[0]->size_id))->result();
										$colorOfType = $this->db->get_where('tbl_colour', array('id = ' => $type_data[0]->colour_id))->result();
									} else {
										$sizeOfType = [];
										$colorOfType = [];
									}
									?>
									<td><img src="<?= base_url() . $type_data[0]->image ?>" style="height: 8rem; width: auto" class="img-fluid"></td>
									<td>
										<? if (!empty($sizeOfType)) {
											echo $sizeOfType[0]->name;
										} else {
											echo "NA";
										} ?>
									</td>
									<td>
										<? if (!empty($colorOfType)) { ?><span style="background-color:<?php echo $colorOfType[0]->name ?>;border-radius:80%">&nbsp&nbsp&nbsp&nbsp</span>
										<? echo $colorOfType[0]->colour_name;
										} else {
											echo "NA";
										} ?>
									</td>
									<td><?= $details->quantity ?></td>
									<td>₹<?= $details->spgst ?></td>
									<td>₹<?= $details->total_amount ?></td>
									<td>
										<? if (!empty($return_data[0])) { ?>
											₹<?= $return_data[0]->refund_amount ?>
										<? } else {
											echo "NA";
										} ?>
									</td>
									</td>
									<td>
										<?php
										
											if (!empty($order_data[0]->delivered_date)) {
												// Convert the given date and current date to DateTime objects
												$given_datetime = new DateTime($order_data[0]->delivered_date);
												$current_datetime = new DateTime();

												$interval = $current_datetime->diff($given_datetime);
												$days_difference = $interval->days;

												if (empty($return_data) && $order_data[0]->order_status == 4 && $days_difference <= 7) { ?>
													<a rel="canonical" href="<?= base_url() ?>Order/return_replace/<?= base64_encode($details->id) ?>"> 
														<button type="submit" class="btn btn-fill-out" name="submit" value="Submit" style="padding:5px 10px;">
															<span>Return</span>
														</button>
													</a>
												<?php } else if (!empty($return_data)) {
													if ($return_data[0]->replace_status == 0) {
														?>
														<span class="bg-warning" style="padding:5px 10px;color:white">Request Submitted</span>
													<?php } else if ($return_data[0]->replace_status == 1) { ?>
														<span class="bg-primary" style="padding:5px 10px;color:white">Request Accepted</span>
													<?php } else if ($return_data[0]->replace_status == 2) { ?>
														<span class="bg-success" style="padding:5px 10px;color:white">Request Completed</span>
													<?php } else { ?>
														<span class="bg-danger" style="padding:5px 10px;color:white">Request Rejected</span>
													<?php }
												} else {
													echo "NA";
												}
											} else {
												// Handle the case when delivered_date is null
												echo "No delivery date available.";
											}
										?>

									</td>
								</tr>
							<? $i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>