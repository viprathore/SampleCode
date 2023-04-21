<?php include("includes/header.php"); ?>
<?php
 if($_SESSION['supervisor_id']=="")
   {
   		$callConfig->headerRedirect("index.php");
   }
  else
  { 
$allpod=$agentObj->getPODList();
$allpol=$agentObj->getPOLList();
$allramp=$agentObj->getRampList();
$allcommodity=$agentObj->getCommodityList();

$getagentlist = $userObj->getagentlist();
//print_r($getagentlist);exit;

if(isset($_POST['order']) && $_POST['order']=='submit')
{
	//print_r($_POST); die;
	$userObj->insertsopOrder($_POST);
}
$allshipper=$userObj->getShipperDetails();
if($_GET['cid']!="")
{
	$indivdata=$agentObj->getCustomerDetails($_GET['cid']);
	
}
if($_GET['sid']!="")
{
	$shipperindivdata=$agentObj->getSingleShipperDetails($_GET['sid']);
	
}
if($_GET['sid']!="" && $_GET['cid']!="")
{
	//echo "hii"; exit;
	?>
		<style type="text/css">#customerregistration{
        display:none;
        }</style>
        <style type="text/css">#shipperregistration{
        display:block;
        }</style>
	
	<?php
  
 
	
}
//print_r($shipperindivdata);
?>

<script type="text/javascript">
function show()
{
	alert("ewrfew");
	document.getElementById("customerregistration").style.display="none";
	document.getElementById("shipperregistration").style.display="block";
}
function getconsignee()
{
	document.getElementById("customerregistration").style.display="block";
	document.getElementById("shipperregistration").style.display="none";
}
</script>
<?php 
if($_GET['sid']=="" && $_GET['cid']!="")
{ ?>
<style type="text/css">#shipperregistration{
        display:none;
        }</style>
	<?php }	?>
<?php 
if($_GET['sid']=="" && $_GET['cid']=="")
{ ?>
<style type="text/css">#shipperregistration{
        display:none;
        }</style>
	<?php }	?>

<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"cutoffdate",
			dateFormat:"%d-%M-%Y"
			
		});
		new JsDatePick({
			useMode:2,
			target:"onboarddate",
			dateFormat:"%d-%M-%Y"
		
		});
		new JsDatePick({
			useMode:2,
			target:"portdate",
			dateFormat:"%d-%M-%Y"
		
		});
		new JsDatePick({
			useMode:2,
			target:"rampdate",
			dateFormat:"%d-%M-%Y"
		
		});
		new JsDatePick({
			useMode:2,
			target:"releasedate",
			dateFormat:"%d-%M-%Y"
		
		});
	};
</script>


