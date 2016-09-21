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
<div class="container">

<form class="form-signin" action="<?=URL?>login/run" method="post">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <br>
    <a href="/users/signup"><div class="btn btn-lg btn-info btn-block">Sign up</div></a>
</form>

</div> <!-- /container -->



</body>
</html>