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
                  <!-- <li class="breadcrumb-item"><a href="<?php // echo base_url()?>/app/booklist">Book List</a></li> -->
                  <li class="breadcrumb-item active" aria-current="page">Generate Reports</li>
                  <li class="breadcrumb-item active" aria-current="page">Export</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-form"><i class="fas fa-plus"></i>&nbsp;Add</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Export Reports</h3>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="row align-items-center mb-2">
                <div class="col-8">
                  <p class="mb-0">Stock List</p>
                </div>
                <div class="col-4 text-right">
                  <a class="btn btn-sm btn-primary text-white save-btn" style="padding: 0.75rem 1rem;" href="<?php echo base_url()?>reports/stocklist">Download</a>
                </div>
              </div>
              <div class="row align-items-center mb-2">
                <div class="col-8">
                  <p class="mb-0">Product List</p>
                </div>
                <div class="col-4 text-right">
                  <a class="btn btn-sm btn-primary text-white save-btn" style="padding: 0.75rem 1rem;" href="<?php echo base_url()?>reports/productlist">Download</a>
                </div>
              </div>
              <div class="row align-items-center mb-2">
                <div class="col-4">
                  <p class="mb-0">Order List</p>
                </div>
                <div class="col-4 text-right">
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
                <div class="col-4 text-right">
                  <a class="btn btn-sm btn-primary text-white save-btn download-order-list" style="padding: 0.75rem 1rem;">Download</a>
                </div>
              </div>
              <div class="row align-items-center mb-2">
                <div class="col-4">
                  <p class="mb-0">Inventory</p>
                </div>
                <div class="col-4 text-right">
                  <select class="form-control class" id="select3">
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
                <div class="col-4 text-right">
                  <a class="btn btn-sm btn-primary text-white save-btn download-invent-list" style="padding: 0.75rem 1rem;">Download</a>
                </div>
              </div>
              <div class="row align-items-center mb-2">
                <div class="col-8">
                  <p class="mb-0">Administrator</p>
                </div>
                <div class="col-4 text-right">
                  <a class="btn btn-sm btn-primary text-white save-btn" style="padding: 0.75rem 1rem;" href="<?php echo base_url()?>reports/admin">Download</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
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
  <script src="<?php echo base_url()?>assets/vendor/select2/dist/js/select2.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url();?>assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(document).ready(function(){
      $('#select1').select2();
      $('#select3').select2();

      $('.download-order-list').on('click', function () {
        window.location.href = '<?php echo base_url()?>reports/orderlist/'+$('#select1').val();
      });

      $('.download-invent-list').on('click', function () {
        window.location.href = '<?php echo base_url()?>reports/inventlist/'+$('#select3').val();
      });

    });
  </script>
</body>

</html>