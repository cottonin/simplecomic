<?php
/*
available variables:
 $chapter: array of info about the chapter
 $comics: array of comics
 $list: array of chapters
*/
template('chapter_head');
?>
<section class="chapter content">
    <div class="chapter-nav">
        <select name="chapternav" onchange="document.location.href=this.value">
            <?php foreach ($list as $item): ?>
                <option 
                <?php if ($item['chapterid'] == $chapter['chapterid']) { echo 'selected'; } ?> 
                value="<?php echo url('read/'.$item['slug'], true) ?>">
                Chapter <?php echo $item['order'] . ' - ' . $item['title']; ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="comic">
    <?php foreach ($comics as $comic): ?>
        <img src="<?php echo url($comic['filename']); ?>" title="<?php echo $comic['title']; ?>" alt="<?php echo $comic['title']; ?>">
    <?php endforeach ?>
    </div>
</section>
<?php template('chapter_foot'); ?>

