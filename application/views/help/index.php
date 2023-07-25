<?
// Banner heading
///$this->load->view('widgets/inner_banner');
// Banner section
?>

<section class="faq-sec">
    <div class="container">
        <div class="faq-title">
            <h3><span class="gold">Help</span></h3>
        </div>

        <div class="row">

            <div class="col-md-12">

                <?php
                if(array_filled($help)){
                    foreach ($help as $key => $value):?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key;?>">
                                        <?php echo $value['help_title'];?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $key;?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php echo html_entity_decode($value['help_content']);?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                }?>

            </div>

        </div>
    </div>
</section>