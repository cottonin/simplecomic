<?php

/*
Available variables:
    $current: id of current comic
    $first: id of first comic
    $prev: id of previos comic
    $next: id of next comic
    $last: id of final comic
*/

if(!($first || $prev || $next || $last)) {
    // don't show any navigation if there's nothing to show
    return;
}

?>
<nav class="navpage has-text-white has-background-dark">
<?php
if($first != $current) {
    echo '<a class="navpage-item" href="', url('comic/'.$first), '">&lt;&lt; <span class="is-hidden-touch">First</span></a>';
} else {
    echo '<div class="navpage-item">&lt;&lt; <span class="is-hidden-touch">First</span></div>';
}

if($prev) {
    echo '<a class="navpage-item" href="', url('comic/'.$prev), '" rel="prev">&lt; <span class="is-hidden-touch">Previous</span></a>';
} else {
    echo '<div class="navpage-item">&lt; <span class="is-hidden-touch">Previous</span></div>';
}

echo '<a href="/archive" class="navpage-item">Archive</a>';

if($next) {
    echo '<a class="navpage-item" href="', url('comic/'.$next), '" rel="next"><span class="is-hidden-touch">Next</span> &gt;</a>';
} else {
    echo '<div class="navpage-item"><span class="is-hidden-touch">Next</span> &gt;</div>';
}

if($last && $last != $current) {
    echo '<a class="navpage-item" href="', url('comic/'.$last), '"><span class="is-hidden-touch">Latest</span> &gt;&gt;</a>';
} else {
    echo '<div class="navpage-item"><span class="is-hidden-touch">Latest</span> &gt;&gt;</div>';
}
?>
</nav>