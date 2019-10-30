<div class="app-title" style="margin:10px 0px 30px">
    <div>
        <h1><i class="app-menu__icon fa fa-users cust-fa-1x font-size14"></i>&nbsp;&nbsp;<?php echo $page_title ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile orderlistheader" style="justify-content:center;">
            <div class="col-sm-8 pl-0">
                <div class="form-group mb-0">
                    <input class="app-search__input form-control" style="border: 2px solid #ced4da; border-radius: 4px;margin-right: 6px;" type="text" placeholder="Search by Email ID/Store Name/Address" id="search_keyword" name="search_keyword">
                </div>
            </div>
            <div class="col-sm-3 pl-0">
                <div class="form-group row mb-0">
                    <label for="example-text-input" class="col-3 col-form-label">Status</label>
                    <div class="col-9 pl-0">
                        <select class="form-control" id="module_status" name="module_status" onchange="loadTabData(1)">
                            <option value="">All</option>
                            <option value="ACTIVE" >Active</option>
                            <option value="INACTIVE">In-active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="">
                <button class="btn btn-info btn-addon" onclick="loadTabData(1)" style="padding-right: 10px"><i class="fa fa-search mr-0" aria-hidden="true" style="font-size:19px"></i></button>
            </div>
        </div>				
    </div>				
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" id='current_page' name="current_page"/>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Are you sure want to <span class="actionType"></span> ?
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="button"><i class="fa fa-fw fa-lg fa-check-circle" onclick="deleteUser()"></i>Yes</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>No</button>
            </div>
        </div>
    </div>
</div>

<input type='hidden' id='sort' value="<?php echo isset($sort) ? $sort : 'desc'; ?>">
<input type='hidden' id='colname' value="<?php echo isset($colname) ? $colname : "store_name"; ?>">
<input type='hidden' id='col' value='0'>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <?php if (!empty($list_res)) { ?>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th class="sorting header_menu" onclick="sortTable(this, 'order_detail_id')">Order Number</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'coupon_name')">Coupon Name</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'customer_name')">Customer Name</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'booking_date')">Buy Date</th>
                                <!--<th class="sorting header_menu" onclick="sortTable(this, 'expiry_date')">Expiry Date</th>-->
                                <th class="sorting header_menu" onclick="sortTable(this, 'customer_mobile')">Mobile Number</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'expiry_days')">Valid till Days</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'coupon_code')">Coupon Code</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'store_name')">Store Name</th>
                                <th class="sorting header_menu" onclick="sortTable(this, 'status')">Coupon Status</th>
                                <th class="header_menu">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_res as $key => $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->order_detail_id; ?></td>
                                    <td><?php echo $row->coupon_name; ?></td>
                                    <td><?php echo $row->customer_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($row->booking_date)); ?></td>
                                    <!--<td><?php echo date('m/d/Y', strtotime($row->expiry_date)); ?></td>-->
                                    <td><?php echo $row->customer_mobile; ?></td>
                                    <td><?php echo $row->expiry_days; ?></td>
                                    <td><?php echo $row->coupon_code; ?></td>
                                    <td><?php echo $row->store_name; ?></td>
                                    <td><?php echo $row->status; ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'admin/User/order_details/' . $row->id; ?>" class="btn btn-info yellow" data-toggle="tooltip" title="View"><i class="fa fa-eye mr-0" aria-hidden="true"></i></a>
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
                                        $msg .= "<li onclick='loadTabData(1);' class='inactive'><a href='javascript:void(0);' style='color:#fffff'>First</a></li>";
                                    } else if ($first_btn) {
                                        $msg .= "<li  class=''><a href='javascript:void(0);'  style='cursor:auto;'>First</a></li>";
                                    }
                                    if ($previous_btn && $cur_page > 1) {
                                        $pre = $cur_page - 1;
                                        $msg .= "<li p='$pre' class='inactive' onclick='loadTabData(" . $pre . ");'><a href='javascript:void(0);' style='color:#fffff'>Prev</a></li>";
                                    } else if ($previous_btn) {
                                        $msg .= "<li class=''><a href='javascript:void(0);' style='cursor:auto;'>Prev</a></li>";
                                    }
                                    for ($i = $start_loop; $i <= $end_loop; $i++) {

                                        if ($cur_page == $i)
                                            $msg .= "<li p='$i' class='active'><a href='javascript:void(0);' style='cursor:auto;'>{$i}</a></li>";
                                        else
                                            $msg .= "<li p='$i' class='inactive' onclick='loadTabData(" . $i . ");'><a href='javascript:void(0);'>{$i}</a></li>";
                                    }
                                    // TO ENABLE THE NEXT BUTTON
                                    if ($next_btn && $cur_page < $no_of_paginations) {
                                        $nex = $cur_page + 1;
                                        $msg .= "<li p='$nex' class='inactive' onclick='loadTabData(" . $nex . ");'><a href='javascript:void(0);' style=''>Next</a></li>";
                                    } else if ($next_btn) {
                                        $msg .= "<li class=''><a href='javascript:void(0);' style='cursor:auto;'>Next</a></li>";
                                    }
                                    // TO ENABLE THE END BUTTON
                                    if ($last_btn && $cur_page < $no_of_paginations) {
                                        $msg .= "<li onclick='loadTabData(" . $no_of_paginations . ");' class='inactive'><a href='javascript:void(0);'  style='color:#fffff'>Last</a></li>";
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