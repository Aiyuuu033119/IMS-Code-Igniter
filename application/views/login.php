<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <title>LMS - Login</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url();?>/assets/img/brand/icon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url();?>https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr-master/build/toastr.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login-css/style.css" type="text/css">
    
</head>
        <!-- Sing in  Form -->
        <div class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure style="margin:0px"><img src="<?php echo base_url();?>assets/img/brand/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label style="margin-left: 8px;" for="your_name">
                                  <i class="fas fa-user"></i>
                                </label>
                                <input type="text" name="email" id="email" required="_required"placeholder="email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass" style="margin-left: 8px;">
                                  <i class="fas fa-lock"></i>
                                </label>
                                <input type="password" name="password" id="password" required="_required" placeholder="password"/>
                            </div>
                            
                            <div class="form-group form-button" style="text-align:center">
                                <input type="submit" name="submit" id="submit" class="form-submit signin__button" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-success">

            <div class="modal-body">
                
                <div class="py-3 text-center">
                  <i class="ni ni-fat-remove ni-3x" style="color: #222;"></i>
                  <h4 class="heading mt-4" style="color: #222;">Error!</h4>
                  <p style="color: #222;">Please check your credentials!</p>
                </div>
                  
              </div>
                
              <div class="modal-footer mt-0">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok, Got it</button>
              </div>
                
            </div>
          </div>
        </div>

    </div>

    <!-- JS -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/argon.js?v=1.2.0"></script>
    <script src="<?php echo base_url();?>assets/toastr-master/build/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
      

      $('.signin__button' ).on( "click", function(e) {
        e.preventDefault();
        var getEmail = $('#email').val();
        var getPass = $('#password').val();
        var hasError;

        if(getEmail==''&&getPass==''){
          $('#email').attr('placeholder','enter email')
          $('#password').attr('placeholder','enter password')

          hasError = true;
        }
        else if(getEmail==''){
          $('#email').attr('placeholder','enter email')
          hasError = true;
        }
        else if(getPass==''){
          $('#password').attr('placeholder','enter password')
          hasError = true;
        }
        else{
          hasError = false;
        }

        if(hasError==false){
          var data = new FormData();
        
          data.append('email', getEmail);
          data.append('password', getPass);

          $.ajax({
            url: "<?php echo base_url()?>auth/loginProc",
            data: data,
            type: "POST",
            contentType:false,
            processData:false,
            success: function (data) {

              var json = JSON.parse(data);
              
              if(json.msg=='success'){
                window.top.location = "<?php echo base_url()?>app/dashboard";
              }
              else if(json.msg=='error'){
                $('#email').val('')
                $('#password').val('')
                $('#email').attr('placeholder','email')
                $('#password').attr('placeholder','password')
                $('#error-modal').modal('show');
              }
            }
          });
        }

      });

    });
    </script>
</body>
</html>