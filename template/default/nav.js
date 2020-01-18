(function() {

    // Toggle Transcript
    var transcript_toggle = document.getElementById('transcript-toggle');
    var transcript = document.querySelector('.transcript');

    transcript_toggle.addEventListener("click", function(e) {
        e.preventDefault();
        transcript.classList.toggle('active');
    })
    
    // Arrow Key Nav

    var link;

    if (!(document.body.addEventListener && document.querySelector)) {
        return;
    }
    document.body.addEventListener('keydown', function(e) {
        switch (e.which) {
            case 37: // left
                e.preventDefault();
                link = document.querySelector('.comic .navpage [rel="prev"]');
                if (link) {
                    link.click();
                }
                break;
            case 39: // right
                e.preventDefault();
                link = document.querySelector('.comic .navpage [rel="next"]');
                if (link) {
                    link.click();
                }
                break;
        }
    });

    // Swipe mobile nav

    var start = null;
    var comic = document.getElementById('comic');
    comic.addEventListener("touchstart",function(event){
        if(event.touches.length === 1){
            //just one finger touched
            start = event.touches.item(0).clientX;
        } else{
            //a second finger hit the screen, abort the touch
            start = null;
        }
    }, {passive: true});

    comic.addEventListener("touchend",function(event){
        var offset = 200;//at least 100px are a swipe
        if(start){
            //the only finger that hit the screen left it
            var end = event.changedTouches.item(0).clientX;

            if(end > start + offset){
                //a left -> right Swiped
                link = document.querySelector('.comic .navpage [rel="prev"]');
                if (link) {
                    link.click();
                }
            }

            if(end < start - offset ){
                //a right -> left swipe
                console.log("Swiped Right to Left");
                link = document.querySelector('.comic .navpage [rel="next"]');
                if (link) {
                    link.click();
                }
            }
        }
     }, {passive: true});


})();
