<?php
$this->load->view('admin/common/header_menu');
?>
<link rel="stylesheet" href="<?php echo base_url() . PLUGINS_FOLDER_PATH ?>select2.min.css">
<!--<style>
    .divright{
        float: right;
        margin-top: -55px;
    }
</style>-->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-shopping-bag cust-fa-1x font-size18"></i>&nbsp;&nbsp;<?php echo $page_title ?>: <?php echo isset($row->store_name) ? $row->store_name : "" ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() . 'admin/store' ?>">Store</a></li>
        </ul>
    </div>
    <?php $active_tab = ($this->uri->segment(5)) ? $this->uri->segment(5) : "store_detail_div"; ?>
    <ul class="nav nav-tabs">
        <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;"  class="nav-link <?php if ($active_tab === "store_detail_div") { ?>active<?php } ?>" data-toggle="tab" onclick="$('#store_detail_div').show();
                $('#contentDiv').hide();" aria-expanded="true">Store Details</a></li>
            <?php if ($store_id > 0) { ?>
            <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;" class="nav-link <?php if ($active_tab === "subscription") { ?>active<?php } ?>" data-toggle="tab" onclick="loadTabData(1, 'subscription')" aria-expanded="true">Subscription</a></li>
            <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;" class="nav-link <?php if ($active_tab === "term") { ?>active<?php } ?>" data-toggle="tab" onclick="loadTabData(1, 'term')" aria-expanded="true">Terms and Conditions</a></li>
            <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;" class="nav-link <?php if ($active_tab === "operation_hours") { ?>active<?php } ?>" data-toggle="tab" onclick="loadTabData(1, 'operation_hours')" aria-expanded="true">Hours of Operation</a></li>
            <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;" class="nav-link <?php if ($active_tab === "coupons") { ?>active<?php } ?>" data-toggle="tab" onclick="loadTabData(1, 'coupons')" aria-expanded="true">Coupons</a></li>
            <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;" class="nav-link" data-toggle="tab" onclick="loadTabData(1, 'reviews')" aria-expanded="true">Store Reviews</a></li>
            <li class="nav-item cursor_pointer"><a style="border: 1px solid #E5E5E5;" class="nav-link" data-toggle="tab" onclick="loadTabData(1, 'accounting')" aria-expanded="true">Statement</a></li>
        <?php } ?>
    </ul>
    <div id="store_detail_div">
        <form class="form-horizontal" method="post" id="manage_store_form" name="manage_store_form" action="<?php echo base_url() ?>admin/Store/update_data" enctype="multipart/form-data">
            <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id ?>"/>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo isset($row->user_id) ? $row->user_id : 0 ?>"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Store Name<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" type="text" placeholder="Store Name" id="store_name" name="store_name" value="<?php echo isset($row->store_name) ? $row->store_name : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Store Logo
                                    </label>
                                    <?php
                                    $logo = "";
                                    if (isset($row->store_logo) && $row->store_logo != "") {
                                        $logo = $row->store_logo;
                                        $store_logo = base_url() . 'uploads/store_images/' . $store_id . '/' . $row->store_logo;
                                    } else {
                                        $store_logo = base_url() . 'assets/img/' . DEFAULT_STORE_LOGO_IMAGE;
                                    }
                                    ?>
                                    <div class="col-md-8">
                                        <div id="btnfile" class="input-append">
                                            <img onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $logo; ?>', 'store_logo')" style="width: 150px;height: 150px;" id="store_logo" class="form-control" src="<?php echo $store_logo; ?>">
                                            <p style="width: 150px;">Please click on image to browse image and see preview of it, size 150*150</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">First Name<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" type="text" placeholder="First Name" id="first_name" name="first_name" value="<?php echo isset($row->first_name) ? $row->first_name : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 divright">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Last Name<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" type="text" placeholder="Last Name" id="last_name" name="last_name" value="<?php echo isset($row->last_name) ? $row->last_name : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Email ID<?php if (!$store_id) { ?><label style="color: red">*</label><?php } ?></label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" type="" placeholder="Email ID" id="email" <?php if (!$store_id) { ?> name="email" <?php } ?> value="<?php echo isset($row->email) ? $row->email : "" ?>" <?php if ($store_id) { ?> readonly=""<?php } ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 divright">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Phone<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <input data-masked-input="999-999-9999" maxlength="12" class="form-control inputfield" type="tel" placeholder="Phone" id="phone" name="phone" value="<?php echo isset($row->mobile_number) ? $row->mobile_number : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Title</label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" type="text" placeholder="Contact Title" id="contact_title" name="contact_title" value="<?php echo isset($row->contact_title) ? $row->contact_title : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 divright">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Website</label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" type="url" placeholder="Website" id="website" name="website" value="<?php echo isset($row->website) ? $row->website : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($row->user_id)) { ?>
                            <label onclick="$('#passwordDiv').toggle();" class="control-label red" style="color: blue;text-align: center;text-decoration: underline;margin-left: 1%;cursor: pointer;">Change Password? </label>
                            <br><br>
                        <?php } ?>
                        <div id="passwordDiv" <?php if (isset($row->user_id)) { ?> style="display: none;" <?php } ?>>
                            <div class="col-md-9">
                                <div class="tile-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4">Password<label style="color: red">*</label></label>
                                        <div class="col-md-8">
                                            <input class="form-control inputfield" type="password" placeholder="Password" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 divright">
                                <div class="tile-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4">Confirm Password<label style="color: red">*</label></label>
                                        <div class="col-md-8">
                                            <input class="form-control inputfield" type="password" placeholder="Confirm Password" id="conf_password" name="conf_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Store Description<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <textarea class="form-control inputfield" placeholder="Store Description" id="store_description" name="store_description" style="resize: none;"><?php echo isset($row->store_description) ? $row->store_description : "" ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Is Sponsored</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="checkbox" id="is_sponsored" name="is_sponsored" value="Y" <?php if (isset($row->is_sponsered) && $row->is_sponsered === "Y") { ?>checked=""<?php } ?> style=" width:2vw;height:1.5em;margin-top: 4px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Subscription Type</label>
                                    <div class="col-md-8">
                                        <div class="col" style="padding-right:0px;">
                                            <div class="form-check" style="display:inline-block">
                                                <label class="form-check-label col-md-4">
                                                    <input class="form-check-input" name="subscription_type" type="radio"  value="MONTHLY" checked="" >Monthly
                                                </label>
                                            </div>
                                            <div class="form-check" style="display:inline-block">
                                                <label class="form-check-label col-md-4">
                                                    <input class="form-check-input" name="subscription_type" type="radio" value="PERCENTAGE" >Percentage
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Address 1<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" placeholder="Address 1" id="address_one" name="address_one" value="<?php echo isset($row->address_one) ? $row->address_one : "" ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 divright">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Address 2</label>
                                    <div class="col-md-8">
                                        <input class="form-control inputfield" placeholder="Address 2" id="address_second" name="address_second" value="<?php echo isset($row->address_second) ? $row->address_second : "" ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">State<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <select class="form-control inputfield select2" id="state_id" name="state_id" required="" onchange="getCityList(this.value)">
                                            <option value="">Select State</option>
                                            <?php
                                            if ($state_list) {
                                                foreach ($state_list as $val) {
                                                    ?>
                                                    <option <?php if (isset($row->state_id) && $row->state_id === $val->state_id) { ?>selected=""<?php } ?> value="<?php echo $val->state_id; ?>"><?php echo $val->state_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 divright">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">City<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <select class="form-control inputfield select2" id="city_id" name="city_id" required="">
                                            <option value="">Select City</option>
                                            <?php
                                            if ($city_list) {
                                                foreach ($city_list as $val) {
                                                    ?>
                                                    <option <?php if (isset($row->city_id) && $row->city_id === $val->city_id) { ?>selected=""<?php } ?> value="<?php echo $val->city_id; ?>"><?php echo $val->city_name; ?></option>
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
                                    <label class="control-label col-md-4">Zipcode<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <input data-masked-input="99999" maxlength="5" class="form-control inputfield" type="text" placeholder="Zipcode" id="zipcode" name="zipcode" value="<?php echo isset($row->zipcode) ? $row->zipcode : "" ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 divright">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4" >Fetch Coordinates<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <a href="javascript:getCoordinates()" style="color: blue;text-align: center;text-decoration: underline;margin-left: 1%;cursor: pointer;">Click here to fetch coordinates</a>
                                        <input readonly="" class="form-control inputfield" type="text" placeholder="Coordinates" id="lat_lng" name="lat_lng" value="<?php echo isset($row->lat) ? $row->lat . ", " . $row->lng : "" ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile orderlistheader">
                        <div class="col-md-12">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Store Images</label>
                                    <?php
                                    $img_one = "";
                                    $img_two = "";
                                    $img_three = "";
                                    $img_four = "";
                                    if ($images_list) {
                                        foreach ($images_list as $key => $row) {
                                            if ($key === 0) {
                                                $img_one = $row->image_name;
                                            }
                                            if ($key === 1) {
                                                $img_two = $row->image_name;
                                            }
                                            if ($key === 2) {
                                                $img_three = $row->image_name;
                                            }
                                            if ($key === 3) {
                                                $img_four = $row->image_name;
                                            }
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="old_image_one" id="old_image_one" value="<?php echo $img_one; ?>">
                                    <input type="hidden" name="old_image_second" id="old_image_second" value="<?php echo $img_two; ?>">
                                    <input type="hidden" name="old_image_three" id="old_image_three" value="<?php echo $img_three; ?>">
                                    <input type="hidden" name="old_image_four" id="old_image_four" value="<?php echo $img_four; ?>">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php if ($img_one) { ?>
                                                    <img id="image_one" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_one; ?>', 'image_one')"  src="<?php echo base_url() . 'uploads/store_images/' . $store_id . '/' . $img_one; ?>" style="max-width:320px; width:100%; max-height:180px; text-align:center;">
                                                <?php } else { ?>
                                                    <img id="image_one" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_one; ?>', 'image_one')" src="<?php echo base_url() . 'assets/img/' . DEFAULT_STORE_IMAGE; ?>" style="max-width:320px; width:100%; max-height:180px;">
                                                <?php } ?>
                                                <p>(Please click on image to browse image and see preview of it, size 320*180)</p>
                                            </div>
                                            <div class="col"></div>
                                            <div class="col-md-5">
                                                <?php if ($img_two) { ?>
                                                    <img id="image_second" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_two; ?>', 'image_second')" src="<?php echo base_url() . 'uploads/store_images/' . $store_id . '/' . $img_two; ?>" style="max-width:320px; width:100%; max-height:180px;">
                                                <?php } else { ?>
                                                    <img id="image_second" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_two; ?>', 'image_second')" src="<?php echo base_url() . 'assets/img/' . DEFAULT_STORE_IMAGE; ?>" style="max-width:320px; width:100%; max-height:180px;">
                                                <?php } ?>
                                                <p>(Please click on image to browse image and see preview of it, size 320*180)</p>
                                            </div>
                                            <div class="col-md-5">
                                                <?php if ($img_three) { ?>
                                                    <img id="image_three" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_three; ?>', 'image_three')" src="<?php echo base_url() . 'uploads/store_images/' . $store_id . '/' . $img_three; ?>" style="max-width:320px; width:100%; max-height:180px;">
                                                <?php } else { ?>
                                                    <img id="image_three" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_three; ?>', 'image_three')" src="<?php echo base_url() . 'assets/img/' . DEFAULT_STORE_IMAGE; ?>" style="max-width:320px; width:100%; max-height:180px;">
                                                <?php } ?>
                                                <p>(Please click on image to browse image and see preview of it, size 320*180)</p>
                                            </div>
                                            <div class="col"></div>
                                            <div class="col-md-5">
                                                <?php if ($img_four) { ?>
                                                    <img id="image_fourth" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_four; ?>', 'image_fourth')" src="<?php echo base_url() . 'uploads/store_images/' . $store_id . '/' . $row->image_name; ?>" style="max-width:320px; width:100%; max-height:180px;">
                                                <?php } else { ?>
                                                    <img id="image_fourth" onclick="crop_image(<?php echo $store_id; ?>, '<?php echo $img_four; ?>', 'image_fourth')" src="<?php echo base_url() . 'assets/img/' . DEFAULT_STORE_IMAGE; ?>" style="max-width:320px; width:100%; max-height:180px;">
                                                <?php } ?>
                                                <p>(Please click on image to browse image and see preview of it, size 320*180)</p>
                                            </div>
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
                                                <input class="form-check-input" name="status" type="radio" value="INACTIVE" <?php if (isset($row->status) && $row->status === "INACTIVE") { ?>checked="checked"<?php } ?> <?php if ($is_disabled) { ?> disabled="" <?php } ?>>Inactive
                                            </label>
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
                            <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/Store' ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>				
            </div>
        </form>
    </div>
    <div class="main" id="contentDiv">
    </div>
</main>
<div class="containerT" id="crop-avatar">
    <!-- Current avatar -->
    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="<?php echo base_url() ?>crop/crop_store_logo.php" enctype="multipart/form-data" method="post">
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
                                <input type="hidden"  name="content_id" id="content_id" value="<?php echo $store_id ?>">
                                <input type="hidden"  name="image_type" id="image_type" value="">
                                <input type="hidden"  name="content_type" id="content_type" value="store">
                                <input type="hidden"  name="content_path" id="content_path" value="<?php echo STORE_IMAGES; ?>">
                                <!--<label for="avatarInput">Select image to upload</label>-->
                                <input type="file" class="avatar-input" id="avatarInput" name="avatar_file" style="color: transparent;">
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
                                    <button onclick="$('#avatar-modal').modal('hide');" type="submit" class="btn btn-primary mr-2 mb-2 mr-2 mb-2 btn-block avatar-save">Done</button>
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
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'popper.min.js' ?>"></script>
<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'manage_store.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . JS_FOLDER_PATH . 'input-Mask-jquery.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . PLUGINS_FOLDER_PATH . 'select2.min.js' ?>"></script>
<link rel="stylesheet" href="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/dist/cropper.min.css">
<link rel="stylesheet" href="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/css/main.css">
<script src="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/dist/cropper.min.js"></script>
<script src="<?php echo base_url() . JS_FOLDER_PATH; ?>crop-avatar/js/main.js"></script>
<script>
                                        $(document).ready(function () {
                                            App.init();
                                            ManageLogin.init();
                                        });
<?php if ($active_tab != "store_detail_div") { ?>
                                            loadTabData(1, '<?php echo $active_tab; ?>')
<?php } ?>
                                        $('.select2').select2();
                                        $(function () {
                                            var $toCrop = $('.cropper-hidden > img');

                                            $toCrop.cropper({
                                                aspectRatio: 16 / 9,
                                                autoCropArea: 0,
                                                strict: false,
                                                guides: false,
                                                highlight: false,
                                                dragCrop: false,
                                                cropBoxMovable: false,
                                                cropBoxResizable: false,
                                                built: function () {
                                                    $toCrop.cropper("setCropBoxData", {width: "100", height: "50"});
                                                }
                                            });
                                        });
</script>