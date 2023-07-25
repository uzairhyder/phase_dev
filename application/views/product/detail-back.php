<!-- Breadcrumbs -->
<?php
$data['breadcrumb_title'] = $detail['product_name'];
$this->load->view('widgets/breadcrumb', $data);
$stock = $detail['product_stock'];
?>

<!-- Product Detail -->
<section class="productdetail-sec">
    <div class="container">
        <div class="poduct-detail productdetail-diver">
            <div class="detailsArea">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="row ">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-margin">
                                <div class="productBox">
                                    <div class="slider-for">
                                        <div>
                                            <div class="detailimg">
                                                <?php $feature_image =  get_image($detail['product_image_path'], $detail['product_image']); ?>
                                                <img src="<?php echo $feature_image; ?>"
                                                     class="img-responsive" alt="Image">
                                                <div class="arows"><a href="<?php echo $feature_image; ?>"
                                                                      data-fancybox><img
                                                                src="<?php echo g('images_root'); ?>aros.png"></a></div>
                                            </div>
                                        </div>

                                        <?php
                                        if(array_filled($product_images)){
                                            foreach ($product_images as $key=>$value):
                                                $image = get_image($value['pi_image_path'], $value['pi_image']);
                                                ?>
                                                <div>
                                                    <div class="detailimg"><img src="<?php echo $image;?>"
                                                                                class="img-responsive" alt="Image">
                                                        <div class="arows"><a href="<?php echo $image;?>"
                                                                              data-fancybox class=""><img
                                                                        src="<?php echo g('images_root'); ?>aros.png"></a></div>
                                                    </div>
                                                </div>
                                            <?php endforeach;
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  no-margin">
                                <div class="beloimg">
                                    <div class="slider-nav">
                                        <div>
                                            <div class="thumbs"><img src="<?php echo  get_image($detail['product_image_path'] . "thumb/", $detail['product_image_thumb']);?>"
                                                                     class="img-responsive" alt="Image"></div>
                                        </div>
                                        <?php
                                        if(array_filled($product_images)){
                                            foreach ($product_images as $key=>$value):
                                                $image_thumb = get_image($value['pi_image_path'], $value['pi_image_thumb']);
                                                ?>


                                                <div>
                                                    <div class="thumbs"><img src="<?php echo $image_thumb;?>"
                                                                             class="img-responsive" alt="Image"></div>
                                                </div>
                                            <?php endforeach;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12 rightArea">
                        <div class="mainTitle"> <?php echo $detail['product_name']; ?> </div>
                        <div class="price"> <?php echo price($detail['product_price']); ?> </div>
                        <!--<div class="description"><span class="titLe">Product Description</span>
                        <?php /*echo price($detail['product_detail']); */ ?>
                    </div>-->

                        <div class="radio-option">
                            <h6>Kit <i>96-Wel</i></h6>
                            <?php
                            if (array_filled($kits)) {
                                foreach ($kits as $key => $value):?>
                                    <span class="active-label">
                                        <label for="kit-<?php echo $key; ?>"><?php echo $value['kit_name']; ?></label>
                                        <input type="radio" name="option1" value="<?php echo $value['kit_id'];?>"
                                               id="kit-<?php echo $key; ?>" <?php echo ($key == 0) ? 'checked' : ''; ?> >
                                    </span>
                                <?php endforeach;
                            }
                            ?>
                        </div>

                        <div class="radio-option">
                            <h6>Prep Size <i>96-Wel</i></h6>
                            <?php
                            if (array_filled($prep_size)) {
                                foreach ($prep_size as $key => $value):?>
                                    <span>
                                        <label for="kit-<?php echo $key; ?>"><?php echo $value['prep_size_name']; ?></label>
                                        <input type="radio" name="option2" value="<?php echo $value['prep_size_id'];?>"
                                               id="prep-size-<?php echo $key; ?>" <?php echo ($key == 0) ? 'checked' : ''; ?> >
                                    </span>
                                <?php endforeach;
                            }
                            ?>
                        </div>

                        <div class="sku-box">
                            <h6>SKU</h6>
                            <label for=""><?php echo $detail['product_sku']; ?></label>
                        </div>

                        <div class="discountArea">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                    if($stock!=0){?>
                                        <div class="count">
                                            <div class="input-group"> <span class="input-group-btn minus">
                                    <button type="button" class="btn btn-default btn-number" data-type="minus"
                                            data-field="quant[1]"> <span
                                                class="glyphicon glyphicon-minus"></span> </button>
                                    </span>
                                                <input type="text" name="quant[1]" class="form-control input-number" value="1"
                                                       min="1" max="<?php echo $stock;?>" id="cart-qty">
                                                <span class="input-group-btn plus">
                                    <button type="button" class="btn btn-default btn-number" data-type="plus"
                                            data-field="quant[1]"> <span
                                                class="glyphicon glyphicon-plus"></span> </button>
                                    </span></div>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5><?php echo ($stock!=0)?'In Stock': 'Out of Stock';?> <label><?php echo price($detail['product_price']); ?></label></h5>

                                    <?php
                                    if($stock!=0){?>
                                        <a href="javascript:void(0)" class="addCart btn-cart" data-productid="<?php echo $detail['product_id'];?>"><i
                                                    class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</a>
                                    <?php }
                                    ?>
                                    </div>
                                <!--<div class="col-md-7 col-sm-6 col-xs-12 dicountCode">
                                    <input name="" type="text" class="form-control" placeholder="Enter Discount Code">
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="additionalInfo">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#overview">Overview</a></li>
                            <li class=""><a data-toggle="pill" href="#spec">Specification</a></li>
                            <li class=""><a data-toggle="pill" href="#tech_info"> Technical Information & Protocol </a></li>
                            <li class=""><a data-toggle="pill" href="#kit_comp"> Kit Components </a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="overview" class="tab-pane fade active in">
                                <?php echo html_entity_decode($detail['product_detail']); ?>
                            </div>
                            <div id="spec" class="tab-pane fade">
                                <?php echo html_entity_decode($detail['product_info']); ?>
                            </div>
                            <div id="tech_info" class="tab-pane fade">
                                <?php echo html_entity_decode($detail['product_tech_info']); ?>
                            </div>
                            <div id="kit_comp" class="tab-pane fade">
                                <?php echo html_entity_decode($detail['product_kit_component']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Detail  -->

<script>


    $(function () {

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 5,
            arrows: true,
            dots: false,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            focusOnSelect: true,
            verticalSwiping: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 741,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        arrows: false,
                        verticalSwiping: false,
                        vertical: false,
                        centerPadding: '60px'
                    }
                },
                {
                    breakpoint: 641,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        arrows: false,
                        verticalSwiping: false,
                        vertical: false,
                        centerPadding: '60px'
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        arrows: false,
                        verticalSwiping: false,
                        centerPadding: '60px',
                        vertical: false
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

    });


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
            var qtyID = $('#cart-qty').val();
            var kit_id=0,prep_id=0;

            if($('input[name=option1]:checked').val()){
                kit_id= $('input[name=option1]:checked').val();
            }

            if($('input[name=option2]:checked').val()){
                prep_id = $('input[name=option2]:checked').val();
            }
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
                        $(".badge").html(response.total_items);
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
</script>