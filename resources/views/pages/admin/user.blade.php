@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body" id="content-user">
                <div class="table-responsive">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    getTopic(url)

function getTopic(url) {
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        beforeSend: function () {
            $('#load-icon').show();
        },
        success: function (response) {
            $('#load-icon').hide();
            $('#content-user').html(response);
            $('ul.pagination ap').click(function (e) { 
                e.preventDefault();
                var href = $(this).attr('href');
                getTopic(href)
            });
        }
    });
    
}
</script>
@endsection