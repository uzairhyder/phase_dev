<section class="top-select">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="top-select-title">
                    <h3>Top 10 Selected Products On the Week</h3>
                </div>
            </div>

            <?php
            if(array_filled($product_week)){?>
                <div class="col-md-9">
                    <div class="top-slted-slider">
                        <?php
                        if(array_filled($product_week)){
                            foreach ($product_week as $key=>$val):?>
                                <div class="top-sltd-slide">
                                    <div class="top-sltd-blk">
                                        <img src="<?php echo get_image($val['product_image_path'], $val['product_image']);?>" alt="">
                                        <div class="tp-sltd-inn">
                                            <h4><a href="<?php echo g('base_url') . "product/detail/". $val['product_slug'];?>"><?php echo $val['product_name'];?></a></h4>
                                            <!--<p>4.3m sold</p>-->
                                            <ul>
                                                <li><?php echo price($val['product_price']);?></li>
                                                <?php
                                                if($val['product_type'] != 1 ){?>
                                                    <li><?php echo price($val['product_old_price']);?></li>
                                                <?php } ?>
                                                <li>
                                                    <?php
                                                    if(!empty($val['product_rated'])){
                                                        for ($i=1; $i<=$val['product_rated'] ; $i++){?>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        <?php }
                                                    }
                                                    ?>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                        }
                        ?>
                    </div>
                </div>
            <?php }
            ?>

        </div>
    </div>
</section>