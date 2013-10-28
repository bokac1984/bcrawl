$(document).ready(function(){
    
    $('#create-search').click(function(e){
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: '/Searches/create',
            data: $("#SearchAddForm").serialize(),
            dataType: "json",
            success: function(data) {
                //button.html('Comment').removeClass('disabled');
                console.log(data)
                if (data.success) {
                    alert(data.message);
                } else {
                    alert(data.message);
                    //processErrors(data.message, "#Comment");
                }
            }
        });
    });

});