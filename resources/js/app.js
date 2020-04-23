require('./bootstrap');
console.log('dd');
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var load = $(e.target).data("load");
    var url = $(e.target).attr("href");
    var target = $(e.target).data("target");
    if (load === 'ajax') {
        $.ajax({
            type:'get',
            url: url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            error: function(data){
                alert("There was a problem");
            },
            success: function(data){
                $('#' + target).html(data);
            }
        })
    }

    $('#' + target).tab('show');
    $( '#' + $(e.relatedTarget).data("target") ).removeClass('active');
});

$( "#receiver" ).autocomplete({
    source: function( request, response ) {
        $.ajax( {
            url: "users/search",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                term: request.term
            },
            success: function (data) {
                response($.map(data, function (item) {
                    console.log(item)
                    return {
                        label: item.email,
                        value: item.email
                    };
                }));
            }
        } );
    },
    minLength: 2
} );

$('#newMessage').on('submit',function(event){
    event.preventDefault();

    sender = $('#sender').val();
    receiver = $('#receiver').val();
    message = $('#message').val();

    $.ajax({
        url: "messages",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:"POST",
        data:{
            sender:sender,
            receiver:receiver,
            message:message,
        },
        success:function(response){
            console.log(response);
        },
    });
});