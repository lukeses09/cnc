<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-primary">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="about.php">ChatsN'Chiens</a>
    <ul class="nav navbar-nav">
      <li><a href="Login.php">Login</a></li>
    </ul>
  </div>
</nav>
<div id="Carousel" class="carousel slide carousel-fade col-lg-12 col-offset-2">
        <ol class="carousel-indicators">
            <li data-target="Carousel" data-slide-to="0" class="active"></li>
            <li data-target="Carousel" data-slide-to="1"></li>
            <li data-target="Carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <div align="center"><img src="pics/bg2.jpg" width="1700" height="500" class="img-responsive"> </div>
            </div>
           <div class="item">
             <div align="center"><img src="pics/bg1.jpg" width="1700" height="500" class="img-responsive"> </div>
          </div>
           
        </div>

        <a class="left carousel-control" href="" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#Carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
</div>
</body>
</html>
