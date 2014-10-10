<?php
/*
* Template Name: ContactUs Page
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
       
        <div class="customcreat">
            <div class="container">
                <div class="customcreat-applicaion">
                    <div class="customcreat-applicaion-inner">
                        <h2>Customer Credit Application</h2>
                        <p>Requires Adobe Acrobat Reader 5.0 and above</p>
                    </div>
                    <div class="download-option">
                        <?php
                            if( get_field('customer_credit_application', $post->ID) )
                                {
                                    echo '<a href="'.get_field('customer_credit_application', $post->ID).'">Download Now</a>';
                                }
                            ?>
                    </div>
                </div>
             </div> 
         </div> 
            
        
        <div class="bannerInnerImage">
            <img src="<?php echo get_template_directory_uri(); ?>/images/contact-bg.jpg" alt="" >
         </div>

</div>

<!--banner  part end-->

<div class="wrapper">
    <div class="innerContent-middle">
        <div class="map">
                <?php
                if( get_field('find_us_on_map', $post->ID) )
                {
                    echo get_field('find_us_on_map', $post->ID);
                }
                ?>
        </div>
            
      <div class="container">   
        
            <div class="address">
                <h5>Our Office address</h5>
                <div class="address-inner">
                    <div class="address-Image">
                        <?php
                        if( get_field('office_image', $post->ID) )
                        {?>
                            
                        <img src="<?php echo get_field('office_image', $post->ID); ?>" alt="" />
                        <?php
                        }else{
                            ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/contact-img.png" alt="" />    
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="address-text">
                        <div class="address-text-top">
                            <div class="address-text-top-part1">
                                <span>Warehouse Addres</span>
                                <?php
                                if( get_field('warehouse_addres', $post->ID) )
                                {
                                    echo get_field('warehouse_addres', $post->ID);
                                }
                                ?>
                            </div>
                            <div class="address-text-top-part2">
                                <span>Shipping Office</span>
                                <?php
                                if( get_field('shipping_office', $post->ID) )
                                {
                                    echo get_field('shipping_office', $post->ID);
                                }
                                ?>
                            </div>
                            <div class="address-text-top-part3">
                                <span>Main Office</span>
                                <?php
                                if( get_field('main_office', $post->ID) )
                                {
                                    echo get_field('main_office', $post->ID);
                                }
                                ?>
                            </div>
                            
                        </div>
                        <div class="address-text-bottom">
                            <div class="address-text-bottom-part1">
                                <span>Mailing Address</span>
                                <?php
                                if( get_field('mailing_address', $post->ID) )
                                {
                                    echo get_field('mailing_address', $post->ID);
                                }
                                ?>
                            </div>
                            
                            <div class="address-text-bottom-part2">
                                <span>Look us up on Blue Book !</span>
                                <?php
                                if( get_field('blue_book', $post->ID) )
                                {
                                    echo get_field('blue_book', $post->ID);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                       
            
            <div class="hours-operation">
                <div class="coldstorage">
                    <div class="coldstorage-title">
                        <div class="coldstorage-title-inner">
                            <h2>Cold Storage hours of Operation</h2>
                        </div>
                    </div>
                    <div class="coldstorage-text">
                        <?php
                            if( get_field('cold_storage_operation', $post->ID) )
                            {
                                echo get_field('cold_storage_operation', $post->ID);
                            }
                        ?>
                    </div>
                </div>
                
                <div class="officestorage">
                    <div class="officestorage-title">
                        <div class="officestorage-title-inner">
                            <h2>Office hours hours of Operation</h2>
                        </div>
                    </div>
                    <div class="officestorage-text">
                        <?php
                            if( get_field('office_hours_operation', $post->ID) )
                            {
                                echo get_field('office_hours_operation', $post->ID);
                            }
                        ?>
                    </div>
                </div>
            </div>
            
        </div>  
    </div>
</div>
















<?php /*
<!--contact  part-->

<div class="wrapper">

    <div class="innerContent-top">
    		
        <div class="container">
        	<h3>Get connected with us</h3>
            <h5>Please fill up this form to reach us quickly</h5>
     	</div>
        
    </div>	
    
	
</div>

<!--contact  part end-->


<!--news  part-->

<div class="wrapper">
	<div class="innerContent-middle">
        <div class="container">
        	<div class="map">
            	<h5>Find us on map</h5>
                <?php
                if( get_field('find_us_on_map', $post->ID) )
                {
                    echo get_field('find_us_on_map', $post->ID);
                }
                ?>
                

            </div>
        	
            <div class="address">
            	<h5>Our Office address</h5>
                <div class="address-inner">
                	<div class="address-Image">
                        <?php
                        if( get_field('office_image', $post->ID) )
                        {?>
                            
                        <img src="<?php echo get_field('office_image', $post->ID); ?>" alt="" />
                        <?php
                        }else{
                            ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/contact-img.png" alt="" />    
                        <?php
                        }
                        ?>
                    	
                    </div>
                    <div class="address-text">
                    	<div class="address-text-top">
                        	<div class="address-text-top-part1">
                            	<span>Warehouse Addres</span>
                                <?php
                                if( get_field('warehouse_addres', $post->ID) )
                                {
                                    echo get_field('warehouse_addres', $post->ID);
                                }
                                ?>
                            </div>
                            <div class="address-text-top-part2">
                            	<span>Shipping Office</span>
                                <?php
                                if( get_field('shipping_office', $post->ID) )
                                {
                                    echo get_field('shipping_office', $post->ID);
                                }
                                ?>
                            </div>
                            <div class="address-text-top-part3">
                            	<span>Main Office</span>
                                <?php
                                if( get_field('main_office', $post->ID) )
                                {
                                    echo get_field('main_office', $post->ID);
                                }
                                ?>
                            </div>
                        	
                        </div>
                        <div class="address-text-bottom">
                        	<div class="address-text-bottom-part1">
                            	<span>Mailing Address</span>
                                <?php
                                if( get_field('mailing_address', $post->ID) )
                                {
                                    echo get_field('mailing_address', $post->ID);
                                }
                                ?>
                            </div>
                            
                            <div class="address-text-bottom-part2">
                            	<span>Look us up on Blue Book !</span>
                                <?php
                                if( get_field('blue_book', $post->ID) )
                                {
                                    echo get_field('blue_book', $post->ID);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="customcreat-applicaion">
            	<div class="customcreat-applicaion-inner">
            		<h2>Customer Credit Application</h2>
                    <p>Requires Adobe Acrobat Reader 5.0 and above</p>
                </div>
                <div class="download-option">
					<?php
                                if( get_field('customer_credit_application', $post->ID) )
                                {
                                    
									echo '<a href="'.get_field('customer_credit_application', $post->ID).'">Download Now</a>';
                                }
                                ?>
                	
                </div>
            </div>
            
            <div class="hours-operation">
            	<div class="coldstorage">
                	<div class="coldstorage-title">
                        <div class="coldstorage-title-inner">
                            <h2>Cold Storage hours of Operation</h2>
                        </div>
                	</div>
                    <div class="coldstorage-text">
                    	<?php
							if( get_field('cold_storage_operation', $post->ID) )
							{
								echo get_field('cold_storage_operation', $post->ID);
							}
						?>
                    </div>
                </div>
                
                <div class="officestorage">
                	<div class="officestorage-title">
                        <div class="officestorage-title-inner">
                            <h2>Office hours hours of Operation</h2>
                        </div>
                	</div>
                    <div class="officestorage-text">
                    	<?php
							if( get_field('office_hours_operation', $post->ID) )
							{
								echo get_field('office_hours_operation', $post->ID);
							}
						?>
                    </div>
                </div>
            </div>
            
        </div>	
    </div>
</div>

<!--news  part end-->
*/?>

<!-- footer part-->
<?php get_footer(); ?>
<!--footer  part end-->

