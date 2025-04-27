<?php 
function inn_wrong_login() {
  return 'Wrong username or password.';
}
function wpt_remove_version() {  
  return '';  
}  
// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if(post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
}

// Close comments on the front-end
function df_disable_comments_status() {
  return false;
}

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
  $comments = array();
  return $comments;
}

// Remove comments page in menu
function df_disable_comments_admin_menu() {
  remove_menu_page('edit-comments.php');
}

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
  global $pagenow;
  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url()); exit;
  }
}

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
  if (is_admin_bar_showing()) {
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
}

function isMobile() 
{
    return preg_match("/(android|iphone|\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  //return  preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function nfi_remove_version() {
  return '';
}

// ACF General Settings admin menu
if( function_exists('acf_add_options_page') ) {

  $option_page = acf_add_options_page(array(
  'page_title'  => 'General Settings',
  'menu_title'  => 'General Settings',
  'menu_slug'  => 'general-settings',
  'capability'  => 'edit_posts',
  'redirect'  => false
  ));
}

//remove draft archive links
function remove_draft_archive_link($options, $field, $the_post) {

   $options['post_status'] = array('publish');
   return $options;
}
add_filter('acf/fields/relationship/query', 'remove_draft_archive_link', 10, 3);
add_filter('acf/fields/page_link/query', 'remove_draft_archive_link', 10, 3);

//allow svg  to upload in media
function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}

// ===================================
//Button Use for External/Internal Link option
function button_group($button = null, $class = null){ 
    $target = false;
    $link = "";

    if(empty($button))
    {
        return;
    }

    $internal_link = $button['button_internal_link'];
    $external_link = $button['button_external_link'];
    $link_type = $button['button_link'];
    $button_label = $button['button_label'];

    if($link_type == 'button_internal_link' && !empty($internal_link)){
        $link = $internal_link;
    }elseif ($link_type == 'button_external_link' && !empty($external_link)) {
        $target = true;
        $link = $external_link;        
    }

    if(empty($button_label) OR empty($link))
    {
        return;
    }

    $href_link = null;
    
    if(!empty($link) && $link != null)
    {
        if($link == '#' )
        {
            $href_link = $link;
            $target = '';
        } 
        else
        {
            $url =  trim($link);
            if (!preg_match("~^(?:f|ht)tps?://~i", $url))
            {
                $href_link= "http://" . $url;
            }
            else
            {
                $href_link = trim($link);
            }
        }
    }
    if ($class != ''){
        $class = 'class="'.$class.'"';
     }
   
    if ($target == true)
    {
        return '<a href="'.$href_link.'" target="_blank" '.$class.'>'.$button_label.'</a>';
    }
    else
    {
        return '<a href="'.$href_link.'"'.$class.'>'.$button_label.'</a>';
    }
}

//Google Map Code
function radius_google_map_api($api) {
  $google_map_api = get_field('google_map_api', 'options');
  $api['key'] = $google_map_api;
  return $api;
}

function radius_google_map($lat, $lng, $zoom=20, $mapid = 'map-canvas', $address = '', $marker='') {
  $add = str_replace(" ","+",json_encode($address));
  $array = array(
    'lat' => $lat,
    'lng' => $lng,
    'zoom' => 16,
    'mapId' => $mapid,
    'address' => $address,
    'marker' => $marker
  );
  $google_map_api = get_field('google_map_api','options');
  wp_enqueue_script('jquery');
  wp_enqueue_script('google_script', 'https://maps.googleapis.com/maps/api/js?key='.$google_map_api);
  wp_enqueue_script('map', get_template_directory_uri() .'/js/map.js', array('jquery'), '1.0.0');
  wp_localize_script( 'map', 'gcode', $array);
}

//Phone number validation
function custom_phone_validation($result,$tag){
    $type = $tag->type;
    $name = $tag->name;

    if($type == 'tel' || $type == 'tel*'){

        $phoneNumber = isset( $_POST[$name] ) ? trim( $_POST[$name] ) : '';

        $phoneNumber = preg_replace('/[() .+-]/', '', $phoneNumber);
            if (strlen((string)$phoneNumber) != 10) {
                $result->invalidate( $tag, 'Please enter a valid phone number.' );
            }
    }
    return $result;
}


?>