const site_url ="http://localhost:8000/";

$("body").on("keyup","#search",function(){
    let text =$("#search").val();
    // console.log(text);

    if(text.length > 0){
        $.ajax({
            data:{search:text},
            url: site_url + "search-product",
            method:'POST',
            beforSend:function(request){
                return request.setRequestHeader('X-CSRF-TOKEN',("meta[name='csrf-token']"))
            },
            success:function(result){
                  $("#searchProduct").html(result);
            }
        });
    }
    if(text.length < 1)$("#searchProduct").html("");

});
