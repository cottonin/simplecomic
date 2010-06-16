<?php template('admin_head'); ?>

<?php
if(!isset($text)) {
    $text = array(
        'description'=>'',
        'alt_text'=>'',
        'transcript'=>'',
    );
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <?php if(isset($comicid) && $comicid && $comicid != 'new') { ?>
        <input name="comicid" value=<?php echo $comicid; ?> type="hidden" />
    <?php } ?>
    <label>Title</label>
    <input name="title" value="<?php echo isset($title) ? $title : ''; ?>" />

    <label>Date</label>
    <input name="pub_date" class="datetime" value="<?php echo date('Y-m-d H:i:s', isset($pub_date) ? $pub_date : time()); ?>" />
    <small>YYYY-MM-DD HH:MM:SS. Comics dated in the future will not be published until that time.</small>

    <label>Chapter</label>
    <select name="chapterid">
        <?php foreach($chapters as $c) {
            echo '<option value="', $c['chapterid'], '"';
            if($c['chapterid'] == $chapterid) {
                echo ' selected="selected"';
            }
            echo '>', $c['title'], '</option>', "\n";
        } ?>
    </select>

    <label>Filename</label>
    <input name="filename" value="<?php echo isset($filename) ? $filename : ''; ?>" />
    <small>The name of a file in the <var><?php echo $config['comicpath']; ?></var> directory.</small>

    <?php if(!isset($comicid)) { ?>
    <label>Or: Upload file</label>
    <input name="comicfile" type="file" />
    <?php } ?>

    <label>Description</label>
    <textarea name="description" rows="8" cols="40"><?php echo htmlentities($text['description']); ?></textarea>

    <label>Alt Text</label>
    <textarea name="alt_text" rows="8" cols="40"><?php echo htmlentities($text['alt_text']); ?></textarea>

    <label>Transcript</label>
    <textarea name="transcript" rows="8" cols="40"><?php echo htmlentities($text['transcript']); ?></textarea>

    <div class="submit-block">
        <input type="submit" name="submit" value="Save" />
        <button name="delete" class="delete" value="1">Delete</button>
    </div>
</form>

<?php template('admin_foot'); ?>
