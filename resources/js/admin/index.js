// var url = window.location;
// var arr = url.toString().split('/');
// if(arr.includes("edit")){
    
// }
// $("img").lazyload();
// let images = document.querySelectorAll("img");
// new LazyLoad(images);
if($("#my_post").length){
    FooNav.init({
        items: '#my_post',
        classes: 'fon-full-height fon-border fon-rounded fon-shadow',
    })
}

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
        alwaysShowClose: true
    });
});

// new ClipboardJS('.btn');

Sharect.config({
  facebook: true,
  twitter: true,
  twitterUsername: 'cao van son',
  backgroundColor: '#667EEA',
  iconColor: '#FFF',
}).init()

$(document).on("click",".toggle_check", function(){
  var source = this
  var checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
})

$('.select2').select2({
  theme: 'bootstrap4'
})

// $('#compose-textarea').summernote()
$('#compose-textarea').summernote({
    height: 400,
    tabsize: 2,
    codemirror: {
      mode: 'htmlmixed',
      htmlMode: true,
      lineNumbers: true,
      theme: 'dracula',
      keyMap: "sublime",
      lineWrapping: true,
    }
});

// $("form").each(function (){console.log($(this).attr("id"))})

try {
    $('textarea[id^=codeMirrorHtml]').each(function() {
        CodeMirror.fromTextArea(this,{
          mode: "htmlmixed",
          theme: "dracula",
          indentUnit: 4,
          indentWithTabs: true,
          lineNumbers: true,
          matchBrackets: true,
          keyMap: "sublime",
          autoCloseBrackets: true,
          showCursorWhenSelecting: true,
          viewportMargin: Infinity,
        });
    });
} catch (e) {
    console.log(e)
}