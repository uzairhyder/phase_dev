<div class="container-fluid">
  <div class="row">

    <div class="col-md-12 mt-5">
      <span class="heading">
        <?= $banner['banner_heading'] ?><br>
        <?= $banner['banner_sub_heading'] ?>
      </span>
    </div>

    <div class="col-md-12 mt2">
      <?= html_entity_decode($banner['banner_description']) ?>
    </div>
  </div>
</div>
</div>

<div class="col-lg-12">
  <div class="row">
    <div class="col-md-12 sbhfirst text-center">
      <h2><?= $heading8['headings_title'] ?></h2>
    </div>
  </div>
</div>

<div class="container-fluid" style="background-color: #1B1830;">
  <div class="container-fluid mt2">
    <div class="row">
      <div class="col-md-12 tableCol">
        <div class="table-responsive">
          <?php foreach ($camp_year as $key => $value) { ?>
            <table class="table" style="color: #fff;">
              <thead>
                <h2 style="color: #fff;"><?php echo $value['camp_year_title'] ?></h2>
                <tr>
                  <th>Date</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Results</th>
                </tr>
              </thead>

              <tbody>
                <?
                $param['where']['camp_result_year'] = $value['camp_year_id'];
                $param['order'] = 'camp_result_date DESC';
                $camp_result = $this->model_camp_result->find_all_active($param);
                //debug($camp_result,1);
                foreach ($camp_result as $key => $crvalue) { ?>
                  <tr>
                    <td style="width: 20%;"><?= date("F j, Y", strtotime($crvalue['camp_result_date'])) ?></td>
                    <td style="width: 20%;"><?php echo $crvalue['camp_result_city'] ?></td>
                    <td style="width: 20%;"><?php echo $crvalue['camp_result_state'] ?></td>
                    <td style="width: 30%;"><a class="camp_link" target="_blank" href="<?php echo get_image($crvalue['camp_result_image_path'], $crvalue['camp_result_image']) ?>"><?php echo $crvalue['camp_result_title'] ?>
                        <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i> -->
                      </a> </td>
                    <!-- <td><a href="<?php echo get_image($crvalue['camp_result_image_path'], $crvalue['camp_result_image']) ?>" download> <img src="<?= g('images_root') ?>arrow.png" width="20%"> </a></td> -->
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