<script type="text/javascript">
function getNext()
{
	
	/*var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
	 var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
	 if(document.registrationform.companyname.value=="")
	{ 
		alert("Please enter Name");
		document.registrationform.companyname.value='';
		document.registrationform.companyname.focus();
		return false;
	}
		else if(document.registrationform.customer_contact.value=="")
	{
		alert("Please enter Contact Address");
		document.registrationform.customer_contact.value='';
		document.registrationform.customer_contact.focus();
		return false;
		
	}
	else if(document.registrationform.customer_phonenumber.value=="")
	{
		alert("Please enter Phone Number");
		document.registrationform.customer_phonenumber.value='';
		document.registrationform.customer_phonenumber.focus();
		return false;
		
	}
		else if(!phoneno.test(document.registrationform.customer_phonenumber.value))
	{
		alert("Please enter Phone Number");
		document.registrationform.customer_phonenumber.value='';
		document.registrationform.customer_phonenumber.focus();
		return false;
		
	}
	else if(document.registrationform.customer_email.value=="")
	{
		alert("Please enter Email");
		document.registrationform.customer_email.value='';
		document.registrationform.customer_email.focus();
		return false;
		
	}
	else if(!ck_email.test(document.registrationform.customer_email.value))
	{
		alert("Please enter Valid Email");
		document.registrationform.customer_email.value='';
		document.registrationform.customer_email.focus();
		return false;
		
	}

	else if(document.registrationform.customer_address.value=="")
	{
		alert("Please enter Address");
		document.registrationform.customer_address.value='';
		document.registrationform.customer_address.focus();
		return false;
		
	}
	
	else
	{*/
	document.getElementById("customerregistration").style.display="none";
	document.getElementById("shipperregistration").style.display="block";
	/* } */
}
</script>
<script type="text/javascript">
function getLast()
{
	
	/*var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
	 var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
	 if(document.registrationform.shippername.value=="")
	{ 
		alert("Please enter Name");
		document.registrationform.shippername.value='';
		document.registrationform.shippername.focus();
		return false;
	}
	
	else if(document.registrationform.shipper_contact.value=="")
	{
		alert("Please enter Contact Address");
		document.registrationform.shipper_contact.value='';
		document.registrationform.shipper_contact.focus();
		return false;
		
	}
	else if(document.registrationform.shipper_phonenumber.value=="")
	{
		alert("Please enter Phone Number");
		document.registrationform.shipper_phonenumber.value='';
		document.registrationform.shipper_phonenumber.focus();
		return false;
		
	}
		else if(!phoneno.test(document.registrationform.shipper_phonenumber.value))
	{
		alert("Please enter Valid Phone Number");
		document.registrationform.shipper_phonenumber.value='';
		document.registrationform.shipper_phonenumber.focus();
		return false;
		
	}
	else if(document.registrationform.shipper_email.value=="")
	{
		alert("Please enter Email");
		document.registrationform.shipper_email.value='';
		document.registrationform.shipper_email.focus();
		return false;
		
	}
	else if(!ck_email.test(document.registrationform.shipper_email.value))
	{
		alert("Please enter Valid Email");
		document.registrationform.shipper_email.value='';
		document.registrationform.shipper_email.focus();
		return false;
		
	}
	else if(document.registrationform.shipper_address.value=="")
	{
		alert("Please enter Address");
		document.registrationform.shipper_address.value='';
		document.registrationform.shipper_address.focus();
		return false;
		
	}
	
	
	else
	{*/
	document.getElementById("shipperregistration").style.display="none";
	document.getElementById("orderentry").style.display="block";
	/*} */
}
function getBackUser()
{
	
	document.getElementById("customerregistration").style.display="block";
	document.getElementById("shipperregistration").style.display="none";
}
function getBackShipper()
{
	
	document.getElementById("shipperregistration").style.display="block";
	document.getElementById("orderentry").style.display="none";
}
function getShippingOrder()
{
	document.getElementById("customerregistration").style.display="none";
	document.getElementById("orderentry").style.display="block";
}
</script>
<style>
.scroll{
height:290px;overflow:auto;

}

</style>

<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
	
 $("#polsearch").autocomplete("polsearch.php", {
		selectFirst: true
	});
});
</script>
<script>
$(document).ready(function(){
	
 $("#podsearch").autocomplete("podsearch.php", {
		selectFirst: true,
		minChars:1
	});
});

</script>
<script>
$(document).ready(function(){
	
 $("#rampsearch").autocomplete("rampsearch.php", {
		selectFirst: true,
		minChars:1
	});
});

</script>
<script>
$(document).ready(function(){
	
 $("#commoditysearch").autocomplete("commoditysearch.php", {
		selectFirst: true,
		minChars:1
	});
});

