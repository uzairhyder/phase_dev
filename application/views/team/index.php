<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- <section class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img src="<?php echo get_image($about_us['cms_page_image_path'], $about_us['cms_page_image']); ?>" alt=""></div>
            <div class="col-md-6">
                <div class="about-blk">
                    <h3><?php echo $about_us['cms_page_title']; ?></h3>
                    <?php echo html_entity_decode($about_us['cms_page_content']) ?>
                </div>
            </div>
        </div>
    </div>
</section>
-->


<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 mt-5">
            <span class="heading">
                <?= $banner['banner_heading'] ?><br>
                <?= $banner['banner_sub_heading'] ?>

            </span>
        </div>

        <div class="col-md-12 mt-2 homeDesc">
            <?= html_entity_decode($banner['banner_description']) ?>
        </div>
    </div>
</div>
</div>


<!-- <div class="row mt-5">
    <div class="col-md-12 sbhfirst text-center">
        <h2>Evaluation Teamss</h2>
    </div>
</div> -->
<div class="container-fluid">


    <div class="row">
        <!-- <div class="col-md-3 member" style="padding-right:0px;">
        <img src="<?= g('images_root') ?>teamPic.png" width="100%">
    </div>
    <div class="col-md-9 member-content" style="padding-left:0px;">
        <h3 style="color: #fff;" class="mt-5">
            Chris Husby
        </h3>
       
      
    </div> -->
    </div>

    <div class="row mt5 mb2">
        <div class="col-md-12">
            <div class="cstmh1">
                <h1><?php echo $content1['cms_page_title'] ?></h1>
            </div>
            <?php echo html_entity_decode($content1['cms_page_content']) ?>
        </div>
    </div>


    <?php foreach ($team as $key => $value) { ?>
        <div class="row mt-5">
            <div class="col-md-3 member" style="padding-right:0px;">
                <img src="<?php echo get_image($value['team_image_path'], $value['team_image']); ?>" width="100%" style="height:250px;">
            </div>
            <div class="col-md-9 member-content" style="padding-left:0px;">
                <h3 style="color: #fff;">
                    <?= $value['team_name'] ?>
                </h3>
                <!--  <h5 style="color: #7A43AA">
            <?= $value['team_designation'] ?>
        </h5> -->
                <?= html_entity_decode($value['team_description']) ?>
            </div>
        </div>
    <?php } ?>

</div>