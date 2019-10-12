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
        <p>Take a look at all the pages and jump right into one. To read the full chapter, click on its title.</p>
        <div class="outer-dummy"><div class="inner-dummy">
        <?php
        foreach($comics as $comic) {
            if($comic['chapterid'] && $comic['chapterid'] != $current_chapter) {
                $current_chapter = $comic['chapterid'];
                $current_page  = 1;
                ?>
            </div></div><div class="chapter-archive">
                <!-- Image -->
                <div class="image-chapter"><img src="<?php echo url('chapter/image/' . $comic['chapterid']); ?>" alt="<?php echo $comic['chapter_title'];?>"></div>
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
                            <a class="button full" href="<?php echo url('read/'.$comic['chapter_slug']); ?>">Read Full Chapter</a>
                        </div>
                        <div class="column is-6">
                            <a class="button full" href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>">Browse Pages</a>
                        </div>
                    </div>
                <?php
            }
        ?>
        <!--<a class="button is-small" href="<?php echo url($comic); ?>"><?php echo $current_page; $current_page++ ?></a>-->
        <?php } ?>
    </div>
</section>
<?php
template('archive_foot');
?>