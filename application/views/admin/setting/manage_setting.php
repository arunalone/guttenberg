<?php
$this->load->view('admin/common/header_menu');
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-cog"></i>&nbsp;&nbsp;<?php echo $page_title ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() . 'admin/Setting' ?>">Setting</a></li>
        </ul>
    </div>
    <form class="form-horizontal" method="post" id="manage_role_form" name="manage_role_form" action="<?php echo base_url() ?>admin/Setting/update_data">
        <div class="row">
            <div class="col-md-12">
                <div class="tile orderlistheader">
                    <div class="col">
                        <div class="tile-body">
                            <input type="hidden" name="setting_id" id="setting_id" value="<?php echo $setting_id ?>"/>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Media<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Media" id="media" name="media" value="<?php echo isset($row->media) ? $row->media : "" ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Username<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Username" id="login" name="login" value="<?php echo isset($row->login) ? $row->login : "" ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3">API<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="API" id="api_key" name="api_key" value="<?php echo isset($row->api_key) ? $row->api_key : "" ?>">
                                </div>
                            </div>
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Status<label style="color: red">*</label></label>
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
                    <div class="col">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3">URL<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="url" placeholder="URL"  id="url" name="url" value="<?php echo isset($row->url) ? $row->url : "" ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Password<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Password"  id="password" name="password" value="<?php echo isset($row->password) ? $row->password : "" ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3">Comment<label style="color: red">*</label></label>
                                <div class="col-md-8">
                                    <input class="form-control inputfield" type="text" placeholder="Comment"  id="comment" name="comment" value="<?php echo isset($row->comment) ? $row->comment : "" ?>">
                                </div>
                            </div>

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

<?php $this->load->view('admin/common/script'); ?>
<script src="<?php echo base_url() . VALIDATIONS_FOLDER_PATH . 'manage_setting.js'; ?>"></script>
<script>
    $(document).ready(function () {
        App.init();
        ManageLogin.init();
    });
</script>