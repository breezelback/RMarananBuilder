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
                        <form action="function php/login.php" method="POST">
                            <div class="login-form">
                                <h4 class="login-title">Login</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" name="email" id="email">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <div class="check-box">
                                            <input type="checkbox" id="remember_me">
                                            <label for="remember_me">Remember me</label>
                                        </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="forgotton-password_info">
                                            <!-- <a href="#"> Forgot password?</a> -->
                                            <button type="button" onclick="forgotPass();"> Forgot password?</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="uren-login_btn">Login</button>
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