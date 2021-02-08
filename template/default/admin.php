<?php template('admin_head'); ?>
<?php $page->get_breadcrumbs(); ?>    
<section class="admin">
<div>For the purpose of publishing, the date is: <b><?php echo date('F jS, Y \a\t  H:i:s'); ?></b></div>
<h2>Comics <a href="<?php echo url('admin/comic/new'); ?>">Add a new comic</a></h2>
<ul class="list">
<?php foreach ($comics as $c): ?>
    <li>
        <span class="name"><?php echo $c['title'] ?></span>
        <span class="date">
            Posted on <?php echo date('F jS, Y', $c['pub_date']); ?>
            <?php if ($c['pub_date'] > time()): ?>
                UNPUBLISHED
            <?php endif ?>
        </span>
        <span class="view"><a href="<?php echo url('comic/'.$c['comicid']); ?>"  target="_blank">View</a></span>
        <span class="edit"><a href="<?php echo url('admin/comic/'.$c['comicid']); ?>">Edit</a></span>
    </li>
<?php endforeach ?>
</ul>

<h2>Rants <a href="<?php echo url('admin/rant/new'); ?>">Add a new rant</a></h2>
<ul class="list">
<?php foreach ($rants as $c): ?>
    <li>
    	<span class="name"><?php echo $c['title'] ?></span>
    	<span class="date">
    		Posted on <?php echo date('F jS, Y', $c['pub_date']); ?>
    		<?php if ($c['pub_date'] > time()): ?>
    		    UNPUBLISHED
    		<?php endif ?>
    	</span>
    	<span class="view"><a href="<?php echo url('rant/'.$c['rantid']); ?>">View</a></span>
    	<span class="edit"><a href="<?php echo url('admin/rant/'.$c['rantid']); ?>">Edit</a></span>
    </li>
<?php endforeach ?>
</ul>
<h2 id="chapters">Chapters <a href="<?php echo url('admin/chapter/new'); ?>">Add a new chapter</a></h2>
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
