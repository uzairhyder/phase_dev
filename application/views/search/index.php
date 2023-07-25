<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
<div class="container">
<div class="row">

<div class="col-md-12 mt-5">
<span class="heading">
Search
</span>
</div>

<div class="col-md-12 mt-2 homeDesc">

</div>
</div>
</div>
</div>


<div class="container-fluid" style="background-color: #1B1830;">
<div class="searchtable mt-5">
<div class="row">
<div class="col-md-12 tableCol" style="padding: 0px">
    <!-- <div class="row">
        <form action="<?=g('base_url')?>/search" method="GET">
            <input type="hidden" name="type" value="<?=$_GET['type']?>">
            <input type="hidden" name="search" value="<?=$_GET['search']?>">
        <div class="cGrid">
            <div class="cgItem">
            <div class="sorting">
                <span>Last name</span>
                <input type="text" placeholder="Last name" name="lastname">
            </div>  
            </div>
         <div class="cgItem">
            <div class="sorting">
                <span>Graduation year</span>
                <select class="form-select" id="sorting" attr-year="1" aria-label="Default select example" name="gradyear">
                  <option value="1990">1990</option>
                  <option value="1991">1991</option>
                  <option value="1992">1992</option>
                  <option value="1993">1993</option>
                  <option value="1994">1994</option>
                  <option value="1995">1995</option>
                  <option value="1996">1996</option>
                  <option value="1997">1997</option>
                  <option value="1998">1998</option>
                  <option value="1999">1999</option>
                  <option value="2000">2000</option>
                  <option value="2001">2001</option>
                  <option value="2002">2002</option>
                  <option value="2003">2003</option>
                  <option value="2004">2004</option>
                  <option value="2005">2005</option>
                  <option value="2006">2006</option>
                  <option value="2007">2007</option>
                  <option value="2008">2008</option>
                  <option value="2009">2009</option>
                  <option value="2010">2010</option>
                  <option value="2011">2011</option>
                  <option value="2012">2012</option>
                  <option value="2013">2013</option>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  <option value="2031">2031</option>
                  <option value="2032">2032</option>
                  <option value="2033">2033</option>
                  <option value="2034">2034</option>
                  <option value="2035">2035</option>
                </select>
            </div>
        </div>
         <div class="cgItem">
            <div class="sorting">
                <span>State</span>
                <input type="text" placeholder="State" name="state">
            </div>
        </div>
         <div class="cgItem">
            <div class="sorting">
                <span>Star Rating</span>
                <select class="form-select" id="sorting" attr-year="1" aria-label="Default select example" name="rating">
                  <option value="7">D1 FBS Ready- 5 star</option>
                  <option value="6">D1 FBS Power 5 Ready- 5 star</option>
                  <option value="5">D1 FBS Group 5 Ready- 5 star</option>
                  <option value="4.5">D1 FCS Ready- 4.5 star</option>
                  <option value="4">D2 Ready- 4 star</option>
                  <option value="3.5">D3 Ready- 3.5 star</option>
                  <option value="3">D3 Ready- 3 star</option>
                  <option value="2.5">Still Developing- 2.5 star</option>
                  <option value="2">Still Developing- 2 star</option>
                </select>
            </div>
        </div>
        <button type="submit" class="cgIteml">Search</button>
        </div>
    </form>
    </div> -->
<div class="table-responsive">          
  <table class="table" style="color: #fff;">

    <thead>
      <tr>
        <th ><?=g('db.admin.rank')?></th>
        <th><?=g('db.admin.name')?></th>
        <th><?=g('db.admin.last_name')?></th>
        <th><?=g('db.admin.graduation_year')?></th>
        <th><?=g('db.admin.state')?></th>
        <th><?=g('db.admin.offers')?></th>
        <th><?=g('db.admin.commited')?></th>
        <th><?=g('db.admin.prospect')?></th>
    </tr>
