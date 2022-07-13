function changeUrl(url) {
    let site = url;
    document.getElementsByName('main-content')[0].src = site;
}


function cartAction(action, product_code) {
    var queryString = "";
        if(action != "") {
            switch(action) {
                case "add":
                    queryString = 'action='+action+'&code='+ product_code;
                    break;
                case "remove":
                    queryString = 'action='+action+'&code='+ product_code;
                    break;
                case "empty":
                    queryString = 'action='+action;
                    break;
                case "addone":
                    queryString = 'action='+action+'&code='+ product_code;
                    break;
                case "removeone":
                    queryString = 'action='+action+'&code='+ product_code;;
                    break;
                case "loadpage":
                    queryString = 'action='+action;
                    break;
            }	 
        }
        jQuery.ajax({
        url: "php/ajax_action.php",
        data: queryString,
        type: "POST",
        success: function(data){
            $("#empty-message").hide();
            $("#cart").html(data);
            if(action == "add"){
                var scroll=document.getElementById("cart");
                scroll.scrollTop = scroll.scrollHeight;
            }
        },
        error: function (){}
        });	

        
    }