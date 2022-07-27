
window.addEventListener('DOMContentLoaded', (event) => {
    loadCartSize()
});

function loadCartSize(){
    jQuery.ajax({
        url: "/php/cart_size.php",
        type: "POST",
        success: function(data){
            $("#cart-a").html(data);
        },
        error: function (){}
        });	
}
function cartAction(action, product_code, page) {
    var queryString = "";
        if(action != "") {
            switch(action) {
                case "add":
                    queryString = 'action='+action+'&code='+ product_code + '&page='+ page;
                    break;
                case "remove":
                    queryString = 'action='+action+'&code='+ product_code  + '&page='+ page;
                    break;
                case "empty":
                    queryString = 'action='+action  + '&page='+ page;
                    break;
                case "addone":
                    queryString = 'action='+action+'&code='+ product_code  + '&page='+ page;
                    break;
                case "removeone":
                    queryString = 'action='+action+'&code='+ product_code  + '&page='+ page;;
                    break;
                case "loadpage":
                    queryString = 'action='+action  + '&page='+ page;
                    break;
            }	 
        }
        jQuery.ajax({
        url: "/php/ajax_action.php",
        data: queryString,
        type: "POST",
        success: function(data){
            $("#empty-message").hide();
            // $("#cart").html(data);

            var $data = $("<div>" + data + "</div>");
            $data.find('[data-replace]').each(function () {
                // console.log($(this).data('replace'));
                $('#' + $(this).data('replace')).html(this.innerHTML);
            });

            if(action == "add"){
                var scroll=document.getElementById("items");
                scroll.scrollTop = scroll.scrollHeight;
            }
        },
        error: function (){}
        });	
        // loadCartSize();
    }