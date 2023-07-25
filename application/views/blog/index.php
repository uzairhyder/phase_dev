<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>
<!-- blog strt -->
<!--    <section class="body-pad">
      <section class="section-one">
        <div class="container">
        <div class="row">
        <div class="col-md-9">
          
<?php

if (count($blogs) > 0) {

?>



        <?php foreach ($blogs as $key => $value) {

        ?>
<?
          $comment_count = $this->model_comment->find_count_active(array('where' => array('comment_post_id' => $value['blog_id'])));
?>   -->
<!--           <div class="row border-sides">
            <div class="col-md-5 col-sm-6 pad-lft">
              <img src="<?php echo get_image($value['blog_image_path'], $value['blog_image']) ?>" class="img-responsive">
            </div>
            <div class="col-md-7 col-sm-6">
              <div class="img-rt-text">
                <h5><?php echo $value['blog_title'] ?></h5>
                <ul class="list-inline list-pad-lft">
                  <li><a href="javascript:void(0)"><?= $comment_count ?> Comments |</a></li>
                  <li><a href="javascript:void(0)">by <?php echo $value['blog_auhtor'] ?>  </a></li>
                </ul>
                <p><?= truncate(html_entity_decode($value['blog_short_detail']), 220) ?></p>
                <a href="<?= g('base_url') ?>blog/<?php echo $value['blog_slug'] ?>" class="button-read"> Read More</a>
              </div>
              <div class="data-box-simple">
                <h4><?= date("j", strtotime($value['blog_date'])) ?></h4>
                <p><?= date("F", strtotime($value['blog_date'])) ?></p>
              </div>
            </div>
          </div> -->
<?
        }
?>
<!-- 
<? if ($key % 2 == 0)
    echo '<div  class="clear-fix"></div>';
} else {
?>

                    <center><h1 style="color: #6e072c;padding-top: 20%;padding-bottom: 20%;">No Records Found</h1></center>

<?
}
?>
</div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="blog-list-right">
            <h3>Search</h3>
            
<form  method="GET" id="searchform" action="<?= g('base_url'); ?>blog" >
            <div id="search-input">
              <input type="Search" required="" name="search" class="form-control" placeholder="type here to Search">
              <span><button><i class="fa fa-search earch-btn" aria-hidden="true"></i>
              </button></span>
            </div>
</form>
          </div>
        </div>
      </section>
    </section> -->
<!-- Begin: Lets Talk -->

<!-- blog End -->
<!-- Information -->

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
  <div class="row">
    <div class="col-md-12 sbhfirst text-center">
      <h2><?= $heading13['headings_title'] ?></h2>
    </div>
  </div>
</div>

<div class="container-fluid mt2">
  <div class="row">
    <!-- <?php foreach ($blogs as $key => $value) { ?>
        <div class="col-md-4">
            <a href="<?= g('base_url') ?>blog/<?php echo $value['blog_slug'] ?>"><img src="<?php echo get_image($value['blog_image_path'], $value['blog_image']) ?>" width="90%"></a>
            <h4 style="color: #fff;"><?php echo $value['blog_title'] ?></h4>
            <?= truncate(html_entity_decode($value['blog_detail']), 220) ?>
            <a href="<?= g('base_url') ?>blog/<?php echo $value['blog_slug'] ?>"><p>Read more</p></a>
        </div>

        <?php } ?> -->
    <?php foreach ($blogs as $key => $value) { ?>
      <div class=" col-sm-4">
        <div class="mediaImg">
          <a href="<?= g('base_url') ?>blog/<?php echo $value['blog_slug'] ?>">
            <img src="<?php echo get_image($value['blog_image_path'], $value['blog_image']) ?>" width="100%" height="100%">
          </a>
        </div>
        <h4 style="color: #fff;"><?php echo $value['blog_title'] ?></h4>
        <?= truncate(html_entity_decode($value['blog_detail']), 220) ?>
        <a href="<?= g('base_url') ?>blog/<?php echo $value['blog_slug'] ?>">
          <p>Read more</p>
        </a>
      </div>
    <?php } ?>

  </div>
</div>