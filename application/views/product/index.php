<!-- Breadcrumbs -->
<?php
$data['breadcrumb_title'] = $banner_heading;
$this->load->view('widgets/breadcrumb',$data);
$products = $product_info['data'];
?>

<section class="inpage featurePro">
    <div class="container">
        <div class="row">
            <?php
            if(array_filled($products)){
                foreach ($products as $key=>$value):?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="Proitme">
                            <div class="proImg"> <img src="<?php echo get_image($value['product_image_path'], $value['product_image']);?>" class="img-responsive"> </div>
                            <div class="proTxt">
                                <h3> <?php echo $value['product_name'];?> </h3>
                                <?php echo html_entity_decode($value['product_overview']);?>
                                <div class="row flexRow">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 flexCol">
                                        <h4 class="price"> <?php echo price($value['product_price']);?></h4>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="<?php echo g('base_url');?>product/detail/<?php echo $value['product_slug'];?>" class="btn btn1"> BUY NOW</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            }
            else{?>
                <div class="alert alert-success">
                    <strong>Info!</strong> No Records Found.
                </div>
            <?php }
            ?>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php echo $product_info['links'];?></div>
        </div>
    </div>
</section>

