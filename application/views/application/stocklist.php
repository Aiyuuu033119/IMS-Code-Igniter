<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  $this->load->view('application/include/headers');
?> 
<style>
  
</style>
  <!-- Sidenav -->
  <?php
    $this->load->view('application/include/sidenav');
  ?> 

  <!-- Main content -->
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
                  <li class="breadcrumb-item active" aria-current="page">Stock</li>
                  <li class="breadcrumb-item active" aria-current="page">Stock List</li>
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
              <h3 class="text-black mb-0">Stock List</h3>
              <div class="form-group mb-0">
                <input class="form-control search-bar" type="search" placeholder="search" id="example-search-input" style="background-color: white; color: black">
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Quantity</th>
                    <th scope="col" class="sort" data-sort="completion">Price</th>
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
                  <div class="text-muted text-center"><h2 class="mb-0">Add New Stock</h2></div>
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
                              <span class="input-group-text"><i class="fas fa-box"></i></span>
                          </div>
                          <input class="form-control name-item" placeholder="Name" type="text">
                        </div>
                      </div>
                      <span><small class="name-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
                          </div>
                          <input class="form-control quantity" placeholder="Quantity" type="text">
                        </div>
                      </div>
                      <span><small class="quantity-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-tags"></i></span>
                          </div>
                          <input class="form-control price" placeholder="Price" type="text">
                        </div>
                      </div>
                      <span><small class="price-error text-red">&nbsp</small></span>
                    </div>
                  </div>
                  <div class="text-right">
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
                  <div class="text-muted text-center"><h2 class="mb-0">Update Stock</h2></div>
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
                              <span class="input-group-text"><i class="fas fa-box"></i></span>
                          </div>
                          <input class="form-control name-item-edit" placeholder="Name" type="text">
                        </div>
                      </div>
                      <span><small class="name-edit-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
                          </div>
                          <input class="form-control quantity-edit" placeholder="Quantity" type="text">
                        </div>
                      </div>
                      <span><small class="quantity-edit-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-tags"></i></span>
                          </div>
                          <input class="form-control price-edit" placeholder="Price" type="text">
                        </div>
                      </div>
                      <span><small class="price-edit-error text-red">&nbsp</small></span>
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="button" class="btn btn-primary update-btn">Update</button>
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
  <script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url();?>assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(document).ready(function(){

      function stock(search){
        var url = '';
        if(search==''){
          url = '<?php echo base_url()?>stock/stocklist';
        }
        else{
          url = "<?php echo base_url()?>stock/stocklist/"+search;
        }

        $.ajax({
          url: url,
          type: "GET",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);
            
            var html = '';
            var color = '';
            var status = '';

            if(json!=''){
              json.forEach(element => {

                html += '<tr>'
                        +'<th scope="row">'
                          +'<div class="media align-items-center">'
                            +'<div class="media-body">'
                              +'<span class="name mb-0 text-sm">'+element.name+'</span>'
                            +'</div>'
                          +'</div>'
                        +'</th>'
                        +'<td class="budget">'
                          +element.quantity
                        +'</td>'
                        +'<td>'
                          +'<div class="d-flex align-items-center">'
                            +'<span class="completion mr-2">'+element.price+'</span>'
                          +'</div>'
                        +'</td>'
                        +'<td class="text-center">'
                          +'<div class="dropdown">'
                            +'<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                              +'<i class="fas fa-ellipsis-v"></i>'
                            +'</a>'
                            +'<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'
                              +'<a style="cursor:pointer" class="dropdown-item display-btn" id="'+element.id+'">Display</a>'
                              +'<a style="cursor:pointer" class="dropdown-item edit-btn" id="'+element.id+'">Edit</a>'
                              +'<a style="cursor:pointer" class="dropdown-item delete-btn" id="'+element.id+'">Delete</a>'
                            +'</div>'
                          +'</div>'
                        +'</td>'
                      +'</tr>';
              });
            }else{
              html+='<tr><th style="text-align:center" colspan="4">No Result</th></tr>'
            }

            html+='<tr><th></th><th></th><th></th><th></th></tr>'
            $('.list').html(html);
            
            query = '';
          }
        });
      }

      var query = '';
      stock(query);
      
      $('.search-bar').on('keypress', function (e) {
        if(e.which === 13){

            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");
            query = $(this).val();

            stock(query);

            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");
        }
      })
      
      $(".add-btn").on('click', function(){

        var name = $('.name-item').val();
        var quantity = $('.quantity').val();
        var price = $('.price').val();
        
        var hasError = null;

        if(name==''&&quantity==''&&price==''){
          $('.name-error').text('Name*')
          $('.quantity-error').text('Quantity*')
          $('.price-error').text('Price*')
          hasError = true;
        }else{
          hasError = false;
        }

        if(name==''){
          $('.name-error').text('Name*')
          hasError = true;
        }
        if(quantity==''){
          $('.quantity-error').text('Quantity*')
          hasError = true;
        }
        if(price==''){
          $('.price-error').text('Price*')
          hasError = true;
        }
        
        if(hasError==false){
          var data = new FormData();
        
          data.append('name', name);
          data.append('quantity', quantity);
          data.append('price', price);

          $.ajax({
            url: "<?php echo base_url()?>stock/add_stock",
            data: data,
            type: "POST",
            contentType:false,
            processData:false,
            success: function (data) {

              var json = JSON.parse(data);
              
              $('#modal-form').modal('hide')
              if(json.msg=='success'){
                $('.success-text').text('Successfully Added!');
                $('#success-modal').modal('show')
                stock(query);

                $('.name-item').val('');
                $('.quantity').val('');
                $('.price').val('');

              }
              else if(json.msg=='error'){
                $('#error-modal').modal('show')
              }
            }
          });
        }
      });
      
      $(document).on('click', ".display-btn", function(){

        var data = new FormData();

        data.append('id', $(this).attr('id'));

        $.ajax({
          url: "<?php echo base_url()?>stock/edit_status",
          data: data,
          type: "POST",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);

            if(json.msg=='success'){
              $('.success-text').text('Successfully Displayed!');
              $('#success-modal').modal('show')
              stock(query);
            }
            else if(json.msg=='error'){
              $('#error-modal').modal('show')
            }
          }
        });
      });

      $(document).on('click', '.edit-btn', function () {
        var currentRow=$(this).closest("tr"); 
         
        $('.name-item-edit').val(currentRow.find("th:eq(0)").text());
        $('.quantity-edit').val(currentRow.find("td:eq(0)").text());
        $('.price-edit').val(currentRow.find("td:eq(1)").text());
        $('.update-btn').attr('data-relay', $(this).attr('id'));

        $('#modal-form-edit').modal('show');
      });

      $(document).on('click', '.update-btn', function () {

        var name = $('.name-item-edit').val();
        var quantity = $('.quantity-edit').val();
        var price = $('.price-edit').val();
        
        var hasError = null;

        if(name==''&&quantity==''&&price==''){
          $('.name-edit-error').text('Name*')
          $('.quantity-edit-error').text('Quantity*')
          $('.price-edit-error').text('Price*')
          hasError = true;
        }else{
          hasError = false;
        }

        if(name==''){
          $('.name-edit-error').text('Name*')
          hasError = true;
        }
        if(quantity==''){
          $('.quantity-edit-error').text('Quantity*')
          hasError = true;
        }
        if(price==''){
          $('.price-edit-error').text('Price*')
          hasError = true;
        }
        
        if(hasError==false){
          var data = new FormData();
        
          data.append('name', name);
          data.append('quantity', quantity);
          data.append('price', price);
          data.append('id', $(this).attr('data-relay'));

          $.ajax({
            url: "<?php echo base_url()?>stock/edit_stock",
            data: data,
            type: "POST",
            contentType:false,
            processData:false,
            success: function (data) {

              var json = JSON.parse(data);
              
              $('#modal-form-edit').modal('hide')
              if(json.msg=='success'){
                $('.success-text').text('Successfully Updated!');
                $('#success-modal').modal('show')
                stock(query);

                $('.name-edit-item').val('');
                $('.quantity-edit').val('');
                $('.price-edit').val('');

              }
              else if(json.msg=='error'){
                $('#error-modal').modal('show')
              }
            }
          });
        }
      });

      $(document).on('click', '.delete-btn',function () {
        $('.force-delete-btn').attr('data-relay', $(this).attr('id'));
        $('.remind-text').text('Are you sure you want to delete this? The data will never revert again');
        $('#remind-modal').modal('show');
      });

      $(document).on('click', '.force-delete-btn', function () {
        
        var data = new FormData();

        data.append('id', $(this).attr('data-relay'));

        $.ajax({
          url: "<?php echo base_url()?>stock/delete_stock",
          data: data,
          type: "POST",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);

            if(json.msg=='success'){
              $('.success-text').text('Successfully Deleted!');
              $('#success-modal').modal('show')
              stock(query);
            }
            else if(json.msg=='error'){
              $('#error-modal').modal('show')
            }
          }
        });

      });

    });
  </script>
</body>

</html>