export function post_to_url(url, params) {
    var form = document.createElement("form");
    form.setAttribute("method", 'POST');
    form.setAttribute("action", url);

    var addField = function (key, value) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", value );

        form.appendChild(hiddenField);
    }; 

    for (var key in params) {
        if (params.hasOwnProperty(key)) {
            if (params[key] instanceof Array){
                for(var i = 0; i < params[key].length; i++) {
                    addField(key + '[]', params[key][i])
                }
            }
            else{
                addField(key, params[key]);
            }
        }
    }

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}
