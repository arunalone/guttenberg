<div class="app-title" style="margin:10px 0px 30px">
    <div>
        <h1><img src="<?php echo base_url() . 'assets/img/term-icon.png' ?>">&nbsp;&nbsp;<?php echo $page_title ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form class="p-3" method="POST" action="<?php echo base_url() . 'admin/Store/update_term'; ?>" name="manage_term_form" id="manage_term_form">
                    <input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
                    <input type="hidden" name="active_tab" value="term">
                    <div class="col-md-9">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3">Title<label style="color: red">*</label></label>
                                <div class="col-md-9">
                                    <input  class="form-control inputfield" type="text" placeholder="Title" id="title" name="title" value="<?php echo isset($term_detail->store_title) ? $term_detail->store_title : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3">Description<label style="color: red">*</label></label>
                                <div class="col-md-9">
                                    <textarea placeholder="Description" class="form-control inputfield" id="description" name="description" style="resize: none;height: 300px;"><?php echo isset($term_detail->store_description) ? $term_detail->store_description : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/Store' ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        App.init();
        ManageLogin.init();
    });
</script>