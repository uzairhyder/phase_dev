<div class="col-md-3">
    <div class="categ1">
        <h3>Category <span class="pull-right"> <a href="javascript:void(0)">-</a></span></h3>
        <?php
        if(array_filled($category)){
            foreach ($category as $key=>$value):?>
                <p><a href="<?php echo g('base_url'). "category/listing/" . $value['category_slug'];?>"><?php echo $value['category_name'];?></a><span class="pull-right">(<?php echo $value['cat_count'];?>)</span></p>
            <?php endforeach;
        }
        ?>
    </div>
    <div class="categ1">
        <h3>Price <span class="pull-right"> <a href="javascript:void(0)">-</a></span></h3>
        <p><a href="<?php echo g('base_url'). "category/price/1"?>">$50.00 - $100.00</a> <span class="pull-right"><?php echo $prices[0]?></span></p>
        <p><a href="<?php echo g('base_url'). "category/price/2"?>">$100.00 - $200.00</a> <span class="pull-right"><?php echo $prices[1]?></span></p>
        <p><a href="<?php echo g('base_url'). "category/price/3"?>">$200.00 - $300.00</a> <span class="pull-right"><?php echo $prices[2]?></span></p>
        <p><a href="<?php echo g('base_url'). "category/price/4"?>">$300.00 - $400.00 </a><span class="pull-right"><?php echo $prices[3]?></span></p>
        <p><a href="<?php echo g('base_url'). "category/price/5"?>">$400.00 - $500.00</a> <span class="pull-right"><?php echo $prices[4]?></span></p>
        <p><a href="<?php echo g('base_url'). "category/price/6"?>">$600.00+</a> <span class="pull-right"><?php echo $prices[5]?></span></p>
    </div>
    <div class="categ1">
        <h3>Brands <span class="pull-right"> <a href="javascript:void(0)">-</a></span></h3>
        <?php
        if(array_filled($brand)){
            foreach ($brand as $key=>$value):?>
                <!--<p><a href="<?php /*echo g('base_url') . 'category/listing/' . $detail['category_slug'] . "?brand=" . $value['brand_id'];*/?>"><?php /*echo $value['brand_name'];*/?></a><span class="pull-right">(<?php /*echo $value['cat_count'];*/?>)</span></p>-->
                <p><a href="<?php echo g('base_url') . 'category/brand/' . $value['brand_slug'];?>"><?php echo $value['brand_name'];?></a><span class="pull-right">(<?php echo $value['cat_count'];?>)</span></p>
            <?php endforeach;
        }
        ?>
    </div>
</div>