<!-- Modal -->
<div class="modal fade" id="ticketModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
          <a href="javascript:void(0);" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-font-color="#444"><i class="fa fa-info-circle"></i></a>
          <strong><?php echo $this->lang->line('lang_ticket'); ?></strong>
        </h4>
      <!-- //modal-header --> </div>

      <div class="modal-body">

        <div class="modal-body-content">
          
        <!-- .modal-body-content --> </div>

      <!-- //modal-body --> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_close'); ?></button>
        <button type="button" class="btn btn-primary hidden" id="sendResponse" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_send'); ?></button>
      <!-- //modal-footer --> </div>
    <!-- //modal-content --> </div>
    
  </div>
</div>