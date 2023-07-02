<?php

$chosen_view = 'none';

function initCxtVars($block){ // Will initialize contextual variables

    $views = get_field('view_as') ?: 'card';
    $card_size = get_field('card_size');  
    $within_slider = get_field('within_slider');
    $with_filter = get_field('with_filter');
    $perm_link = get_field('perm_link');
    $gaps = get_field('gaps');
    $slider = get_field('slider') ?: '';
    $code_view = get_field('code_view') ?: null;
    $content = get_field('content') ?: null;
    $card_attr = get_field('card_attr') ?: null;
    $card_style = get_field('card_style') ?: null;
    $media_pos = get_field('media_pos') ?: null;
    $slider_attr = get_field('slider_attr') ?: null;
    $filter = get_field('filter') ?: null;
    $taxonomy = isset($filter['filter_taxonomy']) ?: '';
    
    
    $returnValues = array(
        // Context-bound variables
        'view'  => $views, // card vs thumbnail
        'slider'  => $slider, // slider[dot_nav, arrow_nav, card_size]
        'content'  => $content,
        'card_attr'  => $card_attr, // card class, attributes]
        'slider_attr'  => $slider_attr, // card class, attributes]
        'card_style'  => $card_style, // card[background, padding]
        'card_size'  => $card_size,
        'within_slider'  => $within_slider,
        'with_filter'  => $with_filter,
        'perm_link'  => $perm_link,
        'gaps'  => $gaps,
        'filter'  => $filter,
        'taxonomy' => $taxonomy,
        'media_pos' => $media_pos
    );
    return $returnValues;
}

function buildQueryArgs($block){ // Build the arguments for the query
    
    $sort = get_field('sort') ?: null;
    $order = get_field('order') ?: null;
    $limit = get_field('limit') ?: -1;
    $type = get_field('post_type') ?: 'demo';

    //var_dump($order);
    // Custom WP query query
    $args_query = array(
        'post_type' => array($type),
        'posts_per_page' => $limit,
        'order' => $sort['by'], // ASC or DESC
        'orderby' => $order['by'],
        'tax_query' => array(),
        'tag' => '',
    );
    return $args_query;
}


function render_the_view($view, $query = null, $id = 'view-content', $classes = null, $settings = null){
    if(!$query){
        global $wp_query;
      $query = $wp_query;
    }

    $fxString = 'adv'.ucfirst($view).'View';
    
    $viewObject = Null;

    try{
          $view_args = array($query, $id, $classes, $settings);
          $viewClass = new ReflectionClass($fxString);
          $viewObject = $viewClass->newInstanceArgs($view_args);
      }
      catch(Exception $e){
                  
          $viewObject = new cardView($query, $id, $classes, $settings);
      }
      $viewObject->render();
    
    } // end render_the_view


function initContentVars($block){
    $contentVars = Array();
    if( have_rows('content') ){
        while( have_rows('content') ){
            the_row();
            
            $temp = Array(
                'ctx' => get_sub_field('ctx'),
                'icon_opt' => get_sub_field('icon_opt'),
                'code_view' => get_sub_field('code_view'),
                'button_href' => get_sub_field('button_href'),
                'button_text' => get_sub_field('button_text'),
                'link_opt' => get_sub_field('link_opt'),
                'img_upload' => get_sub_field('img'),
                'img_width' => get_sub_field('width'),
                'img_height' => get_sub_field('height'),
                'elem_class' => get_sub_field('class'), // class for code_view element
                'elem_attr' => get_sub_field('attr'),
                'elem_name' => get_sub_field('name'),
                'elem_tag' => get_sub_field('tag'),
                'elem_href' => get_sub_field('href'),
                'icon_attr' => get_sub_field('icon_attr'),
                'icon_name' => get_sub_field('icon_name'),
                'icon_source' => get_sub_field('icon_source'),
                'date_format' => get_sub_field('date_format'),
            );
            array_push($contentVars, $temp);
        }
    }
    return $contentVars;
}


