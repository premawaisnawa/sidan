
<aside class="main-sidebar"  >

<section class="sidebar" >

      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php if (empty($this->session->userdata('profile_image')) OR $this->session->userdata('profile_image') == "") {
                                    echo base_url().'assets/icon/upload-icon.png';
                                }else{
                                    echo base_url().'assets/pic_file/'.$this->session->userdata('profile_image');

                                }?>" width="75" class="img-circle" alt="User Image">

        </div>
        <div class="pull-left info ">
          <h5 class=""><b ><?php echo $this->session->userdata('first_name'); ?></b></h5>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu " data-widget="tree">
        <li class="header ">MAIN NAVIGATION</li>
        <!-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php //echo base_url().'index.php/Supplier/index' ?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          </ul>
        </li> -->
        <li><a href="<?php echo base_url().'index.php/company_staff/company_staff_dashboard_view' ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url().'index.php/service_category/staff_service_category_list_view' ?>"><i class="glyphicon glyphicon-th-list"></i><span>Service Category</span></a></li>
        <li><a href="<?php echo base_url().'index.php/user/edit_company_staff_profile_view' ?>"><i class="glyphicon glyphicon-th-list"></i><span >My Profile</span></a></li>
        <li><a href="<?php echo base_url().'index.php/User/edit_company_profile_view' ?>"><i class="glyphicon glyphicon-th-list"></i> <span>Profile</span></a></li>

        <!-- <li><a href="<?php //echo base_url().'index.php/Support/member_support_list_view' ?>"><i class="glyphicon glyphicon-phone-alt"></i> <span>Support List</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->


  </aside>
<div class="content-wrapper">
