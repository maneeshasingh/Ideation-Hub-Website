<?php get_header(); ?>


<div id="banner-container">
      <div id="banner">
        <h1>Ideation Hub</h1>
      </div><!--endDiv banner-->
    </div><!--endDiv banner-container-->

    <div class="container clearfix">
      <!--<div id="secondary">
        
        <ul id="secondary-nav">
  <li><a href="/contact_us" id="general-enquiries">General Enquiries</a></li>
  <li><a href="/submit_recipe" id="submit-recipe">Submit a Recipe</a></li>
  <!-- <li><a href="/display_box" id="display-box">Display Box</a></li> 
  <li><a href="/find_us" id="find-us">Find Us</a></li>
  
  <li><a href="/sample_requests/new" id="request-a-sample">Request a Sample</a></li>
  
</ul>

        
      </div>--><!--endDiv secondary-->

      <div id="primary">
      <div class="text"> 
          <form method="post" id="ideation_hub" name="idea_form" action="<?php echo site_url(); ?>">
      
      <input type="hidden" name="f_submit" value="submit" />
      
     	 <h4><p>At Edlyn Foods, we value your ideas and feedbacks about our products and services. We take your privacy seriously and you can read our privacy statement <a href ="http://edlyn.com.au/privacy"><u>here</u></a></p></h4>
		<div class="step1">
		  <textarea id="idea" name="idea" placeholder="Write your idea/feedback description here..."></textarea>
		  <p class="term_link">
			<input type="checkbox" name="agree" id="agree" value="1" />
			<font color="black"><span>Agree to Terms & Condition</span></font>
		  </p>
		  
		  <div class="btn">
		<font color="black"><span>Don't worry,your personal details will not be used for marketing activities</span></font>
<button type="button">Done. now tell me about yourself</button>
		  </div>
	    </div>
	    
	    <div class="step2">
		  <textarea id="innovation" name="innovation" placeholder="Innovation idea details"></textarea>
		  
		  <div class="info">
			<div class="half_box">
				<span class="note">*Required Fields</span><br/><br/>
			      Name* : <br/>
				  <input type="text" id="name" name="name" placeholder="Enter name here.." /><br/><br/>
				  Preferred Name*:<br/>
				  <input type="text" id="preferredname" name="preferredname" placeholder="Name to show on idea description.."/><br/><br/>
			      Email* : <br/>
				  <input type="text" id="email" name="email" placeholder="Enter email here.." />
			</div>
		  </div>
		  
		  <div class="position">
			<div class="half_box">
			      <input type="radio" name="type" id="bus" value="Business" /> Do you own a business <br /><br />
			      
			</div>
			<div class="half_box">
			      or
			      <input type="radio" name="type" id="cus" value="Customer" /> Are you a customer <br /><br />
			      
			</div>
		  </div>
		  
		  <div id="business" class="bc">
			
			<p><label>Company Name:</label> <input type="text" id="company_name" name="company_name"  /></p>
			<p><label>Sector:</label>
			<select id = "sector" name ="sector">
					<option>--No Sector--</option>
					<option>Distributor</option>
					<option>Retailer</option>
					<option>Cafe</option>
					<option>Restaurant</option>
					<option>Aged Care</option>
				</select>
			<!-- <input type="text" id="sector" name="sector"  /></p>-->
			<p><label>Phone Number:</label> <input type="text" id="phone_number" name="phone_number"  /></p>

		  </div>
		  
		  <div id="customer" class="cc">
			
			<p><label>Phone Number:</label> <input type="text" id="phone_number" name="phone_number"  /></p>
			
			
		  </div>
		  
		  <div class="btn btn_submit">
			<div class="captcha">
			     <?php echo recaptcha_get_html('6LdUvAUTAAAAAM58ON4APCoWlvu7SiBpAxEwovH4'); ?>
			</div>
			<input type="checkbox" name="discuss" value="Yes" /> Do you want to discuss this further
			<button id="finished" name="finished" type="submit">Finished. Thanks for your time</button>
		  </div>
	    </div>
      </form>

        </div><!--endDiv text-->
      </div><!--endDiv primary-->

	<div id="tertiary">
		<div class="cta">
			
			<h2>Ideas in Action</h2>
			<?php
			$args = array(
				      'post_type' => 'idea',
				      'post_status' => 'publish'
				);
			$ideas = new WP_Query($args);
			if($ideas->have_posts()):
				
				while($ideas->have_posts()) : $ideas->the_post();
				?>
					<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				
				<?php
				endwhile;
			endif;
			wp_reset_query();
			?>
			
	       
		</div><!--endDiv cta-->
	</div><!--endDiv tertiary-->
</div><!--endDiv container-->
    
			

	

<?php get_footer(); ?>
