<!--loginsessions-->
<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!--Required/bs/js-files-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>changepassword</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <script src="js/jquery-1.8.2.min.js" ></script>
</head>

<!--CSS-Styling-->
<style>
.btnnn{
  border: none;
  padding: 10px;
  background-color: transparent;
  font-size: 20px;
  border-radius: 10px;
  transition-duration: 0.6s;

}
.btnnn:hover{
  background-color: #C3C4C9;
  box-shadow: 1px 2px 10px 5px rgba(20,20,20,0.1);
}
.btn:hover{
  background-color: #557C55;
  box-shadow: 1px 2px 10px 5px rgba(20,20,20,0.1);
}
.btnnn2 {
    border: none;
    padding: 10px;
    background-color: transparent;
    font-size: 20px;
    border-radius: 10px;
    transition-duration: 0.6s;
  }

  .btnnn2:hover {
    background-color: #C3C4C9;
    box-shadow: 1px 2px 10px 5px rgba(20, 20, 20, 0.1);
  }
.brgr{
    display:none;
  }
  .remov{
    display:none;
  }
@media screen and (max-width:500px) {

  .brgr{
  display:block;
}
.card{
    width:100%;
   justify-content:end;
}
.hd{
  width:100%

}
.btnnn {
    border: none;
    background-color: transparent;
    font-size: 10px;
    border-radius: 5px;
    transition-duration: 0.6s;
    display:none;
  }
.btnnn2 {
    border: none;
    background-color: transparent;
    font-size: 10px;
    border-radius: 5px;
    transition-duration: 0.6s;
    display:none;
  }
}
@media screen and (min-width:500PX) {

.btnnn2 {
  border: none;
  background-color: transparent;
  font-size: 10px;
  border-radius: 5px;
  transition-duration: 0.6s;
  display:none;
}
}
.card{
  background-color: #427D9D;
  font-family: "Calibri", Arial, sans-serif;  
    font-size:18px;

}
.main-panel{
  width: 1100px;
  align-items: centre;
}
.custom-width-input {
            width: 100%;
        }

        .container {
            margin-top: 60px;
          
        }
        body{
            background-image: url('finimg/chnpasw.jpg');
            background-size: cover;
            background-position: center;
        }
        .container-fluid {
            background-color: #62CDFF; 
            font-family: "Calibri", Arial, sans-serif;  
    font-size:15px;
        }
        .card{
    border: 1px solid rgba(0, 0, 0, 0); 
    border-radius: 6px;
}
#oldpassword{
  border: 1px solid rgba(0, 0, 0, 0); 
    border-radius: 8px;
}
#newpassword{
  border: 1px solid rgba(0, 0, 0, 0); 
    border-radius: 8px;
}
#confirmpwd{
  border: 1px solid rgba(0, 0, 0, 0); 
    border-radius: 8px;
}
  </style>
  
  <!--Script-->
  <script>
  function men(){

document.getElementById("nvbtn").style.display="block";
document.getElementById("nvbtn1").style.display="block";
document.getElementById("rmv").style.display="block";
document.getElementById("mnu").style.display="none";
  }
  function rem(){
document.getElementById("nvbtn").style.display="none";
document.getElementById("nvbtn1").style.display="none";
document.getElementById("rmv").style.display="none";
document.getElementById("mnu").style.display="block";
  }
  </script>
<body >




