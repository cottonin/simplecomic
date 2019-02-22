<?php

/*
available variables:
 $page: array of info about the page
 $config: general information about the site
*/

template('frame_top');
?>
<header class="header">
    <div class="container has-no-padding">
        <div class="header-banner">
            <a href="/">
                <figure class="image">
                    <img src="/static/img/banner-current.png" alt="Fluffy Gang">
                </figure>
            </a>
        </div>
        <?php template('nav') ?>
    </div>
</header>
<main class="main">
    <div class="container">