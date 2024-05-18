<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Default timezone
date_default_timezone_set('Europe/Istanbul');

if (!function_exists('get_third'))
{
	function get_third($dir, $file)
	{
		return base_url().'third/'.$dir.'/'.$file;
	}
}

if (!function_exists('get_asset'))
{
	function get_asset($type, $file)
	{
		switch ($type) {
			case 'css':
				return base_url().'third/assets/css/'.$file;
				break;
			
			case 'js':
				return base_url().'third/assets/js/'.$file;
				break;
				
			case 'img':
				return base_url().'third/assets/images/'.$file;
				break;
		}
	}
}

if (!function_exists('route'))
{
    function route($url, $target = null)
    {
        if (!empty($target)) {
            return base_url() . $url;
        }else{
            return base_url() . $target=$url;
        }
    }   
}

if (!function_exists('form_valid'))
{
    function form_valid($validation_errors, $class=null)
    {
        if ($validation_errors == true) {
            if (!empty($class)) {
                return $class;
            }else{
                return 'has-error';
            }
        }
    }   
}

if (!function_exists('showhide'))
{
    function showhide($var)
    {
        if ($var == true)
        {
            return 'show';
        }
        else
        {
            return 'hidden';
        }
    }   
}

if (!function_exists('combine_valid_message'))
{
    function combine_valid_message($types=array())
    {
        foreach ($types as $value) {
        	if (form_error($value)) {
	        	return strip_tags(form_error($value));
	        }
        }
    }   
}

if (!function_exists('random_keywords'))
{
    function random_keywords($num)
    {
        $char="abcdefghijklmnoprstuwvyzqxABCDEFGHIJKLMNOPRSTUVWYZQX1234567890"; //Char list

        $s=null;
        for ($k=1;$k<=$num;$k++) { 
            $h=substr($char,mt_rand(0,strlen($char)-1),1); 
            $s.=$h; 
        }

        return $s;
    }   
}

if (!function_exists('send_email'))
{
    function send_email($param=array())
    {
        $config = array(
            'mailtype'  =>  'html',
            'charset'  =>  'utf-8',
            'protocol'  =>  'smtp',
            'smtp_host' =>  'mail.weboti.com',
            'smtp_user' =>  'no-reply@weboti.com',
            'smtp_pass' =>  'web123321mail',
            'smtp_port' =>  587
        );

        //instance mail class
        $ci=& get_instance();
        $ci->load->library('email');

        $ci->email->initialize($config);
        $ci->email->set_newline("\r\n");
        $ci->email->to($param['to']);
        $ci->email->from($param['from'][0], $param['from'][1]);
        $ci->email->subject($param['subject']);
        $ci->email->message($param['message']);
        if($ci->email->send())
        {
            return _log('E-Posta Gönderim Hatası', 'Successfully send to email.');
        }
        else
        {
            return _log('E-Posta Gönderim Hatası', $ci->email->print_debugger());  
        }
    }   
}

if (!function_exists('_log'))
{
    /**
     * Customize log function
     *
     * 1 - Fatal Error
     * 2 - Warning
     * 3 - Information
     * 4 - Success
     * 
     * @param  int $priority
     * @param  string $title   
     * @param  string $log    
     *   
     * @return string           
     */
    function _log($title, $log)
    {

        $log_date = "%Y-%m-%d - %H:%i %a";
        $log_path = APPPATH.'logs/';
        $log_ext = '.oti';

        $log_body =  '['.mdate($log_date, time()).']'.' => '.$title.' => '.$log;

        if (!empty($log)) {
            return file_put_contents($log_path.date('d-m-Y').$log_ext, $log_body);
        }else{
            return false;
        }
    }   
}

if (!function_exists('_weboti'))
{
    function _weboti()
    {
        $json = file_get_contents("weboti.json");
        $data = json_decode($json);

        echo $data->custom_log;
    }   
}

