<?php
$this->load->view('admin/common/header_start');
$this->load->view('admin/common/style');
?>
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-3">
                            <b>Date:</b> <?php echo date('m/d/Y', strtotime($order_details[0]->booking_date)); ?>
                        </div>
                        <div class="col-3"><b>Invoice:</b> #<?php echo $order_details[0]->order_id . $user_id; ?></div>
                        <div class="col-3"><b>Order ID:</b> <?php echo $order_details[0]->order_id; ?></div>
                    </div>
                    <div class="row invoice-info">

                        <div class="col-4" style="background-color:rgba(0, 0, 0, 0.05); padding: 1%;margin: 1%;"><b><u>From</u></b>
                            <address><strong><?php echo $order_details[0]->store_name; ?></strong><br><?php echo $order_details[0]->store_address; ?></address>
                        </div>
                        <div class="col-4" style="background-color:rgba(0, 0, 0, 0.05); padding: 1%;margin: 1%;"><b><u>To</u></b>
                            <address><strong><?php echo $order_details[0]->customer_name; ?></strong><br><?php echo $order_details[0]->customer_address; ?><br>Phone: <?php echo $order_details[0]->customer_mobile; ?>
                                <!-- <br>Email: <?php echo $this->session->userdata('email'); ?>-->
                            </address>
                        </div>
                        <div class="col-3" style="background-color:rgba(0, 0, 0, 0.05); padding: 1%;margin: 1%;"><b><u>Comments</u></b>
                            <address>Special Comments: <?php echo $order_details[0]->special_comment; ?>
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
                                        <th>Expiry Date</th>
                                        <!--<th>Expiry Days</th>-->
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($order_details) {
                                        foreach ($order_details as $key => $row) {
                                            ?>
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
                                        <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
