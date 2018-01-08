<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use App\Ticket;
use DB;

/**
* 
*/
class PagesController extends Controller
{
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function home()
	{
		return view('home');
	}

	public function add()
	{
		return view('add');
	}

	public function edit()
	{
		return view('edit');
	}

	public function test()
	{
		return view('test');
	}

	public function json_tickets() {
		$query = 'SELECT tickets.id
, tickets.subject
, tickets.priority
, CONCAT(users.name, \':\', tickets.created_by) AS created_by
, CONCAT(users2.name, \':\', tickets.assigned_to) AS assigned_to
, tickets.created_at
, tickets.deadline
, tickets.status
FROM tickets
LEFT JOIN users
ON tickets.created_by = users.id
LEFT JOIN users AS users2
ON tickets.assigned_to = users2.id';
		$tickets = DB::select($query);
		return str_replace('null', '"null"', json_encode($tickets));
	}

	public function json_comments($ticket_id) {
		$query = 'SELECT comments.id
			, comments.user_id
			, users.name AS user_name
			, comments.content
			, comments.type
			, comments.created_at
			, comments.updated_at
			FROM comments
			INNER JOIN users
			ON comments.user_id = users.id
			WHERE comments.ticket_id = '.$ticket_id;
		$comments = DB::select($query);
		return json_encode($comments);
	}

	public function json_user($user_id) {
		$query = 'SELECT id
			, name
			, email
			, type
			, team_id
			FROM users
			WHERE id = '.$user_id;
		$user = DB::select($query);
		return json_encode($user);
	}
}