<script>
                      function xyz()
                      {
                        var oldpassword=document.getElementById("oldpassword").value;
                        var newpassword=document.getElementById("newpassword").value;
                        var confirmpassword=document.getElementById("confirmpwd").value;
                        $.ajax({
                          url:"inspass.php",
                          data:{oldpassword : oldpassword,newpasswords : newpassword,confirmpwd : confirmpassword,},
                              type:'POST',
                              success:function(result)
                              {
                                alert(result);
                                
                                if(result == "successful")
                                {
                                  window.location.href="indexdb.php";
                                  document.getElementById("successmsg").innerHTML="Password change successfully";
                                }
                                else
                                {
                                  
                                }
                              }
                        });
                      }
                      </script>

 <!-- Top Navbar-->
 <div class="container-fluid">
    <div class="row  hd col-lg-12 col-md-12 col-sm-12 col-xl-12">
      <div class="nav-scroller">
        <img src="finimg/logo..png" alt="fabbg" width="160px" height="48px">
        <nav class="nav float-end" >
          <a href="indexdb.php"> <button class="m-3 btnnn"><img src="img/left-arrows.png" width="20px" alt="">
          Back</button> </a>
          <a href="logout.php"><button class="m-3 btnnn"><img src="img/turn-off.png" width="20px"
                alt="">Logout</button></a>
                <div><button class="btn brgr" onclick="men()" id="mnu"><img src="finimg/mnuicn.png" width="20px"></button>
                <button class="btn remov"  onclick="rem()" id="rmv"><img src="finimg/closeicn.png" width="20px"></button></div>
        </nav>
        <div class="nav">
        <a href="indexdb.php"  style="text-decoration:none;"> <button id="nvbtn" class="m-3 btnnn2"><img src="img/left-arrows.png" width="20px" alt="">
          Back</button> </a>
          <a href="logout.php"  style="text-decoration:none;"><button id="nvbtn1" class="m-3 btnnn2"><img src="img/turn-off.png" width="20px"
                alt="">Logout</button></a></div>
      </div>
    </div>
  </div>
  
  <main id="main">
        <!--Hotel Mamagement Section-->
        <section>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center c fs-2">Change Password</h2>
                                <form class="forms-sample" onsubmit="return false;">


                                    <div class="form-group">
                                        <label for="exampleInputUsername1" class="fs-5 text-dark">Old Password</label >
                                        <input type="password" class="form-control custom-width-input" placeholder="Enter your old password" id="oldpassword" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="fs-5 text-dark">New Password</label>
                                        <input type="password" class="form-control" placeholder="Enter your new password" id="newpassword">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1" class="fs-5 text-dark">Confirm New Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm your new password" id="confirmpwd">
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary mr-2" onclick="xyz()">Change</button>
                                        <a class="btn btn-light" href="changepass.php">Cancel</a>
                                    </div>

                                    <div class="text-center mt-3">
                                        <span style="color:green" id="successmsg"></span>
                                        <span style="color:red" id="errormsg"></span>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>
        <!-- End Hotel Management Section -->

    </main><!-- End #main -->

<!-- page-body-wrapper ends -->
</div>
  

  
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="/js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <script>
        function men() {

            document.getElementById("nvbtn").style.display = "block";
            document.getElementById("nvbtn1").style.display = "block";
            document.getElementById("rmv").style.display = "block";
            document.getElementById("mnu").style.display = "none";
        }

        function rem() {
            document.getElementById("nvbtn").style.display = "none";
            document.getElementById("nvbtn1").style.display = "none";
            document.getElementById("rmv").style.display = "none";
            document.getElementById("mnu").style.display = "block";
        }
    </script>





    <script>
        function xyz() {
    var oldpassword = document.getElementById("oldpassword").value;
    var newpassword = document.getElementById("newpassword").value;
    var confirmpassword = document.getElementById("confirmpwd").value;

    $.ajax({
        url: "inspass.php",
        data: { oldpassword: oldpassword, newpassword: newpassword, confirmpwd: confirmpassword },
        type: 'POST',
        success: function(response) {
            var result = JSON.parse(response);

            if (result.success) {
                document.getElementById("successmsg").innerHTML = result.message;
                document.getElementById("errormsg").innerHTML = "";

                // Set a timer to hide the success message after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    document.getElementById("successmsg").innerHTML = "";
                    // Reload the page
                    location.reload();
                }, 4000);
                
            } else {
                document.getElementById("errormsg").innerHTML = result.message;
                document.getElementById("successmsg").innerHTML = "";

                // Set a timer to hide the error message after 5 seconds (4000 milliseconds)
                setTimeout(function() {
                    document.getElementById("errormsg").innerHTML = "";
                }, 4000);
            }
        }
    });
}
    </script>
  <!-- End custom js for this page-->
  
</body>

</html>
