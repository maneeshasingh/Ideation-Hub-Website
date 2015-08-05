<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ideation hub
 */
 

?>

	</div><!-- #content -->

	
	<footer>
	<div id="footer">
  <div class="container clearfix">
    <ul id="quick-links">
      <li class="title"><h4>Quick Links</h4></li>
      <li><a href="http://www.woodscondiments.com.au">Woods Condiments</a></li>
      <li><a href="/who_we_are_pages">Why Choose Edlyn?</a></li>
      <li><a href="/products">Our Products</a></li>
      <li><a href="/recipes">Recipes</a></li>
      <li><a href="/articles">Media</a></li>
      <li><a href="/stockists">Where to Buy</a></li>
      <li><a href="/contact_us">Contact Us</a></li>
      <li><a href="/privacy">Terms &amp; Privacy</a></li>
      <li><a href="http://edlyn.neotek.co.nz">Distributor Login</a></li>
    </ul>
    
    <div id="subscribe">
      <h4>Subscribe</h4>
      <p>Sign up for the latest recipes, news &amp; media.</p>
      <form id="global-subscribe" method="get" action="/subscribers/new">
        <input class="email" type="text" placeholder="Email Address" name="subscriber[email]" id="footer_subscriber_email" value="Email Address" />
        <input class="subscribe-button" type="submit" />
      </form>
    </div><!--endDiv subscribe-->
    
    <ul id="social-links">
      <li class="title"><h4>Connect</h4></li>
      <li><a class="facebook" href="http://www.facebook.com/pages/Edlyn-Foods/129975787025855"><img src="<?php echo get_template_directory_uri();?>/stylesheets/icon-facebook.gif" alt="Facebook" /> <span>Facebook</span></a></li>
      <li><a class="youtube" href="#"><img src="<?php echo get_template_directory_uri();?>/stylesheets/icon-youtube.png" alt="Facebook" /> <span>Youtube</span></a></li>
    </ul>
    
    <div id="copyright">
      <p>&copy; 2012 - 2014 Edlyn Foods Pty Ltd.<br/>Site by <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'ideation-hub' ) ); ?>"><?php printf( __( 'Proudly powered by Swinburne', 'ideation-hub' ), 'WordPress' ); ?></a></p>
    </div><!--endDiv copyright-->

  </div><!--endDiv container-->
</div><!--endDiv footer-->
</footer>

<?php wp_footer(); ?>


