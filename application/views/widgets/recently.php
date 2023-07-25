<?php
if(array_filled($recent_views)){?>
    <section class="best-deal recently-viwd">
        <div class="container">
            <div class="best-deal-title">
                <h4>Recently viewed</h4>
            </div>

            <div class="row">

            <?php
            foreach ($hot_sale as $key=>$value):?>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo get_image($value['product_image_path'], $value['product_image']);?>" alt="">
                        </div>
                        <div class="col-md-6 pading0">
                            <div class="best-deal-blk">
                                <h5><a href="<?php echo g('base_url') . "product/detail/" . $value['product_slug'];?>"><?php echo $value['product_name'];?></a> </h5>
                                <h6><?php echo price($value['product_price']);?></h6>
                                <ul>
                                    <li>
                                    <?php
                                    if(!empty($value['product_rated'])){
                                        for ($i=1; $i<=$value['product_rated'] ; $i++){?>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        <?php }
                                    }
                                    ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

            </div>
        </div>
    </section>
<?php }?>