<?php include 'header.php'?>
<?php include 'sidebar.php'?>
<?php include 'db.php'?>
	
	
	<!-------------for main content----------------->
	<div class="content">
	<center>
	
	<?php
	 
		if(isset($_GET["search"]) or isset($_GET["month"])){
		$depertment=$_GET["depertment"];
		$roll=$_GET["roll"];
		//cheack connecttion
		if($con_db->connect_error){
			echo 'Connection Faild: '.$con_db->connect_error;
			}else{
				//query for search
				$sql="select * from $tablename where depertment like '$depertment' AND roll like '$roll' ";
				$res=$con_db->query($sql);
				if($res->num_rows>0){
					while($row=$res->fetch_assoc()){
	?>
	
					<div class="user">
						<ul>
							<li>
							<!-------------------show user information--------------------->
							<table border="0" width="100%">
								<tr>
									<td>
										<h3 style="color:#ED1B24;">Information:</h3>
									</td>
								</tr>
								<tr>
									<td>
										<img src="students/<?php echo $row["depertment"].$row["roll"]; ?>.jpg" style="border-radius:5px;height:100px; width:100px;"><br/> 
										<div style="font-size:20px;"><b><?php echo $row["name"];?></b></div>
									</td>
									<td> 
										<table>
											<tr><td><b>Id:</b></td><td><?php echo $row["id"];?></td></tr>
											<tr><td><b>Roll:</b></td><td><?php echo $row["roll"];?></td></tr>
											<tr><td><b>Depertment:</b></td><td><?php echo $row["depertment"];?></td></tr>
											<tr><td><b>Last Prement:</b></td><td><?php echo $row["last_prement_taka"].'  Taka';?> </td></tr>
											<tr><td><b>Last Pre.Date:</b></td><td><?php echo $row["last_prement_date"];  ?></td></tr>
										</table>
									</td>
									<td> 
										<table>
											<tr><td><b>Total Month Prement:  </b></td><td><?php echo $row["month_total_taka"].' Taka';?></td></tr>
											<tr><td><b>Month Prement Status: </b></td><td><?php echo $row["month_prement_status"].' Month';?></td></tr>
											<tr><td><b>Total Semester Prement: </b></td><td><?php echo $row["semester_total_taka"].' Taka';?></td>
											<tr><td><b>Semester Prement Status:</b></td><td><?php echo $row["semester_prement_status"].' Semester';?></td></tr>
											<tr><td><b>Total Prement:</b></td><td ><b><?php echo $row["month_total_taka"]+$row["semester_total_taka"]. ' Taka';?></b></td></tr>
										</table>
									</td>
								</tr>
							</table>
							</li>
							<li>
							<table width="100%">
								<tr>
								<tr>
									<td>
										<h3 style="color:#ED1B24;">Add Prement:</h3>
									</td>
								</tr>
								<tr>
									<td> 
									<!-------------------for month taka Form--------------------->
										<fieldset> 
											<legend>&nbsp; For Monthly Fees &nbsp;</legend>
												<form action="" method="post">
													<table>
														<tr>
															<td>TAKA: </td>
															<td><input type="text" name="taka" required> </td>
														</tr>
														<tr>
															<td> </td>
															<td><input type="submit" name="fees" value="Save" style=" background:#333; height:30px;color:#FFF "> <td>
														</tr>
													</table>
												</form>
												<!--------------------add Month taka database-------------------->
												<?php
												if(isset($_POST["fees"])){
													$taka=$_POST["taka"];

													if($taka>=1600 && $row["month_prement_status"]<=48 && $taka/1600==1 or $taka/1600==2 or $taka/1600==3 or $taka/1600==4 or $taka/1600==5 or $taka/1600==6 or $taka/1600==7 or $taka/1600==8 or $taka/1600==9 or $taka/1600==10 or $taka/1600==11 or $taka/1600==12 or $taka/1600==13 or $taka/1600==14 or $taka/1600==15 or $taka/1600==16 or $taka/1600==17or $taka/1600==18or $taka/1600==19 or $taka/1600==20 or $taka/1600==21 or $taka/1600==22 or $taka/1600==23 or $taka/1600==24 or $taka/1600==25 or $taka/1600==26 or $taka/1600==27 or $taka/1600==28 or $taka/1600==29 or $taka/1600==30 or $taka/1600==31 or $taka/1600==32 or $taka/1600==33 or $taka/1600==34 or $taka/1600==35 or $taka/1600==36 or $taka/1600==37 or $taka/1600==38 or $taka/1600==39 or $taka/1600==40 or $taka/1600==41 or $taka/1600==42or $taka/1600==43 or $taka/1600==44 or $taka/1600==45 or $taka/1600==46 or $taka/1600==47 or $taka/1600==48)
													{	$id=$row["id"];
														$month=$taka/1600;
														$month_total_taka=$row["month_total_taka"]+$taka;
														$month_prement_status=$month_total_taka/1600;
														$last_prement_date=date('d/m/Y');
														$last_prement_taka=$_POST["taka"];
														
														$sql="UPDATE $tablename SET month_prement_status='$month_prement_status',month_total_taka=$month_total_taka,last_prement_date='$last_prement_date',last_prement_taka='$taka' where id=$id";
														if($con_db->query($sql)== true){
															echo "$month Month taka Add succesfuly".'<img src="images/success.png"/>';
														}else{
															echo '<img src="images/error.png" height="20px"> Faild saved :'.$con_db->error;
														}
													}else{
														echo  '<img src="images/error.png" height="20px"> Mont Fees '.$taka.' Taka is not Allow';
													}
												}
												 ?>
												 
										</fieldset>
									</td>
									<td>
									<!--------------------for semester taka Form-------------------->
										<fieldset> 
											<legend>&nbsp; For Semester Fees &nbsp;</legend>
												<form action="" method="post">
													<table>
														<tr>
															<td>TAKA: </td>
															<td><input type="text" name="taka" required> </td>
														</tr>
														<tr>
															<td> </td>
															<td><input type="submit" name="mtaka" value="Save" style=" background:#333; height:30px;color:#FFF "> <td>
														</tr>
													</table>
												</form>
												<!--------------------add semester taka in database-------------------->
												
												<?php
												if(isset($_POST["mtaka"])){
													$taka=$_POST["taka"];

													if($taka>=3500 && ($taka/3500==1  or $taka/3500==2 or $taka/3500==3 or $taka/3500==4 or $taka/3500==5 or $taka/3500==6 or $taka/3500==7) && $row["semester_total_taka"]<=28000  )
													{
														$semester=$taka/3500;
														$id=$row["id"];
														$semester_total_taka=$row["semester_total_taka"]+$taka;
														$semester_prement_status=$semester_total_taka/3500;
														$last_prement_date=date('d/m/Y');
														$last_prement_taka=$_POST["taka"];
														
														$sql="UPDATE $tablename SET semester_prement_status='$semester_prement_status',semester_total_taka=$semester_total_taka,last_prement_date='$last_prement_date',last_prement_taka='$taka' where id=$id";
														if($con_db->query($sql)== true){
															echo "$semester Semester Taka Add succesfuly ".'<img src="images/success.png"/>';
														}else{
															echo '<img src="images/error.png" height="20px"> Faild saved :'.$con_db->error;
														}
													}else{
														echo  '<img src="images/error.png" height="20px"> Semester Fees '.$taka.' Taka is not Allow';
													}
												}
												 ?>
												
										</fieldset>
									</td>
								</tr>
							</table>
							</li>
						</ul>
						
						<!--------------------for show prement details-------------------->
						<ul style="color:#ED1B24;">
							<li><h3>Prement Details:</h3><br/>
								
							<table width="100%">
							<tr>
								<td><b>Total Semester Fees: (<font color="#000"><?php echo $row["semester_total_taka"].' Taka';?></font>) </b><br/><b>Total Month Prement: (<font color="#000"><?php echo $row["month_total_taka"].' Taka';?></font>) <b></td>
								<td><b>Total Taka: (<font color="#000"><?php echo $row["semester_total_taka"]+$row["month_total_taka"].' Taka';?></font>) </b></td> 
								<td><b>Semester Prement Status:( <font color="#000"><?php echo $row["semester_prement_status"].' Semester'?></font>)<br/>Month Prement Status:( <font color="#000"><?php echo $row["month_prement_status"].' Month'?><font color="#000">)</b></td>
							</tr>
								</table>
							
							<br/>
							<form action="" method="post">
							<input type="submit" name="month" value="Month" style=" background:#333; height:30px;color:#FFF ">
							<input type="submit" name="semester" value="Semester" style=" background:#333; height:30px;color:#FFF ">
							</form>
							<?php 
							if(isset($_POST["month"] ))
							{
								for($m=1;$m<=$row["month_prement_status"];$m++)
								{
								?>	<li>
										<table width="100%">
										<tr><td><b>Month-<?php echo $m;?><b></td> <td><b><img src="images/success.png"/></b></td>  <td><b>Taka: 1600</b></td></tr>
										</table>
									</li>
								
							
								<?php
								} 
								}else{
								for($s=1;$s<=$row["semester_prement_status"];$s++)
								{
									?>
								
								<li>
								<table width="100%">
								<tr><td><b>Semester-<?php echo $s;?><b></td> <td><b><img src="images/success.png"/></b></td>  <td><b>Taka: 3500</b></td></tr>
								</table>
							</li>
							
								
								
								<?php
								}
							} 
						} 
	 }else {echo '<h1>No Data Faund</h1>';} 	
 }
 } ?>

				</ul>
			
		</div>
	</center>
	</div>
	
<?php include 'footer.php'?>
	
	