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
    <h1><?php echo $chapter['title']; ?></h1>
    <?php if($chapter['description']) { ?>
    <p class="description"><?php echo $chapter['description']; ?></p>
    <?php } ?>
    <p class="return"><a href="<?php echo url('archive/') ?>">← Return to Archive</a></p>
    <ul>
        <?php foreach($comics as $comic) { ?>
        <li>
            <a href="<?php echo url($comic); ?>" 
               style="background-image: url(<?php echo url($comic['filename']); ?>)"
               title="<?php echo $comic['title'] ?>"></a>
        </li>
        <?php } ?>
    </ul>
</section>
<?php
template('chapter_foot');
?>

