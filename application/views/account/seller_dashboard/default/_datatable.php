
<div class="col-md-12">
    <!-- <h2 align="center"><?=$title?></h2> -->

    <a href="<?=$add_link?>" class='btn btn-primary pull-right' style='margin-bottom: 5px;'>Add New <?=humanize($class)?></a>

    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <?php
                foreach ($heading as $key => $value) {
                    $data = $model->get_fields($value);
                ?>
                <th width="<?=$data['dt_attributes']['width']?>"><?=$data['label']?></th>
                <?php } ?>
                <th width="5%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datatable as $key => $value) {
                $pk_id = $model->get_pk();
            ?>
            <tr id="row-<?=$value[$pk_id]?>">
                <?php
                foreach ($heading as $k => $v) {
                    $model_fields = $model->get_fields();
                    $field_attr = $model_fields[ $v ];
                    $field_type = (isset($field_attr['type_dt'])) ? $field_attr['type_dt'] : $field_attr['type'] ;
                    $field_value = isset($value[$v]) ? $value[$v] : '';
                    switch( $field_type )
                    {
                        case 'text':
                        case 'textarea':
                        case 'label':
                        case 'label_custom':
                        case 'editor':
                            $field_value = html_entity_decode(strip_tags($field_value));
                            $field_value = truncate($field_value,256);
                            # code...
                            break;
                        
                        case 'image':

                            $image_url = $field_value ? $config['base_url'].$field_value : '' ;
                            if ($image_url == '') {
                                $image_url = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
                            }
                            $field_value = '<img src="' . $image_url .'" style="max-height:30px;"/>' ;
                            break;
                        
                        case 'switch':
                            $list_data = (isset($field_attr['list_data']))?$field_attr['list_data']:array();
                            if(!array_filled($list_data))
                            {
                                $list_data = array( 
                                            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  ,
                                            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        ) ;
                            }
                            $field_value = $list_data[$field_value] ;
                            break;
                        case 'dropdown':
                            if(isset($field_attr['list_data']) AND array_filled($field_attr['list_data'])) {
                                $list_data = $field_attr['list_data'];
                            }
                            else {
                                $list_data = isset($this->_list_data[$field_attr['name']]) ? $this->_list_data[$field_attr['name']] : array();
                            }

                            if(!array_filled($list_data))
                            {
                                $list_data_key = (isset($field_attr['list_data_key'])) ? $field_attr['list_data_key'] : $field ;
                                $list_data = $this->_list_data[$list_data_key];
                            }
                            $field_value = isset($list_data[$field_value]) ? $list_data[$field_value] : '' ;
                            break;
                        
                        case 'hidden':
                            continue;
                            break;
                    }
                ?>
                <td><?=$field_value?></td>
                <?php } ?>   
                <td>
                    <a href='<?=$add_link?><?=$value[$pk_id]?>' class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href='javascript:void(0);' class="btn btn-danger btn-xs delete_this" data-url='<?=l('seller_dashboard/'.$class."/ajax-delete")?>' data-pkid='<?=$value[$pk_id]?>'><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function() {

    $(".delete_this").on('click',function(){
        if(confirm("Are you delete this <?=humanize($class)?>?"))
        {
            var id = $(this).attr("data-pkid");
            var data = {id:id};
            var url = $(this).attr('data-url');

            response = AjaxRequest.fire(url,data);
            
            if(response.status)
                $("#row-"+id).remove();
        }

    });

    $('#example').DataTable();
});
</script>