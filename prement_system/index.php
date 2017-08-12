<?php include 'header.php'?>
<?php include 'sidebar.php'?>
<?php include 'db.php'?>
	
	
	<!--for main content------>
	
	<div class="content">
	<center>
	<?php
	if($con_db->connect_error){
		echo '<img src="images/logo.png" height="100px" width="100"/><br/><h2>1. Please Click Create Button On Sidebar <br/>2. Create Database <br/>3. Create Table<br/>and Enjoy</h2>';
	}else{
	?>
		<img src="images/logo.png" height="100px" width="100"/><br/><div style="font-size:30px"> Select Student for Prement:</div><br/>
			<form action="user.php?" enctype="multipart/form-data" method="get">
				<table>
					<tr>
						<td>Depertment: </td>
						<td>
						<select name="depertment" required>
						<option value="">Please Select</option>
						<option value="CMT">CMT</option>
						<option value="MRT">MRT</option>
						<option value="EET">EET</option>
						<option value="GDPT">GDPT</option>
						<option value="civil">civil</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>Roll: </td>
						<td><input type="text" name="roll" required> </td>
					</tr>
					
					<tr>
						<td> </td>
						<td><input type="submit" name="search" value="GO" style=" background:#333; height:30px;color:#FFF "> <td>
					</tr>
				</table>
			</form>
	<?php }?>
<center>

	</div>
	
<?php include 'footer.php'?>
	
	