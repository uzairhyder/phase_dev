<?php if (array_filled($astronomy)) {?>  

     <?php
        foreach ($astronomy as $key => $value) {

        $checkorder = ($key % 2);
        if ($checkorder == 0) { 
    ?>  

            <section class="haboutSec astroFirst">
            <div class="container-fluid">
                
                <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offset-0 wow fadeInLeft" data-wow-delay="0.3s">
                    
                    <h1><?php echo $value['astronomy_title'];?></h1>
                                
                    <?php
                        echo html_entity_decode($value['astronomy_description']);
                    ?>
                    
                </div>
                
                <div class="col-md-7 col-sm-12 col-xs-12">
                    
                    <div class="rightSec wow fadeInRight" data-wow-delay="0.6s">
                        <div class="tmOon"></div>
                        <div class="imgBox"><img src="<?php echo get_image($value['astronomy_image_path'],$value['astronomy_image']);?>"></div>
                        <div class="sMoon"></div>
                    </div>
                    
                </div>
                                
            </div>
            
            <div class="lGlobe"></div>
            
    </section>


    <?php }
    else{
?>
        <section class="haboutSec astroseconD">
            <div class="container-fluid">
                
                <div class="col-md-7 col-sm-12 col-xs-12  col-md-offset-1 col-sm-offset-0 col-xs-offset-0">
                    
                    <div class="rightSec wow fadeInRight" data-wow-delay="0.6s">
                        <div class="tmOon"></div>
                        <div class="imgBox"><img src="<?php echo get_image($value['astronomy_image_path'],$value['astronomy_image']);?>"></div>
                        <div class="sMoon"></div>
                    </div>
                    
                </div>
                
                
                <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
                                        
                    <h1><?php echo $value['astronomy_title'];?></h1>
                                
                    <?php
                        echo html_entity_decode($value['astronomy_description']);
                    ?>
                    
                </div>
                
                                
            </div>
            
             <div class="lGlobe"></div>
    </section>
<?php
        }
    }
}?>

      <div class="clearfix"></div>
        
        
        
        <div class="clearfix"></div>


         <script>
        $(document).ready(function() {
            
            $('.slider_circle').EasySlides({
                'autoplay': true,
                'show':3
            })
            
        });
        
        
        window.onload=function(){
          $('.sliderslick').slick({
          autoplay:true,
          autoplaySpeed:1500,
          arrows:true,
          prevArrow:'<button type="button" class="slick-prev"></button>',
          nextArrow:'<button type="button" class="slick-next"></button>',
          centerMode:true,
          slidesToShow:3,
          slidesToScroll:1,
          });
        };
        
        
    
    
    
    </script>
    
    
    
    <!-- Mobile Menu JS -->
    <script src="js/jquery.slicknav.js"></script>
    <script>
    $(function(){
        $('#menu').slicknav();
    });
    </script>