</script>
  
     <!--row-->
       <div class="row">
         <div class="rowin">
            <ul class="bedgormsn">
              <li><a href="<?php print SITEURL?>/agentorderlist.php">Home</a></li>
              <li><img src="images/arowgblue_03.png" alt="" /></li>
              <li><a href="<?php print SITEURL?>/addsop.php">New Sop Details</a></li>
            </ul>
            <div class="clearfix"></div>
         </div>
       </div>
       <div class="clearfix"></div>
     <!--End row-->
     
     <!--middlecontent-->
         <div class="full_wapper">
          <div class="dashright">
       <form name="registrationform" id="registrationform" method="post" action="" onSubmit="return validate();" enctype="multipart/form-data">        
        <ul class="changedformlis">
                  <h2 >Final Customer's information.</h2> 
                  <li><h2>A.</h2></li>
                <li>
                 <span> Name</span><input type="text" name="customera_name"  class="search" id="customera_name" />
                 <div id="divResult"  style="overflow:auto;"></div>
                </li>
                <li>
                 <span>Contact</span><input type="text" name="customera_contact" id="customera_contact" value="<?php print $indivdata->contact?>"/>
                </li>
                <li>
                 <span>Phone Number</span><input type="text" name="customera_phonenumber" id="customera_phonenumber" value="<?php print $indivdata->phone_number?>"/>
                </li>
                <li>
                 <span>Email</span><input type="text" name="customera_email" id="customera_email" value="<?php print $indivdata->email?>"/>
                 <input type="hidden" name="customera_id" id="customera_id" value="<?php print $indivdata->id?>"/>
                 
                </li>
                 <li>
                 <span>Address</span><textarea name="customera_address"><?php print $indivdata->address?></textarea>
                </li>
                
                 <li><h2>B.</h2></li>
                <li>
                 <span> Name</span><input type="text" name="customerb_name" class="search" id="customerb_name" />
                 <div id="divResult"  style="overflow:auto;"></div>
                </li>
                <li>
                 <span>Contact</span><input type="text" name="customerb_contact" id="customerb_contact" value="<?php print $indivdata->contact?>"/>
                </li>
                <li>
                 <span>Phone Number</span><input type="text" name="customerb_phonenumber" id="customerb_phonenumber" value="<?php print $indivdata->phone_number?>"/>
                </li>
                <li>
                 <span>Email</span><input type="text" name="customerb_email" id="customerb_email" value="<?php print $indivdata->email?>"/>
                 <input type="hidden" name="customerb_id" id="customerb_id" value="<?php print $indivdata->id?>"/>
                 
                </li>
                 <li>
                 <span>Address</span><textarea name="customerb_address"><?php print $indivdata->address?></textarea>
                </li>
               
               
				<!--<input type="text" class="search" id="inputSearch" placeholder="Search For User Details"/>--><br /> 
                <h2 >Consignee information.</h2> 
                  <li><h2>C/1.</h2></li>
            
				 <li>
				   <span>Name</span><input type="text" name="consigneec1_name" class="search" id="consigneec1_name" />
                 <div id="divResult"  style="overflow:auto;"></div>
                </li>
                <li>
                 <span>Contact</span><input type="text" name="consigneec1_contact" id="consigneec1_contact" value="<?php print $indivdata->contact?>"/>
                </li>
                <li>
                 <span>Phone Number</span><input type="text" name="consigneec1_phonenumber" id="consigneec1_phonenumber" value="<?php print $indivdata->phone_number?>"/>
                </li>
                <li>
                 <span>Email</span><input type="text" name="consigneec1_email" id="consigneec1_email" value="<?php print $indivdata->email?>"/>
                 <input type="hidden" name="consigneec1_id" id="consigneec1_id" value="<?php print $indivdata->id?>"/>
                 
                </li>
                 <li>
                 <span>Address</span><textarea name="consigneec1_address"><?php print $indivdata->address?></textarea>
                </li>
                
                <li><h2>C/2.</h2></li>
            
				 <li>
				   <span> Name</span><input type="text" name="consigneec2_name"  class="search" id="consigneec2_name" />
                 <div id="divResult"  style="overflow:auto;"></div>
                </li>
                <li>
                 <span>Phone Number</span><input type="text" name="consigneec2_phonenumber" id="consigneec2_phonenumber" value="<?php print $indivdata->phone_number?>"/>
                </li>
               
                 <li>
                 <span>Address</span><textarea name="consigneec2_address"><?php print $indivdata->address?></textarea>
                </li>
               
               <li>
            	<h2>Shipper Information</h2>
                </li>
                <li>
                 <span>Shipper Name</span><input type="text" name="shippername" class="shippersearch" id="shippername"/>
                <div id="divResult2" style="overflow:auto;">
                </li>
                <li>
                 <span>Shipper Contact</span><input type="text" name="shipper_contact" id="shipper_contact" value="<?php print $shipperindivdata->contact;?>"/>
                </li>
                <li>
                 <span>Shipper Phone Number</span><input type="text" name="shipper_phonenumber" id="shipper_phonenumber" value="<?php print $shipperindivdata->phone_number;?>"/>
                </li>
                <li>
                 <span>Shipper Email</span><input type="text" name="shipper_email" id="shipper_email" value="<?php print $shipperindivdata->email;?>"/><input type="hidden" name="shipper_id" id="shipper_id" value="<?php print $shipperindivdata->id?>"/>
                </li>
                 <li>
                 <span>Shipper Address</span><textarea name="shipper_address"><?php print $shipperindivdata->address;?></textarea>
                </li>
                 <li>
                                  <span>Handling fee</span><input type="text" name="handlingfee" id="handlingfee"/>
                                  
                                 </li>
                                 <li>
                                  <span>Selling Rate :</span>
                                 
                                  <input type="text" name="sellingrate"  id="sellingrate"/>
                					<div id="polResult" style="overflow:auto;"></div>
                               
                         <?php foreach($allpol as $all_pol)
                        {
                        ?>
                        <option value="<?php print $all_pol->name?>"><?php print $all_pol->name?></option>
                        <?php }?>
                        <option value="new">Other</option>
                        </select>
                                 </li>
                               
                                 <!-- <li>
                                  <span>POD:</span>
                                  <input type="text" name="pod" value="<?php print $shipperindivdata->pod;?>" class="podsearch" id="podsearch"/>
                					<div id="podResult" style="overflow:auto;">
                                    </div>
                                    </li>-->
                                 <!-- <select name="pod" id="pod" onChange="getNewPod(this.value)"><option value="">--select--</option>
                         <?php foreach($allpod as $all_pod)
                        {
                        ?>
                        <option value="<?php print $all_pod->name?>"><?php print $all_pod->name?></option>
                        <?php }?>
                         <option value="new">Other</option>
                        </select>
                        
                                 </li>
                                 <li style="display:none" id="dispnewpod">
                                 <span></span><input type="text" name="newpod" id="newpod" onchange="return validatepod(this.value)"/>
                                  <div id="poddisplay" style="color:#F00; font-size:12px;padding:0px 0px 0px 130px;"></div>
                                 </li>-->  
                               <li>
                                  <span>Cost</span>
                                   <input type="text" name="ramp" value="<?php print $shipperindivdata->ramp;?>" class="rampsearch" id="rampsearch"/>
                                  <!-- <select name="ramp" id="ramp" onChange="getNewRamp(this.value)"><option value="">--select--</option>
                                      <?php foreach($allramp as $all_ramp)
                       			 {
                        ?>
                        <option value="<?php print $all_ramp->name?>"><?php print $all_ramp->name?></option>
                        <?php }?>
                               <option value="new">Other</option>
                                    </select>-->
                                 </li>
                                  <!-- <li style="display:none" id="dispnewramp">
                                   
                                 <span></span><input type="text" name="newramp" id="newramp"  onchange="return validateramp(this.value)"/>
                                  <div id="rampdisplay" style="color:#F00; font-size:12px;padding:0px 0px 0px 130px;"></div>
                                 </li>-->
                                  <li>
                                  <span>Commodity </span>
                                   <input type="text" name="commodity" value="<?php print $shipperindivdata->commodity;?>" class="commoditysearch" id="commoditysearch"/>
                                <!-- <select name="commodity" id="commodity" onChange="getNewCommodity(this.value)"><option value="">--select--</option>
                                      <?php foreach($allcommodity as $all_commodity)
                       			 {
                        ?>
                        <option value="<?php print $all_commodity->name?>"><?php print $all_commodity->name?></option>
                        <?php }?>
                                       <option value="new">Other</option>    
                                    </select>-->
                                 </li>
                                 <li>
                                  <span>AMS </span><input type="text" name="ams" id="submission"/>
                                 </li>
                                 <li>
                                  <span>ISF Submission</span><input type="text" name="isf" id="isfsubmission"/>
                                 </li>
                                 <li>
                                  <span>Bl</span><input type="text" name="bl" id="bl" />
                                 </li>
                                 <li>
                                  <span>PL</span><input type="text" name="pl" id="pl" />
                                 </li>
                                 <li>
                                  <span>CI</span><input type="text" name="ci" id="ci" />
                                 </li>
                                <li>
                                  <span>MBL</span><input type="text" name="mbl" id="mbl"/>
                                 </li>
                                 <li>
                                  <span>HBL</span><input type="text" name="hbl" id="hbl"/>
                                 </li>
                                   <li>
                                  <span> Trucking company</span><textarea name="trucking" id="trucking"></textarea>
                                 </li>
                                 <li>
                                  <span> Remark</span><textarea name="remark" id="remark"></textarea>
                                 </li>
                                  <li>
                                  <span> Agent Name</span><select name="agentname" id="agentname">
                                  <?php foreach($getagentlist as $getagent){ ?>
                                  <option value="">Select</option>
                                  <option value="<?php echo $getagent->id; ?>"><?php echo $getagent->name; ?></option>
                                  <?php } ?>
                                  </select>
                                 </li>
                                 
                                  <li>
                                  <span></span><input type="submit" name="order" value="submit" class="button"/>
                                 </li>
                               </ul>
                
                
            
            
            </form>
            </div></div>
               
         </div><!--logEnd middlewrape-->
<?php }
include("includes/footer.php");?>       