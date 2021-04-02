<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  $this->load->view('application/include/headers');
?> 
  <!-- Sidenav -->
  
  <?php
    $this->load->view('application/include/sidenav');
  ?> 

  <div class="main-content" id="panel">

    <?php
      $this->load->view('application/include/navbar');
    ?> 
    <?php 
        foreach ($info as $data ) {
    ?>
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(<?php echo base_url()?>assets/img/theme/team-6.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-xl-12">
            <h1 class="display-2 text-white name1">Hello <?php echo $data->name?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?php echo base_url()?>assets/img/theme/cover.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-5 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo base_url()?>assets/img/theme/user.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="card-body pt-5">
              <div class="text-center">
                <h5 class="h3 name2">
                    <?php echo $data->name?>
                </h5>
                <div class="h5 font-weight-300">
                <?php echo $data->status?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a class="text-white btn btn-sm btn-primary save-btn" style="padding: 0.75rem 1rem" id="<?php echo $data->id?>">Save</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group mb-2">
                        <p class="form-control-label text-left" style="margin:0">Full Name</p>
                        <input type="text" id="input-username" class="form-control name" placeholder="Username" value="<?php echo $data->name?>">
                        <span><small class="name-error text-red">&nbsp</small></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group mb-2">
                        <p class="form-control-label text-left" style="margin:0">Email</p>
                        <input type="email" id="input-email" class="form-control email" placeholder="Email" value="<?php echo $data->email?>">
                        <span><small class="email-error text-red">&nbsp</small></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group mb-0">
                      <p class="form-control-label text-left" style="margin:0">Password</p>
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="padding-right:0px;">
                                <div class="custom-control custom-checkbox"  style="padding-top: 7px;">
                                  <input type="checkbox" class="custom-control-input toogle-btn" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1"></label>
                                </div>
                              </span>
                          </div>
                          <input style="padding-left:10px" class="form-control password" placeholder="" disabled type="password" value="admin123">
                        </div>
                        <span><small class="password-error text-red">&nbsp</small></span>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <?php
        $this->load->view('application/include/modal-success');
        $this->load->view('application/include/modal-error');
        $this->load->view('application/include/modal-remind');
        $this->load->view('application/include/footer');
      ?> 
    </div>
    <?php
        }
    ?>
  </div>
  <script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="<?php echo base_url();?>assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(document).ready(function(){

      

      $('.save-btn').on('click', function(){
        var name = $('.name').val();
        var email = $('.email').val();
        var pass = $('.password').val();

        var hasError;

        if(name==''&&email==''&&box==true&&pass==''){
          $('.name-error').text('Full Name*')
          $('.email-error').text('Email*')
          $('.password-error').text('Password*')

          $('.name-error').text('')
          $('.email-error').text('')
          $('.name-error').append('&nbsp;')
          $('.email-error').append('&nbsp;')
          $('.password-error').text('')
          $('.password-error').append('&nbsp;')

          hasError = true;
        }
        else{
          hasError = false;
        }

        if(name==''){
            $('.name-error').text('Full Name*')
      
            $('.name-error').text('')
            $('.name-error').append('&nbsp;')

            hasError = true;
        }
        if(email==''){
            $('.email-error').text('Email*')
      
            $('.email-error').text('')
            $('.email-error').append('&nbsp;')

          hasError = true;
        }
        if(box==true&&pass==''){
            $('.password-error').text('Password*')
          
            $('.password-error').text('')
            $('.password-error').append('&nbsp;')

          hasError = true;
        }

        if(name=='<?php echo $data->name?>'&&email=='<?php echo $data->email?>'&&pass=='admin123'){
          return false;
        }

        if(hasError==false){
          var data = new FormData();
        
          data.append('name', name);
          data.append('email', email);
          data.append('box', box);
          data.append('id', $(this).attr('id'));
          data.append('password', pass);

          $.ajax({
            url: "<?php echo base_url()?>profile/editprofile",
            data: data,
            type: "POST",
            contentType:false,
            processData:false,
            success: function (data) {

              var json = JSON.parse(data);

              $('#modal-form-edit').modal('hide')

              if(json.msg=='success'){
                $('.name').val(name);
                $('.email').val(email);
                $('.name2').text(name);
                $('.name-3').text(name);
                $('.name1').text('Hello '+name);
                box = false;
                $('.password').attr('disabled',true)
                $('.password').val('**********');
                $('.success-text').text('Successfully Updated!');
                $('#success-modal').modal('show')
              }
              else if(json.msg=='error'){
                $('#error-modal').modal('show')
              }
            }
          });
        }

      });

      var box = false;

      $(document).on('click', '.toogle-btn', function(){
        var val = $(this).is(":checked");
        box = val;
        if(val==true){
          $('.password').attr('disabled',false)
          $('.password').val('');
        }
        else{
          $('.password').attr('disabled',true)
          $('.password').val('**********');
        }
      });
    });
  </script>
</body>

</html>
