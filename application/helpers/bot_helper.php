<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Tüm içerikteki boşlukları temizle/birleştir.
 * 
 * @param  string $buffer Boşluklar temizlenecek içerik.
 * @return string Boşluklar temizlenmiş içerik
 */
if ( ! function_exists('sanitize_output'))
{
    function sanitize_output($buffer) {
     
        $search = array(
            '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
            '/[^\S ]+\</s',  // strip whitespaces before tags, except space
            '/(\s)+/s'       // shorten multiple whitespace sequences
        );
     
        $replace = array(
            '>',
            '<',
            '\\1'
        );
     
        $buffer = preg_replace($search, $replace, $buffer);
     
        return $buffer;
    }
}

/**
 * Curl veya diğer metod ile uzaktaki sitenin kaynak kodlarını al.
 * 
 * @param  string $url Bağlanılacak site adresi.
 * @return string Sitenin kaynak kodları.
 */
if ( ! function_exists('connect'))
{
    function connect($url)
    {
        if (function_exists('curl_init'))
        {
            $ch = curl_init();         
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_HEADER,1);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $data = curl_exec($ch);
            curl_close($ch);
            
            return str_get_html(sanitize_output($data));
        }
        else {
            return file_get_html($url);
        }
    }
}

/**
 * Ayları çevir; sayıdan kelimeye.
 * 
 * @param  integer $month Sayı olarak aylar.
 * @return string Kelime olarak aylar.
 */
if ( ! function_exists('replace_month'))
{
    function replace_month($month)
    {
        $returned = '';
        switch ($month) {
            case 1: $returned = 'Ocak'; break;
            case 2: $returned = 'Şubat'; break;
            case 3: $returned = 'Mart'; break;
            case 4: $returned = 'Nisan'; break;
            case 5: $returned = 'Mayıs'; break;
            case 6: $returned = 'Haziran'; break;
            case 7: $returned = 'Temmuz'; break;
            case 8: $returned = 'Ağustos'; break;
            case 9: $returned = 'Eylül'; break;
            case 10: $returned = 'Ekim'; break;
            case 11: $returned = 'Kasım'; break;
            case 12: $returned = 'Aralık'; break;
        }

        return $returned;
    }
}

if ( ! function_exists('first_zero'))
{
    function first_zero($num)
    {
        $returned = null;
        if ($num <= 9) {
            $returned = '0'.$num;
        }else{
            $returned = $num;
        }

        return $returned;
    }
}

if ( ! function_exists('wb_addSubject'))
{
    function wb_addSubject($title, $subject, $resim, $category, $status, $date, $ozelAlanlar = array(), $tags="")
    {
        global $wpdb;
        global $current_user;

        require(ABSPATH . WPINC . '/pluggable.php');
        get_currentuserinfo();

        $post = array(
            'post_title' => $title,
            'post_content' => $subject,
            'post_status' => $status,
            'post_date' => $date,
            'post_author' => $current_user->ID,
            'tags_input' => $tags,
            'post_category' => $post_category
        );

        if ( $post_id = wp_insert_post($post) )
        {
            //
        }
    }
}

if ( ! function_exists('remove_selected_tag'))
{
    function remove_selected_tag( $text, $tags = array() ) {
        foreach ( $tags as $key => $val ) {
            if ( ! is_array( $val ) ) {
                $text = preg_replace( '/<' . $val . '[^>]*>([\s\S]*?)<\/' . $val . '[^>]*>/', '', $text );
            } else {
                $text = preg_replace( '/<' . $val[0] . ' ' . $val[1] . '[^>]*>([\s\S]*?)<\/' . $val[0] . '[^>]*>/', '', $text );
            }
        }
        return $text;
    }
}

if ( ! function_exists('strip_selected_tag'))
{
    function strip_selected_tag( $text, $tags = array() ) {
        foreach ( $tags as $key => $val )
        {
            if ( ! is_array( $val ) )
            {
                preg_match_all( '#<' . $val . ' [^>]*>([\s\S]*?)<\/' . $val . '[^>]*>#si', $text, $matches );
                if (count($matches[0]) == 0)
                {
                    preg_match_all( '#<' . $val . '[^>]*>([\s\S]*?)<\/' . $val . '[^>]*>#si', $text, $matches );
                }

                $find = array();
                foreach ($matches[0] as $match)
                    $find[] = '#'.$match.'#i';

                $text = preg_replace( $find, $matches[1], $text );
            }
            else
            {
                preg_match_all( '#<' . $val[0] . '([\s\S]*?)' . $val[1] . '[^>]*>([\s\S]*?)<\/' . $val[0] . '[^>]*>#si', $text, $matches );
                
                $find = array();
                foreach ($matches[0] as $match)
                    $find[] = '#'.$match.'#i';

                $text = preg_replace( $find, $matches[2], $text );
            }
        }
        return $text;
    }
}
?>