<?php
$this->load->view('admin/common/header_menu');
?>
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><img src="<?php echo base_url() . 'assets/images/web-icon.png'; ?>" style="margin-right: 10px;margin-bottom: 5px;"> Coupon Marjuana</h2>
                        </div> 
                        <div class="col-6 text-right"><a class="btn btn-primary" href="javascript:window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</a>
                            <a class="btn btn-primary" href="javascript:window.print()" target="_blank"><i class="fa fa-print"></i> Print</a>
                            <!--<a class="btn btn-primary" href="javascript:orderDetail('<?php echo $row->order_id; ?>')"><i class="fa fa-print"></i> Print</a>-->
                        </div>						
                    </div>
                    <div class="row mb-4">
                        <div class="col-3">
                            <b>Date:</b> <?php echo date('m/d/Y', strtotime($row->booking_date)); ?>
                        </div>
                        <div class="col-3"><b>Invoice:</b> #<?php echo $row->order_id . $row->user_id; ?></div>
                        <div class="col-3"><b>Order ID:</b> <?php echo $row->order_id; ?></div>
                    </div>
                    <div class="row invoice-info">

                        <div class="col-4" style="background-color:rgba(0, 0, 0, 0.05); padding: 1%;margin: 1%;"><b><u>From</u></b>
                            <address><strong><?php echo $row->store_name; ?></strong><br><?php echo $row->store_address; ?></address>
                        </div>
                        <div class="col-4" style="background-color:rgba(0, 0, 0, 0.05); padding: 1%;margin: 1%;"><b><u>To</u></b>
                            <address><strong><?php echo $row->customer_name; ?></strong><br><?php echo $row->customer_address; ?><br>Phone: <?php echo $row->customer_mobile; ?>
                                <!-- <br>Email: <?php echo $this->session->userdata('email'); ?>-->
                            </address>
                        </div>
                        <div class="col-3" style="background-color:rgba(0, 0, 0, 0.05); padding: 1%;margin: 1%;"><b><u>Comments</u></b>
                            <address>Special Comments: <?php echo $row->special_comment; ?>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Coupon Name</th>
                                        <th>price per coupon #</th>
                                        <th>Category</th>
                                        <th>Booking Date</th>
                                        <!--<th>Expiry Date</th>-->
                                        <th>Expiry Days</th>
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row->no_of_coupons; ?></td>
                                        <td><?php echo $row->coupon_name; ?></td>
                                        <td>$<?php echo $row->price_per_coupon; ?></td>
                                        <td><?php echo $row->category_type; ?></td>
                                        <td><?php echo date('m/d/Y', strtotime($row->booking_date)); ?></td>
                                        <!--<td><?php echo date('m/d/Y', strtotime($row->expiry_date)); ?></td>-->
                                        <td><?php echo $row->expiry_days; ?></td>
                                        <td><?php echo $row->discount; ?>%</td>
                                        <td>$<?php echo ($row->discounted_amount * $row->no_of_coupons); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() . JS_FOLDER_PATH . 'popper.min.js' ?>"></script>
<?php $this->load->view('admin/common/script'); ?>
<script>
    function orderDetail(order_id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "admin/User/order_print" ?>',
            data: "order_id=" + order_id,
            success: function (data) {
                window.open(data, '_blank');
                return false;
            }
        });
    }
</script>
<?php $this->load->view('admin/common/footer'); ?>