<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100%;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php echo $this->lang->line('lang_etpl_title'); ?> | Weboti</title>
	<style type="text/css">
	@font-face {
	    font-family: 'ProximaNova';
	    src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.eot');
	    src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.eot?#iefix') format('embedded-opentype'),
	         url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.woff') format('woff'),
	         url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.ttf') format('truetype'),
	         url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.svg#ProximaNova') format('svg');
	    font-weight: normal;
	    font-style: normal;

	}

	body{
		margin: 0px;
		padding: 0px;
	}

	div, p, a, li, td { -webkit-text-size-adjust:none; }

	*{
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	}

	.ReadMsgBody
	{width: 100%; background-color: #ffffff;}
	.ExternalClass
	{width: 100%; background-color: #ffffff;}
	/*body*/ #tc_central{width: 100%; height: 100%; background-color: #ffffff; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
	/*html*/ #tc_central{width: 100%; background-color: #ffffff;}

	@font-face {
	    font-family: 'proxima_novalight';src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-light-webfont.eot');src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-light-webfont.eot?#iefix') format('embedded-opentype'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-light-webfont.woff') format('woff'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-light-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;}

	@font-face {
	    font-family: 'proxima_nova_rgregular'; src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.eot');src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.eot?#iefix') format('embedded-opentype'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.woff') format('woff'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-regular-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;}

	@font-face {
	    font-family: 'proxima_novasemibold';src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-semibold-webfont.eot');src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-semibold-webfont.eot?#iefix') format('embedded-opentype'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-semibold-webfont.woff') format('woff'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-semibold-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;}
	    
	@font-face {
		font-family: 'proxima_nova_rgbold';src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-bold-webfont.eot');src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-bold-webfont.eot?#iefix') format('embedded-opentype'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-bold-webfont.woff') format('woff'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-bold-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;}
		
	@font-face {
	    font-family: 'proxima_novablack';src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-black-webfont.eot');src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-black-webfont.eot?#iefix') format('embedded-opentype'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-black-webfont.woff') format('woff'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-black-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;}
	    
	@font-face {font-family: 'proxima_novathin';src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-thin-webfont.eot');src: url('<?php echo $base_path; ?>third/assets/fonts/proximanova-thin-webfont.eot?#iefix') format('embedded-opentype'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-thin-webfont.woff') format('woff'),url('<?php echo $base_path; ?>third/assets/fonts/proximanova-thin-webfont.ttf') format('truetype');font-weight: normal;font-style: normal;}

	p {padding: 0!important; margin-top: 0!important; margin-right: 0!important; margin-bottom: 0!important; margin-left: 0!important; }

	.hover:hover {opacity:0.85;filter:alpha(opacity=85);}

	.image77 img {width: 77px; height: auto;}
	.avatar125 img {width: 125px; height: auto;}
	.icon61 img {width: 61px; height: auto;}
	.logo img {width: 75px; height: auto;}
	.icon18 img {width: 18px; height: auto;}
	</style>
</head>
<body style="margin: 0; padding: 0; height: 100%;">

<!-- Notification 2  -->
<table width="100%" height="100%" style="background-repeat: repeat; background-image: url(<?php echo $base_path; ?>third/assets/images/email/not5_bg_image.jpg);">
<tr>
	<td>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" object="drag-module" c-style="bgColor">
			<tr>
				<td align="center">
					
				<!-- Mobile Wrapper -->
				<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" c-style="bgColor">
					<tr>
						<td width="100%" align="center">
						
							
							<div class="sortable_inner">
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small" c-style="bgColor">
								<tr>
									<td align="center" width="352" valign="middle" c-style="bgColor">
									
										<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter" c-style="bgColor">
											<tr>
												<td width="100%" height="30"></td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small" c-style="bgColor">
								<tr>
									<td align="center" width="352" valign="middle">
									
										<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td width="100%" height="50"></td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
							
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small">
								<tr>
									<td align="center" width="352" valign="middle">
										
										<!-- Header Text --> 
										<table width="300" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td valign="middle" width="100%" style="text-align: center; font-family: Helvetica, Arial, sans-serif; font-size: 22px; color: #fff; line-height: 32px; font-weight: 100;" t-style="whiteTextTop" class="fullCenter" mc:edit="9" object="text-editable">
													<multiline><img src="<?php echo $base_path; ?>third/assets/images/s-logo.png"></multiline>
												</td>
											</tr>
										</table>							
									</td>
								</tr>
							</table>
							
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small">
								<tr>
									<td align="center" width="352" valign="middle">
									
										<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td width="100%" height="50"></td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
							
							</div>
						</td>
					</tr>
				</table>
				
				<table width="392" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
					<tr>
						<td align="center" width="20" valign="middle" c-style="bgColor"></td>
						<td align="center" width="352" valign="middle">
				
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="full" style="border-top-right-radius: 5px; border-top-left-radius: 5px;">
								<tr>
									<td align="center" width="352" valign="middle" bgcolor="#22a7f0" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; border: 1px solid #aaa">
									
										<div class="sortable_inner">
							
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" style="-webkit-border-top-right-radius: 5px; -moz-border-top-right-radius: 5px; border-top-right-radius: 5px; -webkit-border-top-left-radius: 5px; -moz-border-top-left-radius: 5px; border-top-left-radius: 5px;" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
													
													<table width="300" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														<tr>
															<td width="100%" height="50"></td>
														</tr>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle" class="image77">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														<tr>
															<td width="100%" align="center" style="text-align: center;"><span object="image-editable"><img editable="true" src="<?php echo $base_path; ?>third/assets/images/email/image_77px_not2.png" width="77" alt="" border="0" mc:edit="10"></span></td>
														</tr>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														
														<tr>
															<td width="100%" height="50"></td>
														</tr>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														
														<tr>
															<td valign="middle" width="100%" style="text-align: center; font-family: Helvetica, Arial, sans-serif; font-size: 38px; color: #ffffff; line-height: 44px; font-weight: bold;" t-style="whiteTextBody" class="fullCenter" mc:edit="11" object="text-editable">
																<span style="font-family: 'proxima_nova_rgbold', Helvetica; font-weight: normal;"><singleline><?php echo $this->lang->line('lang_etpl_fpass_greeting').' '.$user_name; ?></singleline></span>
															</td>
														</tr>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														
														<tr>
															<td width="100%" height="30"></td>
														</tr>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														<tr>
															<td valign="middle" width="100%" style="text-align: justify; font-family: Helvetica, Arial, sans-serif; font-size: 15px; color: #ffffff; line-height: 24px;" t-style="whiteTextBody" class="fullCenter" mc:edit="12" object="text-editable">
																<span style="font-family: 'proxima_nova_rgregular', Helvetica; font-weight: normal;"><singleline><?php echo $this->lang->line('lang_etpl_fpass_body'); ?></singleline></span>
															</td>
														</tr>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														<tr>
															<td width="100%" height="40"></td>
														</tr>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle" align="center">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														<!----------------- Button Center ------------------>
														<tr>
															<td align="center">
																<table border="0" cellpadding="0" cellspacing="0" align="center"> 
																	<tr> 
																		<td align="center" height="45" c-style="buttonBG" bgcolor="#ffffff" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; padding-left: 30px; padding-right: 30px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: #2a2a2a; text-transform: uppercase;" t-style="buttonText" mc:edit="13">
																			<multiline><span style="font-family: 'proxima_nova_rgbold', Helvetica; font-weight: bold;">
																				<a href="<?php echo route('forgotpwd/newpwd/'.$this->encrypt->encode($user_id)); ?>" style="color: #2a2a2a; font-size:15px; text-decoration: none; line-height:34px; width:100%;"><?php echo $this->lang->line('lang_etpl_fpass_changepassword'); ?></a>
																			</span></multiline>
																		</td> 
																	</tr> 
																</table> 
															</td>
														</tr>
														<!----------------- End Button Center ------------------>
													</table>							
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														<tr>
															<td width="100%" height="35"></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e85140" c-style="redBG" style="-webkit-border-bottom-left-radius: 5px; -moz-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px; -moz-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px;" object="drag-module-small">
											<tr>
												<td align="center" width="352" valign="middle">
												
													<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
														<tr>
															<td width="100%" height="50"></td>
														</tr>
													</table>
																					
												</td>
											</tr>
										</table>
										
										</div>
										
									</td>
								</tr>
							</table>
							
						</td>
						<td align="center" width="20" valign="middle" c-style="bgColor"></td>
					</tr>
				</table>
				
				<!-- Mobile Wrapper -->
				<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" c-style="bgColor">
					<tr>
						<td width="100%" align="center" c-style="bgColor">
							
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small">
								<tr>
									<td align="center" width="352" valign="middle">
									
										<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td width="100%" height="30" style="text-align: center; font-family: Helvetica, Arial, sans-serif; font-size: 10px; color: #e85140; line-height: 24px;">
													<p><span style="font-family: 'proxima_nova_rgregular', Helvetica;"><?php echo $this->lang->line('lang_etpl_fpass_noreply'); ?></span></p>
													<p><span style="font-family: 'proxima_nova_rgregular', Helvetica;"><?php echo $this->lang->line('lang_etpl_fpass_notview'); ?> <a href="<?php echo route('newsletter/'.$this->encrypt->encode('forgotpassword').'/'.$this->encrypt->encode($user_id)); ?>" style="color: #e85140; text-decoration: underline;"><?php echo $this->lang->line('lang_etpl_fpass_click'); ?></a>.</span></p>
												</td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small">
								<tr>
									<td align="center" width="352" valign="middle">
									
										<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td width="100%" height="30"></td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small">
								<tr>
									<td align="center" width="352" valign="middle">
									
										<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td width="100%" height="30"></td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small">
								<tr>
									<td align="center" width="352" valign="middle">
									
										<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td width="100%" style="text-align: center; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #e85140; line-height: 24px;" t-style="unsub1" class="fullCenter" mc:edit="14_242"><span style="font-family: 'proxima_nova_rgregular', Helvetica;"><!--subscribe-->&copy;<?php echo date('Y'); ?>. <a href="<?php echo base_url(); ?>" style="color: #e85140; text-decoration: underline;" t-style="unsub1" object="link-editable">Weboti</a><!--unsub--></span>
												</td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
							<table width="352" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" object="drag-module-small">
								<tr>
									<td align="center" width="352" valign="middle">
									
										<table width="265" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
											<tr>
												<td width="100%" height="50"></td>
											</tr>
											<tr>
												<td width="100%" height="1" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
											</tr>
										</table>
																		
									</td>
								</tr>
							</table>
				
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table><!-- End Notification 2 -->
	</td>
</tr>
</table>

</body>
</html>
