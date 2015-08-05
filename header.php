<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/screen.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/print.css" rel="stylesheet" type="text/css" media="print" />
		<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/colourbox.css" rel="stylesheet" type="text/css" media="print" />
		<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/inline.css" rel="stylesheet" type="text/css" media="print" />
		<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/reset.css" rel="stylesheet" type="text/css" media="print" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		



		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?> >
<div  class="inner">
		<div id="header" class="container">
  <a href="<?php echo site_url();?>" id="logo"><img src="<?php echo get_template_directory_uri();?>/stylesheets/logo-trans.png" alt="Edlyn, Make it the Best" /></a>
  <div id="navigation">
    <ul class="sf-menu">
      <li><a href="/who_we_are_pages" id="nav-who">Why Choose Edlyn</a></li>
      <li>
        <a href="/products" id="nav-products">Products</a></li>
        
      <li><a href="/recipes" id="nav-recipes">Recipes</a></li>
      <li><a href="/articles" id="nav-media">Media</a></li>
      <li><a href="/stockists" id="nav-distributors">Where to buy</a></li>
      <li><a href="/contact_us" id="nav-contact">Contact Us</a></li>
	  <li><a href="http://localhost/wordpress-trunk/" id="nav-contact">Ideation hub</a></li>
      <li><a href="http://store.edlyn.com.au/">Store</a></li>
    </ul>
  </div><!--endDiv navigation-->

  <form action="/search_results" id="global-search">
    <!--<a href="#">Search</a>-->
    <input name="q" class="search-terms" type="text" placeholder="Search" />
    <input class="search-button" type="submit" />
  </form>

  <a href="/saved_recipes" id="saved-recipes-button">
    Saved Recipes (0)
  </a>
</div>
</div>

</body>
			
