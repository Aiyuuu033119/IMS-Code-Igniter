<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main" style="z-index:1">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?php echo base_url();?>assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $title == 'Dashboard' ? 'active' : '' ?>"
                <?php 
                  echo $title != 'Dashboard' ? "href=".base_url()."app/dashboard" : '';
                ?>>
                <i class="fas fa-box"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <?php
              if($_SESSION['status']!='Sales Staff'){
            ?>
              <li class="nav-item">
                <a class="nav-link <?php echo $title == 'Stock'||$title == 'Book Details'||$title == 'Edit Books'||$title == 'Delete Books' ? 'active' : '' ?>"
                  <?php 
                    echo $title != 'Stock' ? "href=".base_url()."app/stocklist" : '';
                  ?>>
                  <i class="fas fa-box-open"></i>
                  <span class="nav-link-text">Stock</span>
                </a>
              </li>
            <?php 
              }
            ?>
            <li class="nav-item">
              <a class="nav-link <?php echo $title == 'Products'||$title == 'Issued Details'||$title == 'Edit Issued Details' ? 'active' : '' ?>" 
                <?php 
                  echo $title != 'Products' ? "href=".base_url()."app/productlist" : '';
                ?>>
                <i class="fas fa-clipboard-list"></i>
                <span class="nav-link-text">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $title == 'Orders'||$title == 'Edit Return Details'||$title == 'Returned Details' ? 'active' : '' ?>"
                <?php 
                  echo $title != 'Orders' ? "href=".base_url()."app/orderlist" : '';
                    
                ?>>
                <i class="fas fa-share-square"></i>
                <span class="nav-link-text">Orders</span>
              </a>
            </li>
            <?php
              if($_SESSION['status']!='Sales Staff'){
            ?>
              <li class="nav-item">
                <a class="nav-link <?php echo $title == 'Inventory' ? 'active' : '' ?>"
                  <?php 
                    echo $title != 'Inventory' ? "href=".base_url()."app/inventorylist" : '';
                  ?>>
                  <i class="fas fa-tasks"></i>
                  <span class="nav-link-text">Inventory</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $title == 'Generate Reports' ? 'active' : '' ?>"
                  <?php 
                    echo $title != 'Generate Reports' ? "href=".base_url()."app/generatereports" : '';
                  ?>>
                  <i class="fas fa-chart-pie"></i>
                  <span class="nav-link-text">Generate Reports</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $title == 'Administrator' ? 'active' : '' ?>"  
                  <?php 
                    echo $title != 'Administrator' ? "href=".base_url()."app/administrator" : '';
                  ?>>
                  <i class="fas fa-user-circle"></i>
                  <span class="nav-link-text">Administrator</span>
                </a>
              </li>
            <?php 
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>