<?php $this->load->view('admin/common/header'); ?>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <?php
        if ($this->session->userdata('user_role') == "admin") {
            if ($page_code === "users" || $page_code === "role" || $page_code === "category" || $page_code === "setting" || $page_code === "subscription") {
                $cls_active = "active";
            } else {
                $cls_active = "";
            }
            ?>
            <li class="treeview"><a class="app-menu__item <?php echo $cls_active; ?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Administration</span></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item <?php if ($page_code === "users") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/User/admin_user_list' ?>"><i class="icon fa fa-user"></i>Users</a></li>
                    <li><a class="treeview-item <?php if ($page_code === "role") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Role' ?>"><i class="icon fa fa-briefcase"></i> Role</a></li>
                    <li><a class="treeview-item <?php if ($page_code === "category") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Category' ?>"><i class="icon fa fa-sort-alpha-desc"></i> Category</a></li>
                    <li><a class="treeview-item <?php if ($page_code === "setting") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Setting' ?>"><i class="icon fa fa-cog"></i> Social Media</a></li>
                    <li><a class="treeview-item <?php if ($page_code === "invoice") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Invoice' ?>"><i class="icon fa fa-print"></i> Invoice</a></li>
                    <li><a class="treeview-item <?php if ($page_code === "subscription") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Setting/subscription' ?>"><i class="icon fa fa-money"></i> Subscription</a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if ($this->session->userdata('user_role') == "admin") { ?>
            <li><a class="app-menu__item <?php if ($page_code === "store") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Store' ?>" data-toggle=""><i class="app-menu__icon fa fa-shopping-bag cust-fa-1x font-size18"></i></i><span class="app-menu__label "> Stores</span></a></li>
        <?php } else { ?>
            <li><a class="app-menu__item <?php if ($page_code === "store") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Store' ?>" data-toggle=""><i class="app-menu__icon fa fa-shopping-bag cust-fa-1x font-size18"></i></i><span class="app-menu__label "> Store</span></a></li>
        <?php } ?>
        <li><a class="app-menu__item <?php if ($page_code === "coupon") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Coupon' ?>" data-toggle=""><i class="app-menu__icon fa fa-clone cust-fa-1x "></i><span class="app-menu__label"> Coupons</span></a></li>
        <li><a class="app-menu__item <?php if ($page_code === "order") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/Order' ?>" data-toggle=""><i class="app-menu__icon fa fa-cart-arrow-down cust-fa-1x"></i><span class="app-menu__label"> Orders</span></a></li>
        <li><a class="app-menu__item <?php if ($page_code === "customer") { ?>active<?php } ?>" href="<?php echo base_url() . 'admin/User' ?>" data-toggle=""><i class="fa fa-users" aria-hidden="true"></i><span class="app-menu__label">Customers</span></a></li>
    </ul>
</aside> 
<div class="modal fade" id="logOut" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" id="admin_id" name="admin_id"/>
                <input type="hidden" id='current_page' name="current_page"/>

                <h4 class="modal-title"><span class="">Logout</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>  Are you sure want to Logout?</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-info" href="<?php echo base_url() . 'auth/logout' ?>"><i class="fa fa-fw fa-lg fa-check-circle"></i>Yes</a>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>No</button>
            </div>
        </div>
    </div>
</div>