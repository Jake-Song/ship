<?php
// 스타일 시트, 스크립트 로드
function cosmetic_enqueue_scripts(){
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontello', get_template_directory_uri() . '/fontello/css/fontello.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery') );
    wp_enqueue_script( 'social', get_template_directory_uri() . '/js/jsSocials/jssocials.min.js', array('jquery') );
    wp_enqueue_style( 'social-css', get_template_directory_uri() . '/js/jsSocials/jssocials-theme-plain.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_script( 'rest-api', get_template_directory_uri() . '/js/rest-api.js', null, '1.0.0', true );
    wp_localize_script( 'rest-api', 'apiData', array(
      'nonce' => wp_create_nonce('wp_rest'),
      'siteUrl' => site_url('/')
    ) );

    //wp_enqueue_script( 'jquery-3', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1' );
    wp_enqueue_style( 'bx-css', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css' );
    wp_enqueue_script( 'bx-js', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery') );

    wp_localize_script( 'custom', 'ajaxHandler', array(
      'adminAjax' => admin_url( 'admin-ajax.php' ),
      'securityFavorite' => wp_create_nonce( 'user-favorite' ),
      'securityLoadmore' => wp_create_nonce( 'loadmore' ),
      'securityLogin' => wp_create_nonce( 'login' ),
    ) );
}
add_action('wp_enqueue_scripts', 'cosmetic_enqueue_scripts');

// 사용자 정의하기
function themeslug_customize_register( $wp_customize ) {

  // 사이트 로고
  $wp_customize->add_setting(
     'logo_settings', //give it an ID
     array(
       'type' => 'theme_mod',
       'default' => '', // Give it a default

     )
   );
   $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'logo', array(
     'section'     => 'title_tagline',
     'settings'    => 'logo_settings',
     'label'       => __( '로고', 'cosmetic' ),
     'description' => __( '화면 상단의 로고 이미지로 사용됩니다. 권장크기는 270 x 45 입니다.' ),
     'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
     'flex_height' => true, // Require the resulting image to be exactly as tall as the height attribute (default).
     // 'width'       => 270,
     // 'height'      => 45,
   ) ) );

  // 푸터 소셜 편집
  $wp_customize->add_section( 'footer', array(
    'title' => __( '푸터 소셜아이콘', 'cosmetic' ),
    'description' => __( '푸터 소셜아이콘 편집', 'cosmetic' ),
    'priority' => 160,
    'capability' => 'edit_theme_options',
  ) );
  $wp_customize->add_setting(
     'cosmetic_footer_social_url_1', //give it an ID
     array(
       'type' => 'theme_mod',
       'default' => '', // Give it a default

     )
   );
   $wp_customize->add_setting(
      'cosmetic_footer_social_url_2', //give it an ID
      array(
        'type' => 'theme_mod',
        'default' => '', // Give it a default

      )
    );
  $wp_customize->add_setting(
     'cosmetic_footer_social_url_3', //give it an ID
     array(
       'type' => 'theme_mod',
       'default' => '', // Give it a default

     )
   );
   $wp_customize->add_setting(
      'cosmetic_footer_social_icon_1', //give it an ID
      array(
        'type' => 'theme_mod',
        'default' => '', // Give it a default

      )
    );
    $wp_customize->add_setting(
       'cosmetic_footer_social_icon_2', //give it an ID
       array(
         'type' => 'theme_mod',
         'default' => '', // Give it a default

       )
     );
     $wp_customize->add_setting(
        'cosmetic_footer_social_icon_3', //give it an ID
        array(
          'type' => 'theme_mod',
          'default' => '', // Give it a default

        )
      );

    $wp_customize->get_setting( 'cosmetic_footer_social_icon_1' )->transport = 'postMessage';
    $wp_customize->get_setting( 'cosmetic_footer_social_icon_2' )->transport = 'postMessage';
    $wp_customize->get_setting( 'cosmetic_footer_social_icon_3' )->transport = 'postMessage';
    $wp_customize->get_setting( 'cosmetic_footer_social_url_1' )->transport = 'postMessage';
    $wp_customize->get_setting( 'cosmetic_footer_social_url_2' )->transport = 'postMessage';
    $wp_customize->get_setting( 'cosmetic_footer_social_url_3' )->transport = 'postMessage';


    $wp_customize->add_control( 'footer_social_icon_1',
        array(
          'label' => __( '푸터 소셜 아이콘 #1', 'cosmetic' ), //set the label to appear in the Customizer
          'section' => 'footer', //select the section for it to appear under
          'settings' => 'cosmetic_footer_social_icon_1', //pick the setting it applies to
          'type' => 'text',
          'priority' => 31,
        )
     );
   $wp_customize->add_control( 'footer_social_url_1',
       array(
         'label' => __( '푸터 소셜 URL #1', 'cosmetic' ), //set the label to appear in the Customizer
         'section' => 'footer', //select the section for it to appear under
         'settings' => 'cosmetic_footer_social_url_1', //pick the setting it applies to
         'type' => 'text',
         'priority' => 32,
       )
    );
    $wp_customize->add_control( 'footer_social_icon_2',
        array(
          'label' => __( '푸터 소셜 아이콘 #2', 'cosmetic' ), //set the label to appear in the Customizer
          'section' => 'footer', //select the section for it to appear under
          'settings' => 'cosmetic_footer_social_icon_2', //pick the setting it applies to
          'type' => 'text',
          'priority' => 33,
        )
     );
    $wp_customize->add_control( 'footer_social_url_2',
        array(
          'label' => __( '푸터 소셜 URL #2', 'cosmetic' ), //set the label to appear in the Customizer
          'section' => 'footer', //select the section for it to appear under
          'settings' => 'cosmetic_footer_social_url_2', //pick the setting it applies to
          'type' => 'text',
          'priority' => 34,
        )
     );
     $wp_customize->add_control( 'footer_social_icon_3',
         array(
           'label' => __( '푸터 소셜 아이콘 #3', 'cosmetic' ), //set the label to appear in the Customizer
           'section' => 'footer', //select the section for it to appear under
           'settings' => 'cosmetic_footer_social_icon_3', //pick the setting it applies to
           'type' => 'text',
           'priority' => 35,
         )
      );
     $wp_customize->add_control( 'footer_social_url_3',
         array(
           'label' => __( '푸터 소셜 URL #3', 'cosmetic' ), //set the label to appear in the Customizer
           'section' => 'footer', //select the section for it to appear under
           'settings' => 'cosmetic_footer_social_url_3', //pick the setting it applies to
           'type' => 'text',
           'priority' => 36,
         )
      );
}
add_action( 'customize_register', 'themeslug_customize_register' );

// 사용자 정의하기 프리뷰 자바스크립트 파일 로드
function cosmetic_customizer_live_preview()
{
	wp_enqueue_script(
		  'cosmetic-themecustomizer',			//Give the script an ID
		  get_template_directory_uri().'/js/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional)
		  true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'cosmetic_customizer_live_preview' );

// 어드민 페이지 스타일 시트 적용
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );

function load_admin_styles() {
 wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin.css', false, '1.0.0' );

}

// 부트스트랩 메뉴 적용
require_once('inc/wp_bootstrap_navwalker.php');

// 테마 셋업
function my_theme_setup(){

    // 포스트 썸네일 등록하기
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'custom', 700, 400, true );
    add_image_size( 'single', 880, 400, true );
    add_image_size( 'smallest', 50, 50, true );

    // 메뉴 등록하기
    register_nav_menus(array(
      //'top' => __( 'Top Menu' ),
      'primary' => __( 'Primary Menu' ),
      'footer' => __( 'Footer Menu' ),
    ));

    add_theme_support( 'html5', array( 'search-form' ) );

}
add_action( 'after_setup_theme', 'my_theme_setup' );

