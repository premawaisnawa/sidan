<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php //echo site_url('Home/home_view/') ;?>" class="logo" style="position:fixed">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>D</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SI</b>DAN</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar  ">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


              <!-- Notifications: style can be found in dropdown.less -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <span class="hidden-xs"><?php //echo $this->session->userdata('company_name'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <p>
                      <?php //echo $this->session->userdata('first_name'); ?> - <b><?php //echo $this->session->userdata('company_name'); ?></b>
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php //echo site_url('Home/home_view/') ;?>" class="btn btn-default btn-flat">Visite Site</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php //echo base_url().'index.php/Login/logout';?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
