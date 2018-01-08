/*
 * Route handling for the whole application
 * This function is called at page load to load the view corresponding to the address
 */
function routing() {
    var currentLocation = window.location.hash.trim();
    switch(currentLocation) {
        // My requests
        case '#my-requests-all':
            loadTicketsView('array.txt', '');
            break;

        case '#my-requests-new':
            loadTicketsView('array.txt', '1');
            break;

        case '#my-requests-in-progress':
            loadTicketsView('array.txt', '2');
            break;

        case '#my-requests-feedback':
            loadTicketsView('array.txt', '3');
            break;

        case '#my-requests-out-of-date':
            loadTicketsView('array.txt', '4');
            break;

        case '#my-requests-closed':
            loadTicketsView('array.txt', '5');
            break;

        // Involved request
        case '#involved-requests-all':
            loadTicketsView('array.txt', '');
            break;

        case '#involved-requests-new':
            loadTicketsView('array.txt', '1');
            break;

        case '#involved-requests-in-progress':
            loadTicketsView('array.txt', '2');
            break;

        case '#involved-requests-feedback':
            loadTicketsView('array.txt', '3');
            break;

        case '#involved-requests-out-of-date':
            loadTicketsView('array.txt', '4');
            break;

        case '#involved-requests-closed':
            loadTicketsView('array.txt', '5');
            break;

        // My assigned request
        case '#my-assigned-requests-all':
            loadTicketsView('array.txt', '');
            break;

        case '#my-assigned-requests-new':
            loadTicketsView('array.txt', '1');
            break;

        case '#my-assigned-requests-in-progress':
            loadTicketsView('array.txt', '2');
            break;

        case '#my-assigned-requests-feedback':
            loadTicketsView('array.txt', '3');
            break;

        case '#my-assigned-requests-out-of-date':
            loadTicketsView('array.txt', '4');
            break;

        case '#my-assigned-requests-closed':
            loadTicketsView('array.txt', '5');
            break;

        // Team request
        case '#team-requests-all':
            loadTicketsView('array.txt', '');
            break;

        case '#team-requests-new':
            loadTicketsView('array.txt', '1');
            break;

        case '#team-requests-in-progress':
            loadTicketsView('array.txt', '2');
            break;

        case '#team-requests-feedback':
            loadTicketsView('array.txt', '3');
            break;

        case '#team-requests-out-of-date':
            loadTicketsView('array.txt', '4');
            break;

        case '#team-requests-closed':
            loadTicketsView('array.txt', '5');
            break;

        // New request
        case '#add-ticket':
            loadAddView();
            break;

        case '':
            // Load my-requests-all
            loadTicketsView('array.txt', '');
            break;
    }

    if (currentLocation.startsWith('#ticket/')) {
        var ticketID = currentLocation.substring(8, currentLocation.length);
        loadTicketDetailView(ticketID);
    }

    if (currentLocation.startsWith('#user/')) {
        var userID = currentLocation.substring(6, currentLocation.length);

    }
}

/*
 * Lots of click handlers for the bar
 */
function sidebarClickHandler() {
    // My requests
    $('#my-requests-all').click(function(){
        loadTicketsView('array.txt', '');
    });

    $('#my-requests-new').click(function(){
        loadTicketsView('array.txt', '1');
    });

    $('#my-requests-in-progress').click(function(){
        loadTicketsView('array.txt', '2');
    });

    $('#my-requests-feedback').click(function(){
        loadTicketsView('array.txt', '3');
    });

    $('#my-requests-out-of-date').click(function(){
        loadTicketsView('array.txt', '4');
    });

    $('#my-requests-closed').click(function(){
        loadTicketsView('array.txt', '5');
    });

    // Involved request
    $('#involved-requests-all').click(function(){
        loadTicketsView('array.txt', '');
    });

    $('#involved-requests-new').click(function(){
        loadTicketsView('array.txt', '1');
    });

    $('#involved-requests-in-progress').click(function(){
        loadTicketsView('array.txt', '2');
    });

    $('#involved-requests-feedback').click(function(){
        loadTicketsView('array.txt', '3');
    });

    $('#involved-requests-out-of-date').click(function(){
        loadTicketsView('array.txt', '4');
    });

    $('#involved-requests-closed').click(function(){
        loadTicketsView('array.txt', '5');
    });

    // My assigned request
    $('#my-assigned-requests-all').click(function(){
        loadTicketsView('array.txt', '');
    });

    $('#my-assigned-requests-new').click(function(){
        loadTicketsView('array.txt', '1');
    });

    $('#my-assigned-requests-in-progress').click(function(){
        loadTicketsView('array.txt', '2');
    });

    $('#my-assigned-requests-feedback').click(function(){
        loadTicketsView('array.txt', '3');
    });

    $('#my-assigned-requests-out-of-date').click(function(){
        loadTicketsView('array.txt', '4');
    });

    $('#my-assigned-requests-closed').click(function(){
        loadTicketsView('array.txt', '5');
    });

    // Team request
    $('#team-requests-all').click(function(){
        loadTicketsView('array.txt', '');
    });

    $('#team-requests-new').click(function(){
        loadTicketsView('array.txt', '1');
    });

    $('#team-requests-in-progress').click(function(){
        loadTicketsView('array.txt', '2');
    });

    $('#team-requests-feedback').click(function(){
        loadTicketsView('array.txt', '3');
    });

    $('#team-requests-out-of-date').click(function(){
        loadTicketsView('array.txt', '4');
    });

    $('#team-requests-closed').click(function(){
        loadTicketsView('array.txt', '5');
    });

    $('#add-ticket').click(function() {
        loadAddView();
    });
}

function filterState(state) {
    console.log('it ran ' + $('#filter-state').length)
    $('#filter-state').val(state).change();
}

function loadTicketsView(dataSource, filter) {
    $.ajax({
        url: "view-tickets.txt", 
        success: function(result){
            $("#content-frame").html(result);
            initTicketsView(dataSource);
            $('#filter-state').val('2').change();
        }
    });
}

function loadAddView() {
    $.ajax({
        url: "add-ticket.txt", 
        success: function(result){
            $("#content-frame").html(result);
            initAddView();
        }
    });
}

function loadTicketDetailView(ticketID) {
    $.ajax({
        url: "view-ticket-detail.txt", 
        success: function(result){
            $("#content-frame").html(result);
            initTicketDetailView(ticketID);
        }
    });
}