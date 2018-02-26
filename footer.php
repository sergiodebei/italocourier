<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link www.freshttheme.com
 * @package Fresh Theme
 */

?>

    <div class="auto-scroll-to-top">
<!--             <i class="fa fa-angle-up"></i> -->
        <i class="fa fa-long-arrow-up"></i>
        <i class="fa fa-long-arrow-up"></i>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-m-12 in">
                    <p class="copyright">Copyright © <?php echo date('Y'); ?>, All Rights Reserved</p>
                    <p>Webdesign: <a href="https://nl.linkedin.com/in/sergiodebei">Sergio De Bei</a></p>
                </div>
            </div>
        </div>
    </footer>

            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                e.src='//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                ga('create','UA-47504995-4','auto');ga('send','pageview');
            </script>

	<?php wp_footer(); ?>

	</body>
</html>