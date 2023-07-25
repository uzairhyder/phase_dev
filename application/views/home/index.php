<?php
// Home page slider
//$this->load->view('widgets/banner');
// Feature product
//$this->load->view('widgets/feature_products');
// Steps
//$this->load->view('widgets/steps');
// Categories
//$this->load->view('widgets/about_us');
// Our Services
//$this->load->view('widgets/our_services');
// News
//$this->load->view('widgets/news');
// Feeds
//$this->load->view('widgets/feeds');
// Login with Social media
//$this->load->view('widgets/login_social_media');
// Information
//$this->load->view('widgets/information');

?>

<!-- Best Deal Sec Start -->
<?php //$this->load->view('widgets/best_deals');
?>
<!-- Best Deal Sec End -->


<!-- Top 10 Selected Production Sec Start -->
<?php //$this->load->view('widgets/top_ten');
?>
<!-- Top 10 Selected Production Sec End -->


<!-- popular Search Sec Start -->
<?php //$this->load->view('widgets/popular_search');
?>
<!-- popular Search Sec End -->


<!-- service Sec Start -->
<?php //$this->load->view('widgets/service');
?>
<!-- service Sec End -->


<!-- Flash Sale Sec Start -->
<?php //$this->load->view('widgets/flash_sale');
?>
<!-- Flash Sale Sec End -->


<!-- popular Search Sec Start -->
<?php //$this->load->view('widgets/hot_sale');
?>
<!-- popular Search Sec End -->


<!-- Recently viewed Sec Start -->
<?php //$this->load->view('widgets/recently');
?>
<!-- Recently viewed Sec End -->
<div class="container-fluid remove-div-airpad">
	<div class="row">

		<div class="col-md-12 mt4">
			<span class="heading">
				<?= $banner['banner_heading'] ?><br>
				<?= $banner['banner_sub_heading'] ?>
			</span>
		</div>

		<div class="col-md-12 mt-2 homeDesc">
			<?= html_entity_decode($banner['banner_description']) ?>
		</div>

		<!-- <div class="col-md-12 mt-2">
			<a href="<?= g('base_url') ?>camp-concept"><button class="bbtn">Get Started</button></a>
		</div> -->

	</div>
</div>
</div>

<!-- cmnt -->
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12 sbhfirst text-center">
			<h2><?= $heading1['headings_title'] ?></h2>
		</div>
	</div>
</div>

<div class="container-fluid" style="background-color: #1B1830;">
	<div class="container-fluid mt2">
		<div class="row">
			<div class="col-md-12 tableCol">
				<div class="table-responsive mac-responsive">
					<table class="table" style="color: #fff;">
						<thead>
							<h2 style="color: #fff;"><?php echo $camp_year['camp_year_title'] ?></h2>
							<tr>
								<th>Date</th>
								<th>Major City</th>
								<th>State</th>
								<th>Event</th>
								<th>Registration Link</th>
							</tr>
						</thead>
						<tbody>
							<?
		
							foreach ($upcoming_camp as $key => $value) { ?>
								<tr>
									<td style="width: 20%;"><?= date("F j, Y", strtotime($value['camp_date'])) ?></td>
									<td style="width: 20%;"><?php echo $value['camp_city'] ?></td>
									<td style="width: 20%;"><?php echo $value['camp_state'] ?></td>
									<td style="width: 20%;"><?php echo $value['camp_title'] ?></td>
									<td style="width: 20%;"><a href="<?php echo $value['camp_link'] ?>" target="_blank"><img src="<?= g('images_root') ?>arrow.png" width="50px" height="35px"></a></td>
								</tr>
							<?php } ?>
						</tbody>

					</table>

					<!-- old work -->
				
					<!-- end -->

				</div>
			</div>

		</div>
		<div class="row d-flex justify-content-center py-3">
			<img src="assets/images/right.svg" alt="" class="clipimgleft">
			<a href="<? g('base_url') ?>upcomingcamps"><button class="clip">More</button></a>
			<img src="assets/images/left.svg" alt="" class="clipimgright">

		</div>
	</div>
</div>
<!-- cmnt -->

