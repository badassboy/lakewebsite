<?php 
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL); 

require("library.php");

$bank = new Banking();

 $id ="";
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
}

$data =$bank->displayUserData($id);
$first_name = $data['first_name'];
$last_name = $data['last_name'];
$email = $data['email'];
$birthday = $data['birthday'];
$country = $data['country'];
$phone = $data['phone'];

// Account details
$balance = $data['balance'];
$account_number = $data['account_number'];
$account_type = $data['account_type'];





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>account settings - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4>

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Delete Account</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              <div class="card-body media align-items-center">
                <img src="<?php  echo $_SESSION['image'];?>" alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">

        

              <div class="form-group">
                 <a href="edit-profile.php"><button type="button" class="btn btn-primary">Edit Profile</button><a>
                
                </div>

              

                 
                    
                
                  

                 
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control mb-1" value="<?php echo $first_name; ?>">
                </div>

                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" value="<?php echo $last_name; ?>">
                </div>

                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" value="<?php echo $email; ?>">
                </div>

                <div class="form-group">
                  <label class="form-label">Balance</label>
                  <input type="text" class="form-control" value="<?php echo $balance; ?>">
                </div>

                <div class="form-group">
                  <label class="form-label">Account Number</label>
                  <input type="text" class="form-control" value="<?php echo $account_number; ?>">
                </div>

                <div class="form-group">
                  <label class="form-label">Account Type</label>
                  <input type="text" class="form-control" value="<?php echo $account_type; ?>">
                </div>

               
              </div>
            </div>

              

            <!-- password changing -->
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">
                <p id="response"></p>

                <form method="post" id="change" action="passwordajax.php">

                  <div class="form-group">
                    <label class="form-label">New password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label">Repeat new password</label>
                    <input type="password" name="new_password" class="form-control" required>
                  </div>

                  <div class="text-right mt-3">
                    <button type="submit" name="upload"  class="btn btn-primary">Change Password</button>
                 
                  </div>

                  
                </form>

               
              </div>
            </div>
            <!-- password changing -->

            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">

              

                <div class="form-group">
                  <label class="form-label">Birthday</label>
                  <input type="text" class="form-control" value="<?php echo $birthday; ?>">
                </div>

                <div class="form-group">
                  <label class="form-label">Country</label>
                <input type="text" class="form-control" value="<?php echo $country; ?>">
                </div>


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Contacts</h6>
                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" value="<?php echo $phone; ?>">
                </div>


              </div>
      
            </div>

            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">

                <form method="post" id="delete-account">

                  <div class="form-group">
                    <label class="form-label">Delete Account</label><br>
                    <button type="button" class="btn btn-primary">Primary</button>
                  
                  </div>
                  
                </form>

                

               

              </div>
            </div>
            <!-- social links -->
            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <h5 class="mb-2">
                  <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                  <i class="ion ion-logo-google text-google"></i>
                  You are connected to Google:
                </h5>
                nmaxwell@mail.com
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
              </div>
            </div>
            <div class="tab-pane fade" id="account-notifications">
              <div class="card-body pb-2">

                <h6 class="mb-4">Activity</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone comments on my article</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone answers on my forum thread</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone follows me</span>
                  </label>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Application</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">News and announcements</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly product updates</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly blog digest</span>
                  </label>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!--   <div class="text-right mt-3">
      <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
      <button type="button" class="btn btn-default">Cancel</button>
    </div> -->

  </div>

<style type="text/css">
body{
    background: #f5f5f5;
    margin-top:20px;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}



</style>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    $("#change").submit(function(e){
       e.preventDefault();
      $.ajax({
        type:"post",
        url:"passwordajax.php",
        data:$("#change").serialize()
      })

      .done(function(data){
        $("#response").html(data);
        // console.log("hello");
      })

      .fail(function(data){
        $("#response").html(data);
        // console.log("hi");
      });


    });


  });

  // profil ajax

  

  

</script>

</body>
</html>