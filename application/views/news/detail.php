<section class="haboutSec astroFirst">
            <div class="container-fluid">

                <div class="col-md-12 col-sm-12 col-xs-12  col-sm-offset-0 col-xs-offset-0 wow fadeInLeft" data-wow-delay="0.3s">



                    <h1><?php echo $detail['news_name'];?></h1>
                    

                  <span><?= $detail['news_auhtor']?>
                  <div class="devider"> | </div>
                  <?php
                      $launchdate = date('F d Y',strtotime($detail['news_date']));
                  ?>
                  <span class="colorb"><?= $launchdate;?></span> </span>
                   <?php echo html_entity_decode($detail['news_description']);?>
                    
                    
                </div>
                
           
                                
            </div>
            
            
    </section>