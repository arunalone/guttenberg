
<link rel="stylesheet" href="<?php echo base_url() . CSS_FOLDER_PATH ?>timepicker.css">
<div class="app-title" style="margin:10px 0px 30px">
    <div>
        <h1><i class="app-menu__icon fa fa-clock-o cust-fa-1x font-size18"></i>&nbsp;&nbsp;<?php echo $page_title ?></h1>
    </div>
</div>
<form id="dcc_timing_form" method="post" action="<?php echo base_url() . 'admin/Store/manage_timings' ?>">
    <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id; ?>">
    <input type="hidden" name="active_tab" value="operation_hours">
    <div class="tile">
        <div class="col-md-6">
            <div class="tile-body">
                <div class="form-group row">
                    <label class="control-label col-md-3">Start Timings<label style="color: red">*</label></label>
                    <div class="col-md-8">
                        <input autocomplete="off" class="form-control inputfield timepicker" type="text" placeholder="Start Timings" id="start_work_timing" name="start_work_timing" value="<?php echo isset($row->start_work_timing) ? $row->start_work_timing : "" ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile-body">
                <div class="form-group row">
                    <label class="control-label col-md-3">End Timings<label style="color: red">*</label></label>
                    <div class="col-md-8">
                        <input autocomplete="off" class="form-control inputfield timepicker" type="text" placeholder="End Timings" id="end_work_timing" name="end_work_timing" value="<?php echo isset($row->end_work_timing) ? $row->end_work_timing : "" ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-left: -1%">
            <div class="tile-body">
                <label class="control-label col-md-12">Apply Time To<label style="color: red">*</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    All Days &nbsp;<input style="margin-right: 10px;" type="checkbox" id="appl_to_all" name="appl_to_all" value="YES" > 
                    Sunday &nbsp;<input style="margin-right: 10px;" type="checkbox"  value="YES" class="day_chk" name="sunday">
                    Monday &nbsp;<input style="margin-right: 10px;" type="checkbox"  value="YES" class="day_chk" name="monday">
                    Tuesday &nbsp;<input style="margin-right: 10px;" type="checkbox" value="YES" class="day_chk" name="tuesday">
                    Wednesday &nbsp;<input style="margin-right: 10px;" type="checkbox" value="YES" class="day_chk" name="wednesday">
                    Thursday &nbsp;<input style="margin-right: 10px;" type="checkbox" value="YES" class="day_chk" name="thursday">
                    Friday &nbsp;<input style="margin-right: 10px;" type="checkbox" value="YES" class="day_chk" name="friday">
                    Saturday &nbsp;<input style="margin-right: 10px;" type="checkbox" value="YES" class="day_chk" name="saturday">
                </label>
            </div>
        </div>
        <hr>
        <div class="col">
            <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" href="<?php echo base_url() . 'admin/Role' ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th class="sorting header_menu" >Day</th>
                            <th class="sorting header_menu" >Start Time</th>
                            <th class="sorting header_menu" >End Time</th>
                            <th class="sorting header_menu" >Closed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sunday</td>
                            <td><?php echo isset($operation_details->tim_sunday_open_time) ? $operation_details->tim_sunday_open_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_sunday_close_time) ? $operation_details->tim_sunday_close_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_sunday_close) ? $operation_details->tim_sunday_close : "NA"; ?></td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td><?php echo isset($operation_details->tim_monday_open_time) ? $operation_details->tim_monday_open_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_monday_close_time) ? $operation_details->tim_monday_close_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_monday_close) ? $operation_details->tim_monday_close : "NA"; ?></td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td><?php echo isset($operation_details->tim_tuesday_open_time) ? $operation_details->tim_tuesday_open_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_tuesday_close_time) ? $operation_details->tim_tuesday_close_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_tuesday_close) ? $operation_details->tim_tuesday_close : "NA"; ?></td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td><?php echo isset($operation_details->tim_wednesday_open_time) ? $operation_details->tim_wednesday_open_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_wednesday_close_time) ? $operation_details->tim_wednesday_close_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_wednesday_close) ? $operation_details->tim_wednesday_close : "NA"; ?></td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td><?php echo isset($operation_details->tim_thrusday_open_time) ? $operation_details->tim_thrusday_open_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_thrusday_close_time) ? $operation_details->tim_thrusday_close_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_thrusday_close) ? $operation_details->tim_thrusday_close : "NA"; ?></td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td><?php echo isset($operation_details->tim_friday_open_time) ? $operation_details->tim_friday_open_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_friday_close_time) ? $operation_details->tim_friday_close_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_friday_close) ? $operation_details->tim_friday_close : "NA"; ?></td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td><?php echo isset($operation_details->tim_saturday_open_time) ? $operation_details->tim_saturday_open_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_saturday_close_time) ? $operation_details->tim_saturday_close_time : "NA"; ?></td>
                            <td><?php echo isset($operation_details->tim_saturday_close) ? $operation_details->tim_saturday_close : "NA"; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'bootstrap-timepicker.js'; ?>"></script>
<script>
    $(document).ready(function () {
        App.init();
        ManageLogin.init();
    });
    $('.timepicker').timepicker({});

    $('#appl_to_all').change(function () {
        if (!$(this).is(':checked')) {
            $('.day_chk').attr('disabled', false)
        } else {
            applyTo('all')
            $('.day_chk:checkbox:checked').each(function () {
                $(this).attr('checked', false);
            });
        }
    });
    function applyTo(day) {
        if (day == "all") {
            $('.day_chk').attr('disabled', true)
        }
    }
    /*
     //start time
     var start_time = $("#start_work_timing").val();
     //end time
     var end_time = $("#end_work_timing").val();
     //convert both time into timestamp
     var stt = new Date("November 13, 2013 " + start_time);
     stt = stt.getTime();
     var endt = new Date("November 13, 2013 " + end_time);
     endt = endt.getTime();
     //by this you can see time stamp value in console via firebug
     console.log("Time1: " + stt + " Time2: " + endt);
     if (stt > endt) {
     $("#start_time").after('<span class="error"><br>Start-time must be smaller then End-time.</span>');
     $("#end_time").after('<span class="error"><br>End-time must be bigger then Start-time.</span>');
     return false;
     }*/
</script>