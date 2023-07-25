<!-- Main Heading Starts Here -->
<div class="Inner_Banner" style="background: url('<?php echo get_image($banner['inner_banner_image_path'],$banner['inner_banner_image']);?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
<h2>
<?if(isset($_GET['search'])  && (!empty($_GET['search'])) )
                    echo 'Search : ' .$_GET['search'];
                  else
                     echo $banner['inner_banner_name']
?>
</h2>

            </div>
        </div>
    </div>
</div>
<!-- Main Heading Ends Here -->