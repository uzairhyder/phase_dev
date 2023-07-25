<style type="text/css">

    .invoice-title h2, .invoice-title h3 {

        display: inline-block;

    }


    .table > tbody > tr > .no-line {

        border-top: none;

    }


    .table > thead > tr > .no-line {

        border-bottom: none;

    }


    .table > tbody > tr > .thick-line {

        border-top: 2px solid;

    }

</style>

<div class="container">

    <div class="row">

        <div class="col-xs-12">

            <div class="invoice-title">

                <h3 class="pull-right">Order # <?= $order_detail['order_id'] ?></h3>

            </div>


            <div class="row">

                <div class="col-xs-6">

                    <address>

                        <strong>Billed To:</strong><br>

                        <?= $order_detail['order_firstname'] ?> <?= $order_detail['order_lastname'] ?><br>

                        <?= $order_detail['order_address1'] ?>
                        <br><br><strong>Company:</strong><br>

                        <?= $order_detail['order_company'] ?>, <?= $order_detail['order_city'] ?>&nbsp;&nbsp;<?= $order_detail['order_country'] ?>
                        <br>
                        <strong>Phone:&nbsp;&nbsp;</strong><?= $order_detail['order_phone'] ?>  
                        <!-- <br><strong>Email:&nbsp;&nbsp;</strong><?= $order_detail['order_email'] ?>  -->
                        <!--<br><strong>Zip Code:&nbsp;&nbsp;</strong>--><?/*= $order_detail['order_zip'] */?>
                        <br><strong>Town/CIty:&nbsp;&nbsp;</strong><?= $order_detail['order_city'] ?>
                        <!-- <br><strong>Remarks:&nbsp;&nbsp;</strong><?= $order_detail['order_payment_comments'] ?> -->
                    </address>

                </div>

                <div class="col-xs-6 text-right">

                    <!-- <address>

                        <strong>Shipped To:</strong><br>

                        <?= $order_detail['order_firstname'] ?> <?= $order_detail['order_lastname'] ?><br>

                        <?= $order_detail['order_address1'] ?>

                    </address> -->

                </div>

            </div>

            <div class="row">

                <div class="col-xs-6">

                    <address>

                        <strong>Payment Email:</strong><br>

                        <?= $order_detail['order_email'] ?>

                    </address>

                </div>

                <div class="col-xs-6 text-right">

                    <address>

                        <strong>Order Date:</strong><br>

                        <?= date("d M Y", strtotime($order_detail['order_createdon'])) ?><br><br>

                    </address>

                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title"><strong>Order summary</strong></h3>

                </div>

                <div class="panel-body tableCol">

                    <div class="table-responsive">

                        <table class="table table-condensed">

                            <thead>

                            <tr>
                                <!--<td>S.NO.</td>-->
                                <td style="text-align: left;width: 10%;"><strong>Order Id</strong></td>
                                <td style="width: 30%;"><strong>Product</strong></td>

                                <td class="text-center"><strong>Price</strong></td>

                                <td class="text-center"><strong>Quantity</strong></td>
                                <!--<td class="text-center"><strong>Shipping</strong></td>-->

                                <td class="text-right"><strong>Item Total</strong></td>

                            </tr>

                            </thead>

                            <tbody>


                            <!-- foreach ($order->lineItems as $line) or some such thing here -->


                            <?php

                            $total = 0;

                            foreach ($order_items as $key => $value) {
                                $options = unserialize($value['order_item_option']);
                                //debug($options);
                                $product = $this->model_product->find_by_pk($value['order_item_product_id']);

                                ?>

                                <tr>
                                    <!--<td><?/*= $key + 1 */?></td>-->
                                    <td style="text-align: center;"><?= $value['order_item_order_id'] ?></td>
                                    <td style="text-align: left;"><?= $product['product_name'] ?>
                                        <ul>
                                            <?php
                                            if(!empty($options['kit'])){
                                                $kit = $this->model_kit->find_by_pk($options['kit']);?>
                                                <li><strong>Kit</strong> - <?php echo $kit['kit_name'];?></li>
                                            <?php }
                                            if(!empty($options['prep_size'])){
                                                $prep_size = $this->model_prep_size->find_by_pk($options['prep_size']);?>
                                                <li><strong>Prep Size</strong> - <?php echo $prep_size['prep_size_name'];?></li>
                                            <?php }

                                            ?>
                                        </ul>
                                    </td>

                                    <td class="text-center"><?= price($value['order_item_price']) ?></td>

                                    <td class="text-center"><?= $value['order_item_qty'] ?></td>
                                    <!--<td class="text-right"><?/*=price($order_detail['order_shipping'])*/ ?></td>-->
                                    <td class="text-right"><?= price($value['order_item_subtotal']) ?></td>

                                </tr>


                                <?php

                                $total += $value['order_item_subtotal'];

                            }

                            ?>

                            <tr>
                                <td colspan="5"><br/></td>
                            </tr>


                            <tr>

                                <td class="no-line"></td>
                                <td class="no-line"></td>

                                <td class="no-line"></td>

                                <td class="no-line text-right"><strong>Subtotal</strong></td>

                                <td class="no-line text-right"><?= price($total) ?></td>

                            </tr>


                            <tr>

                                <td class="no-line"></td>
                                <td class="no-line"></td>

                                <td class="no-line"></td>

                                <td class="no-line text-right"><strong>Shipping</strong></td>

                                <td class="no-line text-right"><?= price($order_detail['order_shipment_price']) ?></td>

                            </tr>

                            <tr>

                                <td class="no-line"></td>
                                <td class="no-line"></td>

                                <td class="no-line"></td>

                                <td class="no-line text-right"><strong>Tax</strong></td>

                                <td class="no-line text-right"><?= price($order_detail['order_tax']) ?></td>

                            </tr>


                            <tr>

                                <td class="no-line"></td>
                                <td class="no-line"></td>

                                <td class="no-line"></td>

                                <td class="no-line text-right"><strong>Total</strong></td>

                                <td class="no-line text-right"><?= price($order_detail['order_amount']) ?></td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>