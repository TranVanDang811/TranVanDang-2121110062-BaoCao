function validateNumber(inputSelector) {
    for(let selector  of inputSelector){
        $(selector).keydown(function(e) {
            
            var keyCode = e.keyCode || e.which;
            if (!(keyCode >= 48 && keyCode <= 57 ) && keyCode !== 8 && keyCode !== 9 && keyCode != 39 && keyCode !=37) {
                e.preventDefault();
            }
        });
    }
    
}

function validateInput(inputSelector,message) {
    for(let selector  of inputSelector){
        $(selector).keydown(function(e) {
            $(selector + ' + ' + '.alert').text('');
        });
        $(selector).blur(function(e) {
            value = $(this).val();
            if (value == '') {
                $(selector + ' + ' + '.alert').text(message || 'Trường này không được để trống');
            }
            else{
                $(selector + ' + ' + '.alert').text('');
            }
        });
    }

    
}
function validate(obj,message){
    let isValidate = true
    for( let key in obj){
        if(obj[key]=='' || obj[key]==null){
            $('#'+key + ' + ' + '.alert').text(message || 'Trường này không được để trống')
            isValidate = false
        }
        else{
            $('#'+key + ' + ' + '.alert').text('');
        }
    }
    return isValidate
}
function handleSubmit(event,fieldIds,message){

    let formData = {}
    for(value of fieldIds){
        formData[value] = $('#'+value).val()
    }
    let isvalidate = validate(formData,message)
    if(isvalidate){
        return true;
    }
    else{
        event.preventDefault();
    }

}
