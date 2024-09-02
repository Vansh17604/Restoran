<?php
include("admin/connection.php");
include("css.php");
 
		$value=$_REQUEST['value'];
		$id=$_REQUEST['id'];
	
		
		if($id=="email")
		{
		 $q = "select * from  register where email='$value'";
		$res = mysqli_query($conn,$q);
		if(mysqli_num_rows($res)>0)
		{
			?>
		<!-- <button class="btn btn-danger" disabled="true"></button> -->
		<button class="btn btn-light w-100 py-3 " type="submit" disabled="true">email alredy exist</button>

			
		<?php
		}
		else
		{
		?>
		
			 <!-- <input type="submit" class="btn btn-info"  name="signupbtn"> -->
			 <button class="btn btn-primary" type="submit" name="updbtn">Register</button>

			
		<?php
		}
		?>
		
<?php
		}
?>