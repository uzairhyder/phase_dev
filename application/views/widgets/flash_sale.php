<?php
$date_now = date("Y-m-d"); // this format is string comparable

if(array_filled($flash_sale)){
    if ($flash_sale[0]['product_flash_sale_timer'] >= $date_now) { ?>
        <section class="flash-sale">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="flash-sale-title">
                                <h3>Flash Sale</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore</p>
                                <ul>
                                    <li><span id="days"></span></li>
                                    <li><span id="hours"></span></li>
                                    <li><span id="minutes"></span></li>
                                    <li><span id="seconds"></span></li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="flash-sale-slider">

                                <?php
                                foreach ($flash_sale as $key=>$value):?>
                                    <div class="flash-sale-slide">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="<?php echo g('images_root');?>flash-img1.jpg" alt="">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="flash-blk">
                                                    <h4><a href="<?php echo g('base_url') . "product/detail/". $value['product_slug'];?>"><?php echo $value['product_name'];?></a></h4>
                                                    <h5><?php echo price($value['product_price']);?></h5>
                                                </div>
                                                <!--<div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                         aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        <span class="sr-only">70% Complete</span>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <script>
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            let countDown = new Date('<?php echo $flash_sale[0]['product_flash_sale_timer']?>').getTime(),
                x = setInterval(function() {

                    let now = new Date().getTime(),
                        distance = countDown - now;

                    document.getElementById('days').innerText = Math.floor(distance / (day)),
                        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

                    //do something later when date is reached
                    //if (distance < 0) {
                    //  clearInterval(x);
                    //  'IT'S MY BIRTHDAY!;
                    //}

                }, second)
        </script>
    <?php }
}
?>