<?
// Banner heading
//$this->load->view('widgets/inner_banner');
// Banner section
?>


<section class="contentStyle">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="title text-center"><?php echo html_entity_decode($content['cms_page_title'])?></h2>
                <?php echo html_entity_decode($content['cms_page_content'])?>
            </div>
        </div>
    </div>
</section>

