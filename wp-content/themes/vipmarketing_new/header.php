<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php bloginfo( 'template_url' ); ?>/css/style.css" rel="stylesheet">
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<!--header-contactpart-->
<div class="wrapper">
    <div class="headerContact">
        <div class="container">
            <div class="headerContactInner">
                <!--navigation part part-->
                <div class="navigation">
                    <ul>
                        <?php wp_nav_menu( array( 'theme_location' => 'vipmarketingmenu', 'menu_class' => 'nav-menu' ) ); ?>
                    </ul>
                </div>
               <!--navigation part part--> 
         
            
            <!--contactSocial start-->  
                <div class="contactSocial">
                    <span style="padding-left: 25%;float: left;">Connect </span>
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
<!--header-contactpart end-->