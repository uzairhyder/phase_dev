<?global $config;
$model_heads = explode("," , $dt_params['dt_headings'] );
// debug($class_name,1);
?>

<div class="inner-page-header">
    <?if($class_name == 'kicker_year'){?>
         <h1><?=humanize('Kickoff Years')?> <small>Record</small></h1>
    <?}else if($class_name == 'kicker_ranking'){?>
         <h1><?=humanize('Kickoff Ranking')?> <small>Record</small></h1>
    <?}else{?>
         <h1><?=humanize($class_name)?> <small>Record</small></h1>
    <?}?>
</div>

<div class="row">
  <div class="col-md-12">
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet box green">
      <div class="portlet-title">
        <div class="caption">
          <?if($class_name == 'kicker_year'){?>
            <i class="fa fa-shopping-cart"></i><?=humanize('Kickoff Years')?>
              <small>Add Details to <?=humanize('Kickoff Years')?></small>
          <?}else if($class_name == 'kicker_ranking'){?>
            <i class="fa fa-shopping-cart"></i><?=humanize('Kickoff Ranking')?>
              <small>Add Details to <?=humanize('Kickoff Ranking')?></small>
          <?}else{?>
          <i class="fa fa-shopping-cart"></i><?=humanize($class_name)?>
              <small>Add Details to <?=humanize($class_name)?></small>
          <?}?>
        </div>
        <!--<div class="tools">
          <a href="javascript:;" class="collapse">
          </a>
          <a href="#portlet-config" data-toggle="modal" class="config">
          </a>
          <a href="javascript:;" class="reload">
          </a>
          <a href="javascript:;" class="remove">
          </a>
        </div>-->
      </div>
      <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <?$this->load->view("admin/widget/form_generator");?>
        <!-- END FORM-->
      </div>
      <!-- END VALIDATION STATES-->
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {    
      Metronic.init(); // init metronic core components
      QuickSidebar.init(); // init quick sidebar
      Demo.init(); // init demo features
      UIAlertDialogApi.init(); //UI Alert API
      <?if(isset($error))
          echo "AdminToastr.error('".str_replace("\n","",validation_errors('<div>', '</div></br>'))."');";
      ?>   
  });
</script>

