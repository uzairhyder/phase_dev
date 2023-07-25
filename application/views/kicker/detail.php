<style>
    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 60%;
    }

    #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
    }

    #sortable li span {
        position: absolute;
        margin-left: -1.3em;
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-md-12 mt-5">
            <span class="heading">
                <?php echo $kicker_detail['kicker_year_title'] ?>
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
            <h2><?= $heading9['headings_title'] ?> – <?php echo $kicker_detail['kicker_year_title'] ?></h2>
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
        <div class="row">
            <div class="col-md-12 tableCol" style="padding: 0px">
                <div class="table-responsive" style="margin-top: 10px">
                    <?php if (count($kicker_ranking) > 0) { ?>
                        <table class="table" style="color: #fff;">

                            <thead>
                                <tr>
                                    <th><?= g('db.admin.rank') ?></th>
                                    <th><?= g('db.admin.name') ?></th>
                                    <th><?= g('db.admin.last_name') ?></th>
                                    <th><?= g('db.admin.graduation_year') ?></th>
                                    <th><?= g('db.admin.state') ?></th>
                                    <th><?= g('db.admin.prospect') ?></th>
                                    <th><?= g('db.admin.last_camp_attended ') ?></th>
                                    <th><?= g('db.admin.commited') ?></th>
                                      <!--<th>Created Date</th>-->
                                </tr>
                            </thead>

                            <tbody <?php if ($this->adminid == 1) { ?> id="kickers" <?php } ?>>

                                <?php
                                $counter = 0;
                                foreach ($kicker_ranking as $key => $value) { ?>
                                    <tr>
                                        <input type="hidden" value="<?= $value->kicker_ranking_id ?>" class="get_id">
                                        <td><?php echo ++$counter; ?></td>
                                        <td><?php echo $value->kicker_ranking_title ?></td>
                                        <td><?php echo $value->kicker_ranking_last_name ?></td>
                                        <td><?php echo $value->kicker_year_title ?></td>
                                        <td><?php echo $value->kicker_ranking_state ?></td>
                                        <td class="stars">
                                            <?php if ($value->kicker_ranking_prospect == 2) { ?>
                                                Still Developing
                                            <? } elseif ($value->kicker_ranking_prospect == 2.5) { ?>
                                                Developing with Minor Adjustments
                                            <? } elseif ($value->kicker_ranking_prospect == 3) { ?>
                                                D3 Ready
                                            <? } elseif ($value->kicker_ranking_prospect == 3.5) { ?>
                                                D2 Potential
                                            <? } elseif ($value->kicker_ranking_prospect == 4) { ?>
                                                D2 Ready
                                            <? } elseif ($value->kicker_ranking_prospect == 4.5) { ?>
                                                D1 FCS Ready
                                            <? } elseif ($value->kicker_ranking_prospect == 5) { ?>
                                                D1 FBS Ready
                                            <? } elseif ($value->kicker_ranking_prospect == 6) { ?>
                                                D1 FBS Group 5 Ready
                                            <? } elseif ($value->kicker_ranking_prospect == 7) { ?>
                                                D1 FBS Power 5 Ready
                                            <?php } ?>
                                            <!-- <img src="<?= g('images_root') ?>stars.png" width="30%"> -->
                                        </td>
                                        <?php if ($value->kicker_ranking_last_camp_attended == '') { ?>
                                                <td width="200px"> <?php echo '-' ?></td>
                                            <?php } else { ?>
                                        <td width="200px"><?php echo date("F j, Y", strtotime($value->kicker_ranking_last_camp_attended)) ?></td>
                                        <?php } ?>
                                        <!-- <td width="200px"><?php echo $value->kicker_ranking_offers ?></td> -->
                                        <td width="200px"><?php echo $value->kicker_ranking_commited ?></td>
                                <!--<td width="200px"><?php echo  date("F j, Y H:i", strtotime($value->kicker_ranking_createdon)) ?></td>-->
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
    //         var res = AjaxRequest.fire(base_url + "kicker/get_kicker_ranking", params);
    //         if (res.status == 1) {
    //             $('#kickers').html(res.html);
    //         } else {
    //             $('#kickers').html('');
    //         }

    //     });

    //     function touchHandler(event) {
    //         var touch = event.changedTouches[0];

    //         var simulatedEvent = document.createEvent("MouseEvent");
    //         simulatedEvent.initMouseEvent({
    //                 touchstart: "mousedown",
    //                 touchmove: "mousemove",
    //                 touchend: "mouseup"
    //             } [event.type], true, true, window, 1,
    //             touch.screenX, touch.screenY,
    //             touch.clientX, touch.clientY, false,
    //             false, false, false, 0, null);

    //         touch.target.dispatchEvent(simulatedEvent);
    //         event.preventDefault();
    //     }

    //     function init() {
    //         document.addEventListener("touchstart", touchHandler, true);
    //         document.addEventListener("touchmove", touchHandler, true);
    //         document.addEventListener("touchend", touchHandler, true);
    //         document.addEventListener("touchcancel", touchHandler, true);
    //     }
    // });
    // $(document).ready(function() {
      
    //     $(function() {
    //         $("#kickers").sortable();
    //         $("#kickers").disableSelection();
    //     });

    //     $('.btn-sort-data').click(function() {
    //         //alert('');
    //         var _class = $('#kickers').find('input');
    //         var div = $('#kickers').find('input');
    //         var arr = '';


    //         var prod = [];
    //         var str = '';
    //         $(".get_id").each(function(i) {

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

    //         var data = {
    //             str: str
    //         };
    //         var url = "<?= g('base_url') ?>kicker/set_positions";
    //         var response = AjaxRequest.formrequest(url, data);
    //         if (response.status == 1) {
    //             AdminToastr.success(response.txt, 'Success');
    //             location.reload().delay(3000);
    //         } else {
    //             AdminToastr.error('error', 'Error');
    //         }
    //     });


    // });

    // $("#sorting").change(function() {
    //     var id = $(this).children(":selected").attr("id");
    //     // alert(id);
    //     if (id == 'reset') {
    //         location.reload();
    //     } else {}
    // });
</script>