<!-- <div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<img src="<?= g('images_root') ?>page-banner-1.png" class="img-fluid" alt="Responsive image">
			</div>
		</div>
		<div class="row py-3">
			<div class="col-md-12">
				<img src="<?= g('images_root') ?>page-banner-2.png" class="img-fluid" alt="Responsive image">
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid home_content1">
	<div class="col-lg-12 ">
		<div class="row">
			<div class="col-md-12 sbhfirst mt2">
				<h1 class="text-left"><?php echo $content1['cms_page_title'] ?></h1>
				<?php echo html_entity_decode($content1['cms_page_content']) ?>

			</div>
		</div>
	</div>
</div>


<div class="col-lg-12 home_content2">
	<div class="row mt7">
		<div class="col-md-6">
			<img src="<?php echo get_image($content2['cms_page_image_path'], $content2['cms_page_image']) ?>" width="100%">
		</div>
		<div class="col-md-6">
			<h2> <?php echo $content2['cms_page_title'] ?> </h2>
			<div class="row">
				<div class="col-md-12 diamond">
					<?php echo html_entity_decode($content2['cms_page_content']) ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-12 home_content2">
	<div class="row mt7">
		<div class="col-md-6">
			<h2> <?php echo $content3['cms_page_title'] ?></h2>
			<div class="row">
				<div class="col-md-12 diamond">
					<?php echo html_entity_decode($content3['cms_page_content']) ?>


				</div>
			</div>
		</div>
		<div class="col-md-6">
			<img src="<?php echo get_image($content3['cms_page_image_path'], $content3['cms_page_image']) ?>" width="100%">
		</div>
	</div>
</div>


<div class="col-lg-12 home_content3 mt7" style="background-color: #1B1830;padding-top:50px;padding-bottom:50px;">
	<div class="row">
		<div class="col-md-6">
			<img src="<?php echo get_image($content4['cms_page_image_path'], $content4['cms_page_image']) ?>" width="100%" style="    height: 100%;object-fit: cover;object-position: right;">
		</div>
		<div class="col-md-6">
			<h2> <?php echo $content4['cms_page_title'] ?> </h2>
			<div class="row">
				<div class="col-md-12 diamond">
					<?php echo html_entity_decode($content4['cms_page_content']) ?>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container home_content1">
	<div class="col-lg-12 home_content2">
		<div class="row mt-5">
			<div class="col-md-5">
				<!-- <img src="<?= g('images_root') ?>about-us-content.png" width="100%"> -->
				<div class="cHub">
					<div class="imgChris">
						<img src="<?php echo get_image($content5['cms_page_image_path'], $content5['cms_page_image']) ?>" width="100%" alt="">
					</div>
					<div class="nameChris">
						<h5>Chris Husby</h5>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<h2> <?php echo $content5['cms_page_title'] ?></h2>
				<div class="row">
					<div class="col-md-12 diamond">
						<?php echo html_entity_decode($content5['cms_page_content']) ?>


					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--  -->


