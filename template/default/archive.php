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
        <h3>Archive</h3>
        <p>Take a look at the list of all the pages. For a detailed view, visit the chapter's page.</p>
        <?php
        foreach($comics as $comic) {
            if($comic['chapterid'] && $comic['chapterid'] != $current_chapter) {
                $current_chapter = $comic['chapterid'];
                $current_page  = 1;
                ?>
                <div class="image image-chapter"><img src="<?php echo url('chapter/image/' . $comic['chapterid']); ?>" alt=""></div>
                <h4 class="chapter">
                    <a href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>"><?php echo $comic['chapter_title']; ?></a>
                </h4><?php
            }
        ?>
        <a class="button is-small" href="<?php echo url($comic); ?>"><?php echo $current_page; $current_page++ ?></a>
        <?php } ?>
    </div>
</section>
<?php
template('archive_foot');
?>