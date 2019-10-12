<?php template('admin_head'); ?>
<section class="section content">
	<h2><?php if (!isset($chapterid)): ?>Add a new chapter<?php else: ?>Edit chapter <?php echo '"'.$title.'"' ?><?php endif; ?></h2>
	<form action="" method="POST" enctype="multipart/form-data">
	    <?php echo authtoken_input(); ?>
	    <?php if(isset($chapterid) && $chapterid && $chapterid != 'new') { ?>
	        <input name="chapterid" value=<?php echo $chapterid; ?> type="hidden" />
	    <?php } ?>
	    <div class="field">
	        <label class="label">Title</label>
	        <div class="control">
	            <input class="input" name="title" value="<?php echo isset($title) ? $title : ''; ?>" />
	        </div>
	    </div>
	    <div class="field">
	        <label class="label">Slug</label>
	        <div class="control">
	            <input class="input" name="slug" type="text" title="any non-completely-numeric string of basic letters, digits, and underscores" pattern="[\w\-]*" value="<?php echo isset($slug) ? $slug : ''; ?>" />
	        </div>
	    </div>
	    <div class="field">
	        <label class="label">Description</label>
	        <div class="control">
	            <textarea class="textarea" name="description"><?php echo isset($description) ? htmlentities($description) : "" ; ?></textarea>
	        </div>
	    </div>
	    <div class="field">
	        <label class="label">Filename</label>
	        <div class="control">
	            <input class="input" name="filename" value="<?php echo isset($filename) ? $filename : ''; ?>" />
	            <small>The name of a file in the <var><?php echo config('comicpath'); ?></var> directory.</small>
	        </div>
	    </div>
	    <?php if(!isset($chapterid)): ?>
	    <div class="field">
	        <label class="label">Or: Upload file</label>
	        <div class="control">
	            <input class="input" name="filename" type="file" />
	        </div>
	    </div>
		<?php endif ?>
	    <div class="field">
	        <label class="label">Closed</label>
	        <input class="checkbox" name="closed" type="checkbox" value="1"<?php
	        if(isset($status) && $status == STATUS_CLOSED) {
	            echo ' checked="checked"';
	        }
	        ?>>
	    </div>
	    <div class="submit-block">
	        <input class="button is-primary" type="submit" name="submit" value="Save" />
	        <?php if(isset($chapterid) && $chapterid && $chapterid != 'new') { ?>
	        <button class="button is-danger" name="delete" class="delete" value="1">Delete</button>
	        <?php } ?>
	    </div>
	</form>
</section>

<?php template('admin_foot'); ?>