<section class="popular-srch">
    <div class="container">
        <div class="best-deal-title">
            <h4>Popular Search</h4>
        </div>

        <div class="popular-slider">
            <?php
            if(array_filled($popular_search)){
                foreach ($popular_search as $key=>$value):?>
                    <div class="poplar-srch-blk">
                        <img src="<?php echo get_image($value['product_image_path'], $value['product_image']);?>" alt="">
                        <h4><?php echo price($value['product_price']);?></h4>
                        <?php if($value['product_type'] != 1 ){?>
                            <h6><?php echo price($value['product_old_price']);?></h6>
                        <?php } ?>
                        <h5><a href="<?php echo g('base_url') . "product/detail/". $value['product_slug'];?>"><?php echo $value['product_name'];?></a></h5>
                    </div>
                <?php endforeach;
            }
            ?>
        </div>
    </div>
</section>