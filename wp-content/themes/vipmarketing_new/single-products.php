<?php get_header(); ?>

<!--banner  part-->

<div class="wrapper">
        
        <div class="logopart">
            <div class="container"> 
                <div class="call">
                    <?php
                        global $wpdb;
                        $sqlData="SELECT * FROM wp_header_footer";
                        $rsData=$wpdb->get_row($sqlData);
                        if(isset($rsData))
                        {
                            ?>
                              <p><span><?php echo $rsData->contact_no; ?></span></p>
                            <?php
                        }
                    ?>
                </div>

            <!--logo part-->
                <div class="logo">
                    <?php
                    global $wpdb;
                    $sql="SELECT pinterest_link FROM wp_header_footer";
                    $rs=$wpdb->get_row($sql);
                    if(isset($rs))
                    {
                    ?>
                      <a href="<?php echo site_url(); ?>"><img src="<?php echo $rs->pinterest_link; ?>" alt="logo1" /></a>
                    
                </div>
            <!--logo part end-->
              <div class="fax">
                <a href="mailto:sales@vipmarketingla.com" >
                  <img src="<?php echo get_template_directory_uri(); ?>/images/mail.png" alt=""/>
                </a>
                <p> sales@vipmarketingla.com<?php //echo $rsData->fax; ?></p>
              </div>
              <?php
                    }
                  ?>
            </div>
        </div>
        
        <div class="bannerInnerImage">
            <img src="<?php echo get_template_directory_uri(); ?>/images/comodities.jpg" alt="" >
         </div>

</div>



<div class="wrapper">

    <div class="bannerInner">
       
        <div class="bannerContainer">
           <div class="bannerInnerText">
                <div class="bannerTextLeft">
                      <?php
                        if( get_field('banner_tex_tleft', 56) ) {
                            echo get_field('banner_tex_tleft', 56);
                        }
                      ?>
                </div>
                
                <div class="bannerTextRight">
                
	                <div class="bannerTextAddText">
	                    <?php
	                      if( get_field('banner_text_right', 56) )
	                      {
	                        echo get_field('banner_text_right', 56);
	                      }
	                     ?>
	                </div>
	                    
	                    
	                <div class="bannerTextAddImage">
	                  <img src="<?php echo get_template_directory_uri(); ?>/images/addimg.png" alt="" />
	                </div>
                    
                </div>
           </div>
        </div>        
    </div>
</div>


<!--banner  part end-->

