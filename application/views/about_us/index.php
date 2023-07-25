<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>
<!-- 
<section class="about-sec">
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
    <div class="col-lg-12">
        <div class="row">

            <div class="col-md-12 mt-5">
                <span class="heading">
                    <?= $banner['banner_heading'] ?>
                </span>
            </div>
            <div class="col-md-12 mt-2 homeDesc">
                <?= html_entity_decode($banner['banner_description']) ?>
            </div>
        </div>
    </div>
</div>
</div>


<div class="col-lg-12">
    <div class="row mt-5">
        <div class="col-md-12 sbhfirst text-center">
            <!-- <h2><?php echo $about_us['cms_page_name'] ?></h2> -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <?php echo html_entity_decode($about_us['cms_page_content']) ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="cstmh1 mt2">
                    <h1><?php echo $content1['cms_page_title'] ?></h1>
                </div>
                <?php echo html_entity_decode($content1['cms_page_content']) ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="cstmh2">
                    <h2><?php echo $content2['cms_page_title'] ?></h2>
                </div>
                <?php echo html_entity_decode($content2['cms_page_content']) ?>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row mt-5">
        <div class="col-md-5">
            <img src="<?php echo get_image($about_us['cms_page_image_path'], $about_us['cms_page_image']) ?>" width="100%">
        </div>
        <div class="col-md-7">
            <h5 style="color: #7A43AA;" class="mb-3 exposureOppo">
                Exposure Opportunities & Benefits
            </h5>
            <div class="row">
                <div class="col-md-12 diamond">
                    <?php echo html_entity_decode($about_us['cms_page_other_content']) ?>
                </div>
            </div>
        </div>
    </div>
</div>