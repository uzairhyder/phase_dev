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

<section class="Inner_content Cart_sec">
    <div class="container">
        <div class="col-xs-12 col-md-9">
            <div class="carttable tableCol">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">Product</th>
                            <th>Item Price</th>
                            <th>QTY</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (array_filled($cart_data)) {
                            foreach ($cart_data as $key => $value):
                                $options = $value['options'];?>
                                <tr>
                                    <td>
                                        <ul class="list-inline list-unstyled">
                                            <li>
                                                <div class="cartimage">
                                                    <img src="<?php echo $options['product_img'];?>" alt="" class="img-responsive">
                                                </div>
                                            </li>
                                            <li>
                                                <h4><?php echo $value['name'];?></h4>
                                                <div class="clearfix"></div>
                                                <ul class="edit">
                                                    <li> <a href="javascript:void(0)" class="removeproduct" data-row-id="<?php echo $value['rowid']; ?>"><strong>Remove</strong> </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                    <td><?php echo price($value['price']);?></td>
                                    <td width="160px">
                                        <div class="input-group">
                                 <span class="input-group-btn">
                                 <!--<button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="">
                                 <span class="glyphicon glyphicon-minus"></span>
                                 </button>-->
                                 </span>
                                            <input type="text" id="qty-<?php echo $key;?>" name="quantity" class="form-control input-number only-numeric" value="<?php echo $value['qty']?>" >
                                            <span class="input-group-btn">
                                 <!--<button type="button" class="quantity-right-plus btn  btn-number" data-type="plus" data-field="">
                                 <span class="glyphicon glyphicon-plus"></span>
                                 </button>-->
                                 </span>

                                        </div>
                                        <div class="clearfix text-center">
                                            <a href="javascript:void(0)" class="btn btn-success update_qty" data-key="<?php echo $key?>" data-product_id="<?php echo $value['rowid']?>">Update Bag</a>
                                    </td>
                                    <td class="text-center"><?php echo price($value['price'] * $value['qty']);?></td>
                                </tr>
                            <?php endforeach;
                        }
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
            </div>
            <!--<a href="" class="btn btn3">Update Bag</a>-->
            <a href="<?php echo g('base_url');?>category" class="btn btn4">Continue Shopping</a>
            <div class="clearfix"></div>
            <?php
            if (array_filled($cart_data)) {?>
                <div class="col-xs-12 col-md-6 sub-total-sec">
                    <ul class="list-group">
                        <!--<li class="list-group-item">Subtotal <a href="" class="pull-right">$ 99.00</a> </li>-->
                        <li class="list-group-item">Total <a href="" class="pull-right"><?php echo price($cart_total);?></a> </li>
                    </ul>
                    <a href="<?php echo g('base_url');?>checkout/step2" class="btn btn5">Continue To Checkout</a>
                </div>
            <?php }
            ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="shipping">
                <div class="row">
                    <div class="col-md-12">
                        <div class="right_box">
                            <h5>NEED HELP ?</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <a href="javascript:void(0)" class="call"><?php echo g('db.admin.phone');?></a>
                        </div>
                        <div class="right_box">
                            <div class="title-sec">
                                <h5>SECURE SHOPPING</h5>
                                <img src="<?php echo g('images_root');?>icons.png" class="img-responsive" alt="">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    $(".allownumericwithoutdecimal").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $(".only-numeric").bind("keypress", function (e) {
        var keyCode = e.which ? e.which : e.keyCode;

        if (!(keyCode >= 48 && keyCode <= 57)) {
            $(".error").css("display", "inline");
            return false;
        }else{
            $(".error").css("display", "none");
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