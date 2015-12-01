<?php
/**
 * The Template for displaying all single posts.
 *
 * @package sparkling
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="swagger-section">
	<div id="swagger-ui-container" class="swagger-ui-wrap"></div>
</div>

<script type="text/javascript">
	jQuery(function () {

		window.swaggerUi = new SwaggerUi({
			url: "<?php echo get_field( "api_uri" );?>",
			dom_id: "swagger-ui-container",

			supportedSubmitMethods: ['get', 'post', 'put', 'delete'],
			supportHeaderParams: true,
			onComplete: function(swaggerApi, swaggerUi){
				window.authorizations.add('oauth2', new ApiKeyAuthorization('client_id', '<?php echo get_field( "client_id" );?>', 'header'));
				log("Loaded SwaggerUI");
				if(typeof initOAuth == "function") {
					/**/
					initOAuth({
						clientId: '<?php echo get_field( "client_id" );?>',
						realm: "your-realms",
						appName: "Swagger UI"
					});
				}
				jQuery('pre code').each(function(i, e) {
					hljs.highlightBlock(e)
				});
			},
			onFailure: function(data) {
				log("Unable to Load SwaggerUI");
			},
			docExpansion: "none",
			sorter : "alpha"
		});


		window.swaggerUi.load();
	});
</script>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>