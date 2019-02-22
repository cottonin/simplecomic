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
<div class="archive">
    <div class="content">
        <h3>Archive</h3>
        <?php
        foreach($comics as $comic) {
            if($comic['chapterid'] && $comic['chapterid'] != $current_chapter) {
                $current_chapter = $comic['chapterid'];
                $current_page  = 1;
                ?><h4 class="chapter">
                    <a href="<?php echo url('chapter/'.$comic['chapter_slug']); ?>"><?php echo $comic['chapter_title']; ?></a>
                </h4><?php
            }
        ?>
        <a class="button" href="<?php echo url($comic); ?>"><?php echo $current_page; $current_page++ ?></a>
        <?php } ?>
    </div>
</div>
<?php
template('archive_foot');
?>