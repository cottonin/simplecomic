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
<section class="updates">
    <div class="container">
        <h1 class="updates-header">Updates</h1>
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
            </div>
        </div>
    </div>
</section>
<?php template('foot'); ?>