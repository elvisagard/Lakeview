<?php

// Will initialize block variables
function initBlockVars($block, $id_prefix='block-id', $block_class_name='block-class' ){ 
    
    // Set the block id
    if( get_field('block_id') ){ //if set id from ACF editor
        $id = get_field('block_id');
    }
    elseif( isset($block['id']) ){ // Use default Gutenburg editor assignment
        $id = $id_prefix. '-' . $block['id'];
    }
    else{ 
       $id = null; 
    }

    // Set "className" and "align" values.
    $className = $block_class_name;
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    
    $attr = get_field('block_attr') ?: '';

    
    // Prepare output as array
    $returnValues = array(
            'id'      => $id,
            'className'   => $className,
            'attr'   => $attr,
    );
    return $returnValues;
}


// For a given group field, returns array with the class and attribute subfields  
function getGroupClsAttr($group_field){
    $result = array();
    $field_parent = get_field($group_field);
    if( $field_parent ){
        $result['cls'] = $field_parent['cls'] ?: '';
        $result['attr'] = $field_parent['attr'] ?: '';
    }
return $result;
}

// For a given group field, returns array with the width and height subfields  
function getGroupWidthHeight($group_field){
    $result = array();
    $field_parent = get_field($group_field);
    if( $field_parent ){
        $result['w'] = $field_parent['width'] ?: '';
        $result['h'] = $field_parent['height'] ?: '';
    }
return $result;
}