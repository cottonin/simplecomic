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
<nav class="navpage">
<?php
if($first != $current) {
    echo '<a class="navpage-item" data-navpage="first" href="', url('comic/'.$first.'#comic'), '" title="Go to First Page"><span class="is-hidden">First</span></a>';
} else {
    echo '<div class="navpage-item" data-navpage="first" title="You are already on the first page!"><span class="is-hidden">First</span></div>';
}

if($prev) {
    echo '<a class="navpage-item" data-navpage="prev" href="', url('comic/'.$prev.'#comic'), '" rel="prev" title="Go to Previous Page"><span class="is-hidden">Previous</span></a>';
} else {
    echo '<div class="navpage-item" data-navpage="prev" rel="prev" title="No more pages before."><span class="is-hidden">Previous</span></div>';
}

echo '<a href="/archive" class="navpage-item" data-navpage="archive" title="Go to Archive"><span class="is-hidden">Archive</span></a>';

if($next) {
    echo '<a class="navpage-item" data-navpage="next" href="', url('comic/'.$next.'#comic'), '" rel="next" title="Go to Next Page"><span class="is-hidden">Next</span></a>';
} else {
    echo '<div class="navpage-item" data-navpage="next" rel="next" title="No more pages after."><span class="is-hidden">Next</span></div>';
}

if($last && $last != $current) {
    echo '<a class="navpage-item" data-navpage="last" href="', url('comic/'.$last.'#comic'), '" title="Go to Last Page"><span class="is-hidden">Latest</span></a>';
} else {
    echo '<div class="navpage-item" data-navpage="last" title="You are already on the last page!"><span class="is-hidden">Latest</span></div>';
}
?>
</nav>