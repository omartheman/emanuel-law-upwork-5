<?php
/* banner-php */

if (!function_exists('monolit_hex2rgb')) {
    function monolit_hex2rgb($hex) {
        
        $hex = str_replace("#", "", $hex);
        
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } 
        else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        return $rgb;
    }
}
if (!function_exists('monolit_colourBrightness')) {
    
    /*
     * $hex = '#ae64fe';
     * $percent = 0.5; // 50% brighter
     * $percent = -0.5; // 50% darker
    */
    function monolit_colourBrightness($hex, $percent) {
        
        // Work out if hash given
        $hash = '';
        if (stristr($hex, '#')) {
            $hex = str_replace('#', '', $hex);
            $hash = '#';
        }
        
        /// HEX TO RGB
        $rgb = monolit_hex2rgb($hex);
        
        //// CALCULATE
        for ($i = 0; $i < 3; $i++) {
            
            // See if brighter or darker
            if ($percent > 0) {
                
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
            } 
            else {
                
                // Darker
                $positivePercent = $percent - ($percent * 2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
            }
            
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        
        //// RBG to Hex
        $hex = '';
        for ($i = 0; $i < 3; $i++) {
            
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            
            // Add a leading zero if necessary
            if (strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            
            // Append to the hex string
            $hex.= $hexDigit;
        }
        return $hash . $hex;
    }
}
if (!function_exists('monolit_bg_png')) {
    function monolit_bg_png($color, $input, $output) {
        $image = imagecreatefrompng($input);
        $rgbs = monolit_hex2rgb($color);
        $background = imagecolorallocate($image, $rgbs[0], $rgbs[1], $rgbs[2]);
        
        imagepng($image, $output);
    }
}

if (!function_exists('monolit_stripWhitespace')) {
    
    /**
     * Strip whitespace.
     *
     * @param  string $content The CSS content to strip the whitespace for.
     * @return string
     */
    function monolit_stripWhitespace($content) {
        
        // remove leading & trailing whitespace
        $content = preg_replace('/^\s*/m', '', $content);
        $content = preg_replace('/\s*$/m', '', $content);
        
        // replace newlines with a single space
        $content = preg_replace('/\s+/', ' ', $content);
        
        // remove whitespace around meta characters
        // inspired by stackoverflow.com/questions/15195750/minify-compress-css-with-regex
        $content = preg_replace('/\s*([\*$~^|]?+=|[{};,>~]|!important\b)\s*/', '$1', $content);
        $content = preg_replace('/([\[(:])\s+/', '$1', $content);
        $content = preg_replace('/\s+([\]\)])/', '$1', $content);
        $content = preg_replace('/\s+(:)(?![^\}]*\{)/', '$1', $content);
        
        // whitespace around + and - can only be stripped in selectors, like
        // :nth-child(3+2n), not in things like calc(3px + 2px) or shorthands
        // like 3px -2px
        $content = preg_replace('/\s*([+-])\s*(?=[^}]*{)/', '$1', $content);
        
        // remove semicolon/whitespace followed by closing bracket
        $content = preg_replace('/;}/', '}', $content);
        
        return trim($content);
    }
}

if (!function_exists('monolit_add_rgba_background_inline_style')) {
    function monolit_add_rgba_background_inline_style($color = '#ed5153', $handle = 'skin') {
        $inline_style = '.testimoni-wrapper,.pricing-wrapper,.da-thumbs li  article,.team-caption,.home-centered{background-color:rgba(' . implode(",", hex2rgb($color)) . ', 0.9);}';
        wp_add_inline_style($handle, $inline_style);
    }
}

if (!function_exists('monolit_overridestyle')) {
    function monolit_overridestyle() {
        global $monolit_options;
        $inline_style = '
body {background-color:' . $monolit_options['main-bg-color']['rgba'] . ';}
header.monolit-header {background-color:' . $monolit_options['navigation-bg-color']['rgba'] . ';}
header.monolit-header nav li ul {background-color:' . $monolit_options['submenu-bg-color']['rgba'] . ';}
@media only screen and (max-width:1036px){.nav-holder {background-color:' . $monolit_options['mobile-submenu-bg-color']['rgba'] . ';top:80px;padding-top:10px;}}
.share-inner {background-color:' . $monolit_options['social-share-bg-color']['rgba'] . ';}
.share-inner {top:80px;}
.share-container {line-height:60px;}
.visshare {height:60px;}
footer.content-footer {background:' . $monolit_options['footer-bg-color']['rgba'] . ';}
footer.fixed-footer {background:' . $monolit_options['left-footer-bg-color']['rgba'] . ';}
.content {background-color:' . $monolit_options['white-sec-bg-color'] . ';}
.dark-bg {background-color:' . $monolit_options['dark-sec-bg-color'] . ';}
.dark-bg .section-title  , .dark-bg,.dark-bg .num,.dark-bg .inline-facts h6,.dark-bg .skills-description {color:' . $monolit_options['dark-bg-text-color'] . ';}
.dark-bg .section-title.dec-title span:before {background:' . $monolit_options['dark-bg-text-color'] . ';}
.dark-bg .sect-subtitle {color:' . $monolit_options['dark-bg-text-color'] . ';}
.dark-bg .sect-subtitle:after,.dark-bg .sect-subtitle:before,.dark-bg .inline-facts-holder:before {background:' . $monolit_options['dark-bg-text-color'] . ';}
.overlay {background:' . $monolit_options['overlay-bg-color']['rgba'] . ';}
.port-desc-holder:before {
    background: -moz-linear-gradient(top, ' . $monolit_options['folio-overlay-bg-color']['from'] . ' 0%, ' . $monolit_options['folio-overlay-bg-color']['to'] . ' 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,' . $monolit_options['folio-overlay-bg-color']['from'] . '), color-stop(100%,' . $monolit_options['folio-overlay-bg-color']['to'] . ')); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, ' . $monolit_options['folio-overlay-bg-color']['from'] . ' 0%,' . $monolit_options['folio-overlay-bg-color']['to'] . ' 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top, ' . $monolit_options['folio-overlay-bg-color']['from'] . ' 0%,' . $monolit_options['folio-overlay-bg-color']['to'] . ' 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top, ' . $monolit_options['folio-overlay-bg-color']['from'] . ' 0%,' . $monolit_options['folio-overlay-bg-color']['to'] . ' 100%); /* IE10+ */
    background: linear-gradient(to bottom, ' . $monolit_options['folio-overlay-bg-color']['from'] . ' 0%,' . $monolit_options['folio-overlay-bg-color']['to'] . ' 100%); /* W3C */
}
.portfolio_item .port-desc-holder:before , .gallery-item .port-desc-holder:before{
     opacity:0.4;
}
.footer-item, .footer-item p, .footer-item span {color:' . $monolit_options['footer-text-color'] . ';}
.footer-item a, .footer-item ul li a {color:' . $monolit_options['footer-link-text-color'] . ';}
.content-footer .text-link, .footer-item .text-link {color:' . $monolit_options['footer-title-text-color'] . ';}
.footer-item .text-link:before {background:' . $monolit_options['footer-title-text-color'] . ';}
.copyright,.to-top {color:' . $monolit_options['footer-copyright-color'] . ';}
.footer-wrap:before {background:' . $monolit_options['footer-copyright-color'] . ';}
footer.fixed-footer .footer-social li a {color:' . $monolit_options['left-social-color'] . ';}
nav li a {color:' . $monolit_options['main-nav-menu-color']['regular'] . ';}
nav li a:focus, nav li a:hover {color:' . $monolit_options['main-nav-menu-color']['hover'] . ';}
nav li a.ancestor-act-link,nav li a.parent-act-link,nav li a.act-link {color:' . $monolit_options['main-active-menu-bg-color'] . ';}
.nav-holder nav li a.ancestor-act-link:before, .nav-holder nav li a.parent-act-link:before, .nav-holder nav li a.act-link:before {background-color:' . $monolit_options['main-active-menu-bg-color'] . ';}
nav li ul a {color:' . $monolit_options['main-nav-submenu-color']['regular'] . ';}
nav li ul a:focus, nav li ul a:hover {color:' . $monolit_options['main-nav-submenu-color']['hover'] . ';}
nav li ul a.ancestor-act-link, nav li ul a.parent-act-link, nav li ul a.act-link {color:' . $monolit_options['sub-active-menu-bg-color'] . ';}
.show-share span,.share-icon,.share-icon:before {color:' . $monolit_options['top-socials-color'] . ';}
';
        
        // Remove whitespace
        $inline_style = monolit_stripWhitespace($inline_style);
        
        return $inline_style;
    }
}
