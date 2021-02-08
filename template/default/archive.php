<?php
/*
available variables:
 $page: info about the page
 $chapter: array of info about the chapter
 $comics: array of comics
*/
template('archive_head');
$current_chapter = -1;
$current_page = 1;
?>
<section class="archive">
    <h2 class="title">Archive</h2>
    <p class="description"></p>
    <div id="archive-list" class="archive-list">
    <div class="outer-dummy"><div class="inner-dummy">
    <?php
    $ch_number = 0;
    foreach($comics as $comic) :
        
        if($comic['chapterid'] && $comic['chapterid'] != $current_chapter) :
            $current_chapter = $comic['chapterid'];
            $ch_number++;
            $current_page  = 1;
            ?>
        </div></div><div class="archive-item">
            <!-- Image -->
            <a href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>" class="cover-image">
                <img src="<?php echo url($comic['filename']); ?>" alt="<?php echo $comic['chapter_title'];?>">
            </a>
            <!-- Start Content -->
            <div class="content">
                <!-- Title -->
                <h3 class="title">
                    <span>Entry No. <?php echo str_pad($ch_number, 3, "0", STR_PAD_LEFT); ?></span><?php echo $comic['chapter_title']; ?>
                </h3>
                <!-- Description -->
            <?php if ($comic['chapter_description']): ?>
                <p class="description"><?php echo $comic['chapter_description']; ?></p>
            <?php endif ?>
                <!-- Links -->
                <div class="buttons">
                    <a class="button is-primary" href="<?php echo url('read/'.$comic['chapter_slug']); ?>">Read Full Chapter</a>
                    <a class="button is-secondary" href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>">Browse Pages</a>
                </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
</section>
<?php template('archive_foot'); ?>