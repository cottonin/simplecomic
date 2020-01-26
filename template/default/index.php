<?php
/*
available variables:
 $page: array of info about the page
 $comic: array of info about the comic
 $rant: array of info about the latest rant
*/

template('head'); ?>
<?php template('comic', $comic); ?>
    </div>
</main>
<section class="updates">
    <div class="container">
        <h2 class="updates-header">Updates</h2>
        <div class="updates-content">
            <div class="rant">
                <?php template('rant', $rant); ?>
            </div>
            <div class="recently">
                <h2>Latest Updates</h2>
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
                <div class="socialmedia">
                    <div><a href="http://www.instagram.com/gangfluffy/" target="_blank"><img src="<?php echo url('image/icon_instagram.svg'); ?>" alt="Instagram"></a></div>
                    <div><a href="http://www.fluffygang.tumblr.com/" target="_blank"><img src="<?php echo url('image/icon_tumblr.svg'); ?>" alt="Tumblr"></a></div>
                    <div><a href="http://www.twitter.com/fluffygang" target="_blank"><img src="<?php echo url('image/icon_twitter.svg'); ?>" alt="Twitter"></a></div>
                    <div><a href="<?php echo url('feed/');?>" target="_blank"><img src="<?php echo url('image/icon_rss.svg'); ?>" alt="RSS"></a></div>
                </div>
            </div>

        </div>

    </div>
</section>
<?php template('foot'); ?>