window.listaction = function(route,itemsParamName,items,addlParams){
    data = '{"' + itemsParamName + '": [' + items.toString() + ']';
    if(addlParams !== undefined)
    {
        data += "," + addlParams;
    }
    data += "}";
    $.ajax({
        type: "POST",
        url: route,
        data: JSON.parse(data),
        success: window.location.reload()
    });
};
