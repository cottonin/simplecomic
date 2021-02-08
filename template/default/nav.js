(function() {

// ==========================================================================
// Transcript Toggle
// ==========================================================================

    var transcript_toggle = document.getElementById('transcript-toggle');
    var transcript = document.querySelector('.transcript');

    if (transcript) {
        transcript_toggle.addEventListener("click", function(e) {
            e.preventDefault();
            transcript.classList.toggle('active');
        });
    }
    
// ==========================================================================
// Arrow Key Navigation
// ==========================================================================

    var link;

    if (!(document.body.addEventListener && document.querySelector && document.querySelector('.navpage'))) {
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

})();
