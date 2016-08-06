<!DOCTYPE html>
<?php
include ("config/koneksi.php");
include ("function/asuransi.php");
include ("function/tanggal.php");
//session_start();
?>
<html>
  <head>
    <title>AMD | System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='ICON' type='image/x-icon' href="img/icon.ico" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/blueprintku.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	
	<style>
	body {
		padding-top: 60px;
	}
	</style>
  </head>
  <body>
    <script src="js/jquery-2.0.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

	
	<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="?p=beranda" class="navbar-brand">AMD | 01</a>		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">

					<li><a href="?P=OS" >Data Kendaraan <b class="caret"></b></a></li>
					<!-- INI YG PKE DROPDOWN ^^ 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Kendaraan <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="?p=os" style="font-weight:bold;">Data Outstanding &raquo; </a></li>
						<li class="divider"></li>
						<li><a href="?p=gantiwarna">Keterangan Ganti Warna</a></li>
						
					</ul>
					-->
									
				
				<li><a href="?p=jasa">Jasa</a></li>
				<li><a href="?p=sparepart">Spare Part</a></li>
			
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaturan <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="?p=asuransi" >Asuransi</a></li>
						
						<li><a href="?p=status">Status</a></li>
						
					</ul>
				
				</li>
				
				</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>
    

<br />
<div class="container">
	<div id="konten">
	<?php include ("isi/konten.php") ?>
		
	</div>
</div>
	
	

  </body>
</html>

<script src="js/fungsi.js"></script>	
<script src="js/crud.js"></script>