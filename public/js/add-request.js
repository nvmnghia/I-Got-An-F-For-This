
// Javascript code for add request page
function initAddView() {
    // Focus on the Name field
    $('#name').focus();

    // Date picker
    $('#expiration-date').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        startDate: new Date()
    });

    // WYSIHTML5
    $('#content').wysihtml5();
    $('.wysihtml5-sandbox').contents().find('body').keyup(function() {
        if ($('#content').hasClass('has-error')) {
            contentValidator();
        }
    }).on('focus', function() {
        console.log('focused');

        if ($('#input-content').hasClass('has-error')) {
            $('.wysihtml5-sandbox').css('border-color', '#dd4b39');
        }
    });

    // Select2 for assigning member 
    $('#involved-employees').select2({
        width: '100%' // This one line costs me a fucking day.
    }).on('select2:open', function() {
        $('.select2-selection').css('border-color', '#3c8dbc');
    }).on('select2:close', function() {
        $('.select2-selection').css('border-color', '#d2d6de');
    });

    // Fileinput
    var fileInput = $('#attached-file').fileinput({
        maxFileCount: 5,
        dropZoneEnabled: true,
        showUpload: false,
        showCancel: false,
    });

    // Validate these stuffs as soon as it lost focus (if it's already has-error)
    $('#name').keyup(function() {
        if ($('#input-name').hasClass('has-error')) {
            nameValidator();
        }
    });

    $('#expiration-date').datepicker().on('changeDate', function() {
        console.log('datepicker has just lost the focus');

        if ($('#input-expiration-date').hasClass('has-error')) {
            dateValidator();
        }
    });

    $('#content').change(function() {
        if ($('#input-content').hasClass('has-error')) {
            contentValidator();
        }
    });

    $('#division').change(function() {
        if ($('#input-division').hasClass('has-error')) {
            divisionValidator();
        }
    });

    // Form validation
    $('#submit').click(function() {
        if (formValidator()) {
            var data;
            data.name = $('#name').val();
            data.priority = $('#priority').val();
            data.deadline = $('#expiration-date').val();
            data.division = $('#division').val();
            data.involved = $('#division').val();

            console.log(data);
        }
    });

    $('#cancel').click(function() {
        loadTicketsView('array.txt', '');
    })
}

function getDate(){}

// Beautify text
// For now it's only for trimming
function cleanText(dirty) {
    console.log(dirty);

    var cleaned = $.trim(dirty);
    return cleaned;
}

function checkRequiredSection() {
    if ($('name').val().length == 0) {
        $('name').addClass()
    }
}

function isLater(dateStr) {
    console.log(dateStr);

    var values = dateStr.split("/");
    var date = new Date();
    console.log('newly created date object ' + date);

    date.setFullYear(parseInt(values[2]), parseInt(values[1]) - 1, parseInt(values[0]));
}

function nameValidator() {
    var nameField = $('#name');
    var parent = $('#input-name');
    nameField.val(cleanText(nameField.val()));

    if (nameField.val().length != 0) {
        parent.removeClass('has-error');

        console.log('good name');
        return true;
    } else {
        parent.addClass('has-error');

        console.log('bad name');
        return false;
    }
}

function dateValidator() {
    var dateField = $('#expiration-date');
    var parent = $('#input-expiration-date');

    console.log(dateField.datepicker('getDate'));

    if (dateField.datepicker('getDate') != 'Invalid Date') {
        var now = new Date();
        now.setHours(0, 0, 0, 0);

        if (dateField.datepicker('getDate') < now) {
            parent.addClass('has-error');

            var wrongDateWarning = $('#wrong-date').text();
            wrongDateWarning = wrongDateWarning.substring(0, wrongDateWarning.lastIndexOf(' ')) + ' ' + now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear();
            $('#wrong-date').text(wrongDateWarning);
            $('#wrong-date').hide();
            
            console.log('bad date');
            return false;
        } else {
            parent.removeClass('has-error');
            $('#wrong-date').text('');

            console.log('good date');
            return true;
        }
    } else {
        parent.addClass('has-error');

        console.log('bad date');
        return false;
    }
}

function contentValidator() {
    var contentField = $('#content');
    var parent = $('#input-content');
    contentField.val(cleanText(contentField.val()));

    if (contentField.val().length != 0) {
        parent.removeClass('has-error');
        $('.wysihtml5-sandbox').css('border-color', '#d2d6de');

        return true;
    } else {
        parent.addClass('has-error');
        $('.wysihtml5-sandbox').css('border-color', '#dd4b39');

        console.log('bad content');
        return false
    }
}

function divisionValidator() {
    var divisionField = $('#division');
    var parent = $('#input-division');

    if (divisionField.val() == '0') {
        parent.addClass('has-error');

        console.log('bad division');
        return false;
    } else {
        parent.removeClass('has-error');

        console.log('good division');
        return true;
    }
}

function formValidator() {
    // Each validator has its own result variable to avoid short-circuit evaluation
    var isNameValidated = nameValidator();
    var isDateValidated = dateValidator();
    var isContentValidated = contentValidator();
    var isDivisionValidated = divisionValidator();

    if (isNameValidated && isDateValidated && isContentValidated && isDivisionValidated) {
        return true;
    } else {
        $('.has-error').first().find('.form-control').focus();
        return false;
    }
}

thu thập và phân tích yêu cầu
csdl phân tán
