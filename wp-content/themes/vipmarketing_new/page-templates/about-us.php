<?php

/**

 * Template Name: About Us

 */



get_header(); ?>


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
                <p><?php echo $rsData->fax; ?></p>
              </div>
              <?php
                    }
                  ?>
            </div>
      </div>
        
        <div class="bannerInnerImage">
            <?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?> 
            <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/innerbanner.jpg" alt="" > -->
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
                        <?php
                            if( get_field('banner_text_image', $post->ID) ) {
                               echo '<img src="'.get_field('banner_text_image', $post->ID).'" alt="" />';
                            }
                        ?>
                        
                    </div>
                    
                </div>
            
           </div>
        </div>
            
        </div>

</div>

<!--banner  part end-->

<!--why-chouse-->

<div class="wrapper"> 
    <div class="whychoose">
        <div class="container">
            <?php 
            //var_dump(get_the_ID());
            $post_id = get_post(get_the_ID());
            $content = $post_id->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            echo $content;

            ?>
        </div>
    </div>
</div>

<!--/why-chouse-->

<div class="wrapper">

    <div class="about_content">
        <div class="container">
            <!-- <div class="about_content_top">
                <h2>A fantastic future</h2>
                <h3>with our growing possibilities</h3>
                <p>Mauris at elit purus, vitae interdum mauris. Fusce mollis cursus augue. Suspendisse ultrices ipsum sed erat tincidunt commodo. Vestibulum et nunc eu nisi faucibus fringilla a sit amet turpis. </p>
            </div> -->
            
            <div class="about_content_bottom">
                <!--about_content_bottom_block-->
                <?php 
                    if( have_rows('sec_content') ):
                        $i=1;
                        while( have_rows('sec_content') ): the_row(); 
                            $image = get_sub_field('sec_sub_image');
                            $content = get_sub_field('sec_sub_Content');
                            ?>
                            <div class="about_content_bottom_block">
                                <?php
                                if($i%2!=0){
                                ?>
                                    <div class="about_content_bottom_block_content">
                                        <div class="about_content_bottom_block_content_inner">
                                            <?php echo $content;?>
                                        </div>
                                    </div>
                                    <div class="about_content_bottom_block_image">
                                        <img src="<?php echo $image; ?>" alt="">
                                    </div>
                                
                                <?php
                                }else{
                                    ?>
                                    <div class="about_content_bottom_block_image">
                                        <img src="<?php echo $image; ?>" alt="">
                                    </div>
                                    <div class="about_content_bottom_block_content bgcoloryellow">
                                        <div class="about_content_bottom_block_content_inner">
                                            <?php echo $content;?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                            $i++;
                        endwhile; 
                    endif; 
                ?>
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

			<?php

                if( get_field('inner_content', $post->ID) )

                {

                    echo get_field('inner_content', $post->ID);

                }

                ?>

		</div>

	</div>

</div>

<!--about  part end-->

<!--news  part-->

<div class="wrapper">

	<div class="innerContent-middle">

        <div class="container">

        		<div class="innerContent-middle-title">

                    <h3>A fantastic future </h3>

                    <h5>with our growing possibilities. Know how -</h5>

                </div>

                

				<?php 

					$args = array(

								'posts_per_page'   => -1,

								'orderby'          => 'post_date',

								'order'            => 'DESC',

								'post_type'        => 'fantastic_future',

								'post_status'      => 'publish'

								 ); 

					$posts_array = get_posts( $args );

					foreach ($posts_array as $post) {

						?>

				<div class="innerContainer">

                <span><a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>"><img class="alignnone size-full wp-image-48" alt="about-img1" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" width="264" height="191" /></a></span>

                <div class="innerContainerText">

                <strong><?php echo $post->post_title; ?></strong>

                <p><?php echo $post->post_content; ?></p>

                </div>

				</div>

				<?php

				}

				?>

                

                          

            </div>	

    </div>

</div>

<!--news  part end-->

*/?>

<?php get_footer(); ?>