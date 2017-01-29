function getRichText(){
    var content = JSON.stringify(quill.getContents());
    return content;
}

function setRichText($content,$quill) {
    var parsedData = JSON.parse($content);
    $quill.setContents(parsedData);
}


function makeHiddenInput(){
     var input = $('<input>').attr({
         name :'editorData',
         type: 'hidden',
         value:getRichText(),
     });

    $("#editorForm").append(input);
}
