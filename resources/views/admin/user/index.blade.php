@extends('admin.layouts.layout')

@section('header')
    {!! Html::script('admin/bower_components/jquery/dist/jquery.min.js') !!}
   {!! Html::style('admin//bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('admin/bower_components/morris.js/morris.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Control Members
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{ url('/users') }}">Control members</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email(s)</th>
                                <th>Created At</th>
                                <th>Access</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
{{--
                            @foreach($user as $userifo)
                                <tr>
                                    <td>{{ $userifo->id }}</td>
                                    <td>{{ $userifo->name }}</td>
                                    <td>{{ $userifo->email }}</td>
                                    <td>{{ $userifo->created_at }}</td>
                                    <td>
                                        {{ $userifo->admin ==1 ?'manager':'member' }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('users/'.$userifo->id.'/edit') }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url('users/'.$userifo->id.'/delete') }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
--}}
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email(s)</th>
                                <th>Created At</th>
                                <th>Access</th>
                                <th>Control</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('footer')
    {!! Html::script('admin//bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">


        var lastIdx = null;
        $('#data thead th').each( function () {
            if($(this).index()  < 4 ){
                var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" ٍSearch '+title+'" />' );
            }else if($(this).index() == 4){
                $(this).html( '<select><option value="Member"> Member </option><option value="Manager"> Manager </option></select>' );
            }

        } );

        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/users/data') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'admin', name: 'admin'},
                //  {data: 'exame', name: 'exame'},
                {data: 'control', name: ''}
                //{data: 'edit', name: ''}
               // {data: 'Delete', name: ''}
            ],
            "language": {
                "url": "{{ Request::root()  }}/admin/cus/English.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'asc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [


                    {
                        "sExtends": "csv",
                        "sButtonText": "ُExcel file",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText":"Copy inforamtion",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "Print",
                        "mColumns": "visible",


                    }
                ],

                "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
            .on( 'mouseover', 'td', function () {
                var colIdx = table.cell(this).index().column;

                if ( colIdx !== lastIdx ) {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                    $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                }
            } )
            .on( 'mouseleave', function () {
                $( table.cells().nodes() ).removeClass( 'highlight' );
            });
     </script>


@endsection
