<?php
require_once('header.php');
?>
			<div class="panel panel-success">
                <div class="panel-heading">
					<h3 class="panel-title">Search for Applicant Using First Name</h3>
                </div>
				<div class="panel-body">
					<form role="form" method="post" name="customerFinder" onSubmit="<?php echo $_SERVER['PHP_SELF'];?>">
						<div class="form-group">
							<label for="searchString">Applicant First Name</label>
							<input type="text" class="form-control" name="searchString" id="searchString" placeholder="Enter First Name of Applicant">
						</div>
						<input type="submit" name="Search" id="Search" class="btn btn-default" onClick="document.pressed=this.value" value="Search">
					</form>
				</div>
<?php
require_once('dbconn.php');

if(isset($_REQUEST["searchString"]))
{
	$searchString= $_REQUEST["searchString"];
    if(!is_numeric($searchString))
    {
        //entered alphanumeric
        $searchString= strtoupper($searchString);
        $query= "select id, lastname, firstname, midname, address, city, state, country, emailaddress, contactnumber from applicant where firstname='%".$searchString."%'";
    }
    /*
	else
    {
        //entered numeric
        //$query= "SELECT customer.id, customer.lastname, customer.firstname, customercontact.phonenumber, customeraddress.doorfloorhousecompoundblocklot, customeraddress.streetname, customeraddress.zoneNumber, brgyname.brgyname, towncity.towncityname, customeraddress.zipcode, country.countryname, customernotes.noteentry FROM customer, customercontact, customeraddress, brgyname, towncity, country, customernotes WHERE customer.id=customercontact.customerid AND customeraddress.customerid=customer.id AND customeraddress.brgyname=brgyname.id AND brgyname.towncityid=towncity.id AND towncity.countryid=country.id AND customernotes.customerid=customer.id AND customercontact.phonenumber LIKE '%".$searchString."%' order by customer.lastname asc";
    }*/
		
	$stmt= $dbh->query($query);
	$result= $stmt->fetchAll();
	if(sizeof($result) > 0)
	{
?>
				<div class="list-group" role="navigation">
<?php	
		foreach($result as $row)
		{
?>
					<a href="addOrder.php?applicantId=<?php echo "$row[0]"; ?>" class="list-group-item"><strong><?php echo "$row[1], $row[2]";?></strong><br/><em><?php echo $row[3]; ?></em><br/><?php echo "$row[4] $row[5] Zone $row[6] $row[7] $row[8] $row[9] $row[10]" ;?></a>
<?php
		}
?>
				</div>
<?php		
	}
	$dbh= null;
}
?>
			</div>
<?php
require_once('footer.php');