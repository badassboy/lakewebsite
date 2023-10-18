<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html>

<head>
  <meta charset="utf-8">
  <title>Bootstrap 4 Dashboard</title>
  <base target="_self">
  <meta name="description" content="A Bootstrap 4 admin dashboard theme that will get you started. The sidebar toggles off-canvas on smaller screens. This example also include large stat blocks, modal and cards. The top navbar is controlled by a separate hamburger toggle button."
  />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google" value="notranslate">
  <link rel="shortcut icon" href="/images/cp_ico.png">


  <!--stylesheets / link tags loaded here-->


  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="css/dashboard.css">




</head>

<body>
  <nav class="navbar navbar-fixed-top navbar-toggleable-sm navbar-inverse bg-primary mb-3">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="flex-row d-flex">
      <a class="navbar-brand mb-1" href="#">Brand</a>
      <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#features">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#myAlert" data-toggle="collapse">Wow</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">About</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav flex-column pl-1">
          <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
         
          <li class="nav-item"><a class="nav-link" href="#">Account</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Transfer</a></li>
          <li class="nav-item"><a class="nav-link" href="">Deposit Check</a></li>
          <li class="nav-item"><a class="nav-link" href="">Payment</a></li>
          <li class="nav-item"><a class="nav-link" href="">Messages</a></li>
          
        </ul>
      </div>
      <!--/col-->

      <div class="col-md-9 col-lg-10 main">

        <!--toggle sidebar button
            <p class="hidden-md-up">
                <button type="button" class="btn btn-primary-outline btn-sm" data-toggle="offcanvas"><i class="fa fa-chevron-left"></i> Menu</button>
            </p>-->

      <!--   <h1 class="display-2 hidden-xs-down">
            Bootstrap 4 Dashboard
            </h1> -->
        <!-- <p class="lead hidden-xs-down">(with off-canvas sidebar, based on BS v4 alpha 6)</p> -->

        <div class="alert alert-warning fade collapse" role="alert" id="myAlert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
          <strong>Holy guacamole!</strong> It's free.. this is an example theme.
        </div>

      
        <!-- user account details -->

        <div class="row mb-3 first">

        <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse">
              <div class="card-body">
                <div class="rotate">
                  <i class="fa fa-user fa-2x"></i>
                </div>
                <h6 class="text-uppercase">Transfer</h6>
                <!-- <h1 class="display-2">134</h1> -->
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse">
              <div class="card-body">
                <div class="rotate">
                  <i class="fa fa-list fa-2x"></i>
                </div>
                <h6 class="text-uppercase">Deposit</h6>
                <!-- <h1 class="display-1">87</h1> -->
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse">
              <div class="card-body">
                <div class="rotate">
                  <i class="fa fa-twitter fa-2x"></i>
                </div>
                <h6 class="text-uppercase">Pay a bill</h6>
                <!-- <h1 class="display-1">125</h1> -->
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse">
              <div class="card-body">
                <div class="rotate">
                  <i class="fa fa-share fa-2x"></i>
                </div>
                <h6 class="text-uppercase">Message</h6>
                <!-- <h1 class="display-1">36</h1> -->
              </div>
            </div>
          </div>

        </div>
        <!--/row-->

       

      

        <a id="features"></a>
        
       

        <hr>
        <!-- section section -->
        <div class="row mb-3 second">

          <div class="col-lg-6 col-md-4">

             <ul class="list-group">
             <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Accounts</h5>
      <!-- <small>3 days ago</small> -->
    </div>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Checkings
              <span class="badge badge-primary badge-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Savings
              <span class="badge badge-primary badge-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Loans
              <span class="badge badge-primary badge-pill">1</span>
            </li>
          </ul>
          <br>
            <!-- transaction -->
          <ul class="list-group">
             <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Transaction</h5>
      <!-- <small>3 days ago</small> -->
    </div>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Cras justo odio
              <span class="badge badge-primary badge-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Dapibus ac facilisis in
              <span class="badge badge-primary badge-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Morbi leo risus
              <span class="badge badge-primary badge-pill">1</span>
            </li>
          </ul>
          <br>
          <!-- payment -->
          <ul class="list-group">
             <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Payment</h5>
      <!-- <small>3 days ago</small> -->
    </div>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Cras justo odio
              <span class="badge badge-primary badge-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Dapibus ac facilisis in
              <span class="badge badge-primary badge-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Morbi leo risus
              <span class="badge badge-primary badge-pill">1</span>
            </li>
          </ul>

           

          </div>
          <!-- first lane -->

          <!-- second lane -->
          <div class="col-lg-6 col-md-8">

            <div class="list-group">

               <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Messages</h5>
      <!-- <small>3 days ago</small> -->
    </div>

  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h6 class="mb-1">List group item heading</h6>
      <small>3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
   
  </a>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h6 class="mb-1">List group item heading</h6>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
   
  </a>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h6 class="mb-1">List group item heading</h6>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
   
  </a>
</div>
<!-- end of messaging -->
<br>

          <!-- Transfer -->
            <ul class="list-group">
             <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Transfer</h5>
      <!-- <small>3 days ago</small> -->
    </div>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Cras justo odio
              <span class="badge badge-primary badge-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Dapibus ac facilisis in
              <span class="badge badge-primary badge-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Morbi leo risus
              <span class="badge badge-primary badge-pill">1</span>
            </li>
          </ul>
           
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
        <!-- <h2 class="sub-header">Interesting layouts and elements</h2> -->
       <!--  -->
        <!-- end here -->
        <!--/row-->

      </div>
      <!--/main col-->
    </div>

  </div>
  <!--/.container-->
  <footer class="container-fluid">
    <p class="text-right small">©2016-2017 Company</p>
  </footer>


  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
        </div>
        <div class="modal-body">
          This is a dashboard layout for Bootstrap 4. This is an example of the Modal component which you can use to show content. Any content can be placed inside the modal and it can use the Bootstrap grid classes.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary-outline" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div> -->

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

  <!--scripts loaded here-->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


  <script>
    $(document).ready(function() {
      $("[data-toggle=offcanvas]").click(function() {
        $(".row-offcanvas").toggleClass("active");
      });
    });
  </script>

</body>

</html>