<!DOCTYPE html>
<html lang="fi">
	<head>
		<?php
			include "lib/includer.php";
			include "lib/checksession.php";

			$userid=$_SESSION["sessionid"];

			if($userid!=1){
				header("refresh:0;url=index.php");
			}
		?>
	</head>
	<body>
		<section class="container">
			<h1 class="display-3 text-center mt-5 mb-5">Ajanvarauksien hallinta</h1>
			<div class="row">
				<div class="col-12">
					<table class="table table-bordered text-center">
						<thead class="thead-light">
							<tr>
								<th scope="col" style="width: 10%">
									<?php
										$date = new DateTime(date("d.m.Y"));
										echo "vko ".$date->format("W");
									?>
								</th>
								<th scope="col" style="width: 18%">Maanantai</th>
								<th scope="col" style="width: 18%">Tiistai</th>
								<th scope="col" style="width: 18%">Keskiviikko</th>
								<th scope="col" style="width: 18%">Torstai</th>
								<th scope="col" style="width: 18%">Perjantai</th>
							</tr>
						</thead>
						<tbody>
							<?php
								//creates and fills the schedule
								$times = array();

								for ($i = 9; $i <= 18; $i++){ //for loop for times array
								  array_push($times, $i);
								}

								$days = array(1,2,3,4,5);

								for($i = 0; $i < sizeof($times); $i++){ //for loop for columns
									if($times[$i] < 10){
										echo "<tr>"."<th>0".$times[$i].":00-".($times[$i]+1).":00</th>";
									}else{
										echo "<tr>"."<th>".$times[$i].":00-".($times[$i]+1).":00</th>";
									}
									for($k = 0; $k < sizeof($days); $k++){ //for loop for rows

										$query = "SELECT userid, comment FROM schedule WHERE day='$days[$k]' && time='$times[$i]'";
										$result = $connect -> query($query);

										if($result -> num_rows > 0) {
											while($fetch = $result -> fetch_assoc()){
												$userid = $fetch["userid"];
												$comment = $fetch["comment"];
											}

											$query2 = "SELECT name FROM users WHERE id='$userid'"; //checks if there are reservations and fills the table
											$result2 = $connect-> query($query2);

											if ($result2 -> num_rows > 0){
												while($fetch2 = $result2 -> fetch_assoc()){
													$name = $fetch2["name"];
													echo "<td class='bg-info text-white'>".$name."<br>".$comment."</td>";
												}
											}
										}
										else echo "<td></td>";
									}
								}
							 ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<!--modal for scheduling an appointment-->
				<div class="col-lg-3 col-sm-12">
					<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#reservation-modal">Varaa aika</button>
					<div id="reservation-modal" class="modal fade" tabindex="-1" role="dialog">
					  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
					    <div class="modal-content">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<form action="lib/adminreservation.php" method="post">
										<div class="form-group">
											<h3 class="text-center">Varaa aika</h3>
										</div>
										<div class="form-group">
											<select class="form-control" name="day">
												<option value="1">Maanantai</option>
												<option value="2">Tiistai</option>
												<option value="3">Keskiviikko</option>
												<option value="4">Torstai</option>
												<option value="5">Perjantai</option>
											</select>
										</div>
										<div class="form-group">
											<select class="form-control" name="time">
												<?php
													for($i = 0; $i < sizeof($times); $i++){
														echo "<option value=".$times[$i].">".$times[$i].":00</option>";
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label for="comment">Kommentti:</label>
											<textarea class="form-control" name="comment" rows="3"></textarea>
										</div>
										<div class="form-group">
											<input class="btn btn-success btn-block" type="submit" value="Varaa aika">
										</div>
									</form>
								</div>
					  	</div>
						</div>
					</div>
				</div>
				<!--modal for removing an appointment-->
				<div class="col-lg-3 col-sm-3 col-xs-12">
					<button type="button" class="btn btn-warning btn-block text-white" data-toggle="modal" data-target="#remove-modal">Poista aika</button>
					<div id="remove-modal" class="modal fade" tabindex="-1" role="dialog">
					  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
					    <div class="modal-content">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<form action="lib/adminremove.php" method="post">
										<div class="form-group">
											<h3 class="text-center">Poista aika</h3>
										</div>
										<div class="form-group">
											<select class="form-control" name="day">
												<option value="1">Maanantai</option>
												<option value="2">Tiistai</option>
												<option value="3">Keskiviikko</option>
												<option value="4">Torstai</option>
												<option value="5">Perjantai</option>
											</select>
										</div>
										<div class="form-group">
											<select class="form-control" name="time">
												<?php
													for($i = 0; $i < sizeof($times); $i++){
														echo "<option value=".$times[$i].">".$times[$i].":00</option>";
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<input class="btn btn-warning btn-block text-white" type="submit" value="Poista aika">
										</div>
									</form>
								</div>
					  	</div>
						</div>
					</div>
				</div>
				<!--remove all appointments-->
				<div class="col-lg-3 col-sm-3 col-xs-12">
					<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#removeall-modal">Poista varatut ajat</button>
					<div id="removeall-modal" class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<div class="form-group">
										<h3 class="text-center">Poistetaanko<br>kaikki varatut ajat?</h3>
									</div>
									<div class="form-group">
										<a role="button" class="btn btn-danger btn-block" href="lib/adminremoveall.php">Kyllä</a>
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-light btn-block" data-dismiss="modal">Peruuta</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--logout button-->
				<div class="col-lg-3 col-sm-12">
					<a role="button" class="btn btn-info btn-block" href="lib/logout.php">Kirjaudu ulos</a>
				</div>
			</div>
		</section>
	</body>
</html>