function initAdvCardsSlider( $block = null ){
    
    //var_dump($block);
    
    $blockVars = initBlockVars( $block, 'adv' , 'ppx-adv-slider' ); // store top-level block variables
    $ctxVars = initCxtVars($block); // store contextual variables (context in this instance is a slider)
    $contentVars = initContentVars($block); // store variables specific to the content of the context

    $args_query = buildQueryArgs($block);
    
    $query = new WP_Query( $args_query );    

    $settings = Array(
        'block_attr' => $blockVars['attr'],
        'view' => $ctxVars['view'],
        'card_attr'  => $ctxVars['card_attr'],
        'slider_attr'  => $ctxVars['slider_attr'],
        'card_style'  => $ctxVars['card_style'],
        'card_content'  => $contentVars,
        'slider_options'  => $ctxVars['slider'],
        'card_size' => $ctxVars['card_size'],
        'within_slider' => $ctxVars['within_slider'],
        'with_filter' => $ctxVars['with_filter'],
        'gaps' => $ctxVars['gaps'],
        'filter' => $ctxVars['filter'],
        'taxonomy' => $ctxVars['taxonomy'],
        'media_pos' => $ctxVars['media_pos'],
        'perm_link' => $ctxVars['perm_link']

    );

        
    if ( $query->have_posts() ) {
        render_the_view($ctxVars["view"], $query, $blockVars["id"], $blockVars["className"], $settings); 
        } else { 
            ppx_no_content_card();
        }

    // MAKES VARIABLES FROM FUNCTION ACCESSIBLE TO JAVASCRIPT
    if( ! wp_script_is('ppx_acs_script') ){
        
        // Register our main script but do not enqueue it yet
         wp_enqueue_script( 'ppx_acs_script', get_template_directory_uri() . '/template-parts/views/adv-cards-slider/adv-cards-slider.js', array('jquery'), '1.0', true );
    
        $ppx_acs_params = array(
            'nonce' => wp_create_nonce( 'ppx_acs_nonce' ),
            'action' => 'acsPanels_ajax_handler',
            'query' => json_encode($query->query_vars),
            'className' => $blockVars['className'],
            'id' => $blockVars['id'],
            'settings' => json_encode($settings)
        );

        wp_add_inline_script( 'ppx_acs_script', 'const ppx_acs_params = ' . json_encode( $ppx_acs_params ), 'before' );
    }
        wp_reset_postdata();
    
    } // initAdvCardsSlider

/**
* Ajax handler for ppx-adv-panels-view load more button
*/

if ( !function_exists( 'acsPanels_ajax_handler' ) ) {
function acsPanels_ajax_handler(){
    
    if ( !wp_verify_nonce($_POST['nonce'], 'ppx_acs_nonce') ){ 
    die('Permission Denied.'); 
    }

    // Get settings
    $settings = json_decode( stripslashes( $_POST['settings'] ), true );
    $taxonomy = ($settings['taxonomy']);
    $view = ($settings['view']);
        
    //var_dump($tagsTest);
    
    
	// Set query arguments
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['post_status'] = 'publish';
    $tax_term = $_POST['tax-term'];
    
    // Test for custom taxonomies
    if($tax_term){
        $tax_query = array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $tax_term,
            ),
        );
    } else {
        $tax_query = '';
    }
    
	$args['tax_query'] = $tax_query;
	$args['tag'] = $_POST['tag'] ?: '';
    
	// Custom properties
	$id = $_POST['id'];
	$className = $_POST['className'];
        
	$query = new WP_Query( $args );
        
    //$query_vars = $query->query_vars;
            
	if ( $query->have_posts() ) {
		$viewObject = Null;
        $fxString = 'adv'.ucfirst($view).'View';
		
        try{
            $view_args = array($query, $id, $className, $settings);
            $viewClass = new ReflectionClass($fxString);
            $viewObject = $viewClass->newInstanceArgs($view_args);
        }
        catch(Exception $e){
            $viewObject = new cardView($query, $id, $classes, $settings);
        }
		
		$viewObject->renderAdvContent();

		
	} else { ?>
 		<div class="uk-card uk-card-secondary uk-card-body">
			<h2 class="uk-card-title">Sorry!</h2>
			<p>There is no content to show at this time.</p>
		</div>
 	<?php }
 
	die; // here we exit the script and even no wp_reset_query() required!
    }
}

