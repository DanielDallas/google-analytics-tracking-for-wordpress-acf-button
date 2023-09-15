<?php
  $block_settings = get_sub_field('block_settings');

  $button_style = $block_settings['button_style'];
  $alignment = $block_settings['alignment'];
  $add_top_margin = $block_settings['add_top_margin'];
  $add_bottom_margin = $block_settings['add_bottom_margin'];
  if($block_settings['remove_margins'] == 1) {
    $remove_margin = 'mb-0';
  } else {
    $remove_margin = 'margin-default';
  }
?>

<div class="site-container--block flexible-layout simple-button <?php echo $remove_margin; ?>" style="<?php if($add_top_margin == 1) { echo 'margin-top: 35px;'; } if($add_bottom_margin == 1) { echo 'margin-bottom: 35px;'; } ?>">
  <div class="grid-container container-fluid">
    <div class="row">
      <div class="col">
        <?php
          if(!empty(get_sub_field('button_url_link'))) {
            $link = get_sub_field('button_url_link');
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <div class="d-flex <?php echo $alignment; ?>">
              <a href="<?php echo $link_url; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link_target; ?>" class="btn <?php echo $button_style; ?>"><?php echo $link['title']; ?></a>
            </div>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>