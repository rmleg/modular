<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Adaptable
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php if ( get_theme_mod( 'adaptable_logo' ) ) : ?>
    <div id='sidebar-site-logo'>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'adaptable_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
    </div>
<?php else : ?>
    <!-- Nothing to display -->
<?php endif; ?>

<div id="secondary" class="widget-area" role="complementary">

  <?php
  if($post->post_parent) {
  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
  $titlenamer = get_the_title($post->post_parent);
  $permalink = get_permalink($post->post_parent);
  }

  else {
  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
  $titlenamer = get_the_title($post->ID);
  $permalink = get_permalink($post->ID);
  }
  if ($children) { ?>

  <div class="subpages widget big">

  <h1 class="widget-title subpages-header"> <a href="<?php echo $permalink; ?>"><?php echo $titlenamer; ?></a> </h1>
  <ul>
  <?php echo $children; ?>
  </ul>
</div>

  <?php } ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
