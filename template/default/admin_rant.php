<?php template('admin_head'); ?>

<?php

if(isset($preview) && $preview) {
    ?><div class="preview_container"><?php
    template('rant', array(
        'rantid' => $rantid,
        'title' => $title,
        'pub_date' => $pub_date,
        'text' => $text,
    ));
    ?></div><?php
}

?>
<section class="admin">
    <h2><?php if (!isset($rantid)): ?>Add a new rant<?php else: ?>Edit rant <?php echo '"'.$title.'"' ?><?php endif; ?></h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php echo authtoken_input(); ?>
        <?php if(isset($rantid) && $rantid && $rantid != 'new') { ?>
            <input name="rantid" value=<?php echo $rantid; ?> type="hidden" />
        <?php } ?>
        <div class="field">
            <label class="label">Title</label> 
            <input class="input" name="title" value="<?php echo isset($title) ? $title : ''; ?>" />
        </div>
        <div class="field">
            <label class="label">Date</label> 
            <div class="control">
                <input name="pub_date" class="datetime" value="<?php echo date('Y-m-d H:i:s', isset($pub_date) ? $pub_date : default_datetime()); ?>" />
                <small>Rants dated in the future will not be published until that time.</small>
            </div>
        </div>
        <div class="field">
            <label class="label">Text</label> 
            <div id="description" class="control">
                <div id="pell-editor-description"></div>
                <textarea id="description-output" class="textarea" name="text" style="display: none;"><?php echo isset($text) ? htmlentities($text) : ''; ?></textarea>
            </div>
        </div>
        <div class="submit-block">
            <button class="button" name="preview" class="preview" value="1">Preview</button>
            <input class="button is-primary" type="submit" name="submit" value="Save" />
            <?php if(isset($rantid) && $rantid && $rantid != 'new') { ?>
            <button class="button is-danger" name="delete" class="delete" value="1">Delete</button>
            <?php } ?>
        </div>
    </form>
</section>

<?php template('admin_foot'); ?>
