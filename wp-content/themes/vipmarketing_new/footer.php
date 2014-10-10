<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<!-- footer part-->
<div class="wrapper">
    <div class="container">
        <div class="footer">
            <div class="footerLeft">
                <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri().'/images/footerlogo.png'; ?>" alt="" /></a>
            </div>
            <div class="footerMiddle">
                    <div class="footaddrSection">
                        <h4>VIP Marketing Inc.</h4>
                        <span>213-833-7784 Office</span>
                        <span>213-833-7788 Fax</span>
                        <span>sales@vipmarketingla.com</span>
                    </div>  
                    <div class="footaddrSection" style="border-left: 1px solid;">
                        <h4>Value Cold Storage</h4>
                        <span>213-833-7784 Office</span>
                        <span>213-833-7788 Fax</span>
                        <span>cs@valueproducela.com</span>
                    </div>  
                    <div class="footaddrSection" style="border-left: 1px solid;">
                        <h4>Mailing Address</h4>
                        <span>PO Box 861389</span>
                        <span>Los Angeles, CA 90086</span>
                    </div>  
            </div>
            <div class="footerRight">
                <!--contactSocial start-->  
                <div class="contactSocial">
                   <?php
                        global $wpdb;
                        $sqlData="SELECT * FROM wp_header_footer";
                        $rsData=$wpdb->get_row($sqlData);
                        if(isset($rsData))
                        {
                    ?>
                    <ul>
                        <li><a href="<?php echo $rsData->facebook_link; ?>" class="facebook">facebook</a></li>
                        <li><a href="<?php echo $rsData->twitter_link; ?>" class="twiter">twiter</a></li>
                        <!--<li><a href="<?php //echo $rsData->pinterest_link; ?>" class="pinterest">Pinterest</a></li>-->
                    </ul>
                    <?php
                    }
                    ?>
                
                </div>
                 <!--contactSocial end--> 
            </div>
        </div>
    </div>
</div>
<!--footer  part end-->



<?php wp_footer(); ?>
</body>
</html>