// 메뉴 아이템 클래스 픽스
function custom_special_nav_class( $classes, $item ) {
  $test = 0;
    global $taxonomy, $post;
    $test = 0;
    $front_page_id  = (int) get_option( 'page_on_front' );

    if( isset( $taxonomy ) && $taxonomy === "cosmetic_category" ){

        if ( $front_page_id === (int) $item->object_id ){

             $classes[] = "custom_for_taxonomy";

         } elseif( ( $key = array_search('current_page_parent', $classes )) !== false ) {

             unset($classes[$key]);

         }

    } elseif( isset( $post->post_type ) && $post->post_type === 'cosmetic' ){

        if( $front_page_id === (int) $item->object_id ){

              $classes[] = "custom_for_taxonomy";

        } elseif( ( $key = array_search('current_page_parent', $classes )) !== false ) {

            unset($classes[$key]);

        }

    }

    return $classes;

}
add_filter( 'nav_menu_css_class' , 'custom_special_nav_class' , 10, 2 );

// 일반 사용자 어드민 바 기능 끄기
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}
// 로그아웃 메뉴 추가하기
add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2 );

function wti_loginout_menu_link( $items, $args ) {
   if ($args->theme_location == 'top') {
      if (is_user_logged_in()) {
         $items .= '<li class="right"><a href="'. wp_logout_url() .'">'. "Log Out" .'</a></li>';
      }
   }
   if ($args->theme_location == 'primary') {
      if (is_user_logged_in()) {
         $items .= '<li class="right responsive"><a href="'. wp_logout_url() .'">'. "Log Out" .'</a></li>';
      }
   }
   return $items;
}

