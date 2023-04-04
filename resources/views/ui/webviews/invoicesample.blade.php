<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<style>
			
body{margin-top:20px;
background:#eee;
}




/**    17. Panel
 *************************************************** **/
/* pannel */
.panel {
	position:relative;

	background:transparent;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;

	-webkit-box-shadow: none;
	   -moz-box-shadow: none;
			box-shadow: none;
}
.panel.fullscreen .accordion .panel-body,
.panel.fullscreen .panel-group .panel-body {
	position:relative !important;
	top:auto !important;
	left:auto !important;
	right:auto !important;
	bottom:auto !important;
}
	
.panel.fullscreen .panel-footer {
	position:absolute;
	bottom:0;
	left:0;
	right:0;
}


.panel>.panel-heading {
	text-transform: uppercase;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
			.table td, .table th {
  padding: .75rem;
  vertical-align: top;
  border-top: 1px solid #fff !important;
}
.panel>.panel-heading small {
	text-transform:none;
}
.panel>.panel-heading strong {
	font-family:Arial,Helvetica,Sans-Serif;
}
.panel>.panel-heading .buttons {
	display:inline-block;
	margin-top:-3px;
	margin-right:-8px;
}
.panel-default>.panel-heading {
	padding: 15px 15px;
	background:#fff;
}
.panel-default>.panel-heading small {
	color:#9E9E9E;
	font-size:12px;
	font-weight:300;
}
.panel-clean {
	border: 1px solid #ddd;
	border-bottom: 3px solid #ddd;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
.panel-clean>.panel-heading {
	padding: 11px 15px;
	background:#fff !important;
	color:#000;	
	border-bottom: #eee 1px solid;
}
.panel>.panel-heading .btn {
	margin-bottom: 0 !important;
}

.panel>.panel-heading .progress {
	background-color:#ddd;
}

.panel>.panel-heading .pagination {
	margin:-5px;
}

.panel-default {
	border:0;
}

.panel-light {
	border:rgba(0,0,0,0.1) 1px solid;
}
.panel-light>.panel-heading {
	padding: 11px 15px;
	background:transaprent;
	border-bottom:rgba(0,0,0,0.1) 1px solid;
}

.panel-heading a.opt>.fa {
    display: inline-block;
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
    margin-right: 2px;
    padding: 5px;
    position: relative;
    text-align: right;
    top: -1px;
}

.panel-heading>label>.form-control {
	display:inline-block;
	margin-top:-8px;
	margin-right:0;
	height:30px;
	padding:0 15px;
}
.panel-heading ul.options>li>a {
	color:#999;
}
.panel-heading ul.options>li>a:hover {
	color:#333;
}
.panel-title a {
	text-decoration:none;
	display:block;
	color:#333;
}

.panel-body {
	background-color:#fff;
	padding: 15px;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
.panel-body.panel-row {
	padding:8px;
}

.panel-footer {
	font-size:12px;
	border-top:rgba(0,0,0,0.02) 1px solid;
	background-color:rgba(0255,255,255,1);

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
		</style>
	</head>
	<body>
<div class="container bootstrap snippets bootdey">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 col-sm-6 text-left">
					<h2><strong>Tax Invoice</strong></h2>
				</div>
				<div class="col-md-6 col-sm-6 text-right">
					<img src="{{asset('barcodes.png')}}" class="" style="height:100px;width:100%;">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-md-8 col-sm-8 text-left">
					
					<ul class="list-unstyled">
						
						<li><strong>Invoice Number:</strong> &nbsp;&nbsp;&nbsp;&nbsp;12345-123456-098765 </li>
						<li><strong>Order Number:</strong> &nbsp;&nbsp;&nbsp;&nbsp;123456789 </li>
						<li><strong>Nature of Transaction:</strong> &nbsp;&nbsp;&nbsp;&nbsp;inter-state</li>
						<li><strong>Place of Supply:</strong> &nbsp;&nbsp;&nbsp;&nbsp;india</li>
						 
					</ul>
				</div>
	<div class="col-md-1 col-sm-1 text-left">
				</div>
				<div class="col-md-3 col-sm-3 text-left">
					<!--<h4><strong>Payment</strong> Details</h4> -->
					<ul class="list-unstyled">
						<li><strong>PacketID:</strong> 012345678901</li>
						<li><strong>Invoice Date:</strong> 25 Jun 2022</li>
					 	<li><strong>Order Date:</strong> 22 Jun 2022</li>
					 <li><strong>Nature of Supply:</strong> 22 Jun 2022</li>
					 
					</ul>

				</div>

			</div>
			
			<div class="row"  style="border-top:5px solid black;">
				
				<div class="col-md-6 col-sm-6 text-left mt-3">
					<h4 >Bill to / Ship to</h4>
					
					<h5 class=" "><strong>Lorem Ipsum </strong></h5>
					<h6>standard dummy text ever since India<br> pincode:12345,</h6>
					<h5 class=" mt-3"><strong>Bill From</strong></h5>
					<h6>standard dummy text ever since India<br> pincode:12345,</h6>
				</div>
				<div class="col-md-6 col-sm-6 text-left mt-3">
					<h4 class="mt-5"><strong>Customer Type: </strong> Unregistered</h4>
					<h5 class=" mt-5"><strong>Ship From</strong></h5>
					<h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. printing and typesetting industry. printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever dummy text ever dummy text ever dummy text ever since India<br> pincode:12345,</h5>
					
				</div>
				
			</div>

			<div class="table-responsive " style="border-top:5px solid black;">
				<table class="table table-condensed nomargin">
					<thead>
						<tr>
							 <th>S.No</th>
							<th>Qty</th>
							<th>Gross Amount</th>
							<th>Other Charges</th>
							<th>Taxable Amount</th>
							<th>CGST</th>
							<th>SGST/UGST</th>
							<th>IGST</th>
							<th>Cess</th>
							<th>Total Amount</th>
						</tr>
					</thead>
				</table>
				<div><strong>Unique side and front panel design</strong></div>
								<small><strong>HSN:12211111, 12.0% IGST</strong> </small>
				<table class="table table-condensed nomargin" >
					<tbody>
						 
							<tr>
						    <td>1</td>
							<td>2</td>
							<td>Rs 23,78</td>
							<td>Rs 23,78</td>
							<td>Rs 23,78</td>
									<td>Rs 23,78</td>
									<td>Rs 23,78</td>
									<td>Rs 23,78</td>
								<td> </td>
									<td>Rs 23,78</td>
									 
								
						</tr>
				</table>
				<div><strong>Unique side and front panel design</strong></div>
								<small><strong>HSN:12211111, 12.0% IGST</strong> </small>
				<table class="table table-condensed nomargin" >
					<tbody>
						 
							<tr>
						    <td>2</td>
							<td>2</td>
							<td>Rs 23,78</td>
							<td>Rs 23,78</td>
							<td>Rs 23,78</td>
									<td>Rs 23,78</td>
									<td>Rs 23,78</td>
									<td>Rs 23,78</td>
								<td> </td>
									<td>Rs 23,78</td>
									 
								
						</tr>
				</table>
				<table  class="table table-condensed nomargin">
						<tr style="border-top:4px solid #000; border-bottom:4px solid #000;margin:30px;">
							<td >
								<div><strong>Total</strong></div>
								 
							</td>
							 <td>Rs 23,78</td>
							<td>Rs 23,78</td>
							<td>Rs 23,78</td>
									<td> </td>
									<td> </td>
									<td>Rs 23,78</td>
									<td>Rs 23,78</td>
						</tr>
						<tr style="border-top:4px solid #000; margin:30px;">
							<td colspan="7"> <h5 class="text-right"> <strong>Amount Paid:</strong></h5> </td>
							<td> Rs 2162.00 </td>
								</tr>
						<tr style="border-top:4px solid #000; margin:30px;">
							<td colspan="7"> <h5 class="text-right"> <strong>Total GST:</strong></h5> </td>
							<td> Rs 2162.00 </td>
								</tr>
							<tr  style="border-top:2px solid #000;">
								<td colspan="7" >  <h5 class="text-right" ><strong>Amount to be Paid:</strong></h5> </td >
								<td >Rs 2162.00 </td>
							
						</tr>
						 
					</tbody>
				</table>
			</div>

			<hr class="nomargin-top">
			<div class="row">
				<div class="col-lg-6 text-left">
					<h4>Lorem Ipsum Private Limited</h4>
					<img src="{{asset('indexauht.jpg')}}" class=" " style="height:100px;width:100%;">
					 <!-- no P margin for printing - use <br> instead -->

					 
				</div>
				<div class="col-lg-6 text-right">
					<img src="{{asset('dummya.jpg')}}" class=" " style="height:300px;width:300px;">
					
				</div>
<div class="col-lg-12 text-left">
					 
					<p class="nomargin nopadding">
						<strong>Declaration:</strong> 
						<br>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry
					</p> <!-- no P margin for printing - use <br> instead -->

					 
				</div>
				
				 
			</div>
			<div style="border-top:4px solid #000;">
				<h4>Reg. Address</h4>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s 
				Pincode :123456 <h3 class="skh float-right">Dinkachika</h3> 
				<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.

			</div>
		</div>
	</div>

	 
</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>