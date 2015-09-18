<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
    queue_css_file(array('iconfonts', 'normalize', 'style'), 'screen');
    queue_css_file('print', 'print');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php 
    queue_js_file(array(
        'vendor/selectivizr',
        'vendor/jquery-accessibleMegaMenu',
        'vendor/respond',
        'jquery-extra-selectors',
        'seasons',
        'globals'
    )); 
    ?>

    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">
    <div id="carousel">
    <?php if(is_current_url('/')) {
        echo $this->shortcodes('[carousel]'); 
        } 
        elseif (is_current_url('/items/browse')) {
            echo '<div class="img-head" id="archivo-general"></div>';
        }
        elseif (is_current_url('/collections/browse')) {
            echo '<div class="img-head" id="colecciones"></div>';
        }
        elseif (is_current_url('/posters/browse')) {
            echo '<div class="img-head" id="exposiciones"></div>';
        }
        elseif (is_current_url('/contact'))  {
            echo '<div class="img-head" id="contacto"></div>';
        }
        else {
            echo '<div class="img-head" id="otros"></div>';
        }

        ?>

        </div>

        <div id="top-fondo"><header role="banner">
            <table id="table-top">
                <tr>
                    <td rowspan="2" width="25%">
                        <div id="site-title">
                            <?php echo link_to_home_page(theme_logo()); ?>
                        </div>
                    </td>
                    <td style="text-align:left" colspan="2">
                        <nav id="top-nav" class="top" role="navigation">
                        <?php echo public_nav_main(); ?>
                        </nav>
                    </td>
                </tr>
            <tr id="vaina-gris">
            <td width="40%" class="imgs">
                <table ><tr >
                <td><div id="img_uniandes"></div></td>
                <td><a href="#"><div id="img_vimeo"></div></a></td>
                <td><a href="https://www.facebook.com/pages/Banco-de-Arte/1405168193033232?fref=ts"><div id="img_facebook"></div></a></td>
                <td><a href="https://twitter.com/bancodearte"><div id="img_twitter"></div></a></td>
                </tr></table>
            </td>
            <td>
            <div id="search-container" role="search">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
                <?php else: ?>
                <?Php echo search_form(); ?>
                <?php endif; ?>
            </div>
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            </td>
            </tr>
            </table>
        </header></div>

        

        <div id="content" role="main" tabindex="-1">
            <?php
                if(! is_current_url(WEB_ROOT)) {
                  fire_plugin_hook('public_content_top', array('view'=>$this));
                }
            ?>
