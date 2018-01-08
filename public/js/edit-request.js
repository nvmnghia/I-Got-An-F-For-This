function initTicketDetailView(ticketID) {
	// Mapping for jquery-comments
	var fieldMappings = {
        creator: 'employee_id',
        fullname: 'employe_name',
    }

    var ticket;

    $('#created_by').text(ticket);
    $('#priority')
    $('#date-created').text(ticket);
    $('#deadline').text();
    $('#state')
    $('#involved').text();
    
    if (division == 1) {
    	$('#division').text('Hà Nội');
    } else {
    	$('#division').text('Đà Nẵng');
    }

    // Initialize plugin
    $('#comment-box').comments({
        fieldMappings: fieldMappings,    
        getComments: function(success, error) {
            // Insert ajax code here to get comment
            $.ajax({
                type: 'get',
                url: 'array.txt',    // Comment URL

                success: function(comments) {
                    success(preprocessCommentGet(comments));
                },
                error: error
            }); 
        },

        postComment: function(commentJSON, success, error) {
            $.ajax({
                type: 'post',
                url: '/api/comments/',
                data: commentJSON,
                success: function(comment) {
                    console.log(commentJSON);
                    console.log(comment);
                    success(comment);
                },
                // just testing
                error: function(comment) {
                    console.log(commentJSON);
                    success(comment);
                }
            });
        },

        // Updating comment
        putComment: function(commentJSON, success, error) {
            $.ajax({
                type: 'put',
                url: '/api/comments/' + commentJSON.id,
                data: commentJSON,
                success: function(comment) {
                    console.log(commentJSON);
                    console.log(comment);
                    success(comment);
                },
                error: error
            });
        },

        // Pinging, aka tagging
        // enablePinging: true,
        // getUsers: function(success, error) {
        //     $.ajax({
        //         type: 'get',
        //         url: 'users.txt',    // Thread users URL
        //         success: function(userArray) {
        //             success(userArray)
        //         },
        //         error: error
        //     });
        // },

        roundProfilePictures: true,
        textareaPlaceholderText: 'Write something nice...',
        enableUpvoting: false,
    });
}

/*
 * The core function for comments
 * Insert AJAX code here to somehow get the comments
 * The code contains an example of a valid JSON
 */
function preprocessCommentGet(comments) {
    var comments = [
	    {  
		   "id": 1,
		   "parent": null,
		   "created": "2014-01-01",
		   "modified": "2014-01-01",
		   "content": "Lorem ipsum dolor sit amet, .",
		   "pings": [],
		   "employee_id": 6,
		   "employe_name": "Simon Powell",
		   "profile_picture_url": "https://app.viima.com/static/media/user_profiles/user-icon.png",
		   "created_by_admin": false,
		   "created_by_current_user": false,
		   "upvote_count": 3,
		   "user_has_upvoted": false
		},
		{  
		   "id": 2,
		   "parent": null,
		   "created": "2015-01-01",
		   "modified": "2015-01-01",
		   "content": "Lorem ipsum dolor sit amet, .",
		   "pings": [],
		   "employee_id": 6,
		   "employe_name": "Simon Powell",
		   "profile_picture_url": "https://app.viima.com/static/media/user_profiles/user-icon.png",
		   "created_by_admin": false,
		   "created_by_current_user": false,
		   "upvote_count": 3,
		   "user_has_upvoted": false
		}];

    return comments;
}

function preprocessCommentPost(comment) {
	delete comment.created_by_current_user;
	delete comment.employe_name;
	delete comment.profile_picture_url;
	delete comment.id;
	delete comment.user_has_upvoted;
}


/*
 * Provide a list of users that participate the thread
 * Insert AJAX code here to somehow get the thread's participants
 */
function getUsers(success, error) {
	success(listID);
}

