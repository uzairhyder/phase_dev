<?php
// Get Categories
$params['order'] = "category_name ASC";
$categories = $this->model_category->find_all_active($params);
?>

<section class="category">
    <div class="container">
        <div class="category-title">
            <h3><?php echo $page_content['cms_page_title'];?></h3>
            <?php echo html_entity_decode($page_content['cms_page_content']);?>
        </div>

        <div class="row">
            <?php
            if(array_filled($categories)){
                $i=1;
                foreach ($categories as $key=>$value):?>
                    <div class="col-md-3">
                        <div class="category-blk">
                            <img src="<?php echo get_image_2($value['category_image_path'], $value['category_image']);?>" alt="">
                            <h5><a href="<?php echo g('base_url');?>category/listing/<?php echo $value['category_slug']?>"><?php echo $value['category_name'];?></a> </h5>
                        </div>
                    </div>
                <?php
                if($i%4==0){?>
                    <div class="clearfix"></div>
                <?php
                    $i=1;}
                else{
                    $i++;
                }


                endforeach;
            }
            ?>
        </div>
    </div>
</section>