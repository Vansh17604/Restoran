<?php
include("connection.php");
include("session_admin.php");
 
		$value=$_REQUEST['value'];
		$id=$_REQUEST['id'];
	
		
		if($id=="cat")
		{
		 $q = "select * from  product where product_name='$value'";
		$res = mysqli_query($conn,$q);
		if(mysqli_num_rows($res)>0)
		{
			?>
		<!-- <button class="btn btn-danger" disabled="true"></button> -->
		<button class="btn btn-danger " type="submit" disabled="true">Product alredy exists</button>

			
		<?php
		}
		else
		{
		?>
		
			 <!-- <input type="submit" class="btn btn-info"  name="signupbtn"> -->
			 <button class="btn btn-primary" type="submit" name="submit">Submit</button>

			
		<?php
		}
		?>
		
<?php
		}
?>