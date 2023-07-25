<div class="container">
    <div class="row">

        <div class="col-md-12 mt-5">
            <span class="heading">
                <?php echo $snapper_detail['snapper_year_title'] ?>
            </span>
        </div>

        <div class="col-md-12 mt-2 homeDesc">

        </div>
    </div>
</div>
</div>
<div class="col-lg-12">
    <div class="row mt-5">
        <div class="col-md-12 sbhfirst text-center">
            <h2><?= $heading12['headings_title'] ?> – <?php echo $snapper_detail['snapper_year_title'] ?></h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-3">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[0]['prospect_title'] ?></h4>
        </div>


        <div class="col-md-5">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[1]['prospect_title'] ?></h4>
        </div>

        <div class="col-md-4">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[2]['prospect_title'] ?></h4>
        </div>

        <div class="col-md-3">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[3]['prospect_title'] ?></h4>
        </div>


        <div class="col-md-5">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[4]['prospect_title'] ?></h4>
        </div>

        <div class="col-md-4">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[5]['prospect_title'] ?></h4>
        </div>

        <div class="col-md-3">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[6]['prospect_title'] ?></h4>
        </div>


        <div class="col-md-5">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[7]['prospect_title'] ?></h4>
        </div>

        <div class="col-md-4">
            <h4 style="color: #fff;margin-bottom: 1.5rem;font-size: 1.3rem;"><?php echo $prospect[8]['prospect_title'] ?></h4>
        </div>

    </div>
