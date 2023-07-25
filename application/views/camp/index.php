
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12 mt-5">
      <span class="heading">
       <?=$banner['banner_heading']?><br> 
       <?=$banner['banner_sub_heading']?>
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
  <div class="container-fluid">
    <div class="col-md-12 sbhfirst text-center">
      <h3 style="color:#fff;">Welcome to Phase 3 Kicking! We are excited to see you at an upcoming event! Specialists love our fun & competitive camp format.</h3>
    </div>
  </div>
</div> 
</div>
<div class="container-fluid" style="background-color: #1B1830;">
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-md-12 tableCol">
        <div class="table-responsive">          
        
          <?php foreach ($camp_year as $key => $value) {?>
				
						<table class="table" style="color: #fff;">
							<thead>
								<h2 style="color: #fff;"><?php echo $value['camp_year_title'] ?></h2>
								<tr>
									<th>Date</th>
									<th>Major City</th>
									<th>State</th>
									<th>Event</th>
									 <th>Registration Link</th> 
								</tr>
							</thead>
							<tbody>
								<?php
								$param['where']['camp_year_result'] == $value['camp_year_id'];
								$param['order'] = 'camp_date DESC';
								$upcoming_camp = $this->model_camp->find_all_active($param);
								// debug($upcoming_camp,1);
								  ?>
							  <?php	foreach ($upcoming_camp as $key => $value) { ?>
									<tr>
										<td><?= date("F j, Y", strtotime($value['camp_date'])) ?></td>
										<td><?php echo $value['camp_city'] ?></td>
										<td><?php echo $value['camp_state'] ?></td>
										<td style="width: 25%;"><?php echo $value['camp_title'] ?></td>
										 <td><a href="<?php echo $value['camp_link'] ?>" target="_blank"><img src="<?= g('images_root') ?>arrow.png" width="50px" height="35px"></a></td> 
									</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>