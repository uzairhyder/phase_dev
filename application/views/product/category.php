<!-- Breadcrumbs -->
<?php
$data['breadcrumb_title'] = $category['category_name'];
$this->load->view('widgets/breadcrumb',$data);
$products = $product_info['data'];
?>

<!--<section class="inpage featurePro">-->
<section class="inpage resources ser-mol-biology">
    <div class="container">
        <div class="row">
            <!-- Left  Section Start -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="left_side">
                    <h3>Categories </h3>

                    <div aria-multiselectable="true" class="panel-group" id="accordion" role="tablist">

                        <?php
                        $param_two['where']['category_type'] = 2;
                        $category_type_two = $this->model_category->find_all_active($param_two);
                        ?>

                        <?php
                        foreach ($category_type_two as $key => $value) {?>

                            <div class="panel panel-default">
                                <div class="panel-heading" id="headingOne<?php echo $key;?>" role="tab">
                                    <h4 class="panel-title"><a aria-controls="collapseOne<?php echo $key;?>" aria-expanded="true" class="<?php echo ($category['category_parent_id']==$value['category_id'])?'':'collapsed'?>" data-parent="#accordion" data-toggle="collapse" href="#collapseOne<?php echo $key;?>" role="button"> <?php echo $value['category_name'];?> </a></h4>
                                </div>
                                <div aria-labelledby="headingOne<?php echo $key;?>" class="panel-collapse collapse <?php echo ($category['category_parent_id']==$value['category_id'])?'in':'';?>" id="collapseOne<?php echo $key;?>" role="tabpanel" aria-expanded="true" style="">
                                    <div class="panel-body">
                                        <?php
                                        $param_three['where']['category_type'] = 3;
                                        $param_three['where']['category_parent_id'] = $value['category_id'];
                                        $category_type_three = $this->model_category->find_all_active($param_three);?>
                                        <ul>
                                            <?php foreach ($category_type_three as $key1 => $value1) {?>
                                                <li> <a href="<?php echo g('base_url');?>category/<?php echo $value1['category_slug'];?>"> <?php echo $value1['category_name'];?> </a></li>
                                            <?php }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Left  Section End -->

            <!-- Detail Section Start -->
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="reRight">
                    <h1 class="mainh"> <?php echo $category['category_name'];?> </h1>
                    <?php
                    if(!empty($category['category_detail'])){
                        echo html_entity_decode($category['category_detail']);
                    }
                    ?>
                </div>

                <div class="row">
                        <?php
                        if(array_filled($products)){
                            foreach ($products as $key=>$value):?>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="alert alert-success">
                                    <strong>Info!</strong> No Records Found.
                                </div>
                            </div>
                        <?php }
                        ?>
                </div>
            </div>
            <!-- Detail Section end -->

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php echo $product_info['links'];?></div>
        </div>
    </div>
</section>

