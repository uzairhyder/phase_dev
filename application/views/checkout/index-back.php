<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Breadcrumbs -->
<?php
/*$data['breadcrumb_title'] = 'Detail';
$this->load->view('widgets/breadcrumb',$data);
$products = $product_info['data'];*/
?>

<!-- cartSec start -->
<section class="cartSec">
    <div class="container">
        <div class="col-md-9 col-sm-8 col-xs-12">
            <div class="row cartsec">
                <table class="table mobDesign">
                    <thead>
                    <tr>
                        <th class="itm">Item</th>
                        <th class="">Quantity</th>
                        <th align="center">Unit Price</th>
                        <th align="center" colspan="2">Sub Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (array_filled($cart_data)) {
                        foreach ($cart_data as $key => $value):
                            $options = $value['options'];
                        $reviews = $this->model_comment->find_all_comment_count($value['id']);
                            ?>
                            <tr>
                                <td class="imgtd">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="cartimg"><img alt="" class="img-responsive" src="<?php echo $value['product_img'];?>"></div>
                                        </div>
                                        <div class="col-md-8">
                                            <h5><?php echo $value['name'];?></h5>
                                            <h6><span><?php echo $reviews;?> Reviews</span></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <label class="visible-xs">Qty: <input class="qtystyle" type="text" value="1"></label>
                                    <input class="qtystyle hidden-xs" type="number" value="<?php echo $value['qty']?>" id="qty-<?php echo $key;?>">
                                    <a href="javascript:void(0)" class="update_qty update" data-key="<?php echo $key?>" data-product_id="<?php echo $value['rowid']?>">Update Cart</a>
                                    <!--<a href="javascript:void(0)" class="update_qty update" data-key="<?/*/*= $key */?>" data-product_id="<?/*/*= $value['rowid'] */?>"><span class="glyphicon glyphicon-edit"></span></a>-->

                                </td>
                                <td>
                                    <h4 class="amount"><?php echo price($value['price']);?> <span class="visible-xs">Unit Price</span></h4>
                                </td>
                                <td>
                                    <h4 class="amount"><?php echo price($value['price'] * $value['qty']);?> <span class="visible-xs">Sub Price</span></h4>
                                </td>
                                <td><a href="javascript:void(0)" class="remove removeproduct" data-row-id="<?php echo $value['rowid']; ?>">x</a></td>
                            </tr>

                            <!--<tr>
                                    <td>
                                        <h6><?php /*echo $options['product_sku']; */?></h6>
                                    </td>
                                    <td><h6><a href="<?php /*echo $options['product_slug'];*/?>" target="_blank"><?php /*echo $value['name'];*/?></a></h6></td>
                                    <td class="counter">
                                        <div class="">
                                            <div class="qty">
                                                <span class="minus bg-dark"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                                                <input type="number" class="count" name="qty" min="1" value="<?php /*echo $value['qty']; */?>" id="qty-<?php /*echo $key;*/?>" disabled="">
                                                <span class="plus bg-dark"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                                <br/>
                                                <a href="javascript:void(0)" class="update_qty" data-key="<?/*= $key */?>"
                                                   data-product_id="<?/*= $value['rowid'] */?>"><span
                                                            class="glyphicon glyphicon-edit"></span></a>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="">
                                        <h6><?php /*echo price($value['price']); */?> </h6>
                                    </td>
                                    <td class="text-left cros" data-th="Action">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="removeproduct" data-row-id="<?php /*echo $value['rowid']; */?>"><i aria-hidden="true" class="fa fa-times"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>-->
                        <?php endforeach;?>
                    <?php }
                    else{?>
                        <tr>
                            <td colspan="5">
                                <h3 class="text-center">Cart is Empty</h3>
                            </td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
                    if (array_filled($cart_data)) {?>
                        <div class="row">
                            <div class="update">
                                <!-- <div class="col-xs-12 col-md-3 col-sm-3"></div> -->
                                <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                                    <a class="continue" href="<?php echo g('base_url');?>accessories">Continue Shopping</a><br>
                                    <a class="btnStyle1" href="<?php echo g('base_url');?>checkout/step2">Proceed to check out</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    <?php }?>
        </div>
        <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-12">
            <div class="shipping">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-unstyled subTotal_area">
                            <li>
                                <h4 class="pull-left">Sub total</h4>
                                <h4 class="pull-right"><?php echo price($cart_total);?></h4>
                            </li>
                            <li>
                                <h4 class="pull-left">Discount</h4>
                                <h4 class="pull-right">0</h4>
                            </li>
                            <li>
                                <h4 class="pull-left">Shipping</h4>
                                <h4 class="pull-right">0</h4>
                            </li>
                            <li>
                                <h4 class="pull-left">Total</h4>
                                <h4 class="pull-right"><?php echo price($cart_total);?></h4>
                            </li>
                        </ul>
                    </div>
                    <!--<div class="col-md-12">
                        <ul class="list-unstyled ship-box">
                            <li>
                                <h4>Shipping</h4>
                                <div class="clearfix"></div>
                                <h5>Courier ($15)</h5>
                            </li>
                            <li>
                                <h4>Estimate For</h4>
                                <div class="clearfix"></div>
                                <h5>United Estate,NY,1230</h5>
                            </li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>


<!-- cartSec End -->



<script>
    $(".allownumericwithoutdecimal").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    // Update Cart Start
    $('.update_qty').on('click', function () {
        var obj_qty = $(this);

        Loader.show();
        setTimeout(function () {
            // Get data
            var key = obj_qty.attr('data-key'),
                product_id = obj_qty.attr('data-product_id'),
                qty = $("#qty-"  + key).val(),
                data = {"id": product_id, "qty": qty},
                url = base_url + "checkout/update_qty_cart";

            //console.log(data);

            if (qty == 0) {
                Loader.hide();
                AdminToastr.error("Quantity must be greater to 0", 'Error');
            }
            else {
                // Submit action
                var response = AjaxRequest.fire(url, data);
                // Register success
                if (response.status == true) {
                    //AdminToastr.success(response.txt,'Success');

                    window.location = "checkout";
                }
                else if (response.status == 2) {
                    AdminToastr.error("Quantity is not available", 'Error');
                }
            }
            return false;
        },1000);

    });
    // Update Cart End

    // Delete From Cart Start
    $('.removeproduct').on('click', function () {
        // Get data
        var row_id = $(this).attr('data-row-id');
        url = base_url + "checkout/delete_item/" + row_id;

        if (confirm('Are you sure you want to delete this Product from cart')) {
            //  redirect to delete
            location.href = url;
        }
        return false;
    });
    // Delete From Cart End

    $(document).ready(function(){
        var plus_btn,minus_btn,pro_qty;
        $('.count').prop('disabled', true);
        $(document).on('click','.plus',function(){
            plus_btn = $(this);
            pro_qty =  plus_btn.parent().find('input[type=number]').val();
            plus_btn.parent().find('input[type=number]').val(parseInt(pro_qty) + 1 );
        });
        $(document).on('click','.minus',function(){
            minus_btn = $(this);
            pro_qty =  minus_btn.parent().find('input[type=number]').val();
            if(pro_qty=='1'){
            }
            else{
                minus_btn.parent().find('input[type=number]').val(parseInt(pro_qty) - 1 );
            }
        });
    });
</script>