page.php looking good

<?php get_header()?>

<!-- page bannder comes from parts-->
<?php get_template_part( 'template-parts/page-banner'); ?>

<!-- media text content -->
<?php get_template_part( 'template-parts/page-media'); ?>



<!-- gallery underneath -->
<?php get_template_part( 'template-parts/gallery'); ?>
	
  <!-- pre-footer -->
<?php get_template_part( 'template-parts/pre-footer', 'no-logos' ); ?>

<!-- footer -->
<?php get_footer()?>