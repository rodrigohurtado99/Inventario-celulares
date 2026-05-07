// JQUERY QUE RODA O AUTOCOMPLETE
$(document).ready(function() {
    $('#idq').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: 'autocomplete.php',
                type: 'GET',
                dataType: 'json',
                data: { term: request.term },
                success: function(data) { response(data); }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            $('#idq').val(ui.item.value);
            $('#userId').val(ui.item.id);
            $('#search-form').submit();
            
        },
        focus: function(event, ui) {
            $('#idq').val(ui.item.value);
            return false;
        }
    });
});
