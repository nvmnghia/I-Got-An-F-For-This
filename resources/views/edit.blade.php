@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="box box-primary" style="padding: 5px">
    <div class="box-header">
        <div>
            <div class='btn-toolbar pull-right'>
                <button id="edit" class="btn btn-primary">{{ trans('adminlte_lang::message.edit') }}</button>
                <button id="delete" class="btn btn-danger">{{ trans('adminlte_lang::message.delete') }}</button>
            </div>
            <h2>Tên công việc<h2>
        </div>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.created-by') }}:</strong></h5>
                <h5 id="created_by" style="display: inline-block; float: right; width: 65%">nvmnghia</h5>
            </div>

            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.priority') }}:</strong></h5>
                <h5 id="priority" style="display: inline-block; float: right; width: 65%">nvmnghia</h5>
            </div>

            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.date-created') }}:</strong></h5>
                <h5 id="date-created" style="display: inline-block; float: right; width: 65%">1/1/1 1:1:1</h5>
            </div>

            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.expiration-date') }}:</strong></h5>
                <h5 id="deadline" style="display: inline-block; float: right; width: 65%">1/1/1 1:1:1</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.state') }}:</strong></h5>
                <h5 id="state" style="display: inline-block; float: right; width: 65%"><small class="label bg-blue">New</small></h5>
            </div>

            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.involved') }}:</strong></h5>
                <h5 id="involved" style="display: inline-block; float: right; width: 65%">nvmnghia</h5>
            </div>

            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.division') }}:</strong></h5>
                <h5 id="division" style="display: inline-block; float: right; width: 65%">Ha noi</h5>
            </div>

            <div class="col-md-3" >
                <h5 style="display: inline-block; float: left; width: 35%"><strong>{{ trans('adminlte_lang::message.assign') }}:</strong></h5>
                <h5 id="assign" style="display: inline-block; float: right; width: 65%">nvmnghia</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8" >
                <h5><strong>{{ trans('adminlte_lang::message.content') }}:</strong></h5>
                <div style="height: 250px; overflow: hidden; overflow-y: auto;">
                    <p>This is a paragraph. Put sth here.</p>
                </div>
            </div>

            <div class="col-md-4">
                <h5><strong>{{ trans('adminlte_lang::message.attachment') }}:</strong></h5>
                <div>
                    <ul id="attachment" class="mailbox-attachments">
                        <li>
                            <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Karma Sutra part 1.pdf</a>
                                <span class="mailbox-attachment-size">
                                    1,234 KB
                                    <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                </span>
                            </div>
                        </li>

                        <li>
                            <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Karma Sutra part 2.docx</a>
                                <span class="mailbox-attachment-size">
                                    1,245 KB
                                    <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                </span>
                            </div>
                        </li>

                        <li>
                            <span class="mailbox-attachment-icon has-img"><img src="" alt=" some attachment"></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> Yui Hatano.png</a>
                                <span class="mailbox-attachment-size">
                                    2.67 MB
                                    <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary" style="padding: 5px">
    <div class="box-header">
        <h3 class="box-title">Comment<h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div id="comment-box" class="container-fluid">
            </div>
        </div>
    </div>
</div>


<!-- Timeline! -->
<div class="row">
    <div class="col-md-12">
        
        <!-- Label -->
        <ul class="timeline">
            <li class="time-label">
                <span class="bg-red">
                    15/07/1997
                </span>
            </li>

             <!-- Item -->
            <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 00:00</span>
                    <h3 class="timeline-header"><a href="#">nvmnghia</a> did some action</h3>
                    
                    <div class="timeline-body">
                        Help me!
                    </div>
                </div>
            </li>

             <!-- Item -->
            <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 00:00</span>
                    <h3 class="timeline-header"><a href="#">nvmnghia</a> did some action</h3>
                    
                    <div class="timeline-body">
                        Help me!
                    </div>
                </div>
            </li>

             <!-- Item -->
            <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 00:00</span>
                    <h3 class="timeline-header"><a href="#">nvmnghia</a> did some action</h3>
                    
                    <div class="timeline-body">
                        Help me!
                    </div>
                </div>
            </li>

             <!-- Item -->
            <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 00:00</span>
                    <h3 class="timeline-header"><a href="#">nvmnghia</a> did some action</h3>
                    
                    <div class="timeline-body">
                        Help me!
                    </div>
                </div>
            </li>

            <!-- Item -->
            <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 00:00</span>
                    <h3 class="timeline-header"><a href="#">nvmnghia</a> did some action</h3>
                    
                    <div class="timeline-body">
                        Help me!
                    </div>
                </div>
            </li>

            <!-- End mark -->
            <li>
                <i class="fa fa-clock-o bg-gray"></i>
            </li>
        </ul>
    </div>
</div>

@endsection

@section('page-script')
<script type="text/javascript" src="{{ URL::asset('plugins/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/jquery-comments.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/jquery.textcomplete.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/edit-request.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // timeline();

        // jquery-comments plugin
        // Map the plugin's fields to the corresponding JSON fields
        var fieldMappings = {
            creator: 'employee_id',
            fullname: 'employe_name',
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
            enablePinging: true,
            getUsers: function(success, error) {
                $.ajax({
                    type: 'get',
                    url: 'users.txt',    // Thread users URL
                    success: function(userArray) {
                        success(userArray)
                    },
                    error: error
                });
            },

            roundProfilePictures: true,
            textareaPlaceholderText: 'Write something nice...',
            enableUpvoting: false,
        });

        console.log($('.comment-wrapper > .wrapper').length);
    })

</script>
@endsection

@section('page-style')
<link href="{{ URL::asset('/plugins/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-style-manual')
    <!-- <link href="{{ URL::asset('/css/edit.css') }}" rel="stylesheet" type="text/css"/> -->
    <link href="{{ URL::asset('/plugins/jquery-comments.min.css') }}" rel="stylesheet" type="text/css"/>

    <style type="text/css">
        tr td {
            border: 0px;
        }

        #attachment {
            height: 250px;
            overflow: hidden;
            overflow-y: auto;
        }

        .comment-wrapper > .wrapper {
            background-color: white;
        }

        .comment-wrapper > .wrapper > .content {
            min-height: 0px;
        }
    </style>
@endsection