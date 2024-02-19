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
                                        <input type="text" placeholder="First Name" name="firstname" required="">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Last Name" name="lastname" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" name="email" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile Number*</label>
                                        <input type="number" placeholder="Mobile Number" name="contact_number" required="">
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
                                        <input type="date" name="birthdate" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name="password" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Confirm Password" name="confirm_password" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="text-warning"><b>Address</b></label>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Province</label>
                                                <select class="form-control" name="province" id="province" required="">
                                                    <?php 
                                                        $selectProvince = ' SELECT `id`, `psgcCode`, `provDesc`, `regCode`, `provCode` FROM `refprovince` ORDER BY provDesc ASC '; 
                                                        $execProvince = $conn->query($selectProvince);
                                                        while ($province = $execProvince->fetch_assoc()) { ?>

                                                        <option value="<?php echo $province['provCode']; ?>"><?php echo $province['provDesc']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>City / Municipality</label>
                                                <select class="form-control" name="city" id="city" required="">
                                                 </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Barangay</label>
                                                <select class="form-control" name="barangay" id="barangay" required=""></select>
                                            </div>
                                            <div class="col-sm-8">
                                                <label>House No. / Purok</label>
                                                <input type="text" placeholder="House No. / Purok" name="house_number" required="">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>ZIP Code</label>
                                                <input type="text" placeholder="ZIP Code" name="zip_code" required="">
                                            </div>
                                        </div>

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


    <script>
    
        $('#province').on('change', function(){
            $('#barangay').empty();
            let province_val = $(this).val();
            // alert(province_val);

           $.ajax({  
                url:"function php/fetch_citymun.php?prov_id="+province_val, 
                method:"POST",  
                contentType:false,
                cache:false,
                processData:false,

                beforeSend:function() {
                }, 

                success:function(data){  
                // alert(data);
                $('#city').empty();
                // $('#section')
                //   .append($("<option></option>")
                //   .attr("value", "")
                //   .text("All")); 

                if (data != '') 
                {
                  var jsArray = JSON.parse(data);
                  $.each(jsArray, function(key, value) {   
                    $('#city')
                    .append($("<option></option>")
                    .attr("value", key)
                    .text(value)); 
                  });
                }
                }

            });  
        });

    
        $('#city').on('change', function(){
            let city_val = $(this).val();
            // alert(city_val);

           $.ajax({  
                url:"function php/fetch_barangay.php?city_id="+city_val, 
                method:"POST",  
                contentType:false,
                cache:false,
                processData:false,

                beforeSend:function() {
                }, 

                success:function(data){  
                // alert(data);
                $('#barangay').empty();
                // $('#section')
                //   .append($("<option></option>")
                //   .attr("value", "")
                //   .text("All")); 

                if (data != '') 
                {
                  var jsArray = JSON.parse(data);
                  $.each(jsArray, function(key, value) {   
                    $('#barangay')
                    .append($("<option></option>")
                    .attr("value", key)
                    .text(value)); 
                  });
                }
                }

            });  
        });
    </script>
   

</body>


</html>