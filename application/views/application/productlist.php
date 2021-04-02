
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
                  <li class="breadcrumb-item active" aria-current="page">Products</li>
                  <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
              </nav>
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
              <h3 class="text-black mb-0">Product List</h3>
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
                  <div class="text-muted text-center"><h2 class="mb-0">Purchase Item Now</h2></div>
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
                              <span class="input-group-text" style="background:#e9ecef"><i class="fas fa-sort-amount-up"></i></span>
                          </div>
                          <input class="form-control total" placeholder="Total" type="text" disabled>
                        </div>
                      </div>
                      <span><small class="total-error text-red">&nbsp</small></span>
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="button" class="btn btn-primary purchase-now-btn">Purchase</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
        date_default_timezone_set('Asia/Manila');
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
  <!-- Argon JS -->
  <script src="<?php echo base_url()?>assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(document).ready(function(){

      function products(search){
        var url = '';
        if(search==''){
          url = '<?php echo base_url()?>products/productlist';
        }
        else{
          url = "<?php echo base_url()?>products/productlist/"+search;
        }

        $.ajax({
          url: url,
          type: "GET",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);
            
            var html = '';

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
                              +'<a style="cursor:pointer" class="dropdown-item purchase-btn" id="'+element.id+'">Purchase</a>'
                              +'<a style="cursor:pointer; display:<?php if($_SESSION['status']=='Sales Staff'){echo 'none';}?>" class="dropdown-item remove-btn" id="'+element.id+'">Remove</a>'
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
      products(query);
      
      $('.search-bar').on('keypress', function (e) {
        if(e.which === 13){

            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");
            query = $(this).val();

            products(query);

            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");
        }
      })

      var memberHasError = true;
      var codeHasError = true;

      $(document).on('click','.purchase-btn', function(){
        $('#modal-form').modal('show');

        var currentRow=$(this).closest("tr"); 
        $('.purchase-now-btn').attr('data-relay',$(this).attr('id'));
        $('.purchase-now-btn').attr('data-name',currentRow.find("th:eq(0)").text());
        $('.purchase-now-btn').attr('data-price',currentRow.find("td:eq(1)").text());
        $('.purchase-now-btn').attr('data-quantity',currentRow.find("td:eq(0)").text());
      });

      $(document).on('click','.purchase-now-btn', function(){
        var quantity = $('.quantity').val();
        var total = $('.total').val();
        
        var hasError = null;

        if(quantity==''){
          $('.quantity-error').text('Quantity*')
          hasError = true;
        }else{
          hasError = false;
        }

        if(parseInt(quantity) > parseInt($(this).attr('data-quantity'))){
          $('.quantity-error').text('Out Items*')
          hasError = true;
        }else if(parseInt(quantity)==0){
          $('.quantity-error').text('')
          hasError = true;
        }

        if(hasError==false){
          var data = new FormData();
        
          data.append('id', $(this).attr('data-relay'));
          data.append('quantity', quantity);
          data.append('total-quantity', $(this).attr('data-quantity'));
          data.append('total', total);
          data.append('name', $(this).attr('data-name'));
          data.append('date', "<?php echo date("Y-m-d")?>");
          data.append('time', "<?php echo date("h:i:s")?>");
          

          $.ajax({
            url: "<?php echo base_url()?>products/purchase",
            data: data,
            type: "POST",
            contentType:false,
            processData:false,
            success: function (data) {

              var json = JSON.parse(data);
              
              $('#modal-form').modal('hide')
              if(json.msg=='success'){
                $('.success-text').text('Successfully Ordered!');
                $('#success-modal').modal('show')
                products(query);

                $('.quantity').val('');
                $('.total').val('');

              }
              else if(json.msg=='error'){
                $('#error-modal').modal('show')
              }
            }
          });
        }
      });

      $( ".quantity" ).change(function() {
        $('.total').val(parseInt($(this).val())*parseInt($('.purchase-now-btn').attr('data-price')));
      });

      $(document).on('click','.remove-btn', function(){
        $('.force-delete-btn').attr('data-relay', $(this).attr('id'));
        $('.remind-text').text('Are you sure you want to remove this? The data will be back to Stock Page');
        $('#remind-modal').modal('show');
      });

      $(document).on('click', '.force-delete-btn', function () {
        
        var data = new FormData();

        data.append('id', $(this).attr('data-relay'));

        $.ajax({
          url: "<?php echo base_url()?>products/edit_status",
          data: data,
          type: "POST",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);

            if(json.msg=='success'){
              $('.success-text').text('Successfully Removed!');
              $('#success-modal').modal('show')
              products(query);
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