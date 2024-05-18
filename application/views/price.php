<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-push-2 right-column"> 

            <!-- PRICING TABLE STYLE 1-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center" data-margin="1.5em 0">
                        <h1 class="page-title"><?php echo page_title(1); ?></h1>
                        <p class="lead"><?php echo page_title(1,true); ?></p>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">        
                        <div class="price_table_container">
                            <div class="price_table_heading">Standart</div>
                            <div class="price_table_body">
                                <div class="price_table_row cost warning-bg"><strong>₺ 19</strong><span>/AY</span></div>
                                <div class="price_table_row"><strong>1</strong> Website</div>
                                <div class="price_table_row"><strike>Tüm Botlara Erişim</strike></div>
                                <div class="price_table_row"><strike>Kendi Botunu Hazırla</strike></div>
                                <div class="price_table_row"><strike>SEO Yardımcısı</strike></div>
                                <div class="price_table_row">10 Email Addresses</div>
                                <div class="price_table_row">Free Backup</div>
                                <div class="price_table_row">Tam Zamanlı Destek</div> 
                                <div class="price_table_row"><strike>Telefon Desteği</strike></div>
                            </div>
                            <a href="#" class="btn btn-warning btn-lg btn-block">Satın Al</a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">
                        <div class="price_table_container">
                            <div class="price_table_heading">Webmaster</div>
                            <div class="price_table_body">
                                <div class="price_table_row cost primary-bg"><strong>₺ 29</strong><span>/AY</span></div>
                                <div class="price_table_row"><strong>5</strong> Website</div>
                                <div class="price_table_row">Tüm Botlara Erişim</div>
                                <div class="price_table_row"><strike>Kendi Botunu Hazırla</strike></div>
                                <div class="price_table_row"><strike>SEO Yardımcısı</strike></div>
                                <div class="price_table_row">100 GB Bandwidth</div>
                                <div class="price_table_row">50 Email Addresses</div>
                                <div class="price_table_row">Tam Zamanlı Destek</div> 
                                <div class="price_table_row"><strike>Telefon Desteği</strike></div>                                              
                            </div>
                            <a href="#" class="btn btn-primary btn-lg btn-block">Satın Al</a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">
                        <div class="recommended"><i class="fa fa-check"></i> <strong>TAVSİYE EDİLEN</strong></div>
                        <div class="price_table_container">
                            <div class="price_table_heading">Editör</div>
                            <div class="price_table_body">
                                <div class="price_table_row cost success-bg"><strong>₺ 39</strong><span>/AY</span></div>
                                <div class="price_table_row"><strong>10</strong> Website</div>
                                <div class="price_table_row">Tüm Botlara Erişim</div>
                                <div class="price_table_row"><strike>Kendi Botunu Hazırla</strike></div>
                                <div class="price_table_row"><strike>SEO Yardımcısı</strike></div>
                                <div class="price_table_row">1 TB Bandwidth</div>
                                <div class="price_table_row">100 Email Addresses</div>
                                <div class="price_table_row">Tam Zamanlı Destek</div> 
                                <div class="price_table_row">Telefon Desteği</div>                                                   
                            </div>
                            <a href="#" class="btn btn-success btn-lg btn-block">Satın Al</a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">        
                        <div class="price_table_container">
                            <div class="price_table_heading">Master</div>
                            <div class="price_table_body">
                                <div class="price_table_row cost info-bg"><strong>₺ 60</strong><span>/AY</span></div>
                                <div class="price_table_row"><strong>Limitsiz</strong> Website</div>
                                <div class="price_table_row">Tüm Botlara Erişim</div>
                                <div class="price_table_row">Kendi Botunu Hazırla</div>
                                <div class="price_table_row"><strike>SEO Yardımcısı</strike></div>
                                <div class="price_table_row">10 TB Storage</div>
                                <div class="price_table_row">100 TB Bandwidth</div>
                                <div class="price_table_row">1000 Email Addresses</div>
                                <div class="price_table_row">Tam Zamanlı Destek</div> 
                                <div class="price_table_row">Telefon Desteği</div>                                               
                            </div>
                            <a href="#" class="btn btn-info btn-lg btn-block">Satın Al</a>
                        </div>
                    </div>

                    <div class="clearfix" data-margin="4em 0"></div>
                    
                    <div class="col-md-3">
                         <div class="panel panel-default panel-ssl">
                            <div class="panel-body text-center">
                                <img src="<?php echo get_asset('img', 'support.png'); ?>" alt="SSL">
                                <p><strong>7/24 DESTEK</strong></p>
                                <p><small>Lisansınızı yükseltin ve telefonla anlık destek hizmetine sahip olun. </small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-default panel-ssl">
                            <div class="panel-body text-center">
                                <img src="<?php echo get_asset('img', 'ssl.png'); ?>" alt="SSL">
                                <p><strong>SSL GÜVENLİ ÖDEME</strong></p>
                                <p><small>Bilgileriniz 256-bit SSL şifreleme ile korunmaktadır</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <strong>ÖDEME YÖNTEMLERİ</strong>
                                
                                <div data-margin="2.2em 0 1em 0">
                                    <img src="<?php echo get_asset('img', 'paypal.png'); ?>" alt="Paypal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Paypal Online Ödeme">
                                    <img src="<?php echo get_asset('img', 'is_bankasi.jpg'); ?>" alt="Credit Card" data-margin="0 1em" data-toggle="tooltip" data-placement="top" title="" data-original-title="İş Bankası Havale">
                                </div>
                            </div>
                            <div class="panel-footer">Yukarıdaki yöntemler aracılığıyla ödeme yapabilirsiniz.</div>
                        </div>
                    </div>

                    <div class="clearfix" data-margin="4em 0"></div>

                    <div class="col-md-6">
                        <div class="sss">
                            <h2 data-font-weight="bold" data-margin="0 0 .4em 0">Lisans paketi nedir?</h2>
                            <p>İçerisinde sizin ihtiyaçlarınıza uygun birçok özelliği barındıran ve sistemi tüm fonksiyonlarıyla kullanabilmek için gerekli paketlerdir.</p>
                        </div>

                        <div class="sss">
                            <h2 data-font-weight="bold" data-margin="0 0 .4em 0">Lisans paketi nedir?</h2>
                            <p>İçerisinde sizin ihtiyaçlarınıza uygun birçok özelliği barındıran ve sistemi tüm fonksiyonlarıyla kullanabilmek için gerekli paketlerdir.</p>
                        </div>
                    </div>
                        
                    <div class="col-md-6">
                        <div class="sss">
                            <h2 data-font-weight="bold" data-margin="0 0 .4em 0">Avantajları nelerdir?</h2>
                            <p>Her paketin kendine ait özellikleri vardır. Bu yüzden seçeceğiniz paketteki birçok ayrıcalıklı özelliklerden faydalanarak işinizi kolaylaştırabilir yada hızlandırabilirsiniz.</p>
                        </div>
                        <div class="sss">
                            <h2 data-font-weight="bold" data-margin="0 0 .4em 0">Lisans paketi nedir?</h2>
                            <p>İçerisinde sizin ihtiyaçlarınıza uygun birçok özelliği barındıran ve sistemi tüm fonksiyonlarıyla kullanabilmek için gerekli paketlerdir.</p>
                        </div>
                    </div>

                    <div class="col-md-12" style="padding:2em 0 0 0;margin:2em 0;border-top: 1px solid #eee;color: #ccc;">
                        &copy;<?php echo date('Y'); ?> - bototi.com
                    </div>
                </div>
            </div>
            <!-- PRICING TABLE STYLE 1-->
        
        <!-- .right-column --> </div>
        <div class="col-md-2 col-lg-pull-10 left-column">

            <?php $this->load->view('layout/sidebar.php'); ?>

        <!-- layout: left-column --> </div>
    </div>
</div>

<?php $this->load->view('layout/footer.php');
/* End of file dashboard.php */
/* Location: ./application/views/dashboard.php */ ?>