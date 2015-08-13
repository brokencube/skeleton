// Intercept dev console debug messages
$.ajaxSetup({
    dataType: 'json',
    type: 'post',
    converters: {
        'text json': function (data)
        {
            var json = jQuery.parseJSON(data);
            if (typeof json._log_array != 'undefined')
            {
                try
                {			
                    console.groupCollapsed('AJAX - ' + json._log_array['script']);
                    for(row in json._log_array['messages'])      
                    {
                        eval(json._log_array['messages'][row]);
                    }
                    console.groupEnd();	
                }
                catch (ex){}
                return json.data;
            }
            return json;
        }
    }
});
