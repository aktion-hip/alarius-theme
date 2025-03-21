<?php
/**
 * Title: Alarius Header
 * Slug: alarius/alarius-header
 * Inserter: no
 */
$url_x = get_option( 'alarius_x_path', '' );
$url_facebook = get_option( 'alarius_facebook_path', '' );
$url_instagram = get_option( 'alarius_instagram_path', '' );
?>
<header id="header">
    <a href="index.html" class="logo"><strong>Alarius</strong></a>
    <ul class="icons">
        <!-- 
            <li><a href="#" class="icon fa-brands fa-x-twitter"><span class="label">X</span></a></li>
        -->
        <?php
        if (!empty($url_x)) {
            echo '<li><a href="'.$url_x.'" class="icon brands fa-twitter"><span class="label">X</span></a></li>';
        }
        if (!empty($url_facebook)) {
            echo '<li><a href="'.$url_facebook.'" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>';
        }
        if (!empty($url_instagram)) {
            echo '<li><a href="'.$url_instagram.'" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>';
        }
        ?>
    </ul>
</header>