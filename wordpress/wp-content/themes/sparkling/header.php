<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */
?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<?php while ( have_posts() ) : the_post(); ?>
 <?php if( get_post_type()=="api" ): ?>
<!-- SWAGGER RESOURCES -->
<link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'/>
<link href='<?php echo get_template_directory_uri()."/swagger/css/reset.css" ?>' media='screen' rel='stylesheet' type='text/css'/>
<link href='<?php echo get_template_directory_uri()."/swagger/css/screen.css" ?>' media='screen' rel='stylesheet' type='text/css'/>
<link href='<?php echo get_template_directory_uri()."/swagger/css/reset.css" ?>' media='print' rel='stylesheet' type='text/css'/>
<link href='<?php echo get_template_directory_uri()."/swagger/css/screen.css" ?>' media='print' rel='stylesheet' type='text/css'/>

<script src='<?php echo get_template_directory_uri()."/swagger/lib/shred.bundle.js" ?>'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/jquery.slideto.min.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/jquery.wiggle.min.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/jquery.ba-bbq.min.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/handlebars-1.0.0.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/underscore-min.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/backbone-min.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/swagger.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/swagger-client.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/swagger-ui.js" ?>' type='text/javascript'></script>
<script src='<?php echo get_template_directory_uri()."/swagger/lib/highlight.7.3.pack.js" ?>' type='text/javascript'></script>

<!-- enabling this will enable oauth2 implicit scope support -->
<script src='<?php echo get_template_directory_uri()."/swagger/lib/swagger-oauth.js" ?>' type='text/javascript'></script>

<link href='<?php echo get_template_directory_uri()."/swagger-fixes.css" ?>' media='screen' rel='stylesheet' type='text/css'/>

<?php endif; ?>
<?php endwhile; // end of the loop. ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="row">
					<div class="site-navigation-inner col-sm-12">
						<div class="navbar-header">
							<button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<?php if( get_header_image() != '' ) : ?>

							<div id="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
							</div><!-- end of #logo -->

							<?php endif; // header image was removed ?>

							<?php if( !get_header_image() ) : ?>

							<div id="logo">
								<span class="site-name"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
							</div><!-- end of #logo -->

							<?php endif; // header image was removed (again) ?>

						</div>
						<?php sparkling_header_menu(); // main navigation ?>
					</div>
				</div>
			</div>
		</nav><!-- .site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div class="top-section">
			<?php sparkling_featured_slider(); ?>
			<?php sparkling_call_for_action(); ?>
		</div>

		<div class="container main-content-area"><?php
			global $post;
			if( get_post_meta($post->ID, 'site_layout', true) ){
				$layout_class = get_post_meta($post->ID, 'site_layout', true);
			}
			else{
				$layout_class = of_get_option( 'site_layout' );
			}
                        if( is_home() && is_sticky( $post->ID ) ){
                                $layout_class = of_get_option( 'site_layout' );
                        }?>
			<div class="row <?php echo $layout_class; ?>">
				<div class="main-content-inner <?php echo sparkling_main_content_bootstrap_classes(); ?>">
