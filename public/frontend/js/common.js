function isValue(str) {

    if (typeof str === 'undefined' || str === null || str.match(/^ *$/) !== null)
        return false;
    else
        return true;

}
function num(str) {
    if (!isNaN(str))
        return Number(str);
    else
        return 0;

}

function checkValueExists(value){
    if(value=='' || value==null || !value ||  value.trim() ==''){
        return false;
    }else{
        return true;
    }
}

