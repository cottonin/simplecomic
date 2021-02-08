<?php
/*
available variables:
 $page: array of info about the page
 $chapter: array of info about the chapter
 $comics: array of comics
*/
template('chapter_head');
?>
<section class="chapter">
    <div class="chapter-info">
        <div class="info-cover">
            <img src="<?php echo url($chapter['filename']); ?>" alt="" class="cover">
        </div>
        <div class="info-text">
            <p class="return"><a href="<?php echo url('archive/') ?>">← Return to Archive</a></p>
            <h2 class="title"><span>Entry No. <?php echo str_pad($chapter['order'], 3, "0", STR_PAD_LEFT); ?></span><?php echo $chapter['title']; ?></h2>
            <?php if($chapter['description']) { ?>
            <p class="description"><?php echo $chapter['description']; ?></p>
            <div><a href="<?php echo url('comic/'.$comics[0]['slug']); ?>" class="button is-primary">Start Reading</a></div>
            <?php } ?>
        </div>
    </div>
    <ul class="chapter-list">
        <?php foreach($comics as $comic) { ?>
        <li>
            <a href="<?php echo url($comic); ?>" 
               style="background-image: url(<?php echo comic_url($comic['comicid']); ?>)"
               title="<?php echo $comic['title'] ?>"></a>
        </li>
        <?php } ?>
    </ul>
</section>
<?php template('chapter_foot'); ?>

