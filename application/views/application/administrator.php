
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  $this->load->view('application/include/headers');
?> 
  <?php
    $this->load->view('application/include/sidenav');
  ?> 

  <div class="main-content" id="panel">
    
    <?php
      $this->load->view('application/include/navbar');
    ?> 

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Administrator</li>
                  <li class="breadcrumb-item active" aria-current="page">Admin List</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a style="padding: 0.75rem 1rem" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-form"><i class="fas fa-plus"></i>&nbsp;Add</a> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent border-0" style="display:flex; justify-content: space-between; align-items: center">
              <h3 class="text-black mb-0">Admin Lists</h3>
              <div class="form-group mb-0">
                <input class="form-control search-bar" type="search" placeholder="search" id="example-search-input" style="background-color: white; color: black">
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Email</th>
                    <th scope="col" class="sort" data-sort="name">Status</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true" style="z-index:10001">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary border-0 mb-0">
                <div class="card-header bg-transparent" style="display: flex;justify-content: space-between;align-items: center;">
                  <div class="text-muted text-center"><h2 class="mb-0">New Administrator</h2></div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="card-body px-lg-5 pt-4 pb-4">
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input class="form-control name-admin" placeholder="Full Name" type="text">
                        </div>
                      </div>
                      <span><small class="name-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                          </div>
                          <input class="form-control email" placeholder="Email" type="text">
                        </div>
                      </div>
                      <span><small class="email-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <select class="form-control status" id="exampleFormControlSelect1">
                            <option value="Administrator">Administrator</option>
                            <option value="Sales Staff">Sales Staff</option>
                          </select>
                        </div>
                      </div>
                      <span><small class="contact-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                          </div>
                          <input class="form-control" placeholder="" disabled type="password" value="admin123">
                        </div>
                      </div>
                      <span><small class="text-success">Default Password: admin123</small></span>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary add-btn">Add</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true" style="z-index:10001">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary border-0 mb-0">
                <div class="card-header bg-transparent" style="display: flex;justify-content: space-between;align-items: center;">
                  <div class="text-muted text-center"><h2 class="mb-0">Edit Categories</h2></div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="card-body px-lg-5 pt-4 pb-4">
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input class="form-control name-edit" placeholder="Full Name" type="text">
                        </div>
                      </div>
                      <span><small class="name-edit-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                          </div>
                          <input class="form-control email-edit" placeholder="Email" type="text">
                        </div>
                      </div>
                      <span><small class="email-edit-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <select class="form-control status-edit" id="exampleFormControlSelect2">
                            <option value="Administrator">Administrator</option>
                            <option value="Sales Staff">Sales Staff</option>
                          </select>
                        </div>
                      </div>
                      <span><small class="contact-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text" style="padding-right:0px">
                                <div class="custom-control custom-checkbox" >
                                  <input type="checkbox" class="custom-control-input toogle-btn" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1"></label>
                                </div>
                              </span>
                          </div>
                          <input class="form-control pass-edit" placeholder="" disabled type="password" value="admin123" style="padding-left:10px">
                        </div>
                      </div>
                      <span><small class="text-success pass-error">Check to allow change password</small></span>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary update-btn">Edit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
        $this->load->view('application/include/modal-success');
        $this->load->view('application/include/modal-error');
        $this->load->view('application/include/modal-remind');
        $this->load->view('application/include/footer');
      ?> 

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url()?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/select2/dist/js/select2.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url()?>assets/js/argon.js?v=1.2.0"></script>

  <style>
    .select2-container{
      z-index: 10001
    }
  </style>
  <script>
    $(document).ready(function(){

      $('#exampleFormControlSelect1').select2();
      $('#exampleFormControlSelect2').select2();

      function admin(search){
        var url = '';
        if(search==''){
          url = '<?php echo base_url()?>admin/adminlist';
        }
        else{
          url = "<?php echo base_url()?>admin/adminlist/"+search;
        }

        $.ajax({
          url: url,
          type: "GET",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);
            
            var html = '';
            var action = '';

            if(json!=''){
              json.forEach(element => {
                if(element.status!="Super Administrator"&&element.name!='<?php echo $_SESSION['name']?>'){
                  action = '<div class="dropdown">'
                            +'<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                              +'<i class="fas fa-ellipsis-v"></i>'
                            +'</a>'
                            +'<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'
                              +'<a class="dropdown-item edit-btn" id="'+element.id+'" >Edit</a>'
                              +'<a class="dropdown-item delete-btn" id="'+element.id+'">Delete</a>'
                            +'</div>'
                          +'</div>';
                }else{
                  action ="-";
                }
                html += '<tr>'
                  +'<th scope="row">'
                            +'<div class="media align-items-center">'
                              +'<div class="media-body">'
                                +'<span class="name mb-0 text-sm">'+element.name+'</span>'
                              +'</div>'
                            +'</div>'
                          +'</th>'
                      +'<td scope="col" class="sort" data-sort="budget">'+element.email+'</td>'
                      +'<td scope="col" class="sort" data-sort="name">'+element.status+'</td>'
                      +'<td class="text-center">'
                          +action
                        +'</td>'
                    +'</tr>';
                });
            }else{
              html+='<tr><th style="text-align:center" colspan="4">No Result </th></tr>'
            }

            html+='<tr><th></th><th></th><th></th><th></th></tr>'
            $('.list').html(html);
            
            query = '';
          }
        });
      }

      var query = '';
      admin(query);

      $('.pop-btn').on('click', function () {
        if(parseInt($(this).attr('data-total')) < parseInt($(this).attr('data-count'))){
          $('#modal-notification-danger').modal('show')
        }
        else{
          $('#modal-form').modal('show')
        }
      });

      $(document).on('click', '.add-btn', function(){
        var name = $('.name-admin').val();
        var email = $('.email').val();
        var status = $('.status').val();
        
      
        var hasError;
        if(name==''&&email==''){
          $('.name-error').text('Full Name*')
          $('.email-error').text('Email*')
          
          $('.name-error').text('')
          $('.email-error').text('')
          $('.name-error').append('&nbsp;')
          $('.email-error').append('&nbsp;')

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

        if(hasError==false){
          var data = new FormData();
        
          data.append('name', name);
          data.append('email', email);
          data.append('status', status);

          $.ajax({
            url: "<?php echo base_url()?>admin/add_admin",
            data: data,
            type: "POST",
            contentType:false,
            processData:false,
            success: function (data) {

                var json = JSON.parse(data);

                $('#modal-form').modal('hide')

                if(json.msg=='success'){
                  admin(query);
                  $('.success-text').text('Successfully Added!');
                  $('#success-modal').modal('show')
                }
                else if(json.msg=='error'){
                  $('#error-modal').modal('show')
                }
            }
          });
        }
      });

      $(document).on('click','.edit-btn', function(){
        var currentRow=$(this).closest("tr"); 
         
        var col1=currentRow.find("th:eq(0)").text(); // get current row 1st TD value
        var col2=currentRow.find("td:eq(0)").text(); // get current row 2nd TD
        var col3=currentRow.find("td:eq(1)").text(); // get current row 2nd TD

        $('.name-edit').val(col1);
        $('.email-edit').val(col2);
        $('.status-edit').val(col3);
        $('.update-btn').attr('id', $(this).attr('id'))
        $('#modal-form-edit').modal('show');
      });

      $(document).on('click', '.update-btn', function(){
        var name = $('.name-edit').val();
        var email = $('.email-edit').val();
        var status = $('.status-edit').val();
        var password = $('.pass-edit').val();

        var hasError;
        if(name==''&&email==''&&box==true&&box==true&&password==''){
          $('.name-edit-error').text('Full Name*')
          $('.email-edit-error').text('Email*')
          $('.pass-error').attr('class','text-red pass-error')
          $('.pass-error').text('Password*')

          $('.name-edit-error').text('')
          $('.email-edit-error').text('')
          $('.name-edit-error').append('&nbsp;')
          $('.email-edit-error').append('&nbsp;')
          $('.pass-error').attr('class','text-success pass-error') 
          $('.pass-error').text('Check to change password')

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
        if(box==true&&password==''){
          $('.pass-error').attr('class','text-red pass-error')
          $('.pass-error').text('Password*')

          $('.pass-error').attr('class','text-success pass-error') 
          $('.pass-error').text('Check to change password')

          hasError = true;
        }

        if(hasError==false){
          var data = new FormData();
        
          data.append('name', name);
          data.append('email', email);
          data.append('status', status);
          data.append('id', $(this).attr('id'));
          data.append('box', box);
          data.append('password', password);

          $.ajax({
            url: "<?php echo base_url()?>admin/edit_admin",
            data: data,
            type: "POST",
            contentType:false,
            processData:false,
            success: function (data) {

              var json = JSON.parse(data);

              $('#modal-form-edit').modal('hide')

              if(json.msg=='success'){
                admin(query);
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

      $(document).on('click','.delete-btn', function(){
        $('.force-delete-btn').attr('data-relay', $(this).attr('id'));
        $('.remind-text').text('Are you sure you want to delete this? The data will never revert again');
        $('#remind-modal').modal('show');
      });

      $(document).on('click', '.force-delete-btn', function(){
        
        var data = new FormData();
        
        data.append('id', $(this).attr('data-relay'));

        $.ajax({
          url: "<?php echo base_url()?>admin/delete_admin",
          data: data,
          type: "POST",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);

            if(json.msg=='success'){
              $('.success-text').text('Successfully Deleted!');
              $('#success-modal').modal('show')
              admin(query);
            }
            else if(json.msg=='error'){
              $('#error-modal').modal('show')
            }
          }
        });

      });

      $('.search-bar').on('keypress', function (e) {
        if(e.which === 13){

            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");
            query = $(this).val();

            admin(query);

            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");
        }
      })

      var box = false;

      $(document).on('click', '.toogle-btn', function(){
        var val = $(this).is(":checked");
        box = val;
        if(val==true){
          $('.pass-edit').attr('disabled',false)
          $('.pass-edit').val('');

        }
        else{
          $('.pass-edit').attr('disabled',true)
          $('.pass-edit').val('*******');

        }
      });

    });
  </script>
</body>

</html>