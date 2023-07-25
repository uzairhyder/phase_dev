<!--<section class="bannerSec">
    <img src="<?php /*echo get_image($banner['inner_banner_image_path'], $banner['inner_banner_image']); */?>"
         class="img-responsive" alt="Banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1><?php /*echo $banner['inner_banner_name'] */?></h1>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- END: bannerSec -->

<!-- Breadcrumbs -->
<?php
/*$data['breadcrumb_title'] = '';
$this->load->view('widgets/breadcrumb',$data);*/
?>

<!-- section shop start here -->
<section class="shop Inner_Content_Sec">
    <div class="container">
        <div class="row mrgbtm">
            <div class="col-md-3">
                <div class="cate">
                    <h3>Shop by Category</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dorpsc">
                    <span>Sort By:</span>
                    <div class="form-group">
                        <select name="sort" id="sort_filter" class="form-control">
                            <option value="">Select</option>
                            <option value="asc" data-attr="" <?php echo ( (isset($_GET)) && ($_GET['sort']=='asc') ) ? 'selected' : ''?>>
                                Ascending A-Z
                            </option>
                            <option value="desc" data-attr="" <?php echo ( (isset($_GET)) && ($_GET['sort']=='desc') ) ? 'selected' : ''?>>
                                Descending Z-A
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <?php $this->load->view('category/list_menu');?>

            <div class="col-md-9">

                <div class="row">
                    <?php
                    if(array_filled($product_info)){
                        $x=1;
                        foreach ($product_info as $key=>$value):?>
                            <div class="col-md-4">
                                <div class="top-sltd-blk">
                                    <img src="<?php echo get_image($value['product_image_path'], $value['product_image']);?>" alt="">
                                    <div class="tp-sltd-inn">
                                        <h4><a href="<?php echo g('base_url');?>product/detail/<?php echo $value['product_slug'];?>"><?php echo $value['product_name'];?></a> </h4>
                                        <p></p>
                                        <ul>
                                            <li><?php echo price($value['product_price']);?></li>
                                            <?php
                                            if($value['product_type']=='2'){?>
                                                <li><?php echo price($value['product_old_price']);?></li>
                                            <?php }
                                            ?>
                                            <li>
                                                <?php
                                                if($value['product_rated'] > 0){
                                                    for ($i=1;$i<=$value['product_rated'];$i++){?>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    <?php };
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        if($x%3==0){?>
                            <div class="clearfix"></div>
                        <?php $x=1;}
                        else{
                            $x++;
                        }
                        endforeach;
                        ?>

                    <?php }
                    ?>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center"><?php echo $link;?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- section shop END -->

<script>
    $('#sort_filter').on('change',function () {
        var slug = $(this).find(':selected').val();
        if(slug.length > 0 ){
            window.location.href = '<?php echo current_url();?>?sort=' + slug;
        }
    });
</script>