</div>
<div class="container-fluid" style="background-color: #1B1830;">
    <div class="searchtable mt-5">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12 tableCol" style="padding: 0">
                    <!-- <?php if ($this->adminid == 1) { ?>
    <div class="row" style="align-items: center;">
        <div class="col-md-4">
            
            <a href="javascript:void(0)" class="btn default yellow-stripe btn-sort-data" style="background-color: #7a43aa;color: #fff;">
                                <i class="fa fa-plus" style="margin-right:10px"></i>
                                <span class="hidden-480">
                  Save </span>
                            </a>
           
            
        </div>
        <div class="col-md-4 col-md-offset-4">
            <div class="sorting">
                <span>Filter By:</span>
                <select class="form-select" id="sorting" attr-year="<?php echo $snapper_year_id ?>" aria-label="Default select example">
                  <option id="reset">Reset</option> 
                  <option value="7">D1 FBS Ready</option>
                  <option value="6">D1 FBS Power 5 Ready</option>
                  <option value="5">D1 FBS Group 5 Ready</option>
                  <option value="4.5">D1 FCS Ready</option>
                  <option value="4">D2 Ready</option>
                  <option value="3.5">D2 Potential</option>
                  <option value="3">D3 Ready</option>
                  <option value="2.5">Developing with Minor Adjustments</option>
                  <option value="2">Still Developing</option>
                </select>
            </div>
        </div>
    </div>
     <?php } ?> -->
                    <div class="table-responsive">
                        <?php if (count($snapper_ranking) > 0) { ?>
                            <table class="table" style="color: #fff;">

                                <thead>
                                    <tr>
                                        <th><?= g('db.admin.rank') ?></th>
                                        <th><?= g('db.admin.name') ?></th>
                                        <th><?= g('db.admin.last_name') ?></th>
                                        <th><?= g('db.admin.graduation_year') ?></th>
                                        <th><?= g('db.admin.state') ?></th>
                                        <th><?= g('db.admin.prospect') ?></th>
                                        <!-- <th><?= g('db.admin.offers') ?></th> -->
                                        <th><?= g('db.admin.last_camp_attended ') ?></th>
                                        <th><?= g('db.admin.commited') ?></th>
                                         <!--<th>Created Date</th>-->
                                    </tr>
                                </thead>

                                <tbody id="snapper">

                                    <?php
                                    $counter = 0;
                                    foreach ($snapper_ranking as $key => $value) { ?>
                                        <tr>
                                            <!-- <input type="hidden"  value="<?= $value->snapper_ranking_id ?>" class="get_id">-->
                                            <td><?php echo ++$counter; ?></td>

                                            <td><?php echo $value->snapper_ranking_title ?></td>
                                            <td><?php echo $value->snapper_ranking_last_name ?></td>
                                            <td><?php echo $value->snapper_year_title ?></td>
                                            <td><?php echo $value->snapper_ranking_state ?></td>
                                            <td class="stars">
                                            <?php if ($value->snapper_ranking_prospect == 2) { ?>
                                                Still Developing
                                            <? } elseif ($value->snapper_ranking_prospect == 2.5) { ?>
                                                Developing with Minor Adjustments
                                            <? } elseif ($value->snapper_ranking_prospect == 3) { ?>
                                                D3 Ready
                                            <? } elseif ($value->snapper_ranking_prospect == 3.5) { ?>
                                                D2 Potential
                                            <? } elseif ($value->snapper_ranking_prospect == 4) { ?>
                                                D2 Ready
                                            <? } elseif ($value->snapper_ranking_prospect == 4.5) { ?>
                                                D1 FCS Ready
                                            <? } elseif ($value->snapper_ranking_prospect == 5) { ?>
                                                D1 FBS Ready
                                            <? } elseif ($value->snapper_ranking_prospect == 6) { ?>
                                                D1 FBS Group 5 Ready
                                            <? } elseif ($value->snapper_ranking_prospect == 7) { ?>
                                                D1 FBS Power 5 Ready
                                            <?php } ?>
                                            <!-- <img src="<?= g('images_root') ?>stars.png" width="30%"> -->
                                        </td>
                                            <?php if ($value->snapper_ranking_last_camp_attended == '') { ?>
                                                <td width="200px"> <?php echo '-' ?></td>
                                            <?php } else { ?>
                                            <td width="200px"><?php echo date("F j, Y", strtotime($value->snapper_ranking_last_camp_attended)) ?></td>
                                            <?php } ?>
                                            <td width="200px"><?php echo $value->snapper_ranking_commited ?></td>
                                    <!--<td width="200px"><?php echo  date("F j, Y H:i", strtotime($value->snapper_ranking_createdon)) ?></td>-->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <h1 style="text-align: center;color:#fff;margin:20px;">No Data Found(s)</h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row d-flex justify-content-center mt-4">
<a href="#">
<img src="assets/images/more.png" width="70%">
</a>
</div> -->
<!-- <script async src="<?php echo g('js_root'); ?>jquery-ui.js"></script> -->
<script>
    // $(document).ready(function() {

    //     $("#sorting").change(function() { 

    //         var id = $("#sorting").val();
    //         var year = $(this).attr('attr-year');
    //         // alert(id);

    //         var params = {};
    //         params.id = id;
    //         params.year = year;
    //         var res = AjaxRequest.fire(base_url + "snapper/get_snapper_ranking" , params);
    //       if(res.status == 1)
    //       {
    //             $('#snapper').html(res.html);
    //       }
    //       else
    //       {
    //             $('#snapper').html('');                  
    //       }

    //     });
    //     });
    // $(document).ready(function () {


    //     $("#snapper").sortable();
    //     $("#snapper").disableSelection();

    //     $('.btn-sort-data').click(function () {
    //         //alert('');
    //         var _class = $('#snapper').find('input');
    //         var div = $('#snapper').find('input');
    //         var arr = '';


    //         var prod = [];
    //         var str = '';
    //         $(".get_id").each(function (i) {

    //             // prod.push($(this).val());
    //             str += ',' + $(this).val();
    //             //

    //         });
    //         //console.log('Product');
    //         // console.log(prod);
    //         // console.log(str);

    //         // $.each(div , function(key , value){

    //         //   console.log(key);
    //         //   console.log(value);

    //         //   // arr +=  $(value).find('input[type=checkbox]').val();
    //         //   // arr += '~';
    //         // });

    //         var data = {str: str};
    //         var url = "<?= g('base_url') ?>snapper/set_positions";
    //         var response = AjaxRequest.formrequest(url, data);
    //         if (response.status == 1) {
    //             AdminToastr.success(response.txt, 'Sucess');
    //             location.reload().delay(3000);
    //         } else {
    //             AdminToastr.error('error', 'Error');
    //         }
    //     });


    // });

    // $("#sorting").change(function() {
    //   var id = $(this).children(":selected").attr("id");
    //   // alert(id);
    //   if(id == 'reset'){
    //     location.reload();
    //   }
    //   else{}
    // });
</script>