<?php
session_start();
if($_SESSION['username']){
?>
<!DOCTYPE html>
<html>
	<head>
		<title>mainpage</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.js"></script>
		<link rel="stylesheet" type="text/css" href="css/color-picker.min.css">
		<script type="text/javascript" src="js/color-picker.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Feedback Lamp</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a class="nav-link" href="#"><b>Home</b> <span class="sr-only">(current)</span></a></li>
					<!-- <li><a  class="nav-link" href="logout.php">logout</a></li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a  class="nav-link" href="logout.php">Welcome <?=$_SESSION['username']?></a></li>
					<li><a  class="nav-link" href="logout.php">logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
					
					<div class=" navbar-collapse" id="navbarText">
								<ul class="navbar-nav mr-auto">
											<li class="nav-item active">
														
											</li>
											<li>
														
											</li>
								</ul>
								<span class="navbar-text">
					Your logged in as <?=$_SESSION['username']?>
				</span>
			</div>
		</nav> -->
		<div class="container-fluid content">
			<div class="row ">
				<div class="col-md-6">
					<div class="firsthalf">
						
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#Maximum">Maximum</a></li>
						<li><a data-toggle="tab" href="#Middel">Middel</a></li>
						<li><a data-toggle="tab" href="#Minimum">Minimum</a></li>
					</ul>
					<div class="tab-content">
						<div id="Maximum" class="tab-pane fade in active form">
							<form>
								<div class="row ">
									<label class="col-md-3">Maximale waarde:</label>
									<div class="input-group col-md-3">
									<span class="input-group-addon">%</span>
									<input id="max" type="text" value="#6b678a" class="form-control" name="max" placeholder="maximale">
								</div>
								</div>
								
								<label>Colorpicker:</label>
								<div class="input-group">
									<input id="color-max" type="text" name="color-max" >
								</div>
							</form>
						</div>
						<div id="Middel" class="tab-pane fade">
														<form>
								<div class="row ">
									<label class="col-md-3">Maximale waarde:</label>
									<div class="input-group col-md-3">
									<span class="input-group-addon">%</span>
									<input id="max" type="text" value="#6b678a" class="form-control" name="max" placeholder="maximale">
								</div>
								</div>
								
								<label>Colorpicker:</label>
								<div class="input-group">
									<input id="color-max" type="text" name="color-max" >
								</div>
							</form>
						</div>
						<div id="Minimum" class="tab-pane fade">
														<form>
								<div class="row ">
									<label class="col-md-3">Maximale waarde:</label>
									<div class="input-group col-md-3">
									<span class="input-group-addon">%</span>
									<input id="max" type="text" value="#6b678a" class="form-control" name="max" placeholder="maximale">
								</div>
								</div>
								
								<label>Colorpicker:</label>
								<div class="input-group">
									<input id="color-max" type="text" name="color-max" >
								</div>
							</form>
						</div>
					</div>
					</div>
					<div class="row secondhalf">
						<div class="col-md-6">
							<h5>Current state</h5>
								<div class="row">
									<div class="col-md-6">
										Minimale limiet:
									</div>
									<div class="col-md-6 limitsmall" >
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										Middel limiet:
									</div>
									<div class="col-md-6 limitmiddel">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										Maximale limiet:
									</div>
									<div class="col-md-6 limitmaximale">
										
									</div>
								</div>

						</div>
						<div class="col-md-6"></div>
					</div>
				</div>
				<div class="col-md-6 border"><img class="lightbulb" src="images/lightbulb.png"></div>
			</div>
		</div>
	</body>
    <script>
    var picker = new CP(document.querySelector('#color-max'));

    picker.set('#000000');
    picker.on("change", function(color) {
        this.source.value = '#' + color;
        console.log(color);
        $('.lightbulb').css('background-color',  '#' + color);

    });
    </script>
</html>
<?php
} else{
	header("location:index.php");
}?>