// 공지사항 포스트 타입 등록
function notice_register_post_type(){

  $name = '공지사항';
  $slug = 'notice';

  $labels = array(
    'name' 			          => $name,
		'name_name' 	    => $name,
		'add_new' 		        => '새로 추가하기',
		'add_new_item'  	    => $name . ' 추가하기',
		'edit'		            => '편집하기',
  	'edit_item'	          => $name . ' 편집하기',
  	'new_item'	          => '새 ' . $name,
		'view' 			          => $name . ' 목록보기',
		'view_item' 		      => $name . ' 목록보기',
		'search_term'   	    => $name . ' 검색하기',
	  'parent' 		          => $name . ' 부모 페이지',
		'not_found' 		      => $name . ' 이 없습니다.',
		'not_found_in_trash' 	=> $name . ' 이 휴지통에 없습니다.'
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_in_nav_menus'   => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'show_in_rest'        => true,
    'menu_position'       => 10,
    'menu_icon'           => 'dashicons-clipboard',
    'can_export'          => true,
    'delete_with_user'    => false,
    'hierarchical'        => false,
    'has_archive'         => true,
    'query_var'           => true,
    'capability_type'     => 'post',
    'map_meta_cap'        => true,
    // 'capabilities' => array(),
    'rewrite'             => array(
    	'slug' => $slug,
    	'with_front' => true,
    	'pages' => true,
    	'feeds' => true,
    ),
    'supports'            => array(
    	'title',
    	'editor',
    	'thumbnail'
    )
  );
  register_post_type( 'notice', $args );
}
add_action( 'init', 'notice_register_post_type' );

// 선박매물 포스트 타입 등록
function ship_register_post_type(){

  $name = '선박매물';
  $slug = 'ship';

  $labels = array(
    'name' 			          => $name,
		'name_name' 	    => $name,
		'add_new' 		        => '새로 추가하기',
		'add_new_item'  	    => $name . ' 추가하기',
		'edit'		            => '편집하기',
  	'edit_item'	          => $name . ' 편집하기',
  	'new_item'	          => '새 ' . $name,
		'view' 			          => $name . ' 목록보기',
		'view_item' 		      => $name . ' 목록보기',
		'search_term'   	    => $name . ' 검색하기',
	  'parent' 		          => $name . ' 부모 페이지',
		'not_found' 		      => $name . ' 이 없습니다.',
		'not_found_in_trash' 	=> $name . ' 이 휴지통에 없습니다.'
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_in_nav_menus'   => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'show_in_rest'        => true,
    'menu_position'       => 10,
    'menu_icon'           => 'dashicons-businessman',
    'can_export'          => true,
    'delete_with_user'    => false,
    'hierarchical'        => false,
    'has_archive'         => true,
    'query_var'           => true,
    'capability_type'     => 'post',
    'map_meta_cap'        => true,
    // 'capabilities' => array(),
    'rewrite'             => array(
    	'slug' => $slug,
    	'with_front' => true,
    	'pages' => true,
    	'feeds' => true,
    ),
    'supports'            => array(
    	'title',
    	'editor',
    	'thumbnail'
    )
  );
  register_post_type( 'ship', $args );
}
add_action( 'init', 'ship_register_post_type' );

// 삽니다 포스트 타입 등록하기

