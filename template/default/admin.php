<?php template('admin_head'); ?>
<?php $page->get_breadcrumbs(); ?>    
<section class="admin">
<div>For the purpose of publishing, the date is: <b><?php echo date('F jS, Y \a\t  H:i:s'); ?></b></div>
<h2>Comics</h2>
<a href="<?php echo url('admin/comic/new'); ?>" class="button">Add a new comic</a>
<ul class="list">
<?php foreach ($comics as $c): ?>
    <li>
        <a href="<?php echo url('admin/comic/'.$c['comicid']); ?>" title="Edit this page">
            <span>
                <?php echo $c['title'] ?> | 

            </span>
        </a>
        <span>
            Posted on <?php echo date('F jS, Y', $c['pub_date']); ?>
            <?php if ($c['pub_date'] > time()): ?>
                UNPUBLISHED
            <?php endif ?>
        </span>
    </li>
<?php endforeach ?>
</ul>

<h2>Rants</h2>
<a href="<?php echo url('admin/rant/new'); ?>" class="button">Add a new rant</a>
<ul class="list">
<?php foreach ($rants as $c): ?>
    <li>
        <a href="<?php echo url('admin/rant/'.$c['rantid']); ?>" title="Edit this page">
            <span>
                <?php echo $c['title'] ?> | 
                Posted on <?php echo date('F jS, Y', $c['pub_date']); ?>
                <?php if ($c['pub_date'] > time()): ?>
                    UNPUBLISHED
                <?php endif ?>
            </span>
        </a>
    </li>
<?php endforeach ?>
</ul>
<h2 id="chapters">Chapters</h2>
<a href="<?php echo url('admin/chapter/new'); ?>" class="button">Add a new chapter</a>
<ul class="chapter-list">
<?php $num_chapters = count($chapters); ?>
<?php foreach ($chapters as $c): ?>
    <li>
        <span><?php echo $c['order'] ?>.</span>
        <a href="<?php echo url('admin/chapter/'.$c['chapterid']) ?>" name="chapter_<?php echo $c['chapterid']?>">
            <?php echo $c['title']; ?>
        </a>
        <?php 
        if ($c['order'] > 1) {
            // move-up
            echo post_link('admin/chapter/'.$c['chapterid'].'/down', '↓ down');
        }
        if ($c['order'] < $num_chapters) {
            // move-down
            echo post_link('admin/chapter/'.$c['chapterid'].'/up', '↑ up');
        }
         ?>
    </li>
<?php endforeach ?>
</ul>
</section>
<?php template('admin_foot'); ?>
