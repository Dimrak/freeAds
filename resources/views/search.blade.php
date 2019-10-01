@extends('layouts.app')
{{----}}

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Search Customer Data</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
            </div>
            <div class="table-responsive">
                <h3 align="center">Total Data : <p id="total_records"></p></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Adverts</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--@include('pages.menu.categories')--}}
{{--@include('js.ajax-search.js')--}}
    <script type="application/javascript">
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
    </script>

@endsection
