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
                    <img src="https://via.placeholder.com/680x120" alt="">
                </figure>
            </a>
        </div>
        <nav class="navbar has-background-dark">
            <a class="navbar-item has-text-white" href="<?php echo url('archive/');?>">Archive</a>
            <a class="navbar-item has-text-white" href="<?php echo url('chapters/');?>">Chapters</a>
            <a class="navbar-item has-text-white" href="<?php echo url('rants/');?>">Rants</a>
        </nav>
    </div>
</header>
<main class="main">
    <div class="container">