<?php include("MIL/header.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="A web application for machine learning.">

   <title>LearnMachineLearn</title>

   <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

   <link rel="stylesheet" href="css/dashboard.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	 <link rel="stylesheet" href="css/cytoscape.css">
	 <script src="https://unpkg.com/dagre@0.7.4/dist/dagre.js"></script>
   <script src="https://cdn.rawgit.com/cytoscape/cytoscape.js-dagre/1.5.0/cytoscape-dagre.js"></script>

	 

	<script src ="js/headerJS.js"> </script>

</head>

<!-- Handling the POST requests -->
<!-- If a match is found, then we load the required PHP script -->
<?php include("MIL/handleLogin.php")?>

<body>
<?php include("MIL/modals.php")?>
<?php include("General/topBar.php") ?>

	<!-- Start of main container -->

  <div class="container-fluid metagolbg">
    <div class="row">
			<!-- Sidebar menu -->

			<?php include("General/sideBar.php"); ?>

			<?php include("MIL/MIL.php") ?>

			<?php include("NN/NN.php") ?>
    </div>
  </div>
	<!-- End of of main container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="js/MIL.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
		<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>		<!-- <script src="js/bootstrap.min.js"></script> -->
		<script src="js/metagol.js"></script>
		<script src="js/NN.js"></script>
	<!-- Cytoscape for diagrams -->
	<script src='cytoscape/cytoscape.js'></script>
    <!-- Icons -->
    <script src="js/feather.min.js"></script>
	<!-- Cytoscape Initialisation -->
	<script src="js/cyto.js"></script>

  </body>
</html>