function ship_selling_post_type(){

  $name = '삽니다';
  $slug = 'ship_selling';

  $labels = array(
    'name' 			          => $name,
		'name_name' 	    => $name,
		'add_new' 		        => '새로 추가하기',
		'add_new_item'  	    => $name . ' 추가하기',
		'edit'		            => '편집하기',
  	'edit_item'	          => $name . ' 편집하기',
  	'new_item'	          => '새 ' . $name,
		'view' 			          => $name . ' 목록보기',
		'view_item' 		      => $name . ' 목록보기',
		'search_term'   	    => $name . ' 검색하기',
	  'parent' 		          => $name . ' 부모 페이지',
		'not_found' 		      => $name . ' 이 없습니다.',
		'not_found_in_trash' 	=> $name . ' 이 휴지통에 없습니다.'
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_in_nav_menus'   => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'show_in_rest'        => true,
    'menu_position'       => 10,
    'menu_icon'           => 'dashicons-businessman',
    'can_export'          => true,
    'delete_with_user'    => false,
    'hierarchical'        => false,
    'has_archive'         => true,
    'query_var'           => true,
    'capability_type'     => 'post',
    'map_meta_cap'        => true,
    // 'capabilities' => array(),
    'rewrite'             => array(
    	'slug' => $slug,
    	'with_front' => true,
    	'pages' => true,
    	'feeds' => true,
    ),
    'supports'            => array(
    	'title',
    	'editor',
    	'thumbnail'
    )
  );
  register_post_type( 'ship_selling', $args );
}
add_action( 'init', 'ship_selling_post_type' );

// 선박매물 카테고리 등록하기
function ship_register_taxonomy(){
  $names = [
    '매물 카테고리' => 'ship category',
    '제조사' => 'ship maker',
    '모델' => 'ship model',
    '판매지역' => 'ship location',
  ];

  foreach ($names as $name=>$slug_name) :

      $slug = str_replace( ' ', '_', strtolower( $slug_name ) );
      $labels = array(
        'name' => $name,
        'name_name' => $name,
        'search_items' => 'Search ' . $name,
        'popular_items' => 'Popular ' . $name,
        'all_items' => 'All ' . $name,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Edit ' . $name,
        'update_item' => 'Update ' . $name,
        'add_new_item' => 'Add New ' . $name,
        'new_item_name' => 'New ' . $name . ' Name',
        'separate_items_with_commas' => 'Separate ' . $name . ' with commas',
        'add_or_remove_items' => 'Add or remove ' . $name,
        'choose_from_most_used' => 'Choose from the most used ' . $name,
        'not_found' => 'No ' . $name . ' found.',
        'menu_name' => $name,
      );
      $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => $slug, 'hierarchical' => true ),
      );
      register_taxonomy( $slug, 'ship', $args );

  endforeach;
}
add_action( 'init', 'ship_register_taxonomy' );

// 상위 텀 아이디 가져오기
function get_term_parent_id(){
    global $term, $taxonomy;
    $get_term = get_term_by( 'slug', $term, $taxonomy );
    if( $get_term->parent !== 0 ){
        return $get_term->parent;
    }
    return $get_term->term_id;
}

// filter for cosmetic post type edit list
add_action('restrict_manage_posts','restrict_cosmetic_by_cosmetic_category');
function restrict_cosmetic_by_cosmetic_category() {
    $test = 0;
    global $typenow;
    global $wp_query;
    $cosmetic_taxonomies = get_object_taxonomies( 'cosmetic', 'objects' );

    if ($typenow=='cosmetic') {
        foreach ($cosmetic_taxonomies as $key => $cosmetic_taxonomy) {

          $cosmetic_term_slug = !empty($wp_query->query[$cosmetic_taxonomy->name]) ?
            $wp_query->query[$cosmetic_taxonomy->name] : false;

          wp_dropdown_categories(array(
              'show_option_all' =>  __("Show All {$cosmetic_taxonomy->label}"),
              'taxonomy'        =>  $cosmetic_taxonomy->name,
              'name'            =>  $cosmetic_taxonomy->name,
              'orderby'         =>  'name',
              'selected'        =>  $cosmetic_term_slug,
              'hierarchical'    =>  true,
              'depth'           =>  3,
              'show_count'      =>  true, // Show # items in parenthesis
              'hide_empty'      =>  true, // Don't show cosmetic_category w/o listings
              'value_field'     => 'slug',
          ));
        }
    }
}

// Bread crumb
function qt_custom_breadcrumbs() {

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '<span class="delimiter">></span>'; // delimiter between crumbs
  $home = '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb

  global $post;
  $homeLink = get_bloginfo('url');

  if (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<div class="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

  } else {

    echo '<div class="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				$cats = substr_replace($cats, "", -8, 8);
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;

        // if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

  }
} // end qt_custom_breadcrumbs()

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/* 조회수 카운터 */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
