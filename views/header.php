<?Session::init();?>
<html>
<head>

	<title><?=(isset($this->title)) ? $this->title : 'Login System';?></title>
	<link rel="stylesheet" href="<?=URL;?>public/css/default.css" />
	<link rel="stylesheet" href="<?=URL;?>public/DataTables/datatables.css" />
	<link rel="stylesheet" href="<?=URL;?>public/css/bootstrap.css" />
	<link rel="stylesheet" href="<?=URL;?>public/css/font-awesome.css" />
	<script src="<?=URL;?>public/js/jquery.js"></script>
	<script src="<?=URL;?>public/DataTables/datatables.js"></script>
	<script src="<?=URL;?>public/js/bootstrap.js"></script>
	
	<?
	if(isset($this->css))
	{
		foreach($this->css as $css)
		{
			echo '<link rel="stylesheet" href="'.URL.'views/'.$css.'" />';
		}	
	}
	if(isset($this->js))
	{
		foreach($this->js as $js)
		{
			echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
		}	
	}
	?>	
</head>	
<body>
		<nav class="no-print navbar navbar-default">
				 <div class="container-fluid">
				 <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#"></a>
				    </div>
	
               <!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				 <ul class="nav navbar-nav">
                    <? if(Session::get('loggedIn')==false){?>
                    <li><a href="<?=URL?>login/" tabindex="-1">Login</a></li>
                    <?}?>
                    <? if(Session::get('loggedIn')==true){?>
						<li><a href="/users/" tabindex="-1">List of users</a>
						</li>
						<li><a href="/login/loginLog" tabindex="-1">Login log</a>
						</li>


						<li><a href="<?=URL?>login/logout" tabindex="-1">LogOut</a></li>
	                <?}?>    
                    <br />
                    </ul>
                </div>
                </div>
            </nav>
	<div id="body">
		
	<div class="contenido">
