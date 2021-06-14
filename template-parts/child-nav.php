<?php
/**
 * Determine if page is parent with children or page is a child and display Parent/Child navbar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

$hasChildren = get_pages( array( 'child_of' => $post->ID ) );

$isChild = wp_get_post_parent_id( get_the_ID() ) ;

if ( is_page() && count( $hasChildren ) > 0 ){ ?>
  <div class="breadcrumb">
    <ul>
      <li class="breadcrumb_parent current_page_item">
        <a href="<?php echo get_permalink(); ?>">

          <?php wp_title(); ?>
        </a>
      </li>

    <?php

      //$findChildOf = get_pages( array( 'child_of' => $post->ID ));
      wp_list_pages( array(
        'title_li' => '',
        'child_of' => $post->ID ))
      ; ?>
    </ul>
  </div>
  <?php
};

if ( $isChild ) {

  ?>

  <div class="breadcrumb">
    <ul>
      <li class="breadcrumb_parent">
        <a href="<?php echo get_permalink($isChild) ?>">
          <i class="fas fa-caret-left"></i>
          <span class="hidden-on-mobile">Back to </span><?php echo get_the_title($isChild); ?>
        </a>
      </li>

    <?php

      $findChildOf = get_the_ID();
      wp_list_pages(array(
        'title_li' => '',
        'child_of' => $isChild
      )); ?>
    </ul>
  </div>
  <?php
}
