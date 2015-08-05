<?php get_header(); ?>


<div id="banner-container">
      <div id="banner">
        <h1>Ideas in  Action.</h1>
      </div><!--endDiv banner-->
    </div><!--endDiv banner-container-->

    <div class="container clearfix">

      <div id="primary">
       <div class="text"> 
          

            <?php
            global $post;
            while( have_posts() ) : the_post();
            
            ?>
                <div class="thumbnail">
                    <?php
                    if( has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail_img');
                    }
                    else
                    echo '<img src="http://placehold.it/250x150&text=IMAGE">';
                    ?>
                    
                    <div class="related_idea">
                        <?php
                        
                        $args = array(
				      'post_type' => 'idea',
				      'post_status' => 'publish',
                                      'post__not_in' => array($post->ID)
				);
			$related_idea = new WP_Query($args);
			if($related_idea->have_posts()):
				
				while($related_idea->have_posts()) : $related_idea->the_post();
				?>
					<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
                                        <?php    if( has_post_thumbnail() ) {
                                                the_post_thumbnail('small_thumbnail_img');
                                            }
                                            else
                                            echo '<img src="http://placehold.it/50x50&text=IMAGE">';
                                        ?>
                                        <span><?php the_title(); ?></span>
                                        </a>
				
				<?php
				endwhile;
			endif;
			wp_reset_query();
                        
                        ?>
                    </div>
                </div>
            
                <div class="entry-post">
                    <h1><?php the_title();?></h1>
                    <div class="idea-meta">
                        <span class="iname">Name: <?php echo get_post_meta($post->ID, 'i_preferredname', true); ?></span>
                        <span class="idate">Date: <?php echo get_the_date('m/d/Y'); ?></span>
                    </div>
                    
                    <div class="description">
                        <strong>Description</strong><br>
                        <?php the_content(); ?>
                        
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cc79c29725b527a" async="async"></script>

                        <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_compact at300m" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4cc79c29725b527a"><span class="at4-icon aticon-compact" style="background-color: rgb(252, 109, 76);"><span class="at_a11y">More Sharing Services</span></span>Share</a>
                        <span class="addthis_separator" tabindex="1000">|</span>
                        <a class="addthis_button_facebook addthis_button_preferred_1 at300b" title="Facebook" href="#"><span class="at4-icon aticon-facebook" style="background-color: rgb(48, 88, 145);"><span class="at_a11y">Share on facebook</span></span></a>
                        <a class="addthis_button_twitter addthis_button_preferred_2 at300b" title="Tweet" href="#"><span class="at4-icon aticon-twitter" style="background-color: rgb(44, 168, 210);"><span class="at_a11y">Share on twitter</span></span></a>
                        <a class="addthis_button_email addthis_button_preferred_3 at300b" target="_blank" title="Email" href="#"><span class="at4-icon aticon-email" style="background-color: rgb(115, 138, 141);"><span class="at_a11y">Share on email</span></span></a>
                        <a class="addthis_button_print addthis_button_preferred_4 at300b" title="Print" href="#"><span class="at4-icon aticon-print" style="background-color: rgb(115, 138, 141);"><span class="at_a11y">Share on print</span></span></a>
                        <div class="atclear"></div></div>  
                    </div>
                </div>
            <?php
                
            endwhile;
            ?>
      

        </div><!--endDiv text-->
      </div><!--endDiv primary-->

    </div><!--endDiv container-->
    
			

	

<?php get_footer(); ?>
