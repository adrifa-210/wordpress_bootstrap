<?php
/**
 * Footer del tema: pie de página, copyright y modales del portfolio.
 *
 * Cierra las etiquetas abiertas en header.php (</body> y </html>).
 */

// Redes sociales del footer (icono Font Awesome => URL).
$social_links = array(
	'fa-facebook-f'    => '#!',
	'fa-twitter'       => '#!',
	'fa-linkedin-in'   => '#!',
	'fa-dribbble'      => '#!',
);

// Modales del portfolio (título e imagen). El índice + 1 forma el ID: portfolioModal1..N.
$portfolio_items = array(
	array( 'title' => 'Log Cabin',    'image' => 'cabin.png' ),
	array( 'title' => 'Tasty Cake',   'image' => 'cake.png' ),
	array( 'title' => 'Circus Tent',  'image' => 'circus.png' ),
	array( 'title' => 'Controller',   'image' => 'game.png' ),
	array( 'title' => 'Locked Safe',  'image' => 'safe.png' ),
	array( 'title' => 'Submarine',    'image' => 'submarine.png' ),
);

$portfolio_img_uri = get_template_directory_uri() . '/assets/img/portfolio/';
?>

	<!-- Footer-->
	<footer class="footer text-center">
		<div class="container">
			<div class="row">
				<!-- Footer Location-->
				<div class="col-lg-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">Location</h4>
					<p class="lead mb-0">
						2215 John Daniel Drive
						<br />
						Clark, MO 65243
					</p>
				</div>
				<!-- Footer Social Icons-->
				<div class="col-lg-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">Around the Web</h4>
					<?php foreach ( $social_links as $icon => $url ) : ?>
						<a class="btn btn-outline-light btn-social mx-1" href="<?php echo esc_url( $url ); ?>">
							<i class="fab fa-fw <?php echo esc_attr( $icon ); ?>"></i>
						</a>
					<?php endforeach; ?>
				</div>
				<!-- Footer About Text-->
				<div class="col-lg-4">
					<h4 class="text-uppercase mb-4">About Freelancer</h4>
					<p class="lead mb-0">
						Freelance is a free to use, MIT licensed Bootstrap theme created by
						<a href="https://startbootstrap.com" target="_blank" rel="noopener noreferrer">Start Bootstrap</a>.
					</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- Copyright Section-->
	<div class="copyright py-4 text-center text-white">
		<div class="container">
			<small>Copyright &copy; <?php echo esc_html( get_bloginfo( 'name' ) ); ?> <?php echo esc_html( wp_date( 'Y' ) ); ?></small>
		</div>
	</div>

	<!-- Portfolio Modals-->
	<?php foreach ( $portfolio_items as $index => $item ) : ?>
		<?php
		$modal_id = 'portfolioModal' . ( $index + 1 );
		$title_id = $modal_id . 'Label';
		?>
		<!-- Portfolio Modal <?php echo esc_html( $index + 1 ); ?>-->
		<div class="portfolio-modal modal fade" id="<?php echo esc_attr( $modal_id ); ?>" tabindex="-1" aria-labelledby="<?php echo esc_attr( $title_id ); ?>" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header border-0">
						<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center pb-5">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<!-- Portfolio Modal - Title-->
									<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="<?php echo esc_attr( $title_id ); ?>"><?php echo esc_html( $item['title'] ); ?></h2>
									<!-- Icon Divider-->
									<div class="divider-custom">
										<div class="divider-custom-line"></div>
										<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
										<div class="divider-custom-line"></div>
									</div>
									<!-- Portfolio Modal - Image-->
									<img class="img-fluid rounded mb-5" src="<?php echo esc_url( $portfolio_img_uri . $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" />
									<!-- Portfolio Modal - Text-->
									<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
									<button class="btn btn-primary" data-bs-dismiss="modal" type="button">
										<i class="fas fa-xmark fa-fw"></i>
										Close Window
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<?php wp_footer(); ?>
</body>
</html>