
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">

                <?php if (!empty($list_res)) { ?>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th class="sorting header_menu" onclick="sortTable(this, 'first_name')" style="width: 15%">User Name</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'email')" style="width: 15%">Email ID</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'mobile_number')" style="width: 16%">Phone No</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'S.store_name')" style="width: 15%">Store Name</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'role_name')" style="width: 12%">Role</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'status')" style="width: 12%">Status</th>
                                <th class="header_menu" style="width: 15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_res as $key => $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->first_name . " " . $row->last_name ?></td>
                                    <td data-toggle="tooltip" title="<?php echo $row->email; ?>" style="cursor: pointer;"><?php echo character_limiter($row->email, 20); ?></td>
                                    <td class="number_field"><?php echo $row->mobile_number ?></td>
                                    <td data-toggle="tooltip" title="<?php echo $row->store_name; ?>" style="cursor: pointer;"><?php echo character_limiter($row->store_name, 20); ?></td>
                                    <td><?php echo $row->role_name ?></td>
                                    <td><?php echo $row->status ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'admin/User/manage_user/' . $row->user_id; ?>" class="btn btn-info yellow" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil mr-0" aria-hidden="true"></i></a>
                                        <a href="javascript:reset_password('<?php echo $row->user_id ?>');" class="btn btn-info yellow" data-toggle="tooltip" title="Reset Password"><i class="fa fa-key mr-0" aria-hidden="true"></i></a>
                                        <a href="javascript:show_popup('<?php echo $row->user_id ?>','<?php echo $cur_page ?>');"  class="btn  btn-gray red" data-toggle="tooltip" title="Delete" data-original-title="" style="background-color: red;"><i class="fa fa-close  mr-0" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="span3 text-left">
                                    <?php
                                    $page_total = ($cur_page) * $per_page;
                                    $page_no = ($list_count > $page_total) ? $page_total : $list_count;
                                    ?>
                                    <small class="text-muted inline m-t-sm m-b-sm" style="float: left; margin-left: 10px;margin-top: 10px;"><?php echo "Showing " . ++$start . " - " . $page_no . " of " . $list_count . " items"; ?></small>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="span8 text-right text-right-xs" >
                                    <?php
                                    /* --------------------------------------------- */
                                    $no_of_paginations = ceil($list_count / $per_page);
                                    /* ---------------Calculating the starting and endign values for the loop----------------------------------- */
                                    if ($cur_page >= 3) {
                                        $start_loop = $cur_page - 1;
                                        if ($no_of_paginations > $cur_page + 1)
                                            $end_loop = $cur_page + 1;
                                        else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 2) {
                                            $start_loop = $no_of_paginations - 2;
                                            $end_loop = $no_of_paginations;
                                        } else {
                                            $end_loop = $no_of_paginations;
                                        }
                                    } else {
                                        $start_loop = 1;
                                        if ($no_of_paginations > 3)
                                            $end_loop = 3;
                                        else
                                            $end_loop = $no_of_paginations;
                                    }
                                    $msg = '';
                                    // FOR ENABLING THE FIRST BUTTON
                                    if ($first_btn && $cur_page > 1) {
                                        $msg .= "<li onclick='loadDataByPage(1);' class='inactive'><a href='javascript:void(0);' style='color:#fffff'>First</a></li>";
                                    } else if ($first_btn) {
                                        $msg .= "<li  class=''><a href='javascript:void(0);'  style='cursor:auto;'>First</a></li>";
                                    }
                                    if ($previous_btn && $cur_page > 1) {
                                        $pre = $cur_page - 1;
                                        $msg .= "<li p='$pre' class='inactive' onclick='loadDataByPage(" . $pre . ");'><a href='javascript:void(0);' style='color:#fffff'>Prev</a></li>";
                                    } else if ($previous_btn) {
                                        $msg .= "<li class=''><a href='javascript:void(0);' style='cursor:auto;'>Prev</a></li>";
                                    }
                                    for ($i = $start_loop; $i <= $end_loop; $i++) {

                                        if ($cur_page == $i)
                                            $msg .= "<li p='$i' class='active'><a href='javascript:void(0);' style='cursor:auto;'>{$i}</a></li>";
                                        else
                                            $msg .= "<li p='$i' class='inactive' onclick='loadDataByPage(" . $i . ");'><a href='javascript:void(0);'>{$i}</a></li>";
                                    }
                                    // TO ENABLE THE NEXT BUTTON
                                    if ($next_btn && $cur_page < $no_of_paginations) {
                                        $nex = $cur_page + 1;
                                        $msg .= "<li p='$nex' class='inactive' onclick='loadDataByPage(" . $nex . ");'><a href='javascript:void(0);' style=''>Next</a></li>";
                                    } else if ($next_btn) {
                                        $msg .= "<li class=''><a href='javascript:void(0);' style='cursor:auto;'>Next</a></li>";
                                    }
                                    // TO ENABLE THE END BUTTON
                                    if ($last_btn && $cur_page < $no_of_paginations) {
                                        $msg .= "<li onclick='loadDataByPage(" . $no_of_paginations . ");' class='inactive'><a href='javascript:void(0);'  style='color:#fffff'>Last</a></li>";
                                    } else if ($last_btn) {
                                        $msg .= "<li class=''><a href='javascript:void(0);' style='cursor:auto;'>Last</a></li>";
                                    }
                                    /* ----------------------------------------------------------------------------------------------------------- */
                                    ?>
                                    <ul class="pagination pagination-sm m-t-none m-b-none text-right" style="float: right">
                                        <?php echo $msg; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </footer>
                <?php } else {
                    ?>
                    <table class="table table-striped table-bordered table-hover" style="margin-bottom:0px;" id="sample_1"><tbody><tr><td style=" text-align: center;" width="100%">No records found.</td></tr></tbody></table>
                            <?php } ?>
            </div>
        </div>
    </div>
</div>