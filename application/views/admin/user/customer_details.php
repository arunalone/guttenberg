<?php
$this->load->view('admin/common/header_menu');
?>
<style>
    .divright{
        float: right;
        margin-top: -55px;
    }
</style>
<main class="app-content">
    <div class="app-title" style="margin:-30px 0px 30px;">
        <div>
            <h1><i class="fa fa-users"></i>&nbsp;&nbsp;<?php echo $page_title ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() . 'admin/user' ?>">Customers</a></li>
        </ul>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;"  class="nav-link active" data-toggle="tab" onclick="$('#store_detail_div').show();
                $('#contentDiv').hide();" aria-expanded="true">Customer Details</a></li>
        <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;" class="nav-link" data-toggle="tab" onclick="loadTabData(1)" aria-expanded="true">Orders</a></li>
    </ul>
    <div id="store_detail_div">
        <form class="form-horizontal" method="post" id="manage_customer_form" name="manage_customer_form" action="<?php echo base_url() ?>admin/User/update_customer">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile orderlistheader">
                        <div class="col">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Customer Image</label>
                                    <div class="col-md-8">
                                        <img src="<?php echo base_url() . "uploads/user_images/" . $user_id . "/" . $row->profile_image ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Customer Name</label>
                                    <div class="col-md-8">
                                        <label class="control-label"><?php echo $row->full_name; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Email ID</label>
                                    <div class="col-md-8">
                                        <label class="control-label"><?php echo $row->email; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Address</label>
                                    <div class="col-md-8">
                                        <label class="control-label"><?php echo $row->address; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">State</label>
                                    <div class="col-md-8">
                                        <label class="control-label"><?php echo $row->state_name; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">City</label>
                                    <div class="col-md-8">
                                        <label class="control-label"><?php echo $row->city_name; ?></label>
                                    </div>
                                </div>
                                <a class="label" onclick="$('#passwordDiv').toggle()" style="cursor: pointer;color: blue;border-bottom: 1px solid">Change Password?</a>
                                <div class="clearfix">&nbsp;</div>
                                <div id="passwordDiv" style="display: none;">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Password<label style="color: red">*</label></label>
                                        <div class="col-md-8">
                                            <input class="form-control inputfield" type="password" placeholder="Password"  name="password" id="password" >
                                        </div>
                                    </div>
                                    <div class="form-group row" id="passwordDiv">
                                        <label class="control-label col-md-3">Confirm Password<label style="color: red">*</label></label>
                                        <div class="col-md-8">
                                            <input class="form-control inputfield" type="password" placeholder="Confirm Password"  name="confirm_password" id="confirm_password" >
                                        </div>
                                    </div>
                                </div>
                                <div class="tile-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Status<label style="color: red">*</label></label>
                                        <div class="col-md-1">
                                            <div class="form-check" style="display:inline-block">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" name="status" type="radio"checked="checked" value="ACTIVE">Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-21">
                                            <div class="form-check" style="display:inline-block">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" name="status" type="radio" value="INACTIVE" <?php if ($row->status == "INACTIVE") { ?>checked=""<?php } ?>>Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/User' ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>				
            </div>
        </form>
    </div>
    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $user_id ?>"/>
    <div class="main" id="contentDiv">
    </div>
</main>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'popper.min.js' ?>"></script>
<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'manage_user.js'; ?>"></script>
<script>
                                    $(document).ready(function () {
                                        App.init();
                                        ManageLogin.init();
                                    });
</script>