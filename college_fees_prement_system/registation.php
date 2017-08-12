<?php include 'header.php'?>
<?php include 'sidebar.php'?>
<?php include 'db.php'?>
	
	<!--for main content------>
	<div class="content">
	<center>
	<img src="images/logo.png" height="100px" width="100"/><br/><div style="font-size:30px"> Registation for a new student:</div><br/>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
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
					<td>Name: </td>
					<td><input type="text" name="name" required>  </td>
				</tr>
				
				<tr>
					<td>gender: </td>
					<td>
						<input type="radio" name="gender" value="Male" required>Male<br/>
						<input type="radio" name="gender" value="Female" required>Female
					</td>
				</tr>
				
				<tr>
					<td>Student Pic:</td>
					<td><input name="fileField" type="file" size="42" required/> </td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="submit" name="submit" value="Registation" style=" background:#333; height:30px;color:#FFF "> <td>
				</tr>
			</table>
		</form>
		
		
		<!--php code-->
		<?php  
		
		if(isset($_POST['submit'])){
			//get value used post
			 $depertment= $_POST["depertment"];
			 $roll= $_POST["roll"];
			 $name= $_POST["name"];
			 $gender= $_POST["gender"];
		
		//for upload picture
		$newname =$depertment.$roll.'.jpg';
		move_uploaded_file( $_FILES['fileField']['tmp_name'], "students/".$newname);
		
		
		//for check connection
		if($con_db->connect_error){
		die('<img src="images/error.png" height="20px">'."Connection faild :".$con_db->connect_error);
		}else
		//for add data in table used SQL
		//insert data into table
		$sql="INSERT INTO $tablename(depertment, roll, name, gender)
	 VALUES('$depertment','$roll','$name','$gender')";
		if($con_db->query($sql) === TRUE){		
			echo '<br/>New record created successfully <img src="images/success.png" height="20px"><br/>';
			echo '<table style="background:#ccc; border:1px solid #0066FF;box-shadow:5px 5px 10px #0066FF;"><tr><td>Depertment is:</td> <td>'.$depertment.'<br/>';
			echo '<tr><td>Roll is: </td><td>'. $_POST["roll"].'</td></tr>';	 
			echo '<tr><td>Name is:</td><td> '.$_POST["name"].'</td></tr>';
			echo '<tr><td>gender is:</td><td> '.$_POST["gender"].'</td></tr></table>';
		}else
		 echo '<img src="images/error.png" height="20px">'. 'Ettor: '.$sql."<br/>".$con->error; 

		}
		?>
		
		
		
		
<center>
	</div>
	
<?php include 'footer.php'?>
	