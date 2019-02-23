<?php
/*
available variables:
 $page: array of info about the page
 $chapter: array of info about the chapter
 $comics: array of comics
*/
template('chapter_head');
?>
<section class="chapter section content">
    <h3><?php echo $chapter['title']; ?></h3>
    <?php if($chapter['description']) { ?>
    <div class="description">
        <?php echo $chapter['description']; ?>
    </div>
    <?php } ?>
    <div class="columns is-multiline">
        <?php foreach($comics as $comic) { ?>
        <div class="column is-200">
            <a href="<?php echo url($comic); ?>" 
               class="image" 
               style="background-image: url(<?php echo url('comic/image/' . $comic['comicid']); ?>)"
               title="<?php echo $comic['title'] ?>"></a>
        </div>
        <?php } ?>
    </div>
</section>
<?php
template('chapter_foot');
?>

