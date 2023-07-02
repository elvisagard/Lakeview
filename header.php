<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PPx_Starter_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class("sda-grid"); ?>>

<?php 
//PPX-HEAD 1.0 HEADER
?>
<div id="page" class="site grid-content">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lv-base' ); ?></a>

	<header id="masthead" class="site-header uk-flex uk-flex-middle uk-child-width-expand">
        
        <?php //PPX-HEAD 2.0 NAVIGATION ?>
		<nav id="site-navigation" class="uk-container uk-navbar" uk-navbar>
<!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'lv-base' ); ?></button>-->
               
                <div class="uk-navbar-left lv-nav-leftt">
                <?php echo get_custom_logo() ?>
                </div>

                <?php //PPX-HEAD 2.5 DESKTOP NAV ?> 
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'menu-primary-desktop',
                    'menu_id'           => 'primary-menu',
                    'menu_class'        => 'uk-navbar-nav',
                    'container'         => 'div',
                    'container_class'   => 'lv-nav-center uk-navbar-center uk-visible@l',
                ) );
                ?>

               <?php //PPX-HEAD 2.1 DESKTOP NAV ?>
               <div class="lv-nav-rightt uk-navbar-right uk-visible@l ">
                    <ul class="uk-iconnav">
                            <li class="uk-flex uk-flex-center uk-flex-middle"><a href="#" uk-icon="icon: facebook; ratio: 1.1" uk-tooltip="title: Facebook"></a></li>
                            <li class="uk-flex uk-flex-center uk-flex-middle"><a href="#" uk-icon="icon: calendar; ratio: 1.1" uk-tooltip="title: Events Calendar"></a></li>
                            <li class="uk-flex uk-flex-center uk-flex-middle"><a href="#" uk-icon="icon: user; ratio: 1.1" uk-tooltip="title: Login"></a></li>
                            <li class="uk-flex uk-flex-center uk-flex-middle more-menu"><a href="#" uk-icon="icon: more-vertical; ratio: 1.1" uk-tooltip="title: More Menus"></a></li>
                    </ul>
                    <button class="uk-button uk-margin-medium-left uk-border-pill orange lv-pill-sm">GIVE</button>
                </div>

                <!--Side Menu Toggle -->
                
                <?php 
                //PPX-HEAD 2.2 SET DROPDOWN STYLE
                $ppx_dropdown = false; //------- Set dropdown style here ?>
                
                <div class="lv-nav-right uk-navbar-right uk-hidden@l">
                    <button class="uk-navbar-toggle" uk-navbar-toggle-icon <?php if(!$ppx_dropdown){ ?>uk-toggle="target: #sidenav"<?php } ?> ></button>
                </div>
                
                <?php //PPX-HEAD 2.3 DROPDOWN NAV ?>
                <?php if($ppx_dropdown): ?>
                <div class="lv-mobile-dropdown" uk-dropdown="mode: click">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'menu-primary-mobile',
                            'menu_id'           => 'mobile-menu',
                            'menu_class'        => 'uk-nav-default uk-dropdown-nav uk-nav-parent-icon',
                        ) );
                        ?>
                </div>
                <?php endif; ?>
                
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
   
    <?php //PPX-HEAD 2.4 OFFSET NAV ?>
    <?php if( !$ppx_dropdown ): ?>
    <div id="sidenav" uk-offcanvas="overlay: true" class="uk-hidden@l">
        <div class="uk-offcanvas-bar">
            <a class="uk-close-large uk-align-right uk-hidden@l" uk-toggle="target: #sidenav" uk-close></a>
            <?php
                wp_nav_menu( array(
                    'theme_location'    => 'menu-primary-mobile',
                    'menu_id'           => 'mobile-menu',
                    'menu_class'        => 'uk-nav-default uk-nav-parent-icon',
                    'container'         => 'div',
                    'container_class'   => 'mobile-menu-wrapper',
            ) );
            ?>
        </div>
    </div>
    <?php endif ?>

	<div id="content" class="site-content">