<div class="wrapper">

	<div class="comodities_content_details">
    	<div class="container">
        	<div class="comodities_content_top">
            	<h2>Essential comodities and facts</h2>
                <h3>Know about our everyday market commodities details</h3>
                
            </div>
            	<div class="innerContainer">
            		<?php while ( have_posts() ) : the_post(); ?>
	                  	<div class="innerContainer-left">
	                    	<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" alt="" />
	                    </div>
	                    
	                    <div class="innerContainer-right">
	                    	<h4><?php the_title(); ?></h4>
	                        <?php the_content(); ?>
	                    </div>
	                <?php endwhile; // end of the loop. ?>
                </div>
                   
            	<div class="innerContainer">
                   <?php
						$args_products = array(
								'posts_per_page'   => 3,
								'orderby'          => rand,
								'post_type'        => 'products',
								'post_status'      => 'publish'
								 ); 
						$posts_products = get_posts( $args_products );
						//echo "<pre>";print_r($posts_products);
						if(isset($posts_products))
						{
							$i=1;
							foreach ($posts_products as $key => $product)
							{
								if($i==1){
									?>
					               	 	<div class="comoditiesCategory">
					                    	<div class="comoditiesCategory-img">
					                        	<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->ID) ); ?>" alt="#" width="314" height="173"/>
					                           	<div class="countNo green">
					                            	<p><?php echo $i; ?></p>
					                            </div>
					                        </div>
					                        <div class="comoditiesCategory-textPart green">
						                        <div class="comoditiesCategory-text ">
						                        	<h2><?php echo $product->post_title; ?></h2>
						                        	<p><?php echo substr($product->post_content,0,120); ?></p>
						                        </div>
					                        </div>
					                    </div>
					              	<?php
				              	}
				              	if($i==2){
				              		?>
					                	<div class="comoditiesCategory">
					                    	<div class="comoditiesCategory-img">
					                        	<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->ID) ); ?>" alt="#" width="314" height="173"/>
					                           	<div class="countNo yellow">
					                            	<p><?php echo $i; ?></p>
					                            </div>
					                        </div>
					                        <div class="comoditiesCategory-textPart yellow">
						                        <div class="comoditiesCategory-text ">
						                        	<h2><?php echo $product->post_title; ?></h2>
						                        	<p><?php echo substr($product->post_content,0,120); ?></p>
						                        </div>
					                        </div>
					                    </div>
					                <?php
					            }
					            if($i==3){
					            	?>
					                    <div class="comoditiesCategory">
					                    	<div class="comoditiesCategory-img">
					                        	<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->ID) ); ?>" alt="#" width="314" height="173"/>
					                           	<div class="countNo red">
					                            	<p><?php echo $i; ?></p>
					                            </div>
					                        </div>
					                        <div class="comoditiesCategory-textPart red">
						                        <div class="comoditiesCategory-text ">
						                        	<h2><?php echo $product->post_title; ?></h2>
						                        	<p><?php echo substr($product->post_content,0,120); ?></p>
						                        </div>
					                        </div>
					                    </div>
					                <?php
					            }
					            $i++;
					        }
					    }
					?>
                </div>
        </div>
       
    </div>
    
</div>
<div class="wrapper">
	<div class="innerContent-middle">
        <div class="container">
        <div class="innerContainer">
        
        <div class="nutritionFacts">
            <div class="nutritionFacts-left">
                <div class="nutritionFacts-left-img">
                    <?php
					//echo "hellllllo".$post->ID;
					if( get_field('nutrition_facts_image', $post->ID) )
					{?>
						<img src="<?php echo get_field('nutrition_facts_image', $post->ID); ?>" alt="" />
				   <?php }
					?>
                </div>
                <div class="viewDetailedFacts">
                    <a href="<?php echo get_field('view_detail_fact_link',$post->ID); ?>"><p>View</p> Detailed<br>Facts</a>
                </div>
            </div>
            
            <div class="nutritionFacts-right">
                <h2>More about Nutrition Facts</h2>
                <?php
					if( get_field('nutrition_facts_content', $post->ID) )
					{
						echo get_field('nutrition_facts_content', $post->ID);
				    }
					?>
            </div>
        </div>
        
        </div>
        
        <div class="innerContainer">
        
        <div class="ProductAvailability">
            <h2>Product availability</h2>
        </div>
        <div class="ProductAvailability-table">
        	<table width="1000px" cellspacing="0" cellpadding="0" style="border:1px solid #434343;">
                  <tr>
				  
                    <td style="width:127px; height:50px; background-color:#000; vertical-align:middle; text-align:center; color:#fff;border-bottom:1px solid #434343; border-right:1px solid #434343; padding-left:20px;">Country</td>
                    <?php
					while( the_repeater_field('select_month', $post->ID) ) {
					//print_r(get_sub_field('select_months'));exit;
					?>
					<td style="width:72px; height:50px; background-color:<?php echo get_sub_field('field_color'); ?>; vertical-align:middle; text-align:center;color:#fff; border-bottom:1px solid #434343; border-right:1px solid #434343;"><?php echo get_sub_field('month_name'); ?></td>
					<?php
					}
					?>
				  </tr>
				  <?php while( the_repeater_field('add_country', $post->ID) ) {
							$months=get_sub_field('select_months');
				  ?>
                  <tr>
                    <td style="width:127px; height:50px; background-color:<?php echo get_sub_field('field_color'); ?>; vertical-align:middle; text-align:left; color:#000;border-bottom:1px solid #434343; border-right:1px solid #434343; padding-left:20px;"><?php echo get_sub_field('country_name'); ?></td>
					<?php
					while( the_repeater_field('select_month', $post->ID) ) {
					//print_r(get_sub_field('select_months'));exit;
					$month=get_sub_field('month_name');
					//echo $month;
					//print_r($months);
					if(in_array($month,$months))
					{
					?>
                    <td style="width:72px; height:50px; background-color:#d64100; vertical-align:middle; text-align:center;color:#fff;border-bottom:1px solid #434343; border-right:1px solid #434343;"><img src="<?php echo get_template_directory_uri(); ?>/images/tick.png" width="35" height="24"/></td>
                    <?php
					}else{
						?>
						<td style="width:72px; height:50px; background-color:#fff; vertical-align:middle; text-align:center;color:#fff;border-bottom:1px solid #434343; border-right:1px solid #434343;"><img src="<?php echo get_template_directory_uri(); ?>/images/cross.png" width="35" height="24"/></td>
						<?php
					}
					}
					?>
                    
                  </tr>
                  <?php } ?>
			</table>
        </div>
      
        
        </div>
        </div>
       </div>
      </div>