if( function_exists('acsPanels_ajax_handler') ){
	add_action('wp_ajax_acsPanels_ajax_handler', 'acsPanels_ajax_handler'); // wp_ajax_{action}
	add_action('wp_ajax_nopriv_acsPanels_ajax_handler', 'acsPanels_ajax_handler');
}


// FUNCTION TO RETURN CONTENT FOR ADVANCE CARD
if ( ! function_exists( 'ppx_get_content' ) ) {
function ppx_get_content($code_view = false){
     // Check value exists.
      if( $code_view ){

          // Loop through rows.
          foreach ( $code_view as $view ){   
              
              // Case: Custom Code ------------------------------------------------
              if($view['acf_fc_layout'] == 'code'){
                  return $view['text'] ?: '';
              }
              
              // Case: Wordpress Post Data -----------------------------------------
              elseif($view['acf_fc_layout'] == 'wp_data'){
                  
                switch ($view['ppx_wp_field']) {
                    case 'ppx_permalink':
                        return get_permalink(get_the_ID());
                        break;
                    case 'ppx_thumbnail':
                        return get_the_post_thumbnail_url(get_the_ID()); 
                        break;
                    case 'ppx_author':
                        return get_the_author_meta('display_name',get_post_field('post_author'));
                        break;
                    default:
                       $post_field = get_post_field($view['ppx_wp_field']);
                        //var_dump($post_field);
                        return $post_field;
                } // end switch
              } // end if
              
              // Case: Wordpress Post Data -----------------------------------------
              elseif($view['acf_fc_layout'] == 'custom_data'){                  
                  return get_post_meta( get_the_ID(), $view['ppx_custom_field'], true );
              }
          } //end forech;
      } // end if
      // No value.
      else{
    return null;
        }
    }
}


// FUNCTION TO RETURN ADVANCE CARD CODE AS CONTENT
if ( ! function_exists( 'ppx_get_code_content' ) ) {
function ppx_get_code_content($code_view = false){
    
    $temp = Array();
    
     // Check value exists.
      if( $code_view ){

          // Loop through rows.
          foreach ( $code_view as $view ){   
              
              // Case: Custom Code ------------------------------------------------
              if($view['acf_fc_layout'] == 'code'){
                  array_push($temp, $view['text'] ?: '');
              }
              
              // Case: Wordpress Post Data -----------------------------------------
              if($view['acf_fc_layout'] == 'wp_data'){
                  
                switch ($view['ppx_wp_field']) {
                    case 'ppx_permalink':
                        array_push($temp, get_permalink(get_the_ID()));
                        break;
                    case 'ppx_thumbnail':
                        array_push($temp, get_the_post_thumbnail_url(get_the_ID())); 
                        break;
                    case 'ppx_author':
                        array_push($temp, get_the_author_meta('display_name',get_post_field('post_author')));
                        break;
                    default:
                       $post_field = get_post_field($view['ppx_wp_field']);
                        array_push($temp, $post_field);
                } // end switch
              } // end if
              
              // Case: Wordpress Post Data -----------------------------------------
              if($view['acf_fc_layout'] == 'custom_data'){                  
                  array_push($temp, get_post_meta( get_the_ID(), $view['ppx_custom_field'], true ));
              }
              
          } //end forech;
      } // end if
        $result = implode("",$temp);
        return $result;
    }
}


?>