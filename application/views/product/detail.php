<!-- Breadcrumbs -->
<?php
$data['breadcrumb_title'] = $detail['product_name'];
//$this->load->view('widgets/breadcrumb', $data);
$stock = $detail['product_stock'];
?>

<section class="Inner_content Prod_details">
    <div class="container">
        <div class="row Row_colm">
            <div class="col-xs-12 col-md-6">
                <div class="slidersec">
                    <div class="reverse">
                        <div class="slider slider-for imgg">
                            <div><img alt="" class="img-responsive" src="<?php echo get_image($detail['product_image_path'], $detail['product_image']);?>"></div>
                            <?php
                            if(array_filled($product_images)){
                                foreach ($product_images as $key=>$value):
                                    $image = get_image($value['pi_image_path'], $value['pi_image']);
                                    ?>
                                    <div><img alt="" class="img-responsive" src="<?php echo $image;?>"></div>
                                <?php endforeach;
                            }
                            ?>
                        </div>
                        <div class="slider slider-nav from">
                            <div><img alt="" class="img-responsive" src="<?php echo get_image($detail['product_image_path'], $detail['product_image_thumb']);?>"></div>
                            <?php
                            if(array_filled($product_images)){
                                foreach ($product_images as $key=>$value):
                                    $image_thumb = get_image($value['pi_image_path'], $value['pi_image_thumb']);
                                    ?>
                                    <div><img alt="" class="img-responsive" src="<?php echo $image_thumb;?>"></div>
                                <?php endforeach;
                            }
                            ?>
                        </div>
                    </div>
                </div>






            </div>
            <div class="col-xs-12 col-md-6 pink">
                <h4 class="goes"><?php echo $detail['product_name']; ?> <span class="pull-right"><?php echo price($detail['product_price']); ?></span></h4>
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                <h5>Description <i aria-hidden="true" class="fa fa-caret-down"></i></h5>
                <!--<ul class="order_list">
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor</a>
                    </li>
                </ul>-->
                <?php echo html_entity_decode($detail['product_detail']); ?>
                <div class="col-xs-12 col-md-6 Quantity_Sec">
                    <div class="input-group ">
                        <h6>Quantity</h6>
                        <span class="input-group vision">
                <span class="input-group-btn">
                  <button class="quantity-left-minus btn btn-danger btn-number" data-field="" data-type="minus" type="button">
                    <span class="glyphicon glyphicon-minus"></span>
                  </button>
                </span>
                <input class="form-control input-number" id="quantity" max="100" min="1" name="quantity" type="text" value="1">
                <span class="input-group-btn">
                  <button class="quantity-right-plus btn btn-success btn-number" data-field="" data-type="plus" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>
                </span>
              </span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <ul class="info">
                    <li>
                        <i aria-hidden="true" class="fa fa-truck"></i> <a href="javascript:void(0)"><?php echo (!empty($detail['product_delivery']))? html_entity_decode($detail['product_delivery']) : 'N/A';?></a>
                    </li>
                </ul><a class="wow btn shop-btn fadeInRight animated addCart btn-cart" data-productid="<?php echo $detail['product_id'];?>" href="javascript:void(0)">Add To Cart</a>
            </div>
        </div>



    </div><!-- Row -->
</section>

<script>


    $('.btn-number').click(function (e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function () {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>

<script>
    $(".btn-cart").click(function () {
        is_login = '<?php echo $this->userid;?>';

        if(is_login>0){
            //var wishlist = $(this).attr('data-wishlist');
            var productid = $(this).attr('data-productid');
            var qtyID = $('#quantity').val();
            var kit_id=0,prep_id=0;

            /*if($('input[name=option1]:checked').val()){
                kit_id= $('input[name=option1]:checked').val();
            }

            if($('input[name=option2]:checked').val()){
                prep_id = $('input[name=option2]:checked').val();
            }*/
            /*var color = $("#color").val();*/
//var consoleTag = $("#console").val();
//var sherpas = $("#sherpas").val();
//var character = $("#character").val();
//var playwith = $("#playwith").val();

//var cartForm = $("#cartForm").serialize();

//var size = $("#size").val();
//var hiddencolor = $("#hiddencolor").val();


            /*if (qtyID == 0) {
                AdminToastr.error('Please select the quantity.', 'Error');
                return false;
            }

            if (color == 0) {
                AdminToastr.error('Please provide the Color.', 'Error');
                return false;
            }*/

            /*
             if(consoleTag == ''){
             AdminToastr.error('Please select the console.','Error');
             return false;
             }
             if(character == ''){
             AdminToastr.error('Please select the character.','Error');
             return false;
             }*/
            /*
             if(playwith == ''){
             AdminToastr.error('Please select the playwith.','Error');
             return false;
             }*/

            $.ajax({
                type: "POST",
                url: base_url + "checkout/add_cart",
                // addone_array = define in detail page
                data: "product_id=" + productid + "&product_qty=" + qtyID + '&kit_id='+kit_id + "&prep_size_id=" + prep_id,
                dataType: "json",
                success: function (response) {
                    Loader.hide();

                    if (response.status == true) {
                        AdminToastr.success('Your item has been added into shopping cart.', 'Success');
                        $(".badge-cart").html(response.total_items);
                        $("#item_count").html(response.total);
                    }
                    else {
                        AdminToastr.error(response.msg, 'Error');
                    }
                },
                beforeSend: function () {
                    Loader.show();
                }
            });
        }
        else{
            AdminToastr.error('Please Login to add item in cart', 'Error');
        }



        return false;
    });

    var max_value = $('#quantity').attr("max");

    $('.quantity-right-plus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        if(quantity + 1 > max_value){

        }
        else{
            $('#quantity').val(quantity + 1);
        }
    });
    $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        if(quantity=='1'){}
        else if(quantity>0){
            $('#quantity').val(quantity - 1);
        }
    });
</script>