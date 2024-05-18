<?php
$expDateTime = explode(' ', $news_date);
$expDate = explode('-', $expDateTime[0]);

$dateStr = '<em class="pull-right" style="color:#bbb"><strong>'.$expDate[2].' '.convert_month($expDate[1]).' '.$expDate[1].'</strong> tarihinde yayınlanmıştır.</em>';
?>

<h2 style="font-size: 18px; font-weight:bold;"><?php echo $news_title; ?></h2>
<p>&nbsp;</p>
<p style="line-height:1.4em;"><?php echo $news_description; ?></p>
<p>&nbsp;</p>
<p><?php echo $dateStr; ?></p>
<p>&nbsp;</p>