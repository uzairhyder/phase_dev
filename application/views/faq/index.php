<?
// Banner heading
///$this->load->view('widgets/inner_banner');
// Banner section
?>

<section class="faqs-main">
    <div class="body-space">
        <div class="container">
            <div class="mfaq">
                <h2><?php echo html_entity_decode($content['cms_page_title'])?></h2>
                <?php
                if(array_filled($faq)){?>
                    <div class="tab-pane fade in active" id="htab1" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pxlr-club-faq">
                                    <div class="content">
                                        <div class="panel-group" id="accordion" role="tablist">
                                            <?php
                                            foreach ($faq as $key=>$value):?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" id="heading<?php echo $key;?>" role="tab">
                                                        <h4 class="panel-title"><a aria-controls="collapse<?php echo $key;?>" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse<?php echo $key;?>" role="button"><?php echo $value['faq_title'];?> <i class="pull-right fa fa-plus"></i></a></h4>
                                                    </div>
                                                    <div aria-labelledby="heading<?php echo $key;?>" class="panel-collapse collapse" id="collapse<?php echo $key;?>" role="tabpanel">
                                                        <div class="panel-body pxlr-faq-body">
                                                            <?php echo html_entity_decode($value['faq_content']);?>
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
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</section>