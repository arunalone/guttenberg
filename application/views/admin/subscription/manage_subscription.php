<?php
$this->load->view('admin/common/header_menu');
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user-circle"></i>&nbsp;&nbsp;<?php echo $page_title ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() . 'admin/Setting/subscription' ?>">Subscription</a></li>
        </ul>
    </div>
    <form class="form-horizontal" method="post" id="manage_role_form" name="manage_role_form" action="<?php echo base_url() ?>admin/Setting/update_subscription">
        <div class="row">
            <div class="col-md-12">
                <div class="tile orderlistheader">
                    <div class="col">
                        <div class="tile-body">
                            <input type="hidden" name="sub_id" id="sub_id" value="<?php echo $sub_id ?>"/>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Subscription Name<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Subscription Name" id="sub_name" name="sub_name" value="<?php echo isset($row->sub_name) ? $row->sub_name : "" ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4" id="subscription_price">Subscription Price<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Subscription Price" id="sub_price" name="sub_price" value="<?php echo isset($row->sub_price) ? $row->sub_price : "" ?>">
                                </div>
                            </div>
                        </div>
                        <?php if (!$sub_id) { ?>
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Status<label style="color: red">*</label></label>
                                    <div class="col-md-2">
                                        <div class="form-check" style="display:inline-block">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="status" type="radio"checked="checked" value="ACTIVE">Active
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check" style="display:inline-block">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="status" type="radio" value="INACTIVE" <?php if (isset($row->status) && $row->status === "INACTIVE") { ?>checked="checked"<?php } ?>>Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Subscription Type<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <?php if ($sub_id) { ?>
                                        <label class="control-label col-md-4"><?php echo isset($row->sub_type) ? $row->sub_type : "" ?></label>
                                    <?php } else { ?>
                                        <select class="form-control inputfield" id="sub_type" name="sub_type" required="" onchange="showPriceText(this.value)">
                                            <option value="">Select</option>
                                            <option <?php if (isset($row->sub_type) && $row->sub_type === "MONTHLY") { ?>selected="selected"<?php } ?> value="MONTHLY">Monthly</option>
                                            <option <?php if (isset($row->sub_type) && $row->sub_type === "PERCENTAGE") { ?>selected="selected"<?php } ?> value="PERCENTAGE">Percentage</option>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Subscription Comment</label>
                                <div class="col-md-8">
                                    <textarea class="form-control inputfield" type="text" placeholder="Subscription Comment"  id="sub_comment" name="sub_comment"><?php echo isset($row->sub_comment) ? $row->sub_comment : "" ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="col">
                    <div class="col-md-8 col-md-offset-3">
                        <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/Setting/subscription' ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>				
        </div>
    </form>
</main>

<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'manage_subscription.js'; ?>"></script>
<script>
                                            $(document).ready(function () {
                                                App.init();
                                                ManageLogin.init();
                                            });
</script>