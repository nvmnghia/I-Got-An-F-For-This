sessionStorage.setItem('current-page', 'my-tickets-all');

function loadTicketsView(dataSource) {
	sessionStorage.setItem('key', 'value');

	$('head').append($('<link id="page-style" href="css/home.css" rel="stylesheet" type="text/css"/>'));

	listEmployees = [{name: 'Nghia', id: '1'}, {name: 'Phuc', id: '2'}, {name: 'Loi', id: 3}];

    $.fn.dataTable.moment('DD/MM/YYYY');

    console.log($('#tickets').length);

    // Initialize Datatable
    var table = $('#tickets').DataTable({
        "scrollX": true, 
        "ajax": {
            "url": dataSource,
            "dataSrc": function(json) {
                // TODO: preprocessing if needed
                return json;
            }
        },

        "columnDefs": [
            // Create index column, without searching/ordering
            {
                "searchable": false,
                "orderable": false,
                "targets": 0
            },
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
                "createdCell": function (td, cellData, rowData, row, col) {
			        
			    }
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
}