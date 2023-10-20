<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("index.php");
  exit;
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>lakesideCreditUnion</title>

  <meta name="description" content="A banking website"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="shortcut icon" href="/images/cp_ico.png"> -->


  <!--stylesheets / link tags loaded here-->


  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">




</head>

<body>
 
 <!-- navbar -->
 <?php include("navbar.php"); ?>

  <div class="container-fluid" id="main">
    <!-- sidebar -->

   <div class="col-md-9 col-lg-10 main">

    <!-- user account details -->

       <?php include("cards.php"); ?>
        <!--/row-->

       <a id="features"></a>
        
       <hr>
        <!-- section section -->
        <div class="row mb-3 second">

          <div class="col-lg-6 col-md-4">

             <?php include("accountinfo.php"); ?>
          <br>

            <!-- transaction -->
            <?php include("transactioninfo.php"); ?>
          
          <br>
          <!-- payment -->
          <?php include("paymentinfo.php"); ?>
          
           

          </div>
          <!-- first lane -->

          <!-- second lane -->
          <div class="col-lg-6 col-md-8">
            <?php include("message_info.php"); ?>

            
<!-- end of messaging -->
<br>

          <!-- Transfer -->
            <?php include("transferinfo.php"); ?>
           
          </div>
          <!-- second lane -->
        </div>
        <!--/row-->

        <a id="more"></a>
        <!-- <hr> -->
        <!-- <h2 class="sub-header">Use card decks for equal height rows of cards</h2> -->
       
        <!--/row-->

        <!-- <a id="flexbox"></a> -->
        <!-- <hr>
        <h2>Masonry-style grid columns</h2>
        <h6>with Bootstrap 4 flexbox</h6>
 -->

        <!--/card-columns-->

        <a id="layouts"></a>
        <hr>
     
        <!--/row-->

      </div>
      <!--/main col-->
    </div>

  </div>
  <!--/.container-->
  <!-- <footer class="container-fluid">
    <p class="text-right small">©2016-2017 Company</p>
  </footer> -->


 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    // sandbox disable popups
    if (window.self !== window.top && window.name != "view1") {
      window.alert = function() {
        /*disable alert*/
      };
      window.confirm = function() {
        /*disable confirm*/
      };
      window.prompt = function() {
        /*disable prompt*/
      };
      window.open = function() {
        /*disable open*/
      };
    }
    
    // prevent href=# click jump
    document.addEventListener(
      "DOMContentLoaded",
      function() {
        var links = document.getElementsByTagName("A");
        for (var i = 0; i < links.length; i++) {
          if (links[i].href.indexOf("#") != -1) {
            links[i].addEventListener("click", function(e) {
              console.debug("prevent href=# click");
              if (this.hash) {
                if (this.hash == "#") {
                  e.preventDefault();
                  return false;
                } else {
                  /*
                      var el = document.getElementById(this.hash.replace(/#/, ""));
                      if (el) {
                        el.scrollIntoView(true);
                      }
                      */
                }
              }
              return false;
            });
          }
        }
      },
      false
    );
  </script>

 

 <!--  <script>
    $(document).ready(function() {
      $("[data-toggle=offcanvas]").click(function() {
        $(".row-offcanvas").toggleClass("active");
      });
    });
  </script> -->

</body>

</html>