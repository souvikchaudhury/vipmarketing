<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>




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
                <a href="mailto:<?php echo $rsData->fax; ?>" >
                  <img src="<?php echo get_template_directory_uri(); ?>/images/mail.png" alt=""/>
                </a>
                <p><!-- Mail us at  --> <?php echo $rsData->fax; ?></p>
              </div>
              <?php
                    }
                  ?>
            </div>
      </div>

  <div class="banner">
    
      <div id="bannerslider" class="skdslider">
          <ul>
              <?php 
                  if( have_rows('big_banner') ):
                      while( have_rows('big_banner') ): the_row(); 
                          $image = get_sub_field('banner_url');
                          echo '<li><img src="'.$image.'" alt="" /></li>';
                      endwhile; 
                  endif; 
              ?>
        </ul>
       </div>
        <div class="bannerContainer">
           <div class="bannerText">
           
              <div class="bannerTextLeft">
                  <?php
                    if( get_field('banner_text1', $post->ID) ) {
                        echo get_field('banner_text1', $post->ID);
                    }
                  ?>
              </div>
                
              <div class="bannerTextRight">
                
                <div class="bannerTextAddText">
                    <?php
                      if( get_field('banner_text2', $post->ID) )
                      {
                        echo get_field('banner_text2', $post->ID);
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


	<!--ourproduct  part-->

<div class="wrapper">
	
    <div class="ourProduct">
    	<div class="container">
        	 <div class="ourProductTop">
             	<h3>Our Products</h3>
                <!-- <p>Curab itur imperd iet quam eget ipsum vene natis comm odo. Morbi eget arcu ac erat  placer at mal esuada eu at nulla. </p> -->
             </div>
             
             <div class="ourProductBottom">
             	<div id="hWrapper">
                        <div id="carouselh">
                            <?php 
                                $args = array(
                                            'posts_per_page'   => -1,
                                            'orderby'          => 'post_date',
                                            'order'            => 'DESC',
                                            'post_type'        => 'products',
                                            'post_status'      => 'publish'
                                             ); 
                                $posts_array = get_posts( $args );
                                foreach ($posts_array as $post) {
                                    ?>
                                    <div>
                                        <img alt="" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" /><br />
                                        <a class="imgtitle" href="<?php echo get_permalink( $post->ID); ?>"><?php echo $post->post_title; ?></a>
                                        <span class="thumbnail-text"><?php echo $post->post_excerpt; ?></span>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
             	
             </div>
        </div>
     </div>
	
</div>

<!--ourproduct  part end-->

<!--news  part-->

<div class="wrapper">
	
    	<div class="container">
        
        	<div class="productNewsTop">
            	<h3>Produce news</h3>
                <p> <h5>Industry News and Trends <h5></p>
            </div>
            
            <div class="productNewsBottom">
             	<div id="hWrapper">
                        <div id="carouseli">
						<?php
               
							  $url="http://www.thepacker.com/fruit-vegetable-news/index.rss";
							  $content = file_get_contents($url);
                // echo "<pre>";print_r($content);exit;
							  $x = new SimpleXmlElement($content);
								
								if(isset($x))
								{
              
								 foreach ($x->channel->item as $entry) {
								 //echo "<pre>";print_r($entry);exit;
						?>
                            <div class="productNewstext">
                                <span><?php echo $entry->title; ?></span>
                                <!-- <p class="date"><?php echo $entry->pubDate; ?></p> -->
                                <p><?php echo $entry->description; ?></p>
                                <p><a href="<?php echo $entry->link; ?>" target="_blank" class="readmore">Read more</a></p>
                            </div>
						<?php
							   }
							}
						?>
                            
                        </div>
                    </div>
             	
             </div>
        
        </div>
    
</div>

<!--news  part end-->


<?php get_footer(); ?>