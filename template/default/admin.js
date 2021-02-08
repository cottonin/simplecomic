$("input.datetime").each(function() {
    // format: YYYY-MM-DD HH:MM:SS
    var $this = $(this);
    var datetime = $this.val().split(' ');
    $this.hide();
    var date_input = $('<input type="date"/>').val(datetime[0]);//dateinput({value: datetime[0]});
    var time_input = $('<input type="time"/>').val(datetime[1]);
    $this.after(time_input).after(date_input);
    var update_date = function() {
        $this.val(date_input.val() + ' ' + time_input.val());
    };
    date_input.change(update_date);
    time_input.change(update_date);
    $this.closest('form').bind('submit', update_date);
});
$("button.delete").click(function(e) {
    if(!confirm("Are you sure you want to delete this?")) {
        e.preventDefault();
    }
});

// Automatically print slug field

if (document.getElementById('slug_field')) {
  var title = document.getElementById('title_field');
  var slug = document.getElementById('slug_field')
  title.addEventListener("focusout", function() {
      var str = title.value;
      str = str.toLowerCase()
              .replace(/[^\w ]+/g,'')
              .replace(/ +/g,'-');
      slug.value = str;
  });
} 

// WYSIWYG Editor
var description = document.getElementById('description-output')

if (document.getElementById('description')) {
    var editor = window.pell.init({
        element: document.getElementById('pell-editor-description'),
        actions: [
          'bold',
          'underline',
          'line',
          'link',
          'image',
          'ulist',
        ],
        onChange: function (html) {
          description.innerHTML = html;
        }
    });

    editor.content.innerHTML = description.textContent;
};

var transcript = document.getElementById('transcript-output')

if (document.getElementById('transcript')) {
    var editor = window.pell.init({
        element: document.getElementById('pell-editor-transcript'),
        actions: [],
        onChange: function (html) {
          transcript.innerHTML = html;
        }
    });

    editor.content.innerHTML = transcript.textContent;
};