if (!function_exists('_datediff'))
{
    function _datediff($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hrs ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yesterday";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }
}

if (!function_exists('imgcrop'))
{

    function imgcrop($w, $h, $image, $ratio=true)
    {
        $ci=& get_instance();
        $ci->load->library('image_lib');

        $image_thumb = dirname('third/uploads/'.$image).'/cropped/'.substr(sha1(md5($image)),0,10).'_'.$w.'x'.$h.'_thumb.jpg';

        //Image resize to config parameters
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'third/uploads/'.$image;
        $config['new_image'] = $image_thumb;
        $config['maintain_ratio'] = $ratio;
        $config['width'] = $w;
        $config['height'] = $h;

        $ci->image_lib->clear();
        $ci->image_lib->initialize($config);

        if ( !$ci->image_lib->resize() )
        {
            return $ci->image_lib->display_errors();
        }
        else
        {
            $returned = $ci->image_lib->resize();
            $returned = $config['new_image'];

            return $returned;
        }
    }   
}

if(!function_exists('generate_breadcrumb'))
{
    function generate_breadcrumb($data=null, $segment=1)
    {
        $ci = &get_instance();
        $i=$segment;
        $uri = $ci->uri->segment($i);

        $ci->load->library('image_lib');

        $returned = null;
        while($uri != '')
        {
            $prep_link = '';
            for($j=1; $j<=$i;$j++)
            {
                $prep_link .= $ci->uri->segment($j).'/';
            }

            if($ci->uri->segment($i+1) == '')
            {
                if ( empty($data) )
                {
                    $returned.='<li class="active">';
                    $returned.=ucfirst($ci->lang->line('lang_bc_'.$ci->uri->segment($i))).'</li> ';
                }
                else
                {
                    $returned.='<li class="active">';
                    $returned.=ucfirst($data).'</li> ';
                }
            }
            else
            {
                if ( is_numeric($ci->encrypt->decode($ci->uri->segment($i))) )
                {
                    $returned.='<li><a href="javascript:void(0);" id="tip_faqlist">';
                    $returned.=ucfirst( $ci->model_site->get_faq_single_cat($ci->encrypt->decode($ci->uri->segment($i))) ).'</a></li> ';
                }
                else
                {
                    $returned.='<li><a href="'.route($prep_link).'">';
                    $returned.=ucfirst($ci->lang->line('lang_bc_'.$ci->uri->segment($i))).'</a></li> ';
                }
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }

            return $returned;
    }
}

if(!function_exists('page_title'))
{
    function page_title($s, $subtitle=false)
    {
        $ci = &get_instance();

        if ($subtitle == false)
        {
            return ucfirst($ci->lang->line('lang_pt_'.$ci->uri->segment($s))).'</li>';
        }
        else
        {
            return $ci->lang->line('lang_pst_'.$ci->uri->segment($s)).'</li>';
        }
    }
}

if(!function_exists('_is_page'))
{
    function _is_page($page, $segment=1)
    {   
        $ci = &get_instance();

        if ($ci->uri->segment($segment) == $page)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('str_size'))
{
    /**
     * Change the data size
     *
     * @return string
     */
    function str_size($byte) {
        if($byte < 1024) {
            return "$bytes byte"; //Byte type
        }else{
            $kb = $byte / 1024;
            if ($kb < 1024){
                return sprintf("%01.2f", $kb)." KB"; //Byte to "KB"
            }else{
                $mb = $kb / 1024;
                if($mb < 1024){
                    return sprintf("%01.2f", $mb)." MB"; //Byte to "MB"
                }else{
                    $gb = $mb / 1024;
                    return sprintf("%01.2f", $gb)." GB"; //Byte to "GB"
                }
            }
        }
    }
}

if(!function_exists('convert_month'))
{
    function convert_month($m)
    {
        $ci = &get_instance();
        
        return $ci->lang->line('lang_month_'.$m);
    }
}

if(!function_exists('convertdate'))
{
    function convertdate($datetime, $type=null, $format=null)
    {
        $exp = explode(' ', $datetime);
        $expDate = explode('-', $exp[0]);

        switch ($type) {
            case 'date':

                $find = array('d', 'm', 'M', 'F', 'Y');
                $replace = array($expDate[2], $expDate[1], substr(convert_month((integer) $expDate[1]),0,3), convert_month((integer) $expDate[1]), $expDate[0]);

                return str_replace($find, $replace, $format);
                
                break;

            case 'time':
                return $exp[1];
                break;

            case 'datetime':
                
                $find = array('d', 'm', 'M', 'F', 'Y');
                $replace = array($expDate[2], $expDate[1], substr(convert_month((integer) $expDate[1]),0,3), convert_month((integer) $expDate[1]), $expDate[0]);

                return str_replace($find, $replace, $format) .'&nbsp;'. $exp[1];

                break;
            
            default:
                 return $exp[0];
                break;
        }
    }
}

if(!function_exists('generate_label'))
{
    function generate_label($n)
    {
        $label = null;
        switch ($n) {
             case 0:
               $label = 'danger';
               break;

            case 1:
               $label = 'success';
               break;

            case 2:
               $label = 'warning';
               break;

            case 3:
               $label = 'danger';
               break;
           
            default:
               $label = 'info';
               break;
        }

        return $label;
    }
}

if(!function_exists('_check_priority'))
{
    function _check_priority($p)
    {
        $ci = &get_instance();
        $msg = null;

        switch ($p) {
             case 1:
               $msg = $ci->lang->line('lang_low');
               break;

            case 2:
               $msg = $ci->lang->line('lang_medium');
               break;

            case 3:
               $msg = $ci->lang->line('lang_emergency');
               break;
        }

        return $msg;
    }
}

if(!function_exists('_check_status'))
{
    function _check_status($s)
    {
        $ci = &get_instance();
        $msg = null;

        switch ($s) {
             case 0:
               $msg = $ci->lang->line('lang_closed');
               break;

            case 1:
               $msg = $ci->lang->line('lang_open');
               break;
        }

        return $msg;
    }
}

if (!function_exists('notify'))
{
    function notify($func=array(), $param=array())
    {   
        $returned = false;

        if ( call_user_func($func[0]['func']) )
        {
            $var = isset($param['var']) ? '_'.$param['var'] : null;
            $pos = isset($param['pos']) ? $param['pos'] : 'bottomRight';
            $close = isset($param['close']) ? $param['close'] : 'click';
            $speed = isset($param['speed']) ? $param['speed'] : '500';
            $in = isset($param['in']) ? $param['in'] : 'bounceInRight';
            $out = isset($param['out']) ? $param['out'] : 'bounceOutRight';

            $generate = null;
            $script = '
            <script type="text/javascript">
                var notification_html'.$var.' = [];';

                for ($i=0;$i<count($func);$i++)
                {
                    $script .= 'notification_html'.$var.'['.$i.'] = \''.addslashes(call_user_func($func[$i]['func'])).'\';'."\n";
                    $generate .= 'generate'.$var.'(\''.$func[$i]['type'].'\', notification_html'.$var.'['.$i.']);'."\n";
                }

                $script .= '
                function generate'.$var.'(type, text) {

                    var n'.$var.' = noty({
                        text        : text,
                        type        : type,
                        dismissQueue: true,
                        layout      : \''.$pos.'\',
                        closeWith   : [\''.$close.'\'],
                        theme       : \'relax\',
                        maxVisible  : 10,
                        animation   : {
                            open  : \'animated '.$in.'\',
                            close : \'animated '.$out.'\',
                            easing: \'swing\',
                            speed : '.$speed.'
                        }
                    });
                }

                function generateAll'.$var.'() {
                    '.$generate.'
                }

                $(document).ready(function () {

                    setTimeout(function() {
                        generateAll'.$var.'();
                    }, 500);

                });

            </script>';

            $returned = $script;
        }
        else
        {
            $returned = false;
        }

        return $returned;
    }
}

if (!function_exists('parse_uri'))
{
    function parse_uri($url, $i=false)
    {
        $url = parse_url($url);
        
        return $url['host'];
    }
}

if (!function_exists('_gravatar'))
{
    function _gravatar($email,$size)
    {   
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=mm&s=" . $size . "&r=x";
    }
}

if ( ! function_exists('_remote_file_exists') )
{
    function _remote_file_exists($url)
    {
        $curl = curl_init($url);

        //don't fetch the actual page, you only want to check the connection is ok
        curl_setopt($curl, CURLOPT_NOBODY, true);

        //do request
        $result = curl_exec($curl);

        $ret = false;

        //if request did not fail
        if ($result !== false) {
            //if request was ok, check response code
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  

            if ($statusCode == 200) {
                $ret = true;   
            }
        }

        curl_close($curl);

        return $ret;
    }
}

if ( ! function_exists('_check_remote_client') )
{
    function _check_remote_client($url, $siteID=NULL, $clientFile=NULL, $bool=FALSE)
    {
        $exists = _remote_file_exists(rtrim($url, '/') . '/'.$clientFile);

        if ($exists)
        { 
            $returned = ($bool==FALSE) ? '<span class="label label-success">BAĞLANTI SAĞLANDI</span>' : TRUE;
        }
        else
        { 
            $returned = ($bool==FALSE) ? '<span class="label label-danger" style="cursor:pointer" tabindex="0" data-placement="left" data-toggle="popover" data-trigger="focus" title="Bağlantı sağlanamadı" data-content="Websitenizin ana dizininde gerekli bağlantı dosyası bulunamadı.">BAĞLANAMIYOR</span><a href="'.$url.'" data-site-id="'.$siteID.'" class="label label-danger refreshConnection"><i class="fa fa-refresh"></i></a>' : FALSE;
        }

        if ($bool==FALSE) 
            echo $returned;
        else
            return $returned;
    }
}

if ( ! function_exists('premium_boundary') )
{
    function premium_boundary(array $condition, array $return)
    {
        if ($condition[0] >= $condition[1])
        { 
            $returned = $return['limited'];
        }
        else
        { 
            $returned = $return['unlimited'];
        }

        return $returned;
    }
}

if ( ! function_exists('_encrypted') )
{
    function _encrypted($string, $key)
    {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
    }
}

if ( ! function_exists('_decrypted') )
{
    function _decrypted($encrypted, $key)
    {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    }
}

if ( ! function_exists('_check_premium_expire_date') )
{
    function _check_premium_expire_date($date)
    {
        if (strtotime($date) >= strtotime(date('Y-m-d H:i:s')))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if ( ! function_exists('_date_diff') )
{
    function _date_diff($date1, $date2)
    {
        $diff = abs( strtotime( $date1 ) - strtotime( $date2 ) );

        //Differents
        $diffDay = intval( $diff / 86400 );
        $diffHour = intval( ( $diff % 86400 ) / 3600);
        $diffMin = intval( ( $diff / 60 ) % 60 );
        $diffSec = intval( $diff % 60 );

        if ( _check_premium_expire_date($date1) )
        {
            $returned = sprintf("%d Gün, %d Saat", $diffDay, $diffHour, $diffMin, $diffSec);
        }

        return $returned;
    }
}

if( ! function_exists('_check_type'))
{
    function _check_type($p, $l=false)
    {
        $ci = &get_instance();
        $msg = null;

        switch ($p) {
             case 1:
               $msg = $ci->lang->line('lang_important');
               $label = 'danger';
               break;

            case 2:
               $msg = $ci->lang->line('lang_warning');
               $label = 'warning';
               break;

            case 3:
               $msg = $ci->lang->line('lang_reminding');
               $label = 'info';
               break;
        }

        return ($l==false) ? $msg : $label;
    }
}

if( ! function_exists('get_remote_site_data'))
{
    function get_remote_site_data($clientURL, $siteID=null, $data, $subdata=null)
    {
        //Connect to json file
        $jsonData = _check_remote_client($clientURL, $siteID, 'bototi-data.json', TRUE) ? file_get_contents($clientURL . '/bototi-data.json') : null;

        //Decrypted json data
        $jsonDecode = json_decode(_decrypted($jsonData, $clientURL), TRUE);
        return ($subdata==false) ? $jsonDecode[$data] : $jsonDecode[$data][$subdata];
    }
}

if( ! function_exists('_check_switch'))
{
    function _check_switch($value)
    {
        return ($value != '') && ($value == 'on') ? 'checked' : null;
    }
}

if( ! function_exists('get_option'))
{
    function get_option($name)
    {
        // Get a reference to the controller object
        $ci = &get_instance();

        // You may need to load the model if it hasn't been pre-loaded
        $ci->load->model('model_site');

        return $ci->model_site->get_option($name);
    }
}

if( ! function_exists('get_option_by_group'))
{
    function get_option_by_group($groupname)
    {
        // Get a reference to the controller object
        $ci = &get_instance();

        // You may need to load the model if it hasn't been pre-loaded
        $ci->load->model('model_site');

        return $ci->model_site->get_option_by_group($groupname);
    }
}

if ( ! function_exists('json_encode_tr') )
{
    function json_encode_tr($data)
    {
        $find = array("\\u00fc","\\u011f","\\u0131","\\u015f","\\u00e7","\\u00f6","\\u00dc","\\u011e","\\u0130","\\u015e","\\u00c7","\\u00d6");
        $replace = array("ü","ğ","ı","ş","ç","ö","Ü","Ğ","İ","Ş","Ç","Ö");

        return str_replace($find, $replace, json_encode($data));
    }
}

if ( ! function_exists('compare_option') )
{
    function compare_option($option, $value)
    {
        if (get_option($option) == $value)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if ( ! function_exists('all_user_sites ') )
{
    function all_user_sites($i, $s=null, $e=null, $d=null)
    {   
        //Logged in userdata
		$ci = &get_instance();
		$userdata = $ci->session->userdata('logged_in');

		// You may need to load the model if it hasn' been pre-loaded,
		$ci->load->model('model_site');

        //Assign to page data
        $site_limit = $ci->model_site->get_premium_feature($userdata['premium'], 'website_limit');

        $returned = null;
        foreach ($ci->model_site->get_website_list($userdata['id'], $site_limit) as $key => $value) 
        {
        	if (get_option('_def_website') == $value->$i)
            {
                $returned .= $d . $value->$i . $e;
            }
            else
            {
                $returned .= $s . $value->$i . $e;
            }
        }

        return $returned;
    }
}

if( ! function_exists('allow_https') )
{
    function allow_https($a=1)
    {
        if ($_SERVER['SERVER_PORT'] == '443' && $a==0)
        {
            $url = "http://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            header("Location: $url");
            exit;
        }
        elseif ($_SERVER['SERVER_PORT'] != '443' && $a==1)
        {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            header("Location: $url");
            exit;
        }
    }
}