<?php include 'header.php'?>
<?php include 'sidebar.php'?>
<?php include 'db.php'?>

	
	<!--for main content------>
	<div class="content">
	<center>
	<img src="images/logo.png" height="100px" width="100"/>
	<form action="" method="post">
		<br/><b> First time create a database :</b><br/>
		<input type="submit" name="create_db" value="Create Database" style=" background:#333; height:30px;color:#FFF ">
		
		<br/><br/><b> Create a Table :</b><br/>
		<input type="submit" name="create_tbl" value="Create Table" style=" background:#333; height:30px;color:#FFF ">
	</form>
		
	<?php
	if(isset($_POST["create_db"])){
			// Query for create database		
			$sql = "CREATE DATABASE $dbname";
			if ($con->query($sql) === TRUE) {
			echo "Database created successfully".'<img src="images/success.png" height="20px">';
			} 
			else 
				echo '<img src="images/error.png" height="20px">'."Error creating database: <font color=#f00>" . $con->error."</font>";
	}
	
	if(isset($_POST["create_tbl"])){
		//query for create table
		$sql="CREATE table $tablename(
		id int(11) auto_increment primary key,
		depertment varchar(20) NOT NULL,
		roll int(6) NOT NULL,
		name varchar(50) NOT NULL,
		gender varchar(20) NOT NULL,
		month_prement_status varchar(20) NOT NULL,
		month_total_taka int(10) NOT NULL,
		semester_prement_status varchar(20) NOT NULL,
		semester_total_taka int(10) NOT NULL,
		last_prement_date varchar(20),
		last_prement_taka int(10)
		)";
		
		if($con_db->query($sql)===TRUE){
				echo "table create success".'<img src="images/success.png" height="20px">';
			}else 
				echo '<img src="images/error.png" height="20px">'."<br/>table created faild :<font color=#f00> ".$con_db->error."</font>";	
	}
	?>
	</center>
	</div>
	
<?php include 'footer.php'?>
