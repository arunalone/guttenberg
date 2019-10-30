<?php
$this->load->view('admin/common/header_menu');
if (!empty($row)) {
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $mobile_no = $row->mobile_number;
    $address_one = $row->address_one;
    $address_second = $row->address_second;
    $email = $row->email;
    $role_id = $row->role_id;
    $store_id = $row->store_id;
    $state_id = $row->state_id;
    $city_id = $row->city_id;
    $status = $row->status;
    $zipcode = $row->zipcode;
} else {
    $display_name = $status = $role_id = $first_name = $last_name = $mobile_no = $email = $address_second = $address_one = $state_id = $city_id = $zipcode = "";
}
?>
<link rel="stylesheet" href="<?php echo base_url() . PLUGINS_FOLDER_PATH ?>select2.min.css">
<main class="app-content">
    <div class="app-title" style="margin:-30px 0px 30px;">
        <div>
            <h1><i class="fa fa-user-circle"></i>&nbsp;&nbsp;<?php echo $page_title ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() . 'admin/user' ?>">Users</a></li>
        </ul>
    </div>
    <form class="form-horizontal" method="post" id="manage_user_form" name="manage_user_form" action="<?php echo base_url() ?>admin/User/update_data">
        <div class="row">
            <div class="col-md-12">
                <div class="tile orderlistheader">
                    <div class="col">
                        <div class="tile-body">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>"/>
                            <input type="hidden" name="cur_page" id="cur_page" value="<?php echo $cur_page ?>"/>
                            <div class="form-group row">
                                <label class="control-label col-md-4">First Name<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="First name" id="first_name" name="first_name" value="<?php echo $first_name ?>">
                                </div>
                            </div>
                            <?php if ($is_profile === "NO" && $user_id === 0) { ?>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Role<label style="color: red">*</label></label>
                                    <div class="col-md-8">
                                        <select class="form-control inputfield" id="role_id" name="role_id" onchange="showStoreList(this.value)">
                                            <option value="" >--Select--</option>
                                            <?php foreach ($all_roles as $key => $value) { ?>
                                                <option value="<?php echo $value->role_id ?>" <?php if ($value->role_id == $role_id) { ?>selected=""<?php } ?>><?php echo $value->role_name ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Mobile Number<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input data-masked-input="999-999-9999" maxlength="12" class="form-control inputfield" type="text" placeholder="Mobile Number"  id="mobile_no" name="mobile_no" value="<?php echo $mobile_no ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Address 1<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" id="address_one" name="address_one" value="<?php echo $address_one ?>" placeholder="Address 1"/> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">State<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <select class="form-control inputfield select2" id="state_id" name="state_id" onchange="getCityList(this.value)">
                                        <option value="" >--Select--</option>
                                        <?php
                                        if ($state_list) {
                                            foreach ($state_list as $val) {
                                                ?>
                                                <option <?php if (isset($state_id) && $state_id === $val->state_id) { ?>selected=""<?php } ?> value="<?php echo $val->state_id; ?>"><?php echo $val->state_name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Zipcode<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input maxlength="5" class="form-control inputfield" type="text" placeholder="Zipcode"  id="zipcode" name="zipcode" value="<?php echo $zipcode; ?>">
                                </div>
                            </div>

                            <div class="form-group row" <?php if ($user_id > 0) { ?>style="display: none;"<?php } ?> id="passwordDiv">
                                <label class="control-label col-md-4">Password<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="password" placeholder="Password"  name="password" id="password" >
                                </div>
                            </div>
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
                                                <input class="form-check-input" name="status" type="radio" value="INACTIVE" <?php if ($status == "INACTIVE") { ?>checked=""<?php } ?>>Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Last Name<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Last Name"  id="last_name" name="last_name" value="<?php echo $last_name ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="storeList" style="display: none;">
                                <label class="control-label col-md-4">Store</label>
                                <div class="col-md-8">
                                    <select class="form-control inputfield " id="store_id" name="store_id" required="">
                                        <option value="" >--Select--</option>
                                        <?php
                                        $store_id = isset($row->store_id) ? $row->store_id : 0;
                                        if ($store_list) {
                                            foreach ($store_list as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value->store_id ?>" <?php if ($value->store_id === $store_id) { ?>selected=""<?php } ?>><?php echo $value->store_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Office Number</label>
                                <div class="col-md-8">
                                    <input data-masked-input="999-999-9999" maxlength="12" class="form-control inputfield" type="text" placeholder="Office Number"  id="office_number" name="office_number" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Email<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" <?php if ($user_id == 0) { ?> required="" <?php } else { ?>readonly=""<?php } ?>  type="text" placeholder="Email"  id="email" name="email" value="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Address 2</label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Address 2"  id="address_second" name="address_second" value="<?php echo $address_second ?>"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">City<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <select class="form-control inputfield select2" id="city_id" name="city_id">
                                        <option value="" >--Select--</option>
                                        <?php
                                        if ($city_list) {
                                            foreach ($city_list as $val) {
                                                ?>
                                                <option <?php if (isset($city_id) && $city_id === $val->city_id) { ?>selected=""<?php } ?> value="<?php echo $val->city_id; ?>"><?php echo $val->city_name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group row" <?php if ($user_id > 0) { ?>style="display: none;margin-top: 27px;"<?php } ?> id="passwordDiv1" >
                                <label class="control-label col-md-4">Confirm Password<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="password" placeholder="Confirm Password"  name="confirm_password" id="confirm_password" >
                                </div>
                            </div>
                            <?php if ($user_id > 0) { ?>
                             <div class="form-group row">
                                 <div class="col-md-12">
                                <label onclick="$('#passwordDiv,#passwordDiv1').toggle();" class="control-label red" style="color: blue;text-align: center;text-decoration: underline;cursor: pointer;">Change Password? </label>
                              </div>
                                 </div>
                            <?php } else { ?>
                                <div class="form-group row" style="margin-top: 35px;"> 
                                    <label class="control-label col-md-4"></label>
                                    <div class="col-md-8">

                                    </div>
                                </div>
                            <?php } ?>
                            <br>
                           
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col">
                    <div class="col-md-8 col-md-offset-3">
                        <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="javascript:window.history.go(-1)"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>				
        </div>
    </form>
</main>

<script src="<?php echo base_url() . JS_FOLDER_PATH . 'popper.min.js' ?>"></script>
<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'manage_user.js'; ?>"></script>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'plugins/pace.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . JS_FOLDER_PATH . 'input-Mask-jquery.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . PLUGINS_FOLDER_PATH . 'select2.min.js' ?>"></script>    
<script>
                                $(document).ready(function () {
                                    App.init();
                                    ManageLogin.init();
                                });
                                $('.select2').select2();
</script>