import $ from 'jquery';
window.$ = $;
window.jQuery = $;

$(function(){
    plotJokes();
    function plotJokes(){
            const token=$('meta[name="api-token"]').attr('content')
            jQuery.ajax({
                url:'api/joke',
                method: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function(jokesdata) {
                    let html = '';
                    let ctr=1;
                    let alignment = "text-start";
                    jokesdata.data.forEach(data => {
                   
                         if(ctr%2==0){
                            alignment = "text-end";
                         }
                         else{
                            alignment = "text-start";
                         }
                        html += '<div  class=" mx-auto rounded p-3 '+alignment+'" >'+
                            '<p id="setup"><strong>'+data.setup+'</strong></p>'+
                                '<p style = "font-style:italic" id="punchline">'+data.punchline+'</p>'+
                            '</div>';
                            console.log(ctr, jokesdata.data.length)
                        if(ctr!= jokesdata.data.length){
                              html += '<hr class="my-2"></hr>';
                        }
                        ctr++;
                    });
                    $('#jokes-display').html(html);
            },
            error: function(xhr, status, error) {
                
                $('#jokes-display').html('<p class="text-danger">'+error+'</p>');
            }
            })
        }
    $("#refresh-jokes").off("click")
        .on("click", function(){
             plotJokes();
        });

        $('#logout').off("click")
            .on("click",function() {
                $.ajax({
                    url: 'logout',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        window.location.href = '/login';
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
});
 