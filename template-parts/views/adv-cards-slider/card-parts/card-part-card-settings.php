<?php
/**
 ** ADVANCED CARD PART - Card Settings
 **/
        $space = ' ';

        // Set Card Variables
        $li_attr = $settings['slider_attr']['elem_li'];
        $comp_attrs = $settings['card_attr']['comp'];
        $media_wrapper = $settings['card_attr']['media_wrapper'];
        $header = $settings['card_attr']['header'];
        $body = $settings['card_attr']['body'];
        $footer = $settings['card_attr']['footer'];
        $theme_bg_color = $settings["card_style"]["theme_bg_clr"] ?: 'uk-card-default';
        $custom_bg_color = isset($settings["card_style"]["custom_bg_clr"]) ? $settings["card_style"]["custom_bg_clr"] : '';
        $card_accent_style = isset($settings["card_style"]["card_accent_style"]) ? $settings["card_style"]["card_accent_style"] :'';
        $media_pos = isset($settings["media_pos"]) ?: '';
        $perm_link = $settings["perm_link"];

        if($card_accent_style){
            // set color-picker background for all cards 
            $card_bg = $card_accent_style;
            $thumb_bg = false;
            $bg_color_string = '';
        }else{
            if($custom_bg_color){
                // set color-picker background for all cards 
                $card_bg = false;
                $thumb_bg = false;
                $bg_color_string = ' style="background-color:'.$custom_bg_color.';" ';
            }else{
                $bg_color_string = false;
                // set uk-backgrounds 
                switch ($theme_bg_color) {
                    case 'muted':
                        $card_bg = 'uk-card-default';
                        $thumb_bg = 'uk-background-muted';
                        break;
                    case 'primary':
                        $card_bg = 'uk-card-primary';
                        $thumb_bg = 'uk-background-primary';
                        break;
                    case 'secondary':
                        $card_bg = 'uk-card-secondary';
                        $thumb_bg = 'uk-background-secondary';
                        break;
                    default:
                        $card_bg = 'uk-card-default';
                        $thumb_bg = 'uk-background-default';
                }
            }
        }

?>