<!DOCTYPE html>
<html lang="fi">
<head>
	<?php include "lib/includer.php";?>
</head>
<body>
	<section class="container text-center">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<h1 class="mt-5 display-3">Parturi/Kampaamo ajanvaraus</h1>
				<div class="card mt-5">
					<div class="card-body">
						<form action="lib/login.php" method="post">
							<div class="form-group mb-4">
								<h2>Kirjaudu sisään</h2>
							</div>
							<div class="form-group">
								<input class="form-control" name="email" placeholder="Sähköposti" type="email">
							</div>
							<div class="form-group">
								<input class="form-control" name="pwd" placeholder="Salasana" type="password">
							</div>
							<div class="form-group">
								<button class="btn btn-success btn-block" type="submit">Kirjaudu sisään</button>
							</div>
							<p>tai</p>
							<div class="form-group">
								<button class="btn btn-info btn-block" type="button" data-toggle="modal" data-target="#register-modal">Rekisteröidy</button>
							</div>
						</form>
		      </div>
				</div>
				<div id="register-modal" class="modal fade" tabindex="-1" role="dialog">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<form action="lib/register.php" method="post">
		 						 <div class="form-group mb-4">
		 							 <h2>Rekisteröidy</h2>
		 						 </div>
		 						 <div class="form-group">
		 							 <input class="form-control" name="name" placeholder="Nimi" type="name">
		 						 </div>
		 						 <div class="form-group">
		 							 <input class="form-control" name="email" placeholder="Sähköposti" type="email">
		 						 </div>
		 						 <div class="form-group">
		 							 <input class="form-control" name="phone" placeholder="Puhelin" type="tel">
		 						 </div>
		 						 <div class="form-group">
		 							 <input class="form-control" name="pwd1" placeholder="Salasana" type="password">
		 						 </div>
		 						 <div class="form-group">
		 							 <input class="form-control" name="pwd2" placeholder="Varmista salasana" type="password">
		 						 </div>
		 						 <div class="form-group">
		 							 <button class="btn btn-info btn-block" type="submit">Rekisteröidy</button>
		 						 </div>
		 					 </form>
				      </div>
				  	</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
