<?php
/*
available variables:
 $page: array of info about the page
 $comic: array of info about the comic
 $rant: array of info about the latest rant
*/

template('head'); ?>
    <section class="home">
        <div class="home-wrapper">
            <div class="column column-newreader">
                <img src="<?php echo url('image/fluffygang.png') ?>" alt="">
                <div class="updates-text"><span class="updates-badge">Updates</span>Thursdays and Saturdays</div>
                <div class="summary-text">When Nate, an eager and adventurous boy who offers to help Marissa, a girl he just met to rescue her friend Nita lost in the depths of the mountains, surrounded by a thick, dense fog. Also Vincent, a grumpy guild assistant gets dragged in the middle of this mess. </div>
                <a href="#" class="button is-primary">First Chapter</a>
            </div>
            <div class="column column-updates">
                <div class="updates-box">
                    <p class="title">Latest Update</p>
                    <?php foreach ($comics as $comic): ?>
                        <p class="comic"><?php echo $comic['title'] ?></p>
                    <?php endforeach ?>
                    <a href="<?php echo url('comic/'.$comics[0]['slug']); ?>" class="button is-primary">Latest Update</a>
                </div>
                <div id="chapters-list">
                    <ul class="chapters-list list">
                        <?php foreach($chapters as $chapter) { ?>
                            <a href="<?php echo url('chapter/' . $chapter['slug']); ?>" class="chapter-item">
                                <div class="chapter-cover">
                                    <?php if ($chapter['filename'] == ''): ?>
                                    <img src="https://placehold.it/144x204?text=?" alt="">
                                    <?php else: ?>
                                    <img src="<?php echo url($chapter['filename']); ?>" alt="">
                                    <?php endif ?>
                                </div>
                                <div class="chapter-info">
                                    <div class="title"><span class="count">Entry No. <?php echo str_pad($chapter['order'], 3, "0", STR_PAD_LEFT); ?></span><?php echo $chapter['title'] ?></div>
                                </div>
                            </a>
                        <?php } ?>
                    </ul>
                    <ul class="chapters-pagination pagination"></ul>
                </div>
            </div>
        </div>
    </section>
    </div>
</main>
<div class="updates-top"></div>
<section class="updates">
    <div class="container">
        <h2 class="updates-header">Site Updates</h2>
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
                <img src="https://placehold.it/388x96" alt="">
                <img src="https://placehold.it/388x96" alt="">
                <img src="https://placehold.it/388x96" alt="">

            </div>

        </div>

    </div>
</section>
<script src="http://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script>
    var chaptersList = new List('chapters-list', {
      valueNames: ['chapter-item'],
      page: 5,
      pagination: true
    });
</script>
<?php template('foot'); ?>