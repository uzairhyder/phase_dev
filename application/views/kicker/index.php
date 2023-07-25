<div class="container-fluid">
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


<div class="col-lg-12">
    <div class="row mt-5">
        <!--   <div class="col-md-12 sbhfirst text-center">
        <h2>Evaluation Team</h2>
    </div> -->
        <!--<div class="col-md-12 sbhfirst text-center">-->
        <!--    <p>-->
        <!--        All rankings are a reflection of camp performance and are a combination of competition, charting and camp growth.  We use proven industry & NCAA data standards that prove that you are ready to play at the college level.  -->
        <!--    </p>-->
        <!--</div>-->
    </div>
</div>

<div class="col-lg-12">
    <div class="row mt-3">
        <!-- <div class="col-md-12">

<?php foreach ($kicker_year  as $key => $value) {
    if ($key % 2 == 0) { ?>
        <div class="row">

            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="padding: 0;">
                      <a href="<?php echo g('base_url'); ?>kicker/detail/<?php echo $value['kicker_year_slug']; ?>">  <img src="<?php echo get_image($value['kicker_year_image_path'], $value['kicker_year_image']); ?>"  width="100%"> </a>
                    </div>
                    <div class="transfer">
                        <h4 style="color:#fff;"><a href="<?php echo g('base_url'); ?>kicker/detail/<?php echo $value['kicker_year_slug']; ?>" style="color:#fff;"><?= $value['kicker_year_title'] ?></a></h4>
                    </div>
                </div>
                
            </div>
<?php  } else { ?>

            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="margin-left: 3%;padding: 0;">
                        <a href="<?php echo g('base_url'); ?>kicker/detail/<?php echo $value['kicker_year_slug']; ?>"> <img src="<?php echo get_image($value['kicker_year_image_path'], $value['kicker_year_image']); ?>"  width="100%"> </a>
                    </div>
                    <div class="transfer1">
                        <h4 style="color:#fff;"><a href="<?php echo g('base_url'); ?>kicker/detail/<?php echo $value['kicker_year_slug']; ?>" style="color:#fff;"><?= $value['kicker_year_title'] ?></a></h4>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>
<?php } ?>
</div> -->
        <div class="col-md-12" style="padding:0px">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($kicker_year  as $key => $value) { ?>
                        <div class="col-md-6 <?php if ($key % 2 == 0) {
                                                    echo "rightKick";
                                                } else {
                                                    echo "leftkick";
                                                } ?>" style="padding:0px;overflow:hidden">
                            <div class="row">
                                <div class="kickCard">
                                    <div class="col-md-12">
                                        <div class="KickCardImg">
                                            <a href="<?php echo g('base_url'); ?>kicker/detail/<?php echo $value['kicker_year_slug']; ?>"> <img src="<?php echo get_image($value['kicker_year_image_path'], $value['kicker_year_image']); ?>" width="100%"> </a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="transfer padding-0px">
                                            <h4 style="color:#fff;"><a href="<?php echo g('base_url'); ?>kicker/detail/<?php echo $value['kicker_year_slug']; ?>" style="color:#fff;"><?= $value['kicker_year_title'] ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row mt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="padding: 0;">
                        <img src="<?= g('images_root') ?>Asset 18.png"  width="100%">
                    </div>
                    <div class="transfer">
                        <h4 style="color:#fff;">2022</h4>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="margin-left: 3%;padding: 0;">
                         <img src="<?= g('images_root') ?>Asset 19.png"  width="100%">
                    </div>
                    <div class="transfer1">
                        <h4 style="color:#fff;">2023</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="padding: 0;">
                        <img src="<?= g('images_root') ?>Asset 18.png"  width="100%">
                    </div>
                    <div class="transfer">
                        <h4 style="color:#fff;">2024</h4>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="margin-left: 3%;padding: 0;">
                         <img src="<?= g('images_root') ?>Asset 19.png"  width="100%">
                    </div>
                    <div class="transfer1">
                        <h4 style="color:#fff;">2025</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="padding: 0;">
                        <img src="<?= g('images_root') ?>Asset 18.png"  width="100%">
                    </div>
                    <div class="transfer">
                        <h4 style="color:#fff;">2026</h4>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6" style="padding:0px;">
                <div class="row">
                    <div class="col-md-12" style="margin-left: 3%;padding: 0;">
                         <img src="<?= g('images_root') ?>Asset 19.png"  width="100%">
                    </div>
                    <div class="transfer1">
                        <h4 style="color:#fff;">2027</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->