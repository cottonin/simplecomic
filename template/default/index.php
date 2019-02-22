<?php
/*
available variables:
 $page: array of info about the page
 $comic: array of info about the comic
 $rant: array of info about the latest rant
*/
template('head');
template('comic', $comic); ?>
    </div>
</main>
<hr>
<main class="main">
    <div class="container">
    <div class="navpage has-background-dark">
        <div class="navpage-item">Updates</div>
    </div>
<?php template('rant', $rant); ?>
<hr>
<section class="recently content">
    <h5>Latest Updates</h5>
    <ul>
        <?php foreach($updates as $update) {
            echo '<li class="recent-', $update['type'], '">';
            switch($update['type']) {
                case 'comic':
                    echo 'Comic: <a href="', url('comic/');
                    break;
                case 'rant':
                    echo 'Rant: <a href="', url('rant/');
                    break;
            }
            echo $update['id'], '">', $update['title'], '</a> ', date('m/j/y', $update['pub_date']);
            echo '</li>';
        } ?>
    </ul>
</section>
<?php template('foot'); ?>