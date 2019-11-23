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
<section class="archive section">
    <div class="content">
        <h1>Archive</h1>
        <p>Take a look at the chapters of the story. If you like reading everything in one go, click "Read Full Chapter". Otherwise, click "Browse Pages" to take a quick look at each chapter and pick a page to start reading one by one.</p>
        <div class="outer-dummy"><div class="inner-dummy">
        <?php
        foreach($comics as $comic) {
            if($comic['chapterid'] && $comic['chapterid'] != $current_chapter) {
                $current_chapter = $comic['chapterid'];
                $current_page  = 1;
                ?>
            </div></div><div class="chapter-archive">
                <!-- Image -->
                <div class="image-chapter"><img src="<?php echo url($comic['filename']); ?>" alt="<?php echo $comic['chapter_title'];?>"></div>
                <!-- Start Content -->
                <div class="chapter-content">
                    <!-- Title -->
                    <h3 class="chapter">
                        <a href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>"><?php echo $comic['chapter_title']; ?></a>
                    </h3>
                    <!-- Description -->
                <?php if ($comic['chapter_description']): ?>
                    <p><?php echo $comic['chapter_description']; ?></p>
                <?php endif ?>
                    <!-- Links -->
                    <div class="columns">
                        <div class="column is-6">
                            <?php if ($comic['status'] == 1 ): ?>
                            <a class="button full"
                               href="<?php echo url('read/'.$comic['chapter_slug']); ?>">Read Full Chapter</a>
                            <?php else: ?>
                            <p class="button full is-disabled">Ongoing</p>
                            <?php endif ?>
                        </div>
                        <div class="column is-6">
                            <a class="button full" href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>">Browse Pages</a>
                        </div>
                    </div>
                <?php
            }
        ?>
    <?php } ?>
    </div>
</section>
<?php
template('archive_foot');
?>