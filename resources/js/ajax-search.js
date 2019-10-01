console.log('ajax-search.js - file');
$(document).ready(function(){
        fetch_advert_data();

        function fetch_advert_data(query = '')
        {
            $.ajax({
                url:"{{ route('search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    console.log(data);
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_advert_data(query).delay(4000);
        });
    });
