<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- Breadcrumbs -->
<?php
$data['breadcrumb_title'] = '';
$this->load->view('widgets/breadcrumb',$data);?>

<section class="inpage resources">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="reRight">
                    <h1 class="mainh"> download </h1>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php
                            if(array_filled($content)){
                                $x=1;
                                foreach ($content as $key=>$value):?>
                                    <div class="numRow">
                                        <h4> <span> <?php echo $x;?></span> <?php echo $value['resource_download_title'];?></h4>
                                        <?php echo html_entity_decode($value['resource_download_description']);?>
                                        <a href="<?php echo get_image($value['resource_download_file_path'], $value['resource_download_file']);?>" class="btn btn1" download=""> DOWNLOAD NOW</a>
                                    </div>
                                <?php $x++; endforeach;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

