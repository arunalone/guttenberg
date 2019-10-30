<?php
$this->load->view('admin/common/header_menu');
?>
<main class="app-content">
    <div class="app-title" style="margin:-30px 0px 30px">
        <div>
            <h1><i class="app-menu__icon fa fa-user cust-fa-1x "></i>&nbsp;&nbsp;Users</h1>
        </div>
        <a class="btn btn-info btn-addon" style="float: right;padding-right: 10px" href="<?php echo base_url() . 'admin/User/manage_user' ?>"><i class="fa fa-plus" aria-hidden="true" style="font-size:19px"></i> Add</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile orderlistheader" style="justify-content:center;">
                <div class="col-sm-5 pl-0">
                    <div class="form-group">Search
                        <input class="app-search__input form-control" style="border: 2px solid #ced4da; border-radius: 4px;margin-right: 6px;" type="search" placeholder="Search by User Name/ Email/ Role/ Store Name" id="search_val" name="search_val">
                    </div>
                </div>
                <div class="col-sm-3 pl-0">
                    <div class="form-group">Status
                        <select class="form-control" id="user_type" name="user_type" onchange="loadDataByPage(1)">
                            <option value="">All</option>
                            <?php foreach ($all_roles as $key => $value) { ?>
                                <option value="<?php echo $value->role_id ?>"><?php echo $value->role_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 pl-0">
                    <div class="form-group">Status
                        <select class="form-control" id="user_status" name="user_status" onchange="loadDataByPage(1)">
                            <option value="">All</option>
                            <option value="ACTIVE" >Active</option>
                            <option value="INACTIVE">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="pl-0" style="margin-top: 15px;">
                    <button class="btn btn-info btn-addon mt-2" onclick="loadDataByPage(1)" ><i style="font-size:23px" class="fa fa-search mr-0" aria-hidden="true"></i></button>
                </div>
            </div>				
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="admin_id" name="admin_id"/>
                    <input type="hidden" id='current_page' name="current_page"/>

                    <h4 class="modal-title"><span class="">Delete User</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>  Are you sure want to <span class="">delete this record</span>?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" onclick="deleteUser()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Yes</button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>No</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="resetPasswordDiv" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form method="POST" action="<?php echo base_url() . 'admin/User/update_password' ?>" name="manage_reset_password" id="manage_reset_password">
                    <div class="modal-header">
                        <h4 class="modal-title"><span class="">Reset Password</span></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="0">
                        <input type="hidden" name="user_type" id="user_type" value="admin_user">
                        <div class="col-md-6">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label >Password<label style="color: red">*</label></label>
                                    <div class="">
                                        <input class="form-control inputfield" type="password" placeholder="Password" id="password" name="password" style="width: 380px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 divright">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label >Confirm Password<label style="color: red">*</label></label>
                                    <div class="">
                                        <input class="form-control inputfield" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" style="width: 380px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type='hidden' id='sort' value="<?php echo isset($sort) ? $sort : 'asc'; ?>">
    <input type='hidden' id='colname' value="<?php echo isset($colname) ? $colname : "first_name"; ?>">
    <input type='hidden' id='col' value='0'>
    <div class="main" id="contentDiv">
    </div>
</main>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'popper.min.js' ?>"></script>
<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'admin_user_pagi.js'; ?>"></script>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'main.js' ?>"></script>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'plugins/pace.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . JS_FOLDER_PATH . 'plugins/select2.min.js' ?>"></script>
<script type="text/javascript">
                        $(document).ready(function () {
                            loadDataByPage(1);
                            App.init();
                            ManageLogin.init();
                        });
                        $('#search_val').on('keypress', function (e) {
                            var code = e.keyCode || e.which;
                            if (code == 13) {
                                loadDataByPage(1);
                            }
                        });
                        function show_popup(id, current_page, )
                        {
                            $("#admin_id").val(id);
                            $("#current_page").val(current_page);
                            $(".actionType").html();
                            $('#myModal').modal('show');
                        }
                        function reset_password(user_id) {
                            $('#user_id').val(user_id);
                            $('#resetPasswordDiv').modal('show');
                        }
                        function deleteUser() {
                            var admin_id = parseInt(jQuery("#admin_id").val());
                            $('#myModal').modal('hide');
                            $.ajax({
                                type: 'POST',
                                url: Host + "/admin/user/delete_user",
                                data: "user_id=" + admin_id,
                                success: function (data) {
                                    if (data == "success") {
                                        loadDataByPage(1);
                                        showToastMsg('success', "Record deleted successfully");
                                    } else {
                                        showToastMsg('error', data);
                                    }
                                }
                            });
                        }
</script>
<?php $this->load->view('admin/common/footer'); ?>
</body>
</html>