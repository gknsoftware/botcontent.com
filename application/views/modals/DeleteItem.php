<!-- Modal -->
<div class="modal fade" id="deleteItemModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-info-circle"></i> <strong><?php echo $this->lang->line('lang_modaltitle_deletecustomer'); ?></strong></h4>
      <!-- //modal-header --> </div>

      <div class="modal-body">

        <div id="modal-bodytext">
          <?php echo $this->lang->line('lang_modalbodytext_deleteitem'); ?>
        </div>

        <div id="loader" data-text-align="center" class="hidden">
          <img src="<?php echo get_asset('img', 'loader-small.gif'); ?>">
          <h1> <?php echo $this->lang->line('lang_modalbodytext_pleasewait'); ?> </h1>
        <!-- #loader --> </div>

        <div class="clearfix"></div>

      <!-- //modal-body --> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_cancel'); ?></button>
        <button type="button" class="btn btn-primary" id="delete<?php echo $this->uri->segment(2); ?>" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_delete'); ?></button>
      <!-- //modal-footer --> </div>
    <!-- //modal-content --> </div>
    
  </div>
</div>