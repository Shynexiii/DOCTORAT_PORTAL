$('#inputFile01').on('change',function(){
    //get the file name
    var fileName = $(this).val().replace('C:\\fakepath\\', "");
    //replace the "Choose file..." label
    $(this).next('.custom-file-label').html(fileName);
})