</thead>



    <?if($_GET['type'] == 1){?>
    <tbody id="kickers">
        <?php 
    $counter = 0;
    foreach ($players as $key => $value) { ?>
            <tr>
            <td><?php echo ++$counter; ?></td>
            <td><?php echo $value['kicker_ranking_title']?></td>
            <td><?php echo $value['kicker_ranking_last_name']?></td>
            <td><?php echo $value['kicker_year_title']?></td>
            <td><?php echo $value['kicker_ranking_state']?></td>
            <td width="170px"><?php echo $value['kicker_ranking_offers']?></td>
            <td width="200px"><?php echo $value['kicker_ranking_commited']?></td>
             <td class="stars">


                        <?php if($value['kicker_ranking_prospect'] == 2){?>
                            Still Developing - 2 star
                        <?} elseif($value['kicker_ranking_prospect'] == 2.5){?>
                            Still Developing - 2.5 star
                        <?} elseif($value['kicker_ranking_prospect'] == 3){?>
                            D3 Ready - 3 star 
                        <?} elseif($value['kicker_ranking_prospect'] == 3.5){?>
                            D3 Ready - 3.5 star
                        <?} elseif($value['kicker_ranking_prospect'] == 4){?>
                            D2 Ready - 4 star
                        <?} elseif($value['kicker_ranking_prospect'] == 4.5){?>
                            D1 FCS Ready - 4.5 star
                        <?} elseif($value['kicker_ranking_prospect'] == 5){?>
                            D1 FBS Group 5 Ready - 5 stars
                        <?} elseif($value['kicker_ranking_prospect'] == 6){?>
                            D1 FBS Power 5 Ready - 5 star
                        <?} elseif($value['kicker_ranking_prospect'] == 7){?>
                            D1 FBS Ready - 5 star
                        <?php } ?>
                                                <!-- <img src="<?=g('images_root')?>stars.png" width="30%"> -->
                                            </td>
            </tr>
    <?php }?>
    </tbody>
    <?}if($_GET['type'] == 2){?>
        <tbody id="kickers">
        <?php 
    $counter = 0;
    foreach ($players2 as $key => $value) { ?>
            <tr>
            <td><?php echo ++$counter; ?></td>
            <td><?php echo $value['punter_ranking_title']?></td>
            <td><?php echo $value['punter_ranking_last_name']?></td>
            <td><?php echo $value['punter_year_title']?></td>
            <td><?php echo $value['punter_ranking_state']?></td>
            <td><?php echo $value['punter_ranking_offers']?></td>
            <td><?php echo $value['punter_ranking_commited']?></td>
             <td class="stars">


                        <?php if($value['punter_ranking_prospect'] == 2){?>
                            Still Developing - 2 star
                        <?} elseif($value['punter_ranking_prospect'] == 2.5){?>
                            Still Developing - 2.5 star
                        <?} elseif($value['punter_ranking_prospect'] == 3){?>
                            D3 Ready - 3 star 
                        <?} elseif($value['punter_ranking_prospect'] == 3.5){?>
                            D3 Ready - 3.5 star
                        <?} elseif($value['punter_ranking_prospect'] == 4){?>
                            D2 Ready - 4 star
                        <?} elseif($value['punter_ranking_prospect'] == 4.5){?>
                            D1 FCS Ready - 4.5 star
                        <?} elseif($value['punter_ranking_prospect'] == 5){?>
                            D1 FBS Group 5 Ready - 5 stars
                        <?} elseif($value['punter_ranking_prospect'] == 6){?>
                            D1 FBS Power 5 Ready - 5 star
                        <?} elseif($value['punter_ranking_prospect'] == 7){?>
                            D1 FBS Ready - 5 star
                        <?php } ?>
                                                <!-- <img src="<?=g('images_root')?>stars.png" width="30%"> -->
                                            </td>
            </tr>
    <?php }?>
    </tbody>
    <?}if($_GET['type'] == 3){?>

         <tbody id="kickers">
        <?php 
    $counter = 0;
    foreach ($players3 as $key => $value) { ?>
            <tr>
            <td><?php echo ++$counter; ?></td>
            <td><?php echo $value['snapper_ranking_title']?></td>
            <td><?php echo $value['snapper_ranking_last_name']?></td>
            <td><?php echo $value['snapper_ranking_graduation_year']?></td>
            <td><?php echo $value['snapper_ranking_state']?></td>
            <td><?php echo $value['snapper_ranking_offers']?></td>
            <td><?php echo $value['snapper_ranking_commited']?></td>
             <td class="stars">


                        <?php if($value['snapper_ranking_prospect'] == 2){?>
                            Still Developing - 2 star
                        <?} elseif($value['snapper_ranking_prospect'] == 2.5){?>
                            Still Developing - 2.5 star
                        <?} elseif($value['snapper_ranking_prospect'] == 3){?>
                            D3 Ready - 3 star 
                        <?} elseif($value['snapper_ranking_prospect'] == 3.5){?>
                            D3 Ready - 3.5 star
                        <?} elseif($value['snapper_ranking_prospect'] == 4){?>
                            D2 Ready - 4 star
                        <?} elseif($value['snapper_ranking_prospect'] == 4.5){?>
                            D1 FCS Ready - 4.5 star
                        <?} elseif($value['snapper_ranking_prospect'] == 5){?>
                            D1 FBS Group 5 Ready - 5 stars
                        <?} elseif($value['snapper_ranking_prospect'] == 6){?>
                            D1 FBS Power 5 Ready - 5 star
                        <?} elseif($value['snapper_ranking_prospect'] == 7){?>
                            D1 FBS Ready - 5 star
                        <?php } ?>
                                                <!-- <img src="<?=g('images_root')?>stars.png" width="30%"> -->
                                            </td>
            </tr>
    <?php }?>
    </tbody>

    <?}?>




