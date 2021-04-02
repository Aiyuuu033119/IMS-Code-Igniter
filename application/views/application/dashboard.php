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
  

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">

            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
            
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                  <h4 class="card-title text-uppercase text-muted mb-0">Current Sales</h4>
                  <div class="row">
                    <div class="col text-center">
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px"><?php echo $sales[0]->total == null ? '0' : $sales[0]->total?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                  <h4 class="card-title text-uppercase text-muted mb-0">Total Stock</h4>
                  <div class="row">
                    <div class="col text-center">
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px"><?php echo $stock?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                  <h4 class="card-title text-uppercase text-muted mb-0">Products Item</h4>
                  <div class="row">
                    <div class="col text-center">
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px"><?php echo $product?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                  <h4 class="card-title text-uppercase text-muted mb-0">Current Orders</h4>
                  <div class="row">
                    <div class="col text-center">
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px"><?php echo $order?><nnng/span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">New Orders</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url()?>app/orderlist" style="padding: 0.75rem 1rem" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date Avail</th>
                  </tr>
                </thead>
                <tbody class="orders">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <?php 
          if($_SESSION['status']!='Sales Staff'){
        ?>
          <div class="col-xl-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">New Stocks</h3>
                  </div>
                  <div class="col text-right">
                    <a href="<?php echo base_url()?>app/stocklist" style="padding: 0.75rem 1rem" class="btn btn-sm btn-primary">See all</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  <tbody class="stock">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php
          }
        ?>
        
      </div>

      <?php
        $this->load->view('application/include/footer');
      ?> 
      
    </div>
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

      orders();
      stock();

      function orders(){
        $.ajax({
          url: '<?php echo base_url()?>dashboard/orders',
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
                        +'<td class="budget">'
                          +element.total
                        +'</td>'
                        +'<td class="budget">'
                          +element.date+' '+element.time.substring(11, 18)
                        +'</td>'
                      +'</tr>';
              });
            }else{
              html+='<tr><th style="text-align:center" colspan="4">No Result</th></tr>'
            }

            html+='<tr><th></th><th></th><th></th><th></th></tr>'
            $('.orders').html(html);
            
          }
        });
      }

      function stock(){
        $.ajax({
          url: '<?php echo base_url()?>dashboard/stock',
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
                        +'<td class="budget">'
                          +element.price
                        +'</td>'
                      +'</tr>';
              });
            }else{
              html+='<tr><th style="text-align:center" colspan="3">No Result</th></tr>'
            }

            html+='<tr><th></th><th></th><th></th></tr>'
            $('.stock').html(html);
            
          }
        });
      }

    });
  </script>
</body>

</html>
