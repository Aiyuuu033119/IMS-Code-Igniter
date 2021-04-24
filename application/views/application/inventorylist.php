
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
            <div class="col-lg-9 col-8">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                  <li class="breadcrumb-item active" aria-current="page">Inventory List</li>
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
              <h3 class="text-black mb-0">Inventory List</h3>
              <div class="form-group mb-0">
                <input class="form-control search-bar" type="search" placeholder="search" id="example-search-input" style="background-color: white; color: black">
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="name">Quantity</th>
                    <th scope="col" class="sort">Total</th>
                  </tr>
                </thead>
                <tbody class="list">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <?php
        $this->load->view('application/include/modal-success');
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

      function inventory(date, search){
        var url = '';
        if(search==''){
          url = '<?php echo base_url()?>inventory/inventorylist/'+date;
        }
        else{
          url = "<?php echo base_url()?>inventory/inventorylist/"+date+"/"+search;
        }

        $.ajax({
          url: url,
          type: "GET",
          contentType:false,
          processData:false,
          success: function (data) {

            var json = JSON.parse(data);
            
            console.log(json);

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
                    +'<td scope="col" class="sort" data-sort="name">'+element.quantity+'</td>'
                    +'<td scope="col" class="sort" data-sort="name">'+element.total+'</td>'
                  +'</tr>';
              });
            }else{
              html+='<tr><th style="text-align:center" colspan="3">No Result</th></tr>'
            }

            html+='<tr><th></th><th></th><th></th></tr>'
            $('.list').html(html);
            
            date = '<?php echo date("Y-m-d");?>';
            query = '';
          }
        });
      }

      var date = '<?php echo date("Y-m-d");?>';
      var query = '';
      inventory(date, query);

      $('.search-bar').on('keypress', function (e) {
        if(e.which === 13){

            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");
            query = $(this).val();

            inventory(date, query);

            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");
        }
      })

      $('#select1').on('change', function () {
        date = $(this).val();
        inventory($(this).val(),'');
      });

    });
  </script>
</body>

</html>