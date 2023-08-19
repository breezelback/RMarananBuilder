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
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form action="function php/register.php" method="POST">
                            <div class="login-form">
                                <h4 class="login-title">Register</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name</label>
                                        <input type="text" placeholder="First Name" name="firstname">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Last Name" name="lastname">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile Number*</label>
                                        <input type="number" placeholder="Mobile Number" name="contact_number">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Gender*</label>
                                        <select name="gender" id="gender" class="form-control" style="border-radius: 0px; height: calc(2.25rem + 10px); border-color: #e5e5e5; color: #888888;">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Birthday*</label>
                                        <input type="date" name="birthdate">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Confirm Password" name="confirm_password">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <textarea name="address" id="address" cols="20" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="uren-register_btn">Register</button>
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

        <!-- Begin Uren's Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- Uren's Footer Area End Here -->

    </div>

  <?php include 'includes/include_footer.php'; ?>

</body>


</html>