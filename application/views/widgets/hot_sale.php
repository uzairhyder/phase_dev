<section class="popular-srch">
    <div class="container">
        <div class="best-deal-title">
            <h4>Hot Sale!</h4>
        </div>

        <?php
        if(array_filled($hot_sale)){?>
            <div class="popular-slider">
                <?php
                foreach ($hot_sale as $key=>$value):?>
                    <div class="poplar-srch-blk">
                        <img src="<?php echo get_image($value['product_image_path'], $value['product_image']);?>" alt="">
                        <h4><?php echo price($value['product_price']);?></h4>
                        <?php if($value['product_type'] != 1 ){?>
                            <h6><?php echo price($value['product_old_price']);?></h6>
                        <?php } ?>

                        <h5><?php echo $value['product_name'];?></h5>
                        <!--<div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                 aria-valuemax="100" style="width:70%">
                                <span class="sr-only">70% Complete</span>
                            </div>
                        </div>-->
                        <a href="<?php echo g('base_url') . "product/detail/". $value['product_slug'];?>">Add to cart</a>
                        <!--<a href="javascript:void(0)">Add to cart</a>-->
                    </div>
                <?php endforeach;
                ?>
            </div>
        <?php }
        ?>
    </div>
</section>