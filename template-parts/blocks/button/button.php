<?php
/**
 * PPx Button Template
 */

// Set block variables

$space = ' ';
$empty = '';

$blockVars = initBlockVars($block,'ppx-button','ppx-button');
    $block_id = $blockVars['id'] ?: $space;
    $block_cls = $blockVars['className'] ?: null;
    $block_attr = $blockVars['attr'] ?: null;

$text = get_field('text') ?: $empty;
$style = get_field('style') ?: 'uk-button-default';
$size = get_field('size') ?: $empty;
$disable = get_field('disable') ? 'disabled': $empty;
$element = get_field('element') ?: 'anchor';
$url = get_field('url') ?: $empty;

?>

<?php if( $text && $url && $element == 'anchor' ):?>
    <a 
       id="<? echo esc_attr($block_id); ?>" 
       class="uk-button <?php echo esc_attr($block_cls) ?> <?php echo esc_attr($style) ?> <?php echo esc_attr($size) ?>" href="<?php echo esc_url($url) ?>" 
       <?php echo $block_attr ?> 
        >
            <?php echo $text ?>
    </a>
<?php endif; ?>

<?php if( $text && $element == 'button' ):?>
    <button 
        id="<? echo esc_attr($block_id); ?>" 
        class="uk-button <?php echo esc_attr($block_cls) ?> <?php echo esc_attr($style) ?> <?php echo esc_attr($size) ?>"  
        <?php echo $block_attr ?> <?php echo $disable ?> 
        >
            <?php echo $text ?>
    </button>
<?php endif; ?>