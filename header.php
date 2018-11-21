<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link www.freshttheme.com
 * @package Fresh Theme
 */

?><!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Italo Courier Express</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1a8bcb" />
        <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon"/>
<!--         <link rel="icon" type="image/png" href="./favicon.png" /> -->

        <?php include( 'views/partials/gtm.php' ); ?>

        <script type="text/javascript">
            var templateUrl = '<?= get_bloginfo("template_url"); ?>';
        </script>

        <?php wp_head(); ?>

    </head>
<body>

<?php include( 'views/partials/gtm_noscript.php' ); ?>