<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
    	$clients = Client::all();
    	return view('home/clients.index')->with([
    		'clients' => $clients
    	]);
    }

    // return create client view
    public function store()
    {
    	return view('home/clients.store');
    }

    public function view()
    {
    	# code...
    }

    public function update()
    {
    	# code...
    }
}
