<?php if ($member_group == 2): ?>
	<div class="dashboard-boxes">
		<div class="col-md-4 col-lg-4 dashboard-box" data-bgcolor="#EE4749" data-font-color="#fff">
			<div class="livicon" data-n="doc-landscape" data-c="#fff" data-hc="#fff" data-s="48" data-padding="25px"> <span>56 Makale</div>
		<!-- //box-1 --> </div>
		<div class="col-md-4 col-lg-4 dashboard-box" data-bgcolor="#FFB234" data-font-color="#fff">
			<div class="livicon" data-n="shopping-cart" data-c="#fff" data-hc="#fff" data-s="48" data-padding="25px"> <span>11 Sipariş</span></div>
		<!-- //box-2 --> </div>
		<div class="col-md-4 col-lg-4 dashboard-box" data-bgcolor="#00A651" data-font-color="#fff">
			<div class="livicon" data-n="money" data-c="#fff" data-hc="#fff" data-s="48" data-padding="25px"> <span>67₺ Nakit</span></div>
		<!-- //box-3 --> </div>
	</div>
<?php endif ?>

<div class="col-md-12 profile-overview" data-padding="0" data-margin="0 0 5em 0">
	<div class="profile-container">
	    <div class="profile-header row" data-padding="0" data-margin="0">
	        <div class="col-md-4 col-sm-12 text-center">
	            <a href="#"><img src="<?php echo _gravatar( $member_email, 100 ); ?>" alt="" class="header-avatar animated flipInX"></a>
	        </div>
	        <div class="col-md-8 col-sm-12 profile-info">
	            <div class="header-fullname">Burası senin, <?php echo $member_name; ?>!</div>
	            <a href="javascript:void(0);" class="btn btn-palegreen btn-sm  btn-follow">
	                <i class="fa fa-check"></i>
	                Onaylı
	            </a>
	            <div class="header-information">
	                Profilinle ilgili detayları görebilir, yönetebilir ve geçmiş hareketlerini takip edebilirsin.
	            </div>
	        </div>
	        <div class="col-md-12 col-sm-12 col-xs-12 profile-stats">
	            <div class="row">
	                <div class="col-md-4 col-sm-4 col-xs-12 stats-col animated pulse showAllMySites" style="cursor:pointer" data-toggle="tooltip" data-placement="top" title="Tümünü görmek için tıklayın.">
	                    <div class="stats-value pink">2</div>
	                    <div class="stats-title">WEBSİTE KAYITLI</div>
	                </div>
	                <div class="col-md-4 col-sm-4 col-xs-12 stats-col animated pulse" style="cursor:help" data-toggle="tooltip" data-placement="top" title="Toplam bot ve özgün içerik sayısı.">
	                    <div class="stats-value pink">803</div>
	                    <div class="stats-title">İÇERİK EKLENDİ</div>
	                </div>
	                <div class="col-md-4 col-sm-4 col-xs-12 stats-col animated pulse" style="cursor:help" data-toggle="tooltip" data-placement="top" title="Kasada bekleyen toplam kazanç.">
	                    <div class="stats-value pink">28₺</div>
	                    <div class="stats-title">TOPLAM KAZANÇ</div>
	                </div>
	            </div>
	            <div class="otherMySites">
	            	<div class="row">
		                <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" data-padding="2em 0">
		                    <i class="fa fa-globe"></i> guncelicerikler.com
		                </div>
		                <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" data-padding="2em 0">
		                    Paket: <strong>Ultimate</strong>
		                </div>
		                <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" data-padding="2em 0">
		                    Kalan: <strong>24 gün</strong>
		                </div>
		            </div>
		            <div class="row hidden hideAllMySites">
		                <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" data-padding="2em 0">
		                    <i class="fa fa-globe"></i> kiloveriyor.us
		                </div>
		                <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" data-padding="2em 0">
		                    Paket: <strong>Ücretsiz</strong>
		                </div>
		                <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" data-padding="2em 0">
		                    Kalan: <strong>99 gün</strong>
		                </div>
		            </div>
	            </div>
	        </div>
	    </div>   
	</div>
<!-- .profile-overview --> </div>