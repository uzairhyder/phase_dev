<!-- Main Heading Starts Here -->
<div class="Inner_Banner" style="background: url('<?php echo get_image($banner['inner_banner_image_path'],$banner['inner_banner_image']);?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2>Services</h2>
            </div>
        </div>
    </div>
</div>
<!-- Main Heading Ends Here -->


<section class="service_sec inpage">
    <div class="container">
        <?php
        if(array_filled($services)){
            $i=1;
            foreach ($services as $key=>$value):?>
                <div class="row">
                    <!--<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="service_img"> <a href="<?php /*echo g('base_url');*/?>service/detail/<?php /*echo $value['service_slug'];*/?>">
                                    <img src="<?php /*echo get_image($value['service_image_path'], $value['service_image']);*/?>" class="img-responsive" alt=""> </a>
                            </div>
                        </div>-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="inner_text">
                            <h3><?php echo $value['service_title'];?></h3>
                            <p><?php echo $value['service_short_detail'];?></p>
                            <div class="clearfix"></div>
                            <a href="<?php echo g('base_url');?>service/detail/<?php echo $value['service_slug'];?>" class="btn btn-danger">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        }
        ?>
    </div>
</section>

