<?php template('head'); ?>
<figure class="image">
	<?php $n = rand(1,4); $img = 'image/404-'.$n.'.jpg'; ?>
	<img src="<?php echo url($img); ?>" alt="">
</figure>
<?php template('foot'); ?>
