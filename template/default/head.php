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
            <a href="/" title="Home">
                <figure class="image image-banner">
                    <h1><img src="<?php echo url('image/header.png'); ?>" alt="<?php echo config('title'); ?>"></h1>
                </figure>
            </a>
        </div>
        <?php template('nav') ?>
    </div>
</header>
<main class="main">
    <div class="container">
