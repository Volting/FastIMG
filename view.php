<?php
if(!isset($_GET['i'])){ header('Location: index.php'); die("<a href='index.php'>If you're not redirected, please click here</a>"); }
$bdd = mysqli_connect("", "", "", "");
$imgq = mysqli_query($bdd, "SELECT * FROM images WHERE id='".$_GET['i']."'");
if(mysqli_num_rows($imgq) == 0){ header('Location: index.php?e=nf'); die("<a href='index.php?e=nf'>If you're not redirected, please click here</a>"); }
$img = mysqli_fetch_assoc($imgq);
if(time() > $img['expire']){ unlink("img/".$img['file']); mysqli_query($bdd, "DELETE FROM images WHERE id=".$_GET['i']); header('Location: index.php?e=expired'); die("<a href='index.php?e=expired'>Expired image. Click here if you're not redirected.</a>"); }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A free and open source temporary image uploading platform respecting your privacy">
    <meta name="author" content="Volting">
    
    <meta property="og:title" content="FastIMG">
    <meta property="og:description" content="A free and open source temporary image uploading platform respecting your privacy">
    <meta property="og:image" content="data:image/<?php echo $img['ext']; ?>;base64,<?php echo base64_encode(file_get_contents("img/".$img['file'])) ?>">

    <meta name="twitter:title" content="FastIMG">
    <meta name="twitter:description" content="A free and open source temporary image uploading platform respecting your privacy">
    <meta name="twitter:image" content="data:image/<?php echo $img['ext']; ?>;base64,<?php echo base64_encode(file_get_contents("img/".$img['file'])) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@voltingg">

    
    <title>Volting | FastIMG</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
    
    <style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    img {
        max-width: 100%;
        max-height: 100%;
    } 
    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">FastIMG</a> 
      <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto"> 
        </ul>
        <form class="form-inline my-2 my-lg-0" action="https://github.com/Volting/FastIMG"> 
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Github</button>
        </form>
      </div>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="jumbotron">
        <h1>FastIMG</h1>
        <p class="lead">A free and open source temporary image uploading platform respecting your privacy<small>*</small>.</p>
        <small>*: When your image expire, it's permanently removed. We don't save any data about the uploader, visitor or image.</small><br><br>
        <a class="btn btn-lg btn-primary btn-file" href="index.php" role="button">Upload &raquo;</a>
      </div><br><br>
      <div class="jumbotron">
        <img src="data:image/<?php echo $img['ext']; ?>;base64,<?php echo base64_encode(file_get_contents("img/".$img['file'])) ?>">
      </div>
    </main> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
