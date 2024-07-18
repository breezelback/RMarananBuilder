<!DOCTYPE html>
<html>


<head>

    <?php include 'includes/include_header.php'; ?>

</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        <?php include 'includes/header.php'; ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Login Register Area -->
        <div class="uren-login-register_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                        <!-- Login Form s-->
                        <form action="function php/verify_otp.php" method="POST">
                            <div class="login-form">
                                <h4 class="login-title">Login</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <span>Please input OTP sent to: <b><?php echo $_GET['email'];?></b></span>
                                        <input type="number" placeholder="One Time Pin" name="otp" id="otp">
                                        <input type="hidden" name="email" id="email" value="<?php echo $_GET['email'];?>">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="forgotton-password_info">
                                            <!-- <a href="#"> Forgot password?</a> -->
                                            <a href="function php/resend_otp.php?email=<?php echo $_GET['email'];?>"> Resend OTP</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="uren-login_btn">Verify</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
        <!-- Uren's Login Register Area  End Here -->

        <form action="function php/password_reset.php" method="POST">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to reset password? Your new password will be sent to <b><span id="userEmail"></span></b>.

                <input type="hidden" name="userEmailVal" id="userEmailVal">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
        </form>

        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

    <script>
        function forgotPass(){
            let userEmail = $('#email').val();

            $('#userEmailVal').val(userEmail);
            $("#userEmail").text(userEmail);
            $('#exampleModal').modal('show');
        }


    </script>



  <?php include 'includes/include_footer.php'; ?>

</body>


</html>