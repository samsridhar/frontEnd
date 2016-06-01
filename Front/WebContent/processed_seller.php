<?php header('Access-Control-Allow-Origin: *'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Vishal Srinivasan">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Keywords" content="apaarr, vishal, raw cashew, processed cashew, buyer procurement, seller procurement, buyer, seller, punit, ">
	<meta name="Description" content="">
	<title>Apaarr International Resources - Scheduler for seller</title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
	
	
	<script src="http://www.apaarr.com/ajax.js"></script>
	<script>
		function _(elem) {
			return document.getElementById(elem);
		}
	
		function mouseFunction(elem) {
			_(elem).style.display = 'block';
		}
		
		function mouseOut(elem) {
			_(elem).style.display = 'none';
		}
		
		function restrict(elem){
			
		}
		
		function emptyElement(x){
			_(x).innerHTML = "";
		}
		
		function buyer() {
			var n= _("name").value;
			var m= _("email").value;
			var ph= _("phone").value;
			var co= _("co").value;
			var md= _("md").value;
			var mm= _("mm").value;
			var qr= _("qr").value;
			var p= _("p").value;
			var packing= _("packing").value;
			var loading= _("loading").value;
			var inspection= _("inspection").value;
			var pol= _("pol").value;
			var sm= _("sm").value;
			var pt= _("pt").value;
			var fob= _("fob").checked?"T":"F";
			var cif= _("cif").checked?"T":"F";
			var status= _("status");
			var ty= _("ty").value;
			var si= _("si").value;
			var qandg= _("qandg").value;
			var nslg= _("nslg").value;
			
			if(n == "" || m == "" || ph == "" ||co == "" ||md == "" ||mm == "" ||qr == "" ||p == "" ||packing == "" ||loading == "" ||inspection == "" ||pol == "" ||sm == "" ||pt == "" ||ty == "" ||si == "" ||qandg == "" ||nslg == "") {
				status.innerHTML="Fill out all the form data";
			} else {
				_("submit").style.display="none";
				var ajax = ajaxObj("POST", "http://www.apaarr.com/fileProcSeller.php");
				ajax.onreadystatechange = function() {
					if(ajaxReturn(ajax) == true) {
						if(ajax.responseText != "add_success"){
						_("submit").style.display="block";
							status.innerHTML = ajax.responseText;
							
						} else {
							_("submit").style.display="none";
							status.innerHTML = "OK "+n+", check your email inbox and junk mail box at <u>"+m+"</u> for a moment to see the details you given. Our team will come and speak with you soon.(mail may take till 15 mins to reach so be cool)";
						}
					}
				}
				ajax.send("n="+n+"&m="+m+"&ph="+ph+"&co="+co+"&md="+md+"&mm="+mm+"&qr="+qr+"&p="+p+"&packing="+packing+"&loading="+loading+"&inspection="+inspection+"&pol="+pol+"&sm="+sm+"&pt="+pt+"&fob="+fob+"&cif="+cif+"&ty="+ty+"&si="+si+"&qandg="+qandg+"&nslg="+nslg);
			}
		}
	
	</script>
</head>
<body>
	
<!--	<table>
		<tr>
			<th>   Number	</th>
			<th>   Country	</th>
			<th>	Year Of Crop	</th>
			<th>	Quantity	</th>
			<th>	Out Turn Guarantee	</th>
			<th>	Nut Count	</th>
			<th>	Price	</th>
			<th>	Loading Port	</th>
			<th>    Payment Terms	</th>
		</tr>
		<tr ng-repeat="x in quotas">
			<td>	{{$index+1}}	</td>
			<td>	{{x.country}}	</td>
			<td>	{{x.year_of_crop}}	</td>
			<td>	{{x.qty}}	</td>
			<td>    {{x.out_turn_guarantee}}	</td>
			<td>	{{x.nut_count}}	</td>
			<td>	{{x.total_cashew}}	</td>
			<td>	{{x.port_of_loading}}	</td>
			<td>	{{x.payment_terms}}	</td>
		</tr>
	</table> -->
	
	
	<div class="col-md-12 col-xs-12">
		<h2> Seller Production Scheduler - Processed Cashew </h2>
		<div class="well">
		<center>
			<table class="table-responsive table-hover">
				<tr>
					<td> Name </td>
					<td> : </td>
					<td><input class="form-control" type="text" id="name" onfocus="emptyElement('status')" onkeyup="restrict('name')" /></td>
				</tr>
				<tr>
					<td> Email Id </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="email" onfocus="emptyElement('status')" onkeyup="restrict('email')" /> </td>
				</tr>
				<tr>
					<td> Contact Number </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="phone" onfocus="emptyElement('status')" onkeyup="restrict('phone')" /> </td>
				</tr>
			</table>
		</center>
		</div>
	</div>
	
	<div class="col-md-6 col-xs-12">
		<div class="well">
			<table class="table-responsive table-hover">
				<tr>
					<td> Country Of Origin </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="co" /> </td>
				</tr>
			</table>
		</div>
		
		<div class="well">
			<table>
				<tr>
					<td> Type </td>
					<td> : </td>
					<td> 
						<select class="form-control" type="text" id="ty">
							<option>Whole</option>
							<option>Pieces</option>
						</select>
					</td>
				</tr>
				<tr>
					<td> Size  </td>
					<td> : </td>
					<td> 
						<input class="form-control" type="text" id="si" /> 
						<span id="example">If Whole then WW180,WW210,SW180, etc..<br/> If Pieces then but, split, Baby bits etc..</span> 
					</td>
				</tr>
				<tr>
					<td> Maximum Defective (in %) </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="md" /> </td>
				</tr>
				<tr>
					<td> Maximum Moisture (in %) </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="mm" /> </td>
				</tr>
				<tr>
					<td> Quality and Grading </td>
					<td> : </td>
					<td>
						<select class="form-control" type="text" id="qandg" >
							<option>First Quality Fancy</option>
							<option>Second Quality Scorched </option>
							<option>Third Quality Special Scorched</option>
							<option>Fourth Quality</option>
							<option>Lightly Blemished Wholes (LBW)</option>
							<option>Lightly Blemished Pieces (LP)</option>
							<option>Blemished Wholes (BW)</option>
						</select>
					</td>
				</tr>
			</table>	
		</div>
	</div>
	
	<div class="col-md-6 col-xs-12">
		<div class="well">
			<table class="table-responsive table-hover">
				<tr>
					<td> Quantity Required (in MT)</td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="qr" /> </td>
				</tr>
				<tr>
					<td> Price (in $) </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="p" /> </td>
				</tr>
			</table>
		</div>
		
		<div class="well">
			<table class="table-responsive table-hover">
				<tr>
					<td> NLSG NLG max (in %) </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="nslg" /> </td>
				</tr>
				<tr>
					<td> Packing </td>
					<td> : </td>
					<td> 
						<select class="form-control" type="text" id="packing">
							<option>Sea worthy jute bag</option>
							<option>Sisal Baggs of 80Kg</option>
						</select>
					</td>
				</tr>
				<tr>
					<td> Loading </td>
					<td> : </td>
					<td> 
						<select class="form-control" type="text" id="loading">
							<option>20 Ft Container</option>
							<option>40 Ft Container</option>
							<option>Break Bulk</option>
						</select>
					</td>
				</tr>
				<tr>
					<td> Inspection </td>
					<td> : </td>
					<td> 
						<select class="form-control" type="text" id="inspection">
							<option>SGS</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Preferred Port of Landing </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="pol" /> </td>
				</tr>
				<tr>				
					<td>Shipment Month </td>
					<td> : </td>
					<td> <input class="form-control" type="text" id="sm" /> </td>
				</tr>
			</table>
		</div>
	</div>
	
	<div class="col-md-12 col-xs-12">
		<fieldset>		
			<legend>International Commercial Terms</legend>
			<div id="parent" onmouseover="mouseFunction('popup')" onmouseout="mouseOut('popup')"><input type="checkbox" name="Price" id="fob" value="FOB" />FOB(Free On Board)</div>
			<div id="popup" style="display: none"><i>One of the most commonly used-and misused-terms, FOB means that the shipper/seller uses his freight forwarder to move the merchandise to the port or designated point of origin. Though frequently used to describe inland movement of cargo, FOB specifically refers to ocean or inland waterway transportation of goods. "Delivery" is accomplished when the shipper/seller releases the goods to the buyer's forwarder. The buyer's responsibility for insurance and transportation begins at the same moment.</i></div>
							
			<div id="parent1" onmouseover="mouseFunction('popup1')" onmouseout="mouseOut('popup1')"><input type="checkbox" id="cif" name="Price" value="CIF" />CIF (Cost, Insurance and Freight)</div>
			<div id="popup1" style="display: none"><i>This arrangement similar to CFR, but instead of the buyer insuring the goods for the maritime phase of the voyage, the shipper/seller will insure the merchandise. In this arrangement, the seller usually chooses the forwarder. "Delivery" as above, is accomplished at the port of destination.</i></div>
		</fieldset>
		<br/>
		<div class="well" style="text-align:center">
		<center>
		<table class="table-responsive table-hover">
			<tr>
				<td> Payment Terms </td>
				<td> : </td>
				<td> 
					<input class="form-control" type="text" id="pt" /><span id="short">Eg: 30 percent Advance 70 percent Before Dispatch, 50 percent  Advance, 50 percent Before Dispatch etc..</span>
				</td>
			</tr>
		</table>
		</center>
		</div>
		<p id="status"></p>
		<input type="submit" class="btn btn-primary" id="submit" value="submit" onClick="buyer()" />
		
<p id="stat"> </p>
	</div>


</body>
</html>
