<!-- Modal -->
<div class="modal fade" id="editCustomerModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong><?php echo $this->lang->line('lang_modaltitle_editcustomer'); ?></strong> <span>  </span></h4>
      <!-- //modal-header --> </div>

      <div class="modal-body">
      <div class="modal-body-content"> <!-- .modal-body-content --></div>

      <form id="form-editCustomer" method="post">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#company-information" aria-controls="home" role="tab" data-toggle="tab"><?php echo $this->lang->line('lang_modalbodytext_companyinfo'); ?></a></li>
          <li role="presentation"><a href="#login-information" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $this->lang->line('lang_modalbodytext_logininfo'); ?></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" data-margin="25px 0 0 0">
          <div role="tabpanel" class="tab-pane active" id="company-information">

            <div class="form-group hidden">
              <input type="hidden" name="member_id" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="customer_company"><?php echo $this->lang->line('lang_modalbodytext_companyname'); ?></label>
              <input type="text" name="customer_company" class="form-control" id="customer_company" placeholder="<?php echo $this->lang->line('lang_modalbodytext_companyinfo'); ?>">
            </div>
            <div class="form-group inline-element">
              <label for="customer_name"><?php echo $this->lang->line('lang_modalbodytext_authname'); ?></label>
              <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="<?php echo $this->lang->line('lang_sv_customer_entername'); ?>">
            </div>
            <div class="form-group inline-element">
              <label for="customer_surname"><?php echo $this->lang->line('lang_modalbodytext_authsurname'); ?></label>
              <input type="text" name="customer_surname" class="form-control" id="customer_surname" placeholder="<?php echo $this->lang->line('lang_sv_customer_entersurname'); ?>">
            </div>
            <div class="form-group inline-element">
              <label for="member_group"><?php echo $this->lang->line('lang_sv_customer_group'); ?></label><br>
              <select name="member_group">
                <?php foreach ($group_list as $k => $v) : ?>
                  <option value="<?php echo $v->group_id; ?>"><?php echo $this->lang->line('lang_'.$v->group_name); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group inline-element">
              <label for="customer_payment"><?php echo $this->lang->line('lang_sv_customer_payment'); ?></label><br>
              <select name="customer_payment">
                <option value="0"><?php echo $this->lang->line('lang_sv_customer_notpaid'); ?></option>
                <option value="2"><?php echo $this->lang->line('lang_sv_customer_pending'); ?></option>
                <option value="1"><?php echo $this->lang->line('lang_sv_customer_paid'); ?></option>
              </select>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="company_logo"><?php echo $this->lang->line('lang_modalbodytext_companylogo'); ?></label>
              <input type="file" name="company_logo" id="company_logo" style="border:2px dashed #ccc;padding:20px;background-color:#FAFAFAcolor:#D0D0D0;width:100%;" />
            </div>

            <div class="clearfix"></div>

          <!-- .tab-pane --> </div>

          <div role="tabpanel" class="tab-pane" id="login-information">

            <div class="form-group">
              <label for="customer_email"><?php echo $this->lang->line('lang_modalbodytext_emailaddress'); ?></label>
              <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="<?php echo $this->lang->line('lang_sv_customer_enteremail'); ?>">
            </div>
            <div class="form-group" data-validate="required" data-validtext="<?php echo $this->lang->line('lang_valid_emptyarea'); ?>">
              <label for="member_password"><?php echo $this->lang->line('lang_modalbodytext_password'); ?></label>
              <input type="text" name="member_password" class="form-control" id="member_password" placeholder="<?php echo $this->lang->line('lang_sv_customer_enterpassword'); ?>">
            </div>

          <!-- .tab-pane --> </div>
        <!-- .tab-content --> </div>
      </form>

      <!-- //modal-body --> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_cancel'); ?></button>
        <button type="button" class="btn btn-primary" id="editCustomer" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_save'); ?></button>
      <!-- //modal-footer --> </div>
    <!-- //modal-content --> </div>
    
  </div>
</div>