<?php
use App\User;
use App\Notification;

// function to fetch website's admin
function fetchAdmins()
{
	return User::where('admin',1)->get();	
}

// function to create notification
function createNotification($user_id,$message)
{
	$notification = new Notification;
	$notification->user_id = $user_id;
	$notification->message = $message;
	$notification->save();
	return $notification;
}

// function to fetch notifications for a user
function fetchNotification($user_id)
{
	return $notifications = Notification::where([
		'user_id' => $user_id,
		'read' => 0
	])->get();	
}

