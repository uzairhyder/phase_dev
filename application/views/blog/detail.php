<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> -->
<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>
<!-- blog detail start-->

<!-- <section class="Comment_sect">
      <div class="postsArea ">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="blogDetails">
                <figure>
                  <img src="<?php echo get_image($blog_details['blog_image_path'],$blog_details['blog_image'])?>" class="img-resposiv">
                </figure>
                
              </div>
             
            </div>
            <div class="col-md-3 col-sm-3">
              <div class="blog-list-right rcent">
                <h3>Search</h3>
 <form  method="GET" id="searchform" action="<?=g('base_url');?>blog" >
            <div id="search-input">
              <input type="Search" required="" name="search" class="form-control" placeholder="type here to Search">
              <span><button><i class="fa fa-search earch-btn" aria-hidden="true"></i>
              </button></span>
            </div>
</form>     
                <div class="blog-list-left-heading rcent">
                  <h4 class="pop">Popular Post</h4>
                </div>
                <div class="latest-posts">
                  
<?php foreach ($popular_blog as $key => $value): ?>  
                    <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-4 latest-posts-img">
                      <img src="<?php echo get_image($value['blog_image_path'],$value['blog_image'])?>" alt="blog-img" style="width:71px;height: 71px;">
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-8 latest-posts-text pl-0"><a href="<?=g('base_url')?>blog/<?php echo $value['blog_slug']?>"><?=truncate($value['blog_title'],32)?></a><span><?=date("F",strtotime($value['blog_date']))?> <?=date("j",strtotime($value['blog_date']))?>, <?=date("Y",strtotime($value['blog_date']))?></span></div>
                  </div>
                  <br>
<?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-sm-9">
              <div class="blog-details-content">
                <div class="blog-meta-2">
                  <ul>
                    <li><?=date("F ,j Y",strtotime($blog_details['blog_date']))?></li>
<?
$comment_count = $this->model_comment->find_count_active(array('where' => array('comment_post_id' => $blog_details['blog_id'])));
?>
                    <li><a href="javascript:void(0)"><?=$comment_count?> <i class="fa fa-comments-o"></i></a></li>
                  </ul>
                </div>
                <h3><?php echo $blog_details['blog_title']?></h3>
               <?php echo html_entity_decode($blog_details['blog_detail'])?>
              </div>
<?php if (!empty($leave_a_comment)): ?>             
              <div class="blog-comment-wrapper mt-55">
                <h4 class="blog-dec-title">comments : <?=$comment_count?></h4>

<script>
                  $(function() {

                    function timeDifference (time) {
                      return moment(time, "YYYY-MM-DD hh:mm:ss").fromNow();
                    };

                    $('.timeDifference').each(function(index, el) {
                      $el = $(el);
                      var diff = timeDifference( $el.data('time') );
                      $el.html(diff);
                    });
                  });

 </script>
<?php foreach ($leave_a_comment as $key => $value): ?>

                <div class="single-comment-wrapper mt-35">
                  <div class="blog-comment-img">
                    <img src="<?=g('base_url')?>assets/front_assets/fonts/icons/avatars/<?php echo strtoupper($value['comment_name'][0])?>.svg" alt="">
                  </div>
                  <div class="blog-comment-content">
                    <h4><?php echo $value['comment_name']?></h4>
                    <span class="timeDifference" data-time="<?php echo $value['comment_created_on']?>"></span>
                    <p><?php echo $value['comment_description']?></p>
                  </div>
                </div>
<?php endforeach ?> 
                
        
              </div>
<?php endif; ?> 
              <div class="blog-reply-wrapper mt-50">
                <h4 class="blog-dec-title">post a comment</h4>
<form id="commentform" class="blog-form" action="<?=g('base_url')?>blog/save_comment" method="POST" >
<input type="hidden" name="comment[comment_post_id]" value="<?=$blog_details['blog_id']?>">   
                  <div class="row">
                    <div class="col-md-6">
                      <div class="leave-form">
                        <input type="text" placeholder="Full Name" name="comment[comment_name]">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="leave-form">
                        <input type="email" placeholder="Email Address " name="comment[comment_email]">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="text-leave">
                        <textarea placeholder="Message" name="comment[comment_description]" ></textarea>
                        <input type="button" value="SEND MESSAGE" onclick="ajaxcommentform('commentform')">
      
                      </div>
                    </div>
                  </div>
</form>
              </div>
            </div>
 
          </div>
        </div>
        
      </section> -->
<!-- blog detail End-->
<div class="container">
    <div class="row">
        
    <div class="col-md-12 mt-5">
            <span class="heading">
            <?=$banner['banner_heading']?>
            </span>
        </div>
        
        <div class="col-md-12 mt-2 homeDesc">           
            
            <?=html_entity_decode($banner['banner_description'])?>
        </div>
    </div>
</div>
</div>

<div class="col-lg-12">
<div class="row mt-5">
    <div class="col-md-12 sbhfirst text-center">
        <h2><?=$heading14['headings_title']?></h2>
    </div>
</div>
</div>

<div class="container mt-5">
    <div class="row">

        <div class="col-md-4">
        <img src="<?php echo get_image($blog_details['blog_image_path'],$blog_details['blog_image'])?>" width="100%">
        </div>

        <div class="col-md-8">
            <h4 style="color: #fff;"><?php echo $blog_details['blog_title']?></h4>
            <h5 style="color: #fff;"><?=date("F j Y",strtotime($blog_details['blog_date']))?></h5>
            <?=html_entity_decode($blog_details['blog_detail'])?>
            
        </div>


   
    </div>
</div>


<!-- Information -->
<?
//$this->load->view('widgets/information');
?>

<script>       
function ajaxcommentform(form) {
          var data  = $('#'+form).serialize();
          var url = $('#'+form).attr('action');
          var res = AjaxRequest.formrequest(url, data) ;
          if(res.status === 1)
          {
                AdminToastr.success(res.txt,'Success'); 

                $('#'+form)[0].reset();
                
                if(res.reload === 1)
                {
                  // window.location  = res.url;
                   setTimeout(function() {
                  window.location.reload();
                    }, 2000)
                }
                return false;
          }
          else
          {
                AdminToastr.error(res.txt,'Error'); 
                
          }
          return false;
}
</script>