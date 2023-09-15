<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="theme-color" content="#2c3788">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="fb-root"></div>

<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<div class="floating-sidebar">
  <?php
    if(have_rows('floating_sidebar', 'option')) {
      while (have_rows('floating_sidebar', 'option')) {
        the_row();
  ?>
        <div class="sidebar-box">
          <a href="<?php echo get_sub_field('url'); ?>">
            <img src="<?php echo get_sub_field('icon'); ?>" class="img-fluid" />

            <div class="hidden-box">
              <span class="location"><?php echo get_sub_field('title'); ?></span>
              <span class="date"><?php echo get_sub_field('secondary_title'); ?></span>
            </div>
          </a>
        </div>
  <?php
      }
    }
  ?>
</div>

<header id="site-header">
  <div id="top-ad-container">
    <div class="site-container--block no-margin h-100">
      <div class="grid-container container-fluid h-100">
        <div class="row align-items-center h-100">
          <div class="col">
            <div class="text-center">
              <?php
                if(function_exists('the_ad_placement')) {
                  the_ad_placement('above-header');
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="header-content">
    <div class="site-container--block">
      <div class="grid-container container-fluid">
        <div class="top-bar">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="header-rh-column">
                <ul>
                  <!-- <li><a href="#">Login</a></li>
                  <li>|</li>
                  <li><a href="/register/">Register your Profile</a></li> -->
                  <li>
                    <ul class="social">
                      <?php
                        if(have_rows('social_media', 'option')) {
                          while (have_rows('social_media', 'option')) {
                            the_row();
                      ?>
                            <li><a href="<?php echo get_sub_field('link'); ?>"><i class="fa-brands <?php echo get_sub_field('icon'); ?>"></i></a></li>
                      <?php
                          }
                        }
                      ?>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="row align-items-center">
          <div class="col-12 col-md-3">
            <div class="logo">
              <a href="<?php echo get_site_url(); ?>">
                <img src="<?php echo get_field('site_logo', 'option'); ?>" class="img-fluid" />
              </a>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <?php wp_nav_menu(['menu' => 'Main Menu']); ?>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="button-group">
              <?php
                if(!empty(get_field('button_one', 'option'))) {
                  $link = get_field('button_one', 'option');
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
                  <a href="<?php echo $link_url; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link_target; ?>" class="btn blue"><?php echo $link['title']; ?></a>
              <?php
                }
              ?>

              <?php
                if(!empty(get_field('button_two', 'option'))) {
                  $link = get_field('button_two', 'option');
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
                  <a href="<?php echo $link_url; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link_target; ?>" class="btn purple"><?php echo $link['title']; ?></a>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a class="mobile-menu">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </div>
</header>

<?php
  if (!is_front_page()) {
    $remove_bottom_margin = get_field('remove_bottom_margin', get_queried_object_id());

    if(get_field('header_image', get_queried_object_id())) {
      $featured_image = get_field('header_image', get_queried_object_id());
    } else {
      $featured_image = 5659;
    }

    // 2000 = Events
    if(get_queried_object_id() != 0) {
      if(wp_get_post_parent_id() == 2000 || wp_get_post_parent_id() == 1997 || wp_get_post_parent_id() == 2004 || wp_get_post_parent_id() == 2002) {
        if(get_the_id() == 1997 || wp_get_post_parent_id() == 1997) {
          $image = get_field('birmingham_background_image', 'option');
          $title = get_field('birmingham_event_title', 'option');
          $exhib_menu = get_field('birmingham_exhibition_menu', 'option');
        }

        if(get_the_id() == 2004 || wp_get_post_parent_id() == 2004) {
          $image = get_field('london_background_image', 'option');
          $title = get_field('london_event_title', 'option');
          $exhib_menu = get_field('london_exhibition_menu', 'option');
        }

        if(get_the_id() == 2002 || wp_get_post_parent_id() == 2002) {
          $image = get_field('virtual_background_image', 'option');
          $title = get_field('virtual_event_title', 'option');
          $exhib_menu = get_field('access_for_all_menu', 'option');
        }
?>
        <div class="event-additional-header" style="background-image: url('<?php echo $image; ?>');">
          <div class="site-container--block no-margin">
            <div class="grid-container container-fluid">
              <div class="row">
                <div class="col">
                  <p class="title text-center"><?php echo $title; ?></p>

                  <div class="other-events">
                    <a class="venue-prompt">Choose a different date</a>

                    <div class="other-drop" style="display: none;">
                      <div class="triangle"></div>
                      <?php
                        $children = get_pages(['parent' => 2000]);

                        foreach ($children as $item) {
                          if($item->ID != get_the_id()) {
                            echo '<a href="'. get_the_permalink($item->ID) .'">'. $item->post_title .'</a>';
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
          jQuery('.venue-prompt').click(function(){
            jQuery('.other-drop').fadeToggle();
          });
        </script>

        <?php if(!empty($exhib_menu)) { ?>
          <div class="event-exhibitor-menu">
            <ul>
              <?php
                foreach($exhib_menu as $item) {
                  echo '<li><a href="'. get_the_permalink($item) .'">'. get_the_title($item) .'</a></li>';
                }
              ?>
            </ul>
          </div>
        <?php } ?>
<?php
      }
    }
?>

    <?php if(!empty(get_field('secondary_navigation'))) { ?>
      <div class="event-exhibitor-menu" style="background: #31afe0; height: 90px; padding-top: 10px;">
        <ul>
          <?php
            foreach(get_field('secondary_navigation') as $item) {
              echo '<li><a href="'. get_the_permalink($item->ID) .'" style="color: #ffffff;">'. $item->post_title .'</a></li>';
            }
          ?>
        </ul>
      </div>
    <?php } ?>

    <?php if(get_field('hide_header', get_the_id()) != 1) { ?>
      <?php
        if(is_category()) {
          $background_image = wp_get_attachment_image_url(get_field('category_header_image', 'category_'. get_queried_object_id() .''), 'page-banner');
        } else {
          $background_image =  wp_get_attachment_image_url($featured_image, 'page-banner');
        }
      ?>
      <div class="page-header <?php if($remove_bottom_margin == 1) echo 'no-margin'; ?>" style="background-image: url('<?php echo $background_image; ?>');">
        <div class="overlay"></div>

        <div class="page-head-content">
          <div class="limit-content text-center">
            <p class="title" style="max-width: fit-content; margin: 25px auto;">
              <?php
                if (is_category()) {
                  $title = single_cat_title('', false);
                } elseif (is_tag()) {
                  $title = single_tag_title('', false);
                } elseif (is_author()) {
                  $title = '<span class="vcard">'. get_the_author() .'</span>';
                } elseif (is_tax()) {
                  $title = sprintf( __('%1$s'), single_term_title('', false));
                } elseif (is_404()) {
                  $title = 'Page not found';
                } elseif(is_search()) {
                  $title = 'Search Results for: '. get_search_query() .'';
                } elseif (is_post_type_archive()) {
                  $title = post_type_archive_title('', false);
                } else {
                  $title = get_the_title(get_queried_object_id());
                }

                if(!empty($title)) { echo $title; }
              ?>
            </p>

            <?php if(!empty(get_the_excerpt()) && !is_single() && !is_archive()) { ?><p class="desc"><?php echo get_the_excerpt(); ?></p><?php } ?>

            <?php
              if(get_queried_object_id() != 0) {
                if(!empty(get_field('header_button_link'))) {
                  $link = get_field('header_button_link');
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                  <div class="d-flex justify-content-center">
                    <a href="<?php echo $link_url; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link_target; ?>" class="btn purple"><?php echo $link['title']; ?></a>
                  </div>
            <?php
                }
              }
            ?>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php /* if(get_field('hide_header', get_the_id()) == 1) { echo '<div style="margin: 35px 0;"></div>'; } */ ?>
<?php
  }
?>