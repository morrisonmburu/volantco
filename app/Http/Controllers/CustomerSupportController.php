<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;

class CustomerSupportController extends Controller
{
	    /**
	 * Fetch all messages
	 *
	 * @return Message
	 */
	    public function fetchMessages()
	    {
	    	return Message::with('user')->get();
	    }

	/**
	 * Persist message to database
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function sendMessage(Request $request)
	{
		$user = Auth::guard('volantuser')->user();

		$message = $user->messages()->create([
			'message' => $request->input('message')
		]);

		return ['status' => 'Message Sent!'];
	}
}
