<?php
/**
 * Template Name: FAQ's
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

			<?php if( have_rows('faqs', 'option') ) : ?>
			<div class="thefaqs">
			<?php while( have_rows('faqs', 'option') ) : the_row(); 

				$question = get_sub_field('question', 'option');
				$answer = get_sub_field('answer', 'option');

			?>

			<div class="faqrow">
               <div class="question"><div class="question-image"></div><?php echo $question; ?></div>
               <div class="answer"><?php echo $answer; ?></div>
            </div><!-- faqrow -->

			<?php endwhile; ?>
		</div><!-- the faqs -->
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php

get_footer();
