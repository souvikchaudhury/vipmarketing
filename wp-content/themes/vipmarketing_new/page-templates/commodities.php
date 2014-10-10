<?php
/*
* Template Name: Comodity Page
*/
?>
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
                        if( get_field('banner_tex_tleft', $post->ID) ) {
                            echo get_field('banner_tex_tleft', $post->ID);
                        }
                      ?>
                </div>
                
                <div class="bannerTextRight">
                
                <div class="bannerTextAddText">
                    <?php
                      if( get_field('banner_text_right', $post->ID) )
                      {
                        echo get_field('banner_text_right', $post->ID);
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

    <div class="comodities_content">
        <div class="container">
            <div class="comodities_content_top">
                <h2>A fantastic future</h2>
                <h3>with our growing possibilities</h3>
                <p>Mauris at elit purus, vitae interdum mauris. Fusce mollis cursus augue. Suspendisse ultrices ipsum sed erat tincidunt commodo. Vestibulum et nunc eu nisi faucibus fringilla a sit amet turpis. </p>
            </div>
            
            <div class="comodities_content_bottom">
                <div class="comoditiesProduct_block">
                    <?php 
                        $paged = ($_REQUEST['page2'] ? $_REQUEST['page2'] : 1);
                        $args = array('post_type' => 'products', 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 8,'order' => 'DESC','orderby' => 'date' );  
                        $queryObject = new WP_Query($args);
                        if($queryObject -> have_posts()) { 
                        /*$args = array(
                                    'posts_per_page'   => -1,
                                    'orderby'          => 'post_date',
                                    'order'            => 'DESC',
                                    'post_type'        => 'products',
                                    'post_status'      => 'publish'
                                     ); 
                        $posts_array = get_posts( $args );
                        foreach ($posts_array as $post) {*/
                            while($queryObject -> have_posts()) {
                                $queryObject -> the_post();
                                ?>
                                    <!--comoditiesProduct start-->
                                        <div class="comoditiesProduct">
                                            <div class="comoditiesProduct-img">
                                                <img alt="" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" />
                                                <div class="comoditiesProduct-img-link">
                                                    <div class="comoditiesProduct-text">
                                                        <?php echo $post->post_excerpt; ?>
                                                    </div>
                                                    <ul>
                                                        <li><a class="fancybox-effects-a" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>"><img src="<?php echo get_template_directory_uri().'/images/search.png'; ?>" width="68"height="68" /></a></li>
                                                        <li><a href="<?php echo get_permalink( $post->ID); ?>"><img src="<?php echo get_template_directory_uri().'/images/anchor.png';?>" width="68"height="68" /></a></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                            
                                                
                                        </div>
                                    <!--comoditiesProduct start-->
                    <?php
                            }
                            /* pagination function start */
                            echo '<div class="pagination">';
                            pagination($queryObject);
                            /* pagination function end */
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    ?>
                </div>
                
                <!-- <div class="pagination">
                    <ul>
                        <li><a href="#" class="pagination_active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                      </ul>
                </div> -->
                
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
                	<?php
                if( get_field('banner_tex_tleft', $post->ID) )
                {
                    echo get_field('banner_tex_tleft', $post->ID);
                }
                ?>
                </div>
                
                <div class="bannerTextRight">
                
                	<div class="bannerTextAddText">
                    	<?php
                if( get_field('banner_text_right', $post->ID) )
                {
                    echo get_field('banner_text_right', $post->ID);
                }
                ?>
                    </div>
                    
                    
                    <div class="bannerTextAddImage">
                    	<?php
                if( get_field('banner_text_image', $post->ID) )
                {?>
                    
					<img src="<?php echo get_field('banner_text_image', $post->ID); ?>" alt="" />
               <?php }
                ?>
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
        	<h3>Essential comodities</h3>
            <h5>Know about our everyday market commodities</h5>     
        </div>
        
    </div>	
    
	
</div>

<!--about  part end-->

<!--news  part-->

<div class="wrapper">
	<div class="innerContent-middle">
        <div class="container">
               <div class="innerContainer">
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
                	<!--comoditiesProduct start-->
                        <div class="comoditiesProduct">
                            <div class="comoditiesProduct-img">
                                <img alt="" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" />
                                <div class="comoditiesProduct-img-link">
                                	<ul>
                                    	<li><a class="fancybox-effects-a" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>"><img src="<?php echo get_template_directory_uri().'/images/search.png'; ?>" width="68"height="68" /></a></li>
                                        <li><a href="<?php echo get_permalink( $post->ID); ?>"><img src="<?php echo get_template_directory_uri().'/images/anchor.png';?>" width="68"height="68" /></a></li>
                                    </ul>
                            	</div>
                                
                            </div>
                            
                                <div class="comoditiesProduct-text">
                                    <?php echo $post->post_excerpt; ?>
                                </div>
                    	</div>
                    <!--comoditiesProduct start-->
                    <?php
                        }
                    ?>
                </div>
            </div>	
    </div>
</div>

<!--news  part end-->
*/ ?>
<?php get_footer(); ?>