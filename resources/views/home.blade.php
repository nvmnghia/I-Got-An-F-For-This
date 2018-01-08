@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="box box-primary" style="padding: 5px">
    <div class="box-header">
        <div>
            <div class='btn-toolbar pull-right'>
                <button id="reset-filter" class="btn btn-primary">Reset bộ lọc</button>
            </div>
            <h2>Danh sách công việc<h2>
        </div>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <table id="tickets" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên công việc</th>
                        <th>Mức độ ưu tiên</th>
                        <th>Người yêu cầu</th>
                        <th>Người thực hiện</th>
                        <th>Ngày tạo</th>
                        <th>Ngày hết hạn</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Tên công việc</th>
                        <th>Mức độ ưu tiên</th>
                        <th>Người yêu cầu</th>
                        <th>Người thực hiện</th>
                        <th>Ngày tạo</th>
                        <th>Ngày hết hạn</th>
                        <th>Trạng thái</th>
                    </tr>
                </tfoot>
            </table>

            <row id="filter-mobile">
                <h4><strong>Filter</strong></h4>
                <div>
                    <div class="form-group">
                        <label><strong>Name</strong></label>
                        <input id="filter-name" class="form-control" type="text" style="width: 100%; height: 32px;">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label><strong>Requester</strong></label>
                        <select id="filter-requester" class="form-control" multiple="multiple" style="width: 100%;"></select>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label><strong>Assignee</strong></label>
                        <select id="filter-assignee" class="form-control" style="width: 100%;" multiple="multiple"></select>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td width="50%"><div>
                            <div class="form-group">
                                <label><strong>Priority</strong></label>
                                <select id="filter-priority" class="form-control" style="width: 100%; height: 32px;"><option value=""></select>
                            </div>
                        </div></td>
                        <td width="50%"><div>
                            <div class="form-group">
                                <label><strong>State</strong></label>
                                <select id="filter-state" class="form-control" style="width: 100%; height: 32px;"><option value=""></select>
                            </div>
                        </div></td>
                    </tr>
                    <tr>
                        <td width="50%"><div>
                            <div class="form-group">
                                <label><strong>Created Date</strong></label>
                                <select id="filter-created-date" class="form-control" style="width: 100%; height: 32px;"><option value=""></select>
                            </div>
                        </div></td>
                        <td width="50%"><div>
                            <div class="form-group">
                                <label><strong>Expiration Date</strong></label>
                                <select id="filter-expiration-date" class="form-control" style="width: 100%; height: 32px;"><option value=""></select>
                            </div>
                        </div></td>
                    </tr>
                </table>
            </row>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>

    <script type="text/javascript">
        listEmployees = [{name: 'Nghia', id: '1'}, {name: 'Phuc', id: '2'}, {name: 'Loi', id: 3}];

        $(document).ready(function() {
            $.fn.dataTable.moment('DD/MM/YYYY');

            // Then initialize Datatable
            var table = $('#tickets').DataTable({
                "scrollX": true, 
                "ajax": {
                    "url": "array.txt",
                    "dataSrc": function(json) {
                        // TODO: preprocessing if needed
                        return json;
                    }
                },

                "columnDefs": [
                    {
                        "width": "3%",
                        "targets": 0,
                    },
                    {
                        "width": "22%",
                        "targets": 1,
                    },
                    {
                        "width": "10%",
                        "targets": 2,
                    },
                    {
                        "width": "13%",
                        "targets": 3,
                    },
                    {
                        "width": "22%",
                        "targets": 4,
                    },
                    {
                        "width": "10%",
                        "targets": 5,
                    },
                    {
                        "width": "10%",
                        "targets": 6,
                    },
                    {
                        "width": "10%",
                        "targets": 7,
                    }
                ],
                "order": [[1, 'asc']],

                initComplete: function() {
                    enableSearching(table);
                    beautify(table);
                }
            });

            $('#reset-filter').click(function() {
                resetFilter(table);
            });

            // Get new data from the server, and feed it to the table
            setInterval(function() {
                table.ajax.reload(function() {
                    beautify(table);
                }, false);
            }, 34567);
        });
    </script>
@endsection

@section('page-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
    <link href="{{ URL::asset('/plugins/datepicker3.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/css/home.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/plugins/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

