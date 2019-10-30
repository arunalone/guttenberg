<?php
$this->load->view('admin/common/header_menu');
$store_sub_id = isset($row->sub_id) ? $row->sub_id : 0;
if ($this->session->userdata('user_role') !== "admin") {
    $readonly = ($store_sub_id) ? "readonly=''" : "";
} else {
    $readonly = "";
}
?>
<main class="app-content">
    <style>
        .divright{
            float: right;
            margin-top: -55px;
        }
    </style>
    <div class="app-title" style="margin:10px 0px 30px">
        <div>
            <h1><i class="app-menu__icon fa fa-money cust-fa-1x font-size18"></i>&nbsp;&nbsp;<?php echo $page_title ?></h1>
        </div>
    </div>
    <form id="manage_sub_form" method="post" action="<?php echo base_url() . 'admin/Store/update_store_subscription' ?>">
        <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id; ?>">
        <input type="hidden" name="sub_id" id="sub_id" value="<?php echo $store_sub_id; ?>">
        <input type="hidden" name="active_tab" id="active_tab" value="subscription">
        <input type="hidden" name="subscription_id" id="subscription_id" value="<?php echo isset($subscription_details->sub_id) ? $subscription_details->sub_id : "" ?>">
        <input type="hidden" name="subscription_type" id="subscription_type" value="<?php echo isset($subscription_details->sub_type) ? $subscription_details->sub_type : "" ?>">
        <div class="tile">
            <div class="col-md-9">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Subscription Type</label>
                        <div class="col-md-9">
                            <label class="control-label col-md-3"><?php echo isset($subscription_details->sub_type) ? $subscription_details->sub_type : "" ?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Subscription Name<?php if (!$readonly) { ?><label style="color: red">*</label><?php } ?></label>
                        <div class="col-md-9">
                            <input <?php echo $readonly; ?> class="form-control inputfield" type="text" placeholder="Subscription Name" id="sub_name" name="sub_name" value="<?php echo isset($row->sub_name) ? $row->sub_name : $subscription_details->sub_name ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Comment</label>
                        <div class="col-md-9">
                            <textarea <?php echo $readonly; ?> class="form-control inputfield" id="sub_comment" name="sub_comment" style="resize: none;"><?php echo isset($row->sub_description) ? $row->sub_description : "" ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-9">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Net Terms<?php if (!$readonly) { ?><label style="color: red">*</label><?php } ?></label>
                        <div class="col-md-9">
                            <select <?php echo $readonly; ?> class="form-control inputfield" id="net_terms" name="net_terms">
                                <option value="">Select</option>
                                <option <?php if (isset($row->net_terms) && $row->net_terms === "DOR") { ?>selected=""<?php } ?> value="DOR">Due On Receipt</option>
                                <option <?php if (isset($row->net_terms) && $row->net_terms === "15") { ?>selected=""<?php } ?> value="15">15 Days</option>
                                <option <?php if (isset($row->net_terms) && $row->net_terms === "30") { ?>selected=""<?php } ?> value="30">30 Days</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Auto Renew</label>
                        <div class="col-md-9">
                            <div class="toggle">
                                <label>
                                    <input type="checkbox" name="auto_renew" id="auto_renew" value="YES" <?php if (isset($row->auto_renew) && $row->auto_renew === "YES") { ?>checked="checked"<?php } ?>><span class="button-indecator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Price (in $)<?php if (!$readonly) { ?><label style="color: red">*</label><?php } ?></label>
                        <div class="col-md-9">
                            <input <?php echo $readonly; ?> class="form-control inputfield number_field" type="text" placeholder="Price" id="price" name="price" value="<?php echo isset($row->price) ? $row->price : "" ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Sales Tax%</label>
                        <div class="col-md-9">
                            <input class="form-control inputfield number_field" type="text" placeholder="Sales Tax%" id="sales_tax" name="sales_tax" value="<?php echo isset($row->sales_tax) ? $row->sales_tax : "" ?>" maxlength="2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Start Date<?php if (!$readonly) { ?><label style="color: red">*</label><?php } ?></label>
                        <div class="col-md-9">
                            <input <?php echo $readonly; ?> data-masked-input="99/99/9999" class="form-control inputfield <?php if (!$readonly) { ?>datepicker<?php } ?>" type="text" placeholder="Start Date" id="start_date" name="start_date" value="<?php echo isset($row->start_date) ? date('m/d/Y', strtotime($row->start_date)) : "" ?>"  autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">End Date<?php if (!$readonly) { ?><label style="color: red">*</label><?php } ?></label>
                        <div class="col-md-9">
                            <input readonly="" class="form-control inputfield" type="text" placeholder="End Date" id="end_date" name="end_date" value="<?php echo isset($row->end_date) ? date('m/d/Y', strtotime($row->end_date)) : "" ?>"  autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!$store_sub_id) { ?>
                <div class="col-md-9">
                    <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Status<?php if (!$readonly) { ?><label style="color: red">*</label><?php } ?></label>
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
                </div>
            <?php } ?>
            <hr>
            <div class="col">
                <div class="col-md-9 col-md-offset-3">
                    <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/Store/manage_store/' . $store_id . "/subscription"; ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </div>
        </div>
    </form>
</main>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'popper.min.js' ?>"></script>
<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'manage_store.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . JS_FOLDER_PATH . 'input-Mask-jquery.js' ?>"></script>
<script>
    $('#start_date').datepicker({
        format: "mm/dd/yy",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        onSelect: function (dateText, instance) {
            var period = $('#subscription_type').val();
            var monthCnt = 30;
            var tt = $('#start_date').val();
            var date = new Date(tt);
            var newdate = new Date(date);
            if (period == 'MONTHLY') {
                monthCnt = 30;
            } else {
                monthCnt = 365;
            }
            newdate.setDate(newdate.getDate() + monthCnt);
            var dd = newdate.getDate();
            var mm = newdate.getMonth() + 1;
            var y = newdate.getFullYear();
            var someFormattedDate = mm + '/' + dd + '/' + y;
            $('#end_date').val(someFormattedDate);
        }
    });
    $(document).ready(function () {
        App.init();
        ManageLogin.init();
    });
</script>