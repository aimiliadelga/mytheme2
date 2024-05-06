<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
             
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_id' => 'footer-menu',
                    'container' => false,
                    'depth' => 1,
                ));
                ?>
            </div>
            <div class="col-md-6">
                <?php
              
                echo "© " . date("2024") . " My portfolio. All rights reserved.";
                ?>
            </div>
        </div>
    </div>
</footer>
