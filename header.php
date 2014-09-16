<!DOCTYPE html>
<?php global $data;?>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<head>
	    <!-- IE6-8 support of HTML5 elements --> 
        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    
    <!-- Meta Tags -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>
		<?php if (is_home() || is_front_page()){
            bloginfo('name'); echo ' | '; bloginfo('description');
        } else {
            wp_title('');
        }?>
        </title>
        <!--<meta name="description" content="HTML template by Kraftives"/>
        <meta name="keywords" content="HTML5, CSS3, JavaScript, Jquery"/>
        <meta name="author" content="Kraftives"/>-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Favicon -->
    	<?php //@TODO from theme options panel ?>
    	<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/favicon.ico" >
	
    <!-- Stylesheets -->
        <link href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo get_template_directory_uri();?>/assets/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="<?php echo get_template_directory_uri();?>/assets/css/folio-font.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />

	
        
    <!-- Colors Presets Stylesheets -->
    	<?php //@TODO select SWITCHER enqueue it from theme options panel enabling in sripts file?>
        <!--<link href="switcher/switcher.css" rel="stylesheet" type="text/css" />-->

    <!-- Google fonts -->
    	<?php //@TODO select COLORS enqueue it from theme options panel enabling in sripts file?>
        <?php /*?>echo "<!-- Primary Font -->
		<link href='//fonts.googleapis.com/css?family=".$primary_font.":200,300,400,600,500,700,800,200italic,300italic,400italic,500italic,600italic,700italic,800italic' rel='stylesheet' type='text/css'>";<?php */?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,300,800,300italic,700italic,800italic' rel='stylesheet' type='text/css'>
        <!-- font-family: 'Open Sans', sans-serif; -->
    
	<!-- jQuery -->
    	<?php //@TODO ENQUEU FROM JS SCRIPT FILE ?>
 	
    <!--[if IE]>
 		<link rel="stylesheet" type="text/css"  href="<?php echo get_template_directory_uri();?>/assets/css/ie_style.css"/><![endif]-->
		<script type="text/javascript">
			//For IE 10
			if(Function('/*@cc_on return document.documentMode===10@*/')()){
				var headHTML = document.getElementsByTagName('head')[0].innerHTML;
				headHTML    += '<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/ie_style.css">';
				document.getElementsByTagName('head')[0].innerHTML = headHTML;
			}
			
			//For IE 11
			if(navigator.userAgent.match(/Trident.*rv:11\./)) {
				var headHTML = document.getElementsByTagName('head')[0].innerHTML;
				headHTML    += '<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/ie_style.css">';
				document.getElementsByTagName('head')[0].innerHTML = headHTML;
			}
        </script>
        
        <?php if (wp_count_posts()->publish > 0) : ?>
        		<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
        <?php endif; ?>
        
        <?php 
		wp_head(); ?>
		
		<!-- Dark Style -->
    	<?php //SELECT STYLE_DARK enqueue it from theme options panel enabling in sripts file
        if($data['theme_mode']==="dark_mode"){?>
    	<link href="<?php echo get_template_directory_uri().'/assets/css/style_dark.css';?>" rel="stylesheet" type="text/css" />
        <?php
		}// end if($data['theme_mode']==="dark_mode")

		// Color Scheme Type 1. Predefined OR 2. Dynamic color trhough PHP file 
		if($data['color_scheme_type']==="predefined_colors"){?>
        	<!-- Color Scheme Layout -->
            
			<link href="<?php echo get_template_directory_uri().'/assets/css/colors/'.$data['predefined_color_theme']; ?>" rel="stylesheet" type="text/css" id="layout-css" />
        <?php
		}elseif($data['color_scheme_type']==="custom_skin"){?>
			<!-- Color Scheme Layout -->
			<link href="<?php echo home_url() . '/?dynamic-style-colors=css'; ?>" rel="stylesheet" type="text/css" id="layout-css" />
        <?php
		}
		// Custom Javascript Code from theme options
		if($data['custom_js_code']!='') { ?>

        <script type="text/javascript">

          <?php echo $data['custom_js_code']; ?>

        </script>

        <?php } ?>

		<?php 
		// Google Analytics Code from theme options
		if($data['custom_js_code']!='') { ?>
        <script type="text/javascript">
			<?php echo $data['custom_js_code']; ?>
        </script>
        <?php } ?>
    
</head>

<body <?php if(is_page_template('temp-onepage.php')){body_class('onepagetemp');} ?>>
	
	<?php // Below menu bar ONLY VISISBLE FOR INNER PAGES OTHER THEN ONE PAGE TEMPLATE ?>
<?php
	// call menu template checkign whther to show in one page slider module
	// added is_home() to identify that whether its blog on home page then show the menu here
	global $post;
	$main_menu_position = get_post_meta($post->ID, 'menu_position', true )?get_post_meta($post->ID, 'menu_position', true ):"";
	if( $main_menu_position==="" || $main_menu_position === 'false' || is_home()):
			get_template_part( 'templates/menu-template' );
	endif;