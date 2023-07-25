<div class="aboutForm2">
  <div class="col-md-12 col-xs-12 col-sm-12 center">

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Add Details to <?=humanize($class_name)?></h3>
        </div>
        <div class="panel-body">
        
          <?$this->load->view("admin/widget/form_generator");?>

        </div>
      </div>


  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {    
    Metronic.init(); // init metronic core components
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features
    UIAlertDialogApi.init(); //UI Alert API
    FormFileUpload.init();
  });

</script>