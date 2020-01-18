<?php
/*
available variables:
 $page: array of info about the page
 $chapters: array of info about the chapters
*/
template('chapter_head');
?>
<section class="chapter-list">
    <h2 class="title">Chapters</h2>
    <p class="description">Take a look at the chapters of the story. If you like reading everything in one go, click "Read Full Chapter". Otherwise, click "Browse Pages" to take a quick look at each chapter and pick a page to start reading one by one.</p>
    <?php if($chapters) { ?>
    <ul>
        <?php foreach($chapters as $chapter) { ?>
        <li>
            
            <a class="chapter-title" href="<?php echo url('chapter/' . $chapter['slug']); ?>">
                <img class="chapter-cover" src="<?php echo url($chapter['filename']); ?>" alt="">
                <h3><?php echo $chapter['title'] ?></h3>
            </a>
        </li>
        <?php } ?>
    </ul>
    <?php } else { ?>
    <p>No Chapters</p>
    <?php } ?>
</section>
<?php
template('chapter_foot');
?>