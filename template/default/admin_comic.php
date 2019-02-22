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
<section class="section content">
    <form action="" method="POST" enctype="multipart/form-data">
        <?php echo authtoken_input(); ?>
        <?php if(isset($comicid) && $comicid && $comicid != 'new') { ?>
            <input name="comicid" value=<?php echo $comicid; ?> type="hidden" />
        <?php } ?>
        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input class="input" name="title" value="<?php echo isset($title) ? $title : ''; ?>" />
            </div>
        </div>
        <div class="field">
            <label class="label">Date</label>
            <div class="control">
                <input name="pub_date" class="datetime" value="<?php echo date('Y-m-d H:i:s', isset($pub_date) ? $pub_date : default_datetime()); ?>" />
                <small>YYYY-MM-DD HH:MM:SS. Comics dated in the future will not be published until that time.</small>
            </div>
        </div>
        <div class="field">
            <label class="label">Slug</label>
            <div class="control">
                <input class="input" name="slug" type="text" title="any non-completely-numeric string of basic letters, digits, and underscores" pattern="[\w\-]*" value="<?php echo isset($slug) ? $slug : ''; ?>" />
            </div>
        </div>
        <div class="field">
            <label class="label">Chapter</label>
            <div class="control">
                <div class="select">
                    <select name="chapterid">
                        <?php
                        $closed = array();
                        foreach($chapters as $c) {
                            if($c['status'] == STATUS_CLOSED) {
                                $closed[] = $c;
                                continue;
                            }
                            echo '<option value="', $c['chapterid'], '"';
                            if(isset($chapterid) && $c['chapterid'] == $chapterid) {
                                echo ' selected="selected"';
                            }
                            echo '>', $c['title'], '</option>', "\n";
                        }
                        if($closed) {
                            echo '<option disabled="disabled">---CLOSED---</option>';
                            foreach($closed as $c) {
                                echo '<option value="', $c['chapterid'], '"';
                                if(isset($chapterid) && $c['chapterid'] == $chapterid) {
                                    echo ' selected="selected"';
                                }
                                echo '>', $c['title'], '</option>', "\n";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Filename</label>
            <div class="control">
                <input class="input" name="filename" value="<?php echo isset($filename) ? $filename : ''; ?>" />
                <small>The name of a file in the <var><?php echo config('comicpath'); ?></var> directory.</small>
            </div>
        </div>
        <div class="field">
            <?php if(!isset($comicid)) { ?>
            <label class="label">Or: Upload file</label>
            <div class="control">
                <input class="input" name="comicfile" type="file" />
            </div>
            <?php } ?>
        </div>
        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea class="textarea" name="description"><?php echo htmlentities($text['description']); ?></textarea>
            </div>
        </div>
        <div class="field">
            <label class="label">Alt Text</label>
            <div class="control">
                <textarea class="textarea" name="alt_text"><?php echo htmlentities($text['alt_text']); ?></textarea>
            </div>
        </div>
        <!--
        <label class="label">Transcript</label>
        <textarea class="textarea" name="transcript"><?php echo htmlentities($text['transcript']); ?></textarea>
        -->
        <div class="submit-block">
            <input class="button is-primary" type="submit" name="submit" value="Save" />
            <?php if(isset($comicid) && $comicid && $comicid != 'new') { ?>
            <button name="delete" class="button is-danger" value="1">Delete</button>
            <?php } ?>
        </div>
    </form>
</section>
<?php template('admin_foot'); ?>
