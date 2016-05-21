<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eal4th
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">

		<div class="kontakt-wrap">
			<div class="kontakt-details">
				<div class="kontakt-detail">
					<img src="<?php echo get_template_directory_uri() . '/img/phone.jpg';?>" alt="" />
					<h3>30 40 10 20</h3>
					<p>Du kan altid fange os på telefonen, indenfor vores åbningstider. Vi er altid klar på at tage en snak sammen med dig :-).</p>
				</div>
				<div class="kontakt-detail">
					<img src="<?php echo get_template_directory_uri() . '/img/email.jpg';?>" alt="" />
					<h3>info@artea.dk</h3>
					<p>Vi forsøger at svare på al henvendelse hurtigst muligt, men vi garantere at svare indenfor 48 timer.</p>
				</div>
				<div class="kontakt-detail">
					<img src="<?php echo get_template_directory_uri() . '/img/adresse.jpg';?>" alt="" />
					<h3>Adresse</h3>
					<p>Vi tager også imod post,<br>som du kan sende til:<br>Artea ApS<br>Kardemommegade 13 B<br>Transaktionsbyen 5100</p>
				</div>
			</div>
		</div>

		<div class="page-text">
			<?php
				the_content();
			?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
