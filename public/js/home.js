/*
 * Initialize page components
 */
function initTicketsView(dataSource) {
	listEmployees = [{name: 'Nghia', id: '1'}, {name: 'Phuc', id: '2'}, {name: 'Loi', id: 3}];

    $.fn.dataTable.moment('DD/MM/YYYY');

    console.log($('#tickets').length);

    // Initialize Datatable
    var table = $('#tickets').DataTable({
        "scrollX": true, 
        "ajax": {
            "url": 'json/tickets.php',
            "dataSrc": function(json) {
                return preprocessing(json);
            }
        },
        "columns" : [
            { "data" : "id" },
            { "data" : "subject" },
            { "data" : "priority" },
            { "data" : "created_by" },
            { "data" : "assigned_to" },
            { "data" : "created_at" },
            { "data" : "deadline" },
            { "data" : "status" }
        ],

        "columnDefs": [
            // Create index column, without searching/ordering
            {
            	"searchable": false,
                "orderable": false,
                "width": "3%",
                "targets": 0,
            },
            {
                "width": "22%",
                "createdCell": linkTicket,
                "targets": 1,
            },
            {
                "width": "10%",
                "createdCell": labelPriority,
                "targets": 2,
            },
            {
                "width": "13%",
                "createdCell": linkUser,
                "targets": 3,
            },
            {
                "width": "22%",
                "createdCell": linkUser,
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
                "createdCell": labelState,
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

/*
 * Clear all the filters
 */
function resetFilter(table) {
	console.log('clearing');

	// Clear the search boxes
	$('#tickets_filter input').val('');
	
	$('.dataTables_scrollFoot #filter-name').val('');
	$('.dataTables_scrollFoot #filter-priority').val(null);
	$('.dataTables_scrollFoot #filter-requester').val(null).trigger('change');
	$('.dataTables_scrollFoot #filter-assignee').val(null).trigger('change');
	$('.dataTables_scrollFoot #filter-deadline').val('');
	$('.dataTables_scrollFoot #filter-state').val(null);

	// Ackchyually clear the search
	table.search('').columns().search('').draw();
}

function enableSearching(table) {
	table.columns().every(function(colIdx, tableLoop, colLoop) {
        var column = this;
        // Should not manually select the footer, as scrollX is enabled
        // The normal table is heavily altered with this option
        // The original tfoot and thead now has height of 0 px,
        // the displayed tfoot and thead is actually new elements
        var footer = $(column.footer());

        switch(colIdx) {
        	case 1:
        		if ($(window).width() < 768) {
					var input = $('#filter-name');
				} else {
					var input = $('<input id="filter-name" type="text"/>').appendTo(footer.empty());
				}

        		searchText(column, input);
        		break;

        	case 2:
        		// Initialize select box
				if ($(window).width() < 768) {
					var select = $('#filter-priority');
				} else {
					var select = $('<select id="filter-priority" style="width: 100%; height: 32px"><option value=""></option></select>').appendTo(footer.empty());
				}

		    	select.append('<option value="1">Low</option>');
		    	select.append('<option value="2">Normal</option>');
		    	select.append('<option value="3">High</option>');
		    	select.append('<option value="4">Critical</option>');

        		searchSelect(column, select);
        		break;

        	case 3:
        		if ($(window).width() < 768) {
					var searchBox = $('#filter-requester');
				} else {
					var searchBox = $('<select id="filter-requester" multiple="multiple" style="width: 100%; height: 32px;"></select>').appendTo(footer.empty());
				}

        		searchSelect2(column, listEmployees, searchBox);
        		break;

        	case 4:
        		if ($(window).width() < 768) {
					var searchBox = $('#filter-assignee');
				} else {
					var searchBox = $('<select id="filter-assignee" multiple="multiple" style="width: 100%; height: 32px;"></select>').appendTo(footer.empty());
				}

        		searchSelect2(column, listEmployees, searchBox);
        		break;

        	case 5:
        		if ($(window).width() < 768) {
					var searchCreatedDate = $('#filter-created-date');
				} else {
					var searchCreatedDate = $('<input id="filter-expiration-date" style="width: 100%;">').appendTo(footer.empty());
				}

				searchText(column, searchCreatedDate);
        		break;

        	case 6:
        		if ($(window).width() < 768) {
					var searchExpirationDate = $('#filter-expiration-date');
				} else {
					var searchExpirationDate = $('<input id="filter-expiration-date" style="width: 100%;">').appendTo(footer.empty());
				}

				searchText(column, searchExpirationDate);
        		break;

        	case 7:
        		if ($(window).width() < 768) {
					var select = $('#filter-state');
				} else {
					var select = $('<select id="filter-state" style="width: 100%; height: 32px"><option value=""></option></select>').appendTo(footer.empty());
				}

				select.append('<option value="1">New</option>');
		    	select.append('<option value="2">In progress</option>');
		    	select.append('<option value="3">Resolved</option>');
		    	select.append('<option value="4">Feedback</option>');
		    	select.append('<option value="5">Closed</option>');
		    	select.append('<option value="6">Cancelled</option>');

        		searchSelect(column, select);
        		break;
        }
    });
}

/* 
 * Search event for text input
 * Only used in the name column
 */
function searchText(column, inputText) {
    inputText.on('keyup change', function() {
        if (column.search() !== this.value) {
            column
                .search(this.value)
                .draw();
        }
    });
}

function searchSelect2(column, options, searchBox) {
	searchBox.select2();

	options.forEach(function(curr, idx, arr) {
		searchBox.append('<option value="' + curr.id + '">' + curr.name + '</option>');
	});

	searchBox.on('select2:select', function(e) {
		var selected = searchBox.select2('data');
		
		var searchInput = '';
		for (var i = 0; i < selected.length; i++) {
			searchInput = searchInput + selected[i].text + '|';
		}
		searchInput = '(' + searchInput.substr(0, searchInput.length - 1) + ')';

		column.search(searchInput, {
			'regex': true
		}).draw();
	});
	searchBox.on('select2:unselect', function(e) {
		var selected = searchBox.select2('data');

		if (selected.length == 0) {
			column.search('').draw();
		} else {
			var searchInput = '';

			var searchInput = '';
			for (var i = 0; i < selected.length; i++) {
				searchInput = searchInput + selected[i].text + '|';
			}
			searchInput = '(' + searchInput.substr(0, searchInput.length - 1) + ')';

			column.search(searchInput, {
				'regex': true
			}).draw();
		}
	});
}

/*
 * Add select box to the Priority and State column
 */
function searchSelect(column, selectInput) {
	selectInput.change(function () {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());

        column.search(val ? '^' + val + '$' : '', true, false).draw();
    });
}

/*
 * Beautify the table:
 * - Make it "more" responsive
 * - Add labels for priority and state
 */
function beautify(table) {
	// Fix resize problem
	$('.table').css('width', '100%');
	if ($(window).width() >= 768) {
		$('.dataTables_scrollHeadInner').css('width', '100%');
		$('.dataTables_scrollFootInner').css('width', '100%');
		// $('#filter-mobile').css('display', 'none');
	}

	$('.select2-container').css('width', '100%');
	$('.select2-search__field').css('width', '100%');
}

/*
 * Convert numbers to their equivalent expression
 * TODO: add language support
 */
function preprocessing(tickets) {
	for (var i = 0; i < tickets.length; i++) {
		var ticket = tickets[i];

		ticket['created_at'] = ticket['created_at'].substring(0, ticket['created_at'].length - 9);
		ticket['deadline'] = ticket['deadline'].substring(0, ticket['deadline'].length - 9);
	}
	return tickets;
}

$.fn.dataTable.moment = function (format, locale) {
    var types = $.fn.dataTable.ext.type;
 
    // Add type detection
    types.detect.unshift(function(d) {
        return moment(d, format, locale, true).isValid() ? 'moment-' + format : null;
    } );
 
    // Add sorting method - use an integer for the sorting
    types.order['moment-' + format + '-pre'] = function(d) {
        return moment(d, format, locale, true).unix();
    };
};

function getEmployeeName(listEmployees, id) {
	for (var i = 0; i < listEmployees.length; i++) {
		if (listEmployees[i].id == id) {
			return listEmployees[i];
		}
	}

	return null;
}

function labelPriority(td, cellData, rowData, row, col) {
	switch(cellData) {
		case 1:
			$(td).empty().append('<small class="label bg-aqua-active">Low</small>');
			break;

		case 2:
			$(td).empty().append('<small class="label bg-light-blue-active">Normal</small>');
			break;

		case 3:
			$(td).empty().append('<small class="label bg-yellow-active">High</small>');
			break;

		case 4:
			$(td).empty().append('<small class="label bg-red-active">Critical</small>');
			break;
	}
}

function labelState(td, cellData, rowData, row, col) {
	switch(cellData) {
		// English
		case 1:
			$(td).empty().append('<small class="label bg-aqua-active">New</small>');
			break;
		
		case 2:
			$(td).empty().append('<small class="label bg-aqua-active">In progress</small>');
			break;

		case 3:
			$(td).empty().append('<small class="label bg-aqua-active">Resolved</small>');
			break;

		case 4:
			$(td).empty().append('<small class="label bg-aqua-active">Feedback</small>');
			break;

		case 5:
			$(td).empty().append('<small class="label bg-aqua-active">Closed</small>');
			break;

		case 6:
			$(td).empty().append('<small class="label bg-aqua-active">Cancelled</small>');
			break;
	}
}

function linkTicket(td, cellData, rowData, row, col) {
	$('<a href="#tickets/' + rowData['id'] + '">' + cellData + '</a>')
		.appendTo($(td).empty())
		.click(function() {
			initTicketDetailView()
		});
}

function linkUser(td, cellData, rowData, row, col) {
	var users = cellData.split(';');
	$(td).empty();
	for (var i = 0; i < users.length; i++) {
		var userInfo = users[i].split(':');
		$(td).append('<a href="#users/' + userInfo[1] + '">' + userInfo[0] + '</a>');
		if (i != users.length - 1) {
			$(td).append(', ');
		}
	}
}