<?php /*
<!--Inner banner  part-->

<div class="wrapper">

    	<div class="bannerInner">
       
        <div class="bannerContainer">
           <div class="bannerInnerText">
           
           		<div class="bannerTextLeft">
                	<h5>Backed By Generations of </h5>
                    <h3>Produce </h3><h2>Experience</h2>
                    <p>Providing Development of New Agricultural Inputs and Systems!</p>
                </div>
                
                <div class="bannerTextRight">
                
                	<div class="bannerTextAddText">
                    	<h4>Pruvian</h4>
                        <h5>Asparagus</h5>
                        <p>Call us today for competitive pricing of fresh &quot;Peruvian Asparagus&quot;</p>
                        <p class="phoneNumber">213-833-7784</p>
                    </div>
                    
                    
                    <div class="bannerTextAddImage">
                    	<img src="<?php echo get_template_directory_uri(); ?>/images/addimg.png" alt="" />
                    </div>
                    
                </div>
           	
           </div>
        </div>
        	
    	</div>
	
</div>

<!--Inner banner  part end-->


<!--about  part-->

<div class="wrapper">

    <div class="innerContent-top">
    		
        <div class="container">
        	<h3>Essential comodities and facts</h3>
            <h5>Know about our everyday market commodities details</h5>     
        </div>
        
    </div>	
    
	
</div>

<!--about  part end-->

<!--news  part-->

<div class="wrapper">
	<div class="innerContent-middle">
        <div class="container">
               	  <div class="innerContainer">
					<?php while ( have_posts() ) : the_post(); ?>
                  	<div class="innerContainer-left">
                    	<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" alt="" />
                    </div>
                    
                    <div class="innerContainer-right">
                    	<h4><?php the_title(); ?></h4>
                        <?php the_content(); ?>
                    </div>
					  <?php endwhile; // end of the loop. ?>
                   </div> 
                   <div class="innerContainer">
						<?php
						$args_products = array(
								'posts_per_page'   => 3,
								'orderby'          => rand,
								'post_type'        => 'products',
								'post_status'      => 'publish'
								 ); 
						$posts_products = get_posts( $args_products );
						//echo "<pre>";print_r($posts_products);
						if(isset($posts_products))
						{
							foreach ($posts_products as $key => $product)
							{?>
							<div class="comoditiesCategory">
								<div class="comoditiesCategory-img">
									<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->ID) ); ?>" alt="#" width="314" height="173"/>
									<div class="countNo">
										<p><?php echo $key+1; ?></p>
									</div>
								</div>
								<div class="comoditiesCategory-textPart">
								<div class="comoditiesCategory-text">
									<span><?php echo $product->post_title; ?></span>
									<p><?php echo substr($product->post_content,0,100); ?></p><a href="<?php echo get_permalink( $product->ID); ?>">more..</a>
								</div>
								
								 <div class="comoditiesCategory-text blackbg">
									<p><?php echo $product->post_excerpt; ?></p>
								</div>
								</div>
							</div>
							<?php
							}
						}
						?>
                   	 	
                   
                  </div>
                  
                   <div class="innerContainer">
                   	
                    	<div class="nutritionFacts">
                        	<div class="nutritionFacts-left">
                            	<div class="nutritionFacts-left-img">
                            		<?php
									//echo "hellllllo".$post->ID;
									if( get_field('nutrition_facts_image', $post->ID) )
									{?>
										<img src="<?php echo get_field('nutrition_facts_image', $post->ID); ?>" alt="" />
								   <?php }
									?>
                                </div>
                                <div class="viewDetailedFacts">
                                	<a href="<?php echo get_field('view_detail_fact_link',$post->ID); ?>"><p>View</p> Detailed Facts</a>
                                </div>
                            </div>
                            
                            <div class="nutritionFacts-right">
                            	<h2>More about Nutrition Facts</h2>
                                <?php
									if( get_field('nutrition_facts_content', $post->ID) )
									{
										echo get_field('nutrition_facts_content', $post->ID);
								    }
									?>
                            </div>
                        </div>
                   
                   </div>
                   
                    <div class="innerContainer">
                    
                    	<div class="ProductAvailability">
                        	<h2>Product availability</h2>
                        </div>
						<?php
						*/
						/*$b=array();
                        while( the_repeater_field('add_country', $post->ID) ) {
									$a=get_sub_field('select_months');
									$b= array_unique(array_merge ( $b,$a ));
									}
									print_r($b);*/
									/*
									?>
                        <div class="ProductAvailability-table">
                        	<table width="1000px" cellspacing="0" cellpadding="0" style="border:1px solid #434343;">
                                  <tr>
								  
                                    <td style="width:147px; height:50px; background-color:#000; vertical-align:middle; text-align:center; color:#fff;border-bottom:1px solid #434343; border-right:1px solid #434343;">Country</td>
                                    <?php
									while( the_repeater_field('select_month', $post->ID) ) {
									//print_r(get_sub_field('select_months'));exit;
									?>
									<td style="width:72px; height:50px; background-color:<?php echo get_sub_field('field_color'); ?>; vertical-align:middle; text-align:center;color:#fff; border-bottom:1px solid #434343; border-right:1px solid #434343;"><?php echo get_sub_field('month_name'); ?></td>
									<?php
									}
									?>
								  </tr>
								  <?php while( the_repeater_field('add_country', $post->ID) ) {
											$months=get_sub_field('select_months');
								  ?>
                                  <tr>
                                    <td style="width:147px; height:50px; background-color:<?php echo get_sub_field('field_color'); ?>; vertical-align:middle; text-align:center; color:#fff;border-bottom:1px solid #434343; border-right:1px solid #434343;"><?php echo get_sub_field('country_name'); ?></td>
									<?php
									while( the_repeater_field('select_month', $post->ID) ) {
									//print_r(get_sub_field('select_months'));exit;
									$month=get_sub_field('month_name');
									//echo $month;
									//print_r($months);
									if(in_array($month,$months))
									{
									?>
                                    <td style="width:72px; height:50px; background-color:#FFE000; vertical-align:middle; text-align:center;color:#fff;border-bottom:1px solid #434343; border-right:1px solid #434343;"><img src="<?php echo get_template_directory_uri(); ?>/images/tick.png" width="35" height="24"/></td>
                                    <?php
									}else{
									echo '<td style="width:72px; height:50px; background-color:#fff; vertical-align:middle; text-align:center;color:#fff;border-bottom:1px solid #434343; border-right:1px solid #434343;"></td>';
									}
									}
									?>
                                    
                                  </tr>
                                  <?php } ?>
							</table>


                        </div>
                    
                    </div>
                  
            </div>	
    </div>
</div>

<!--news  part end-->


<!-- footer part-->*/
?>
<?php
get_footer();
?>
<!--footer  part end-->

