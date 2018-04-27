
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 

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
    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">FastIMG</a> 
      <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>  
      </div>
    </nav>

    <main role="main" class="container">
      <div class="jumbotron">
        <h1>FastIMG</h1>
        <p class="lead">A free and open source temporary image uploading platform respecting your privacy<small>*</small>.</p>
        <small>*: When your image expire, it's permanently removed. We don't save any data about the uploader, visitor or image.</small><br><br>
        <form action="upload.php" method="post" id="form" name="form" enctype="multipart/form-data">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="duration" id="duration" value="3600" checked="true">
                <label class="form-check-label" for="duration">1h</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="duration" id="duration" value="10800">
                <label class="form-check-label" for="duration">3h</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="duration" id="duration" value="43200">
                <label class="form-check-label" for="duration">12h</label>
            </div><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="duration" id="duration" value="86400">
                <label class="form-check-label" for="duration">24h</label>
            </div><br>
            <br>
            <a class="btn btn-lg btn-primary btn-file" href="#" role="button">Upload &raquo;<input id="file" name="file" type="file" accept="image/*"></a>
        </form>
      </div>
    </main> 
    
    <script>
    document.getElementById("file").onchange = function() {
        document.getElementById("form").submit();
    };
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
