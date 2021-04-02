
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
    <style>
      .select2-selection__rendered{
        text-align: left;
      }
    </style>

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-9 col-8">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Orders</li>
                  <li class="breadcrumb-item active" aria-current="page">Order List</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3 col-4 text-right">
                <select class="form-control class" id="select1">
                <?php
                  date_default_timezone_set('Asia/Manila');

                  echo '<option value="'.date("Y-m-d").'">'.date("Y-m-d").'</option>'; 

                  foreach ($date as $key => $data) {
                    if($data->date!=date("Y-m-d")){
                      echo '<option value="'.$data->date.'">'.$data->date.'</option>'; 
                    }
                  }
                ?>  
                  
                </select>
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
              <h3 class="text-black mb-0">Order List</h3>
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
                    <th scope="col" class="sort" data-sort="status">Total Amount</th>
                    <th scope="col" class="sort" data-sort="completion">Date Avail</th>
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
                  <div class="text-muted text-center"><h2 class="mb-0">New Return Book</h2></div>
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
                          <input class="form-control member" placeholder="Member ID" type="text" maxlength="8">
                        </div>
                      </div>
                      <span><small class="member-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-books"></i></span>
                          </div>
                          <input class="form-control code" placeholder="Book Code" type="text" maxlength="5">
                        </div>
                      </div>
                      <span><small class="code-error text-red">&nbsp</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <input class="form-control issue" type="date" value="" id="example-date-input" disabled>
                      </div>
                      <span><small class="text-success">Date Issued</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <input class="form-control expire" type="date" value="" id="example-date-input" disabled>
                      </div>
                      <span><small class="text-success">Date Expire</small></span>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group mb-0">
                        <input class="form-control return" type="date" value="<?php echo date("Y-m-d")?>" id="example-date-input" disabled>
                      </div>
                      <span><small class="text-success">Date Return</small></span>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary return-btn">Return</button>
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
  <script>
    $(document).ready(function(){
      
      $('#select1').select2();

      function orders(date, search){
        var url = '';
        if(search==''){
          url = '<?php echo base_url()?>orders/orderlist/'+date;
        }
        else{
          url = "<?php echo base_url()?>orders/orderlist/"+date+"/"+search;
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

                if(element.status=='Return'){
                  color = 'bg-success'; 
                }else{
                  color = 'bg-warning'; 
                }

                html += '<tr>'
                        +'<th scope="row">'
                          +'<div class="media align-items-center">'
                            +'<div class="media-body">'
                              +'<span class="name mb-0 text-sm">'+element.name+'</span>'
                            +'</div>'
                          +'</div>'
                        +'</th>'
                        +'<td>'
                          +'<div class="d-flex align-items-center">'
                            +'<span class="completion mr-2">'+element.quantity+'</span>'
                          +'</div>'
                        +'</td>'
                        +'<td>'
                          +'<div class="d-flex align-items-center">'
                            +'<span class="completion mr-2">'+element.total+'</span>'
                          +'</div>'
                        +'</td>'
                        +'<td>'
                          +'<div class="d-flex align-items-center">'
                            +'<span class="completion mr-2">'+element.date+' '+element.time.substring(11, 18)+'</span>'
                          +'</div>'
                        +'</td>'
                        +'<td class="text-center">'
                          +'<div class="dropdown">'
                            +'<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                              +'<i class="fas fa-ellipsis-v"></i>'
                            +'</a>'
                            +'<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'
                              +'<a style="cursor:pointer" class="dropdown-item revert-btn" id="'+element.id+'" data-product="'+element.product_id+'">Revert</a>'
                            +'</div>'
                          +'</div>'
                        +'</td>'
                      +'</tr>';
              });
            }else{
              html+='<tr><th style="text-align:center" colspan="5">No Result</th></tr>'
            }

            html+='<tr><th></th><th></th><th></th><th></th><th></th></tr>'
            $('.list').html(html);
            
            date = '<?php echo date("Y-m-d");?>';
            query = '';
          }
        });
      }

      var date = '<?php echo date("Y-m-d");?>';
      var query = '';
      orders(date, query);
      
      $('.search-bar').on('keypress', function (e) {
        if(e.which === 13){

            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");
            query = $(this).val();

            orders($('#select1').val(), query);

            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");
        }
      })

      $('#select1').on('change', function () {
        orders($(this).val(),'');
      });

      $(document).on('click', '.revert-btn', function(){
        var currentRow=$(this).closest("tr"); 

        $('.force-delete-btn').attr('data-relay', $(this).attr('id'));
        $('.force-delete-btn').attr('data-product', $(this).attr('data-product'));
        $('.force-delete-btn').attr('data-name', currentRow.find("th:eq(0)").text());
        $('.force-delete-btn').attr('data-quantity', currentRow.find("td:eq(0)").text());
        $('.force-delete-btn').attr('data-total', currentRow.find("td:eq(1)").text());
        $('.remind-text').text('Are you sure you want to revert this? The data will be back to Product Page');
        $('#remind-modal').modal('show');
      })

      $(document).on('click', '.force-delete-btn', function () {
        
        var data = new FormData();

        data.append('id', $(this).attr('data-relay'));
        data.append('product_id', $(this).attr('data-product'));
        data.append('name', $(this).attr('data-name'));
        data.append('price', parseInt($(this).attr('data-total')) / parseInt($(this).attr('data-quantity')));
        data.append('quantity', $(this).attr('data-quantity'));

        $.ajax({
          url: "<?php echo base_url()?>orders/revert",
          data: data,
          type: "POST",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);

            if(json.msg=='success'){
              $('.success-text').text('Successfully Reverted!');
              $('#success-modal').modal('show')
              orders('<?php echo date("Y-m-d");?>','');
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