</table>
                    </div>
                </div>
    </div>
        </div>
    </div>



<script async src="<?php echo g('js_root');?>jquery-ui.js"></script>
<script>
    $(document).ready(function() {

        $("#sorting").change(function() { 

            var id = $("#sorting").val();
            var year = $(this).attr('attr-year');
            // alert(id);

            var params = {};
            params.id = id;
            params.year = year;
            var res = AjaxRequest.fire(base_url + "kicker/get_kicker_ranking" , params);
           if(res.status == 1)
           {
                $('#kickers').html(res.html);
           }
           else
           {
                $('#kickers').html('');                  
           }

        });
        });
    $(document).ready(function () {
        // Metronic.init(); // init metronic core components
        // QuickSidebar.init(); // init quick sidebar
        // Demo.init(); // init demo features
        // TableAjax.init(); //DataTable API
        // UIAlertDialogApi.init(); //UI Alert API

        //   {
        //   start: function() {
        //     console.log('inside start');
        //     $('.lightgallery').eq(1).data('lightGallery').destroy(true);
        //   },
        //   stop: function() {
        //     console.log('inside stop');
        //     // window.setTimeout(function(){
        //       $('.lightgallery').eq(1).lightGallery();
        //     // }, 1000);
        //   }
        // }

        $("#sortable").sortable();
        $("#sortable2").sortable();
        $("#sortable3").sortable();
        $("#sortable4").sortable();
        $("#sortable").disableSelection();

        $('.btn-sort-data').click(function () {
            //alert('');
            var _class = $('#sortable').find('input');
            var div = $('#sortable').find('input');
            var arr = '';


            var prod = [];
            var str = '';
            $(".get_id").each(function (i) {

                // prod.push($(this).val());
                str += ',' + $(this).val();
                //

            });
            //console.log('Product');
            // console.log(prod);
            // console.log(str);

            // $.each(div , function(key , value){

            //   console.log(key);
            //   console.log(value);

            //   // arr +=  $(value).find('input[type=checkbox]').val();
            //   // arr += '~';
            // });

            var data = {str: str};
            var url = "<?=g('base_url')?>photo/set_positions";
            var response = AjaxRequest.formrequest(url, data);
            if (response.status == 1) {
                AdminToastr.success(response.txt, 'Sucess');
            } else {
                AdminToastr.error('error', 'Error');
            }
        });


    });
</script>