<?php
$gallery = $this->model_gallery->find_all_active();
?>
<?php
$mychunk1 = array_chunk($gallery, 3);
if (count($mychunk1) > 0) { ?>
	<!-- cmnt -->
	<div class="col-lg-12">
		<div class="row mainHome">
			<div class="col-md-12">
				<div class="row">
					<div class="owl-carousel owl-theme homecarousal">
						<? foreach ($mychunk1 as $key => $chunk1value) { ?>
							<?php foreach ($chunk1value as $key => $value) { ?>
								<div class="item">
									<div class="col-md-12">
										<div class="kickCard ">
											<div class="KickCardImg">
												<img src="<?= get_image($value['gallery_image_path'], $value['gallery_image']) ?>" class="img-fluid" alt="Responsive image" width="100%">
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<!-- <? foreach ($mychunk1 as $key => $chunk1value) { ?>
		    
				<div class="row no-gutters">
		    		<?php foreach ($chunk1value as $key => $value) { ?>
						<div class="col-md-4">
							<div class="kickCard ">
								<div class="KickCardImg">
									<img src="<?= get_image($value['gallery_image_path'], $value['gallery_image']) ?>" class="img-fluid" alt="Responsive image" width="100%">
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<? } ?> -->



			</div>

		</div>
	</div>
	<!-- cmnt -->

<?  } ?>

</div>
</div>

<!-- cmnt -->
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12 sbhfirst text-center" style="margin-top: 50px">
			<h2><?= $heading2['headings_title'] ?></h2>
		</div>
	</div>
</div>


<div class="container-xl mt2">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">

					<ol class="">

					</ol>

					<div class="carousel-inner">
						<?php foreach ($testimonial as $key => $value) : ?>
							<div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
								<div class="client">
									<img src="<?php echo get_image($value['testimonial_image_path'], $value['testimonial_image']); ?>" alt="" width="30%" height="200px">
								</div>
								<p class="testimonial"><?php echo html_entity_decode($value['testimonial_description']); ?></p>
								<p class="overview"><b><?php echo $value['testimonial_name'] ?></b>, <?php echo $value['testimonial_designation'] ?></p>
							</div>
						<?php endforeach; ?>
					</div>

					<a class="carousel-control-prev " href="#myCarousel" data-slide="prev">
						<i class="fa fa-angle-left previous"></i>
					</a>
					<a class="carousel-control-next" href="#myCarousel" data-slide="next">
						<i class="fa fa-angle-right next"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12 sbhfirst text-center">
			<h2><?= $heading3['headings_title'] ?></h2>
		</div>
	</div>
</div>

<div class="container mt2">
	<div class="col-lg-12">
		<div class="row  ">
			<div class="col-md-12">
				<div class="row  ">

					<?php foreach ($featured_team as $key => $value) { ?>
						<div class="col-md-3 coachCol">
							<img src="<?php echo get_image($value['team_image_path'], $value['team_image']); ?>" class="img-fluid homeCoachImg" alt="Responsive image" style="">
							<h4 style="color: #fff;" class="py-3"><?= $value['team_name'] ?></h4>
						</div>
					<?php  } ?>

				</div>
				<div class="row d-flex justify-content-center py-3 clipimg">
					<a class=" d-flex justify-content-center" href="<?= g('base_url') ?>evaluationteam"><img src="<?= g('images_root') ?>read-more.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</div>

<br />
<div class="container mt2">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12 sbhfirst text-center">
				<h2><?= $heading4['headings_title'] ?></h2>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="row  ">
			<div class="col-md-12">
				<div class="row  ">

					<div class="owl-carousel owl-theme owl-carousel258">
						<?php foreach ($sponsor as $key => $value) { ?>
							<div class="item">
								<div class="col-md-12 coachCol">
									<div class="sponcer">
										<a href="<?= $value['sponsor_link'] ?>" target="_blank">
											<img src="<?= get_image($value['sponsor_image_path'], $value['sponsor_image']) ?>" class="img-fluid homeCoachImg" alt="Responsive image" style="">
										</a>
									</div>
									<p style="color: #fff;" class="py-3"><?= $value['sponsor_title'] ?></p>

								</div>
							</div>
						<?php  } ?>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subscribe our Newsletter</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div> -->
<!-- Large modal -->

<!-- <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="Modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
			
				<button onclick="myFunction()" class="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button onclick="myFunction()" class="btn btn-secondary">Close</button>
			</div>
		</div>
	</div>
</div> -->

<div id="myModal" class="modal">
	<div class="modal-content-img">
		<div class="close-modal-btn-img">
			<span class="closeImg">&times;</span>
		</div>
		<a href="<?php echo $content6['cms_page_link'] ?>" target="_blank">
			<div class="modal-pop-up-img-img">
				<img src="<?php echo get_image($content6['cms_page_image_path'], $content6['cms_page_image']) ?>" alt="">
			</div>
		</a>
	</div>
</div>
<script>
	$(document).ready(function() {
		if (localStorage.getItem("modalShown") === null) {
			$("#myModal").show();
			localStorage.setItem("modalShown", "true");
		}

		$(".closeImg").click(function() {
			$("#myModal").hide();
		});
	});
</script>



<!-- cmnt -->