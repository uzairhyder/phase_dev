<? global $config;
//$discount_base = discount_value( $order_detail[ 'order_discount' ] , $order_detail[ 'order_discount_type' ] , $order_detail[ 'order_total' ] );
//$discount = discount_text( $order_detail[ 'order_discount' ] , $order_detail[ 'order_discount_type' ] , $order_detail[ 'order_currency' ] , $order_detail[ 'order_currency_rate' ] ,false ) ;
//debug($order_detail,1);
?>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-shopping-cart"></i>
                <strong>Order #<?= $order_detail['order_id'] ?> </strong>
                <small> / <?= date("Y-m-d", strtotime($order_detail['order_createdon'])) ?></small>
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
                <a href="javascript:;" class="reload">
                </a>
            </div>
        </div>

        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <div class="invoice" style="padding: 20px;">
                <div class="row invoice-logo">
                    <div class="col-xs-6 invoice-logo-space">
                        <a href="<?= $config['base_url'] ?>admin">
                            <img src="<?= get_image($this->layout_data['logo'][0]['logo_image_path'], $this->layout_data['logo'][0]['logo_image']) ?>"
                                 alt="logo" class="main-tem-logo"/>
                        </a>
                    </div>
                    <!--<div class="col-xs-6">
				<p>
					 Order #<? /*=$order_detail[ 'order_id' ]*/ ?> <span class="muted">
					On: <? /*=date("Y-m-d",strtotime($order_detail[ 'order_createdon' ]))*/ ?> </span>
				</p>
			</div>-->
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-4">
                        <h3><strong>Billing Info:</strong></h3>
                        <ul class="list-unstyled">
                            <li><strong> First Name: </strong><?= $order_detail['order_firstname']; ?> </li>
                            <li><strong> Last Name: </strong><?= $order_detail['order_firstname']; ?></li>
                            <li><strong> Email: </strong><?= $order_detail['order_email']; ?> </li>
                            <li><strong> Phone: </strong><?= $order_detail['order_phone']; ?> </li>
                            <li><strong> Address: </strong><?= $order_detail['order_address1']; ?> </li>
                            <li><strong> City: </strong><?= $order_detail['order_city']; ?> </li>
                            <li><strong> State: </strong><?= $order_detail['order_state']; ?> </li>
                            <li><strong> Zip: </strong><?= $order_detail['order_zip']; ?> </li>
                            <li><strong> Country: </strong><?= $order_detail['order_country']; ?> </li>
                        </ul>
                    </div>
                    <!--<div class="col-xs-4">
                        <h3><strong>Shipping Address:</strong></h3>
                        <ul class="list-unstyled">
                            <li><strong> First Name: </strong><?/*= $order_detail['order_shipping_firstname']; */?> </li>
                            <li><strong> Last Name: </strong><?/*= $order_detail['order_shipping_firstname']; */?></li>
                            <li><strong> Email: </strong><?/*= $order_detail['order_shipping_email']; */?> </li>
                            <li><strong> Phone: </strong><?/*= $order_detail['order_shipping_phone']; */?> </li>
                            <li><strong> Address: </strong><?/*= $order_detail['order_shipping_address1']; */?> </li>
                            <li><strong> City: </strong><?/*= $order_detail['order_shipping_city']; */?> </li>
                            <li><strong> State: </strong><?/*= $order_detail['order_shipping_state']; */?> </li>
                            <li><strong> Zip: </strong><?/*= $order_detail['order_shipping_zip']; */?> </li>
                            <li><strong> Country: </strong><?/*= $order_detail['order_shipping_country']; */?> </li>
                        </ul>
                    </div>-->
                    <div class="col-xs-4">
                        <h3><strong>Payment Info:</strong></h3>

                        <ul class="list-unstyled">

                            <li><strong>Payment
                                    Status:</strong> <?= $this->model_order->get_payment_status($order_detail['order_payment_status']); ?>
                            </li>
                            <li><strong>Total Quantity:</strong> <?= $total_quantity ?>  </li>
                            <li><strong>Tax:</strong> <?php echo price($order_detail['order_tax']); ?>
                            <li><strong>Total Amount:</strong>
                                <?= price($order_detail['order_amount']) ?></li>
                            <li><strong>Created:</strong> <?= $order_detail['order_createdon']; ?></li>

                        </ul>
                    </div>

                </div>

                <!-- Adshare info start -->
                <!--<div class="row">
            <div class="col-xs-6">
                <h3><strong>Adshare Info : </strong></h3>
                <ul class="list-unstyled">
                    <li><strong> Campaign Name: </strong><? /*=$ashare_detail[ 'adshare_name' ];*/ ?> </li>
                    <li><strong> Product Name: </strong><? /*=$ashare_detail[ 'product_name' ];*/ ?> </li>
                    <?php
                /*                    if(isset($ashare_detail[ 'size_name' ])){*/ ?>
                        <li><strong>Size: </strong><? /*=$ashare_detail[ 'size_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'quantity_qty' ])){*/ ?>
                        <li><strong>Quantity: </strong><? /*=$ashare_detail[ 'quantity_qty' ];*/ ?></li>
                    <?php /*}
                    if(isset($ashare_detail[ 'print_side_name' ])){*/ ?>
                        <li><strong>Print Speed: </strong><? /*=$ashare_detail[ 'print_side_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'paper_finish_name' ])){*/ ?>
                        <li><strong>Paper Finish: </strong><? /*=$ashare_detail[ 'paper_finish_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'round_corner_name' ])){*/ ?>
                        <li><strong>Round Corner: </strong><? /*=$ashare_detail[ 'round_corner_name' ];*/ ?></li>
                    <?php /*}
                    if(isset($ashare_detail[ 'digital_proof_name' ])){*/ ?>
                        <li><strong>Digital Proof: </strong><? /*=$ashare_detail[ 'digital_proof_name' ];*/ ?> </li>
                    <?php /*}
                    if(isset($ashare_detail[ 'extra_option_name' ])){*/ ?>
                        <li><strong>Option: </strong><? /*=$ashare_detail[ 'extra_option_name' ];*/ ?> </li>
                   <?php /* }
                    if(!empty($ashare_detail[ 'adshare_number' ])){ */ ?>
                        <li><strong> Adshare: </strong><? /*=$ashare_detail[ 'adshare_number' ];*/ ?> </li>
                    <? /* }
                    */ ?>
                    <li><strong> Distribution Cost: </strong>$<? /*=$ashare_detail[ 'adshare_distribution' ];*/ ?> </li>
                    <li><strong> Zipcode: </strong><? /*=$ashare_detail[ 'adshare_distribution_zipcode' ];*/ ?> </li>
                    <li><strong> Mailing Date: </strong><? /*=$ashare_detail[ 'adshare_mailing_date' ];*/ ?> </li>
                    <li><strong> Business List: </strong><? /*=$ashare_detail[ 'adshare_business_list' ];*/ ?> </li>
                </ul>
            </div>
        </div>-->
                <!-- Adshare info end -->


                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Item
                                </th>

                                <th class="hidden-480">
                                    Quantity
                                </th>
                                <!--<th class="hidden-480">
                                     Unit Cost
                                </th>-->
                                <th>
                                    Total
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?

                            foreach ($order_items as $key=>$item) {

                                ?>
                                <!--<tr>
							  	<td style="padding:10px 0; vertical-align:middle;">
							  		<img src="<?/*=get_image($item['pi_image_path'],$item['pi_image_thumb'])*/ ?>" class="product_img_thumb" style="width: 100px;height: 100px;"/>
								</td>

							  	<td style="padding:10px 0; vertical-align:middle;">
							  		<?/*=$item[ 'product_name' ]*/ ?> 	<br>
							  		<?/*
$subtotal_g = $item[ 'order_item_subtotal' ];

*/ ?>
								</td>

							  	<td style="padding:10px 0; vertical-align:middle;">
							  		<?/*=$item[ 'order_item_qty' ]*/ ?>
								</td>

							  	<td style="padding:10px 0; vertical-align:middle;">
							  		<?/*=price($subtotal_g+$attribute_price)*/ ?>
								</td>
							</tr>-->

                                <tr>
                                    <td style="padding:10px 0; vertical-align:middle;">
                                        <img src="<?= get_image($item['product_image_path'], $item['product_image_thumb']) ?>"
                                             class="product_img_thumb" style="width: 100px;height: 100px;"/>
                                    </td>

                                    <td style="padding:10px 0; vertical-align:middle;">
                                        <?= $item['product_name'] ?> <br>
                                        <?
                                        $subtotal_g = $item['order_item_subtotal'];

                                        ?>
                                    </td>

                                    <td style="padding:10px 0; vertical-align:middle;">
                                        <?= $item['order_item_qty'] ?>
                                    </td>

                                    <td style="padding:10px 0; vertical-align:middle;">
                                        <?= price($subtotal_g ) ?>
                                    </td>
                                </tr>


                            <?
                            }

                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row text-right">
                    <div class="col-md-12 col-xs-12 invoice-block">
                        <ul class="list-unstyled amounts">
                            <!--<li><strong style="color:#333">Total Products</strong> : <? /*=count($order_items)*/ ?> </li>
					<li><strong style="color:#333">No of Items</strong> : <? /*=$total_quantity*/ ?> </li>-->
                            <li><strong style="color:#333">Sub Total</strong>
                                : <?= price($order_detail['order_total']) ?> </li>
                            <li><strong style="color:#333">Shipping Price</strong>
                                : <?= price($order_detail['order_shipment_price']) ?> </li>
                            <li><strong style="color:#333">Tax</strong> : <?= price($order_detail['order_tax']) ?> </li>
                            <!--<li><strong style="color:#333">Shipping Price</strong> : <? /*=price($order_detail['order_shipment_price'])*/ ?> </li>
					<li><strong style="color:#333">Shipping Package</strong> : <? /*=$order_detail['order_shipment_package']*/ ?> </li>-->
                            <li><strong style="color:#333">Total Price</strong>
                                : <?= price($order_detail['order_amount']) ?> </li>
                        </ul>
                        <br>
                        <!--a onclick="javascript:window.print();" class="btn btn-lg blue hidden-print margin-bottom-5">
                        Print <i class="fa fa-print"></i>
                        </a>
                        <a class="btn btn-lg green hidden-print margin-bottom-5">
                        Submit Your Invoice <i class="fa fa-check"></i>
                        </a-->
                    </div>
                </div>



            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
<? create_modal_html("address_update", "", "", 'method="POST" action="' . $config['base_url'] . 'admin/order/save_address"', false) ?>