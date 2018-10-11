<?php
include"connect.php";
$sel_category = $db->query("SELECT * FROM categories");


 ?>
<!-- Bootstrap core CSS -->
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">

      <script src="jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
      $(function(){
        $('#come').click(function(){
          $('#comment').slideToggle(400);
          return false;
        });
      });
    </script>
  </head>

  <body role="document">

    <!-- Fixed navbar -->
<nav class="navbar navbar-fixed-top navbar-tabs navbar-justified" role="navigation"  style="background-color:  #8FBC8F;">
      <div>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Menu</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav nav-pills ">
            <li class=""><a href="index.php">Home</a></li>
            <li><a href="contacts.php">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <?php while ($sel_results = mysqli_fetch_assoc($sel_category)):  ?>
                  <li role="presentation"><a href="item.page.php?category=<?=$sel_results['name']; ?>"><?=$sel_results['name']; ?></a></li>
                  <li class="divider"></li>
                <?php endwhile; ?>

            </li>


                    </ul>
                     <li class="push-right" style="margin-right: 100px;"><a href="welcome.php">Logout</a></li>

        </div><!--/.nav-collapse -->
      </div>
    </div>
  
</nav>