<a href="<? $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); echo esc_url( $src[0] ); ?>" title="<? the_title_attribute(); ?>">
  <? the_post_thumbnail(); ?>
</a>
