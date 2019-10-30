<?php
$this->load->view('admin/common/header_menu');
?>
<link rel="stylesheet" href="<?php echo base_url() . PLUGINS_FOLDER_PATH ?>select2.min.css">
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-clone cust-fa-1x"></i>&nbsp;&nbsp;<?php echo $page_title ?>: <?php echo isset($store_detail->store_name) ? $store_detail->store_name : ""; ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() . 'admin/coupon' ?>">Coupon</a></li>
        </ul>
    </div>
    <form class="form-horizontal" method="post" id="manage_coupon_form" name="manage_coupon_form" action="<?php echo base_url() ?>admin/Coupon/update_data" enctype="multipart/form-data">
        <input type="hidden" name="active_tab" id="active_tab" value="<?php echo $active_tab ?>"/>
        <input type="hidden" name="coupon_id" id="coupon_id" value="<?php echo $coupon_id ?>"/>
        <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id ?>"/>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <?php if (!isset($store_detail)) { ?>
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Store<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <select class="form-control inputfield select2" id="store_id" name="store_id" required="">
                                            <option value="">Select Store</option>
                                            <?php
                                            if ($store_list) {
                                                foreach ($store_list as $val) {
                                                    ?>
                                                    <option <?php if (isset($row->store_id) && $row->store_id === $val->store_id) { ?>selected=""<?php } ?> value="<?php echo $val->store_id; ?>"><?php echo $val->store_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-9 divright">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Category<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <select class="form-control inputfield select2" id="category_id" name="category_id" required="">
                                        <option value="">Select Category</option>
                                        <?php
                                        if ($category_list) {
                                            foreach ($category_list as $val) {
                                                ?>
                                                <option <?php if (isset($row->category_id) && $row->category_id === $val->category_id) { ?>selected=""<?php } ?> value="<?php echo $val->category_id; ?>"><?php echo $val->category_name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Coupon Name<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Coupon Name" id="coupon_name" name="coupon_name" value="<?php echo isset($row->coupon_name) ? $row->coupon_name : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 divright">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Amount<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input min="1" onfocus="update_amount()"  onblur="update_amount()" class="form-control inputfield" type="text" placeholder="Amount" id="amount" name="amount" value="<?php echo isset($row->amount) ? $row->amount : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Discount(%)<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input maxlength="2" onfocus="update_amount()"  onblur="update_amount()" class="form-control inputfield" type="text" placeholder="Discount" id="discount" name="discount" value="<?php echo isset($row->discount) ? $row->discount : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 divright">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Discounted Amount</label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Discounted Amount" id="discounted_amount" name="discounted_amount" value="<?php echo isset($row->discounted_amount) ? $row->discounted_amount : "" ?>" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Validity Days<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input min="1" class="form-control inputfield" type="number" placeholder="Validity Days" id="validity_days" name="validity_days" value="<?php echo isset($row->validity_days) ? $row->validity_days : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Start Date<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input data-masked-input="99/99/9999" class="form-control inputfield datepicker" type="text" placeholder="Start Date" id="start_date" name="start_date" value="<?php echo isset($row->start_date) ? date('m/d/Y', strtotime($row->start_date)) : "" ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 divright">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">End Date<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input data-masked-input="99/99/9999" class="form-control inputfield datepicker" type="text" placeholder="End Date" id="end_date" name="end_date" value="<?php echo isset($row->end_date) ? date('m/d/Y', strtotime($row->end_date)) : "" ?>"  autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Coupon Description<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <textarea class="form-control inputfield" placeholder="Coupon Description" id="coupon_description" name="coupon_description" style="resize: none;"><?php echo isset($row->coupon_description) ? $row->coupon_description : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
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
                    </div>
                </div>
                <div class="tile orderlistheader">
                    <div class="col-md-9">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Coupon Image</label>
                                <?php
                                $coupon_logo = "";
                                if (isset($row_image->image_name) && $row_image->image_name != "") {
                                    $coupon_logo = $row_image->image_name;
                                    $coupon_image = base_url() . 'uploads/coupon_images/' . $coupon_id . '/' . $row_image->image_name;
                                } else {
                                    $coupon_image = base_url() . 'assets/img/' . DEFAULT_COUPON_IMAGE;
                                }
                                ?>
                                <div class="col-md-8">
                                    <div id="btnfile" class="input-append">
                                        <img onclick="crop_image(<?php echo $coupon_id; ?>, '<?php echo $coupon_logo; ?>');" style="width: 320px;height: 180px;cursor: pointer;" id="dcc_logo" class="form-control" src="<?php echo $coupon_image; ?>">
                                        <p>Please click on image to browse image and see preview of it</p>
                                    </div>
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
                <?php if ($active_tab) { ?>
                    <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/Store/manage_store/' . $store_id . "/" . $active_tab; ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                <?php } else { ?>
                    <a class="btn btn-secondary" onclick="window.history.go(-1)" style="cursor: pointer;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                <?php } ?></div>
        </div>
        </div>				
    </form>
    <div class="containerT" id="crop-avatar">
        <!-- Current avatar -->
        <!-- Cropping modal -->
        <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="avatar-form" action="<?php echo base_url() ?>crop/crop.php" enctype="multipart/form-data" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="avatar-modal-label" style="float: left;">Change Picture</h4>
                            <button type="button" class="close" data-dismiss="modal" style="float: right;">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="avatar-body">
                                <!-- Upload image and data -->
                                <div class="avatar-upload">
                                    <input type="hidden" name="old_content_image" id="old_content_image" value="<?php echo (isset($row->image_name)) ? $row->image_name : ""; ?>">
                                    <input type="hidden" class="avatar-src" name="avatar_src">
                                    <input type="hidden" class="avatar-data" name="avatar_data">
                                    <input type="hidden"  name="content_id" id="content_id" value="<?php echo $coupon_id ?>">
                                    <input type="hidden"  name="content_type" id="content_type" value="coupon">
                                    <input type="hidden"  name="content_path" id="content_path" value="<?php echo COUPON_IMAGES; ?>">
                                    <input type="hidden"  name="image_type" id="image_type" value="dcc_logo">
                                    <!--<label for="avatarInput">Select image to upload</label>-->
                                    <input type="file" class="avatar-input" id="avatarInput" name="avatar_file" style="color: transparent;" accept=".png, .jpg, .jpeg, .gif">
                                </div>
                                <!-- Crop and preview -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="avatar-preview preview-lg"></div>
                                    </div>
                                </div>
                                <div class="row avatar-btns">
                                    <div class="col-md-9">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="-15">-15deg</button>
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="-30">-30deg</button>
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="-45">-45deg</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="15">15deg</button>
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="30">30deg</button>
                                            <button type="button" class="btn btn-primary mr-2 mb-2" data-method="rotate" data-option="45">45deg</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button onclick="displayImagePreview()" type="submit" class="btn btn-primary mr-2 mb-2 btn-block avatar-save">Done</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Loading state -->
        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
    </div>
</main>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'popper.min.js' ?>"></script>
<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'manage_coupon.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/dist/cropper.min.css">
<link rel="stylesheet" href="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/css/main.css">
<script src="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/dist/cropper.min.js"></script>
<script src="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url() . PLUGINS_FOLDER_PATH . 'select2.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . JS_FOLDER_PATH . 'input-Mask-jquery.js' ?>"></script>
<script>
                                            $('.datepicker').datepicker({
                                                format: "mm/dd/yy",
                                                changeMonth: true,
                                                changeYear: true,
                                                dateFormat: 'mm/dd/yy',
                                                minDate: new Date()
                                            });
                                            $('.select2').select2();
                                            $(document).ready(function () {
                                                App.init();
                                                ManageLogin.init();
                                            });
</script>