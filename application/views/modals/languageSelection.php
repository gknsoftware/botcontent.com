<!-- Modal -->
<div class="modal fade" id="languageSelectionModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong><?php echo $this->lang->line('lang_modaltitle_langselection'); ?></strong></h4>
      <!-- //modal-header --> </div>

      <div class="modal-body">

        <div class="modal-body-content">
          <ul class="select-language">
            <li<?php echo $this->lang->line('lang_key')=='tr' ? ' class="active" id="tr" data-lang="tr"' : null; ?>><a href="javascript:void(0);" data-href="turkish"><img src="<?php echo get_asset('img', 'language/tr.png'); ?>"> <span>Türkçe</span></a></li>
            <li<?php echo $this->lang->line('lang_key')=='en' ? ' class="active" id="en" data-lang="en"' : null; ?>><a href="javascript:void(0);" data-href="english"><img src="<?php echo get_asset('img', 'language/en.png'); ?>"> <span>English</span></a></li>
            <li<?php echo $this->lang->line('lang_key')=='de' ? ' class="active" id="de" data-lang="de"' : null; ?>><a href="javascript:void(0);" data-href="deutsch"><img src="<?php echo get_asset('img', 'language/de.png'); ?>"> <span>Deutsch</span></a></li>
          </ul>
        <!-- .modal-body-content --> </div>

      <!-- //modal-body --> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_cancel'); ?></button>
        <button type="button" class="btn btn-primary" id="changeLanguage" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_change'); ?></button>
      <!-- //modal-footer --> </div>
    <!-- //modal-content --> </div>
    
  </div>
</div>