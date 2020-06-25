<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request) {

        $search = $request->search;

        if($search) {
            $clients = Client::where('name', 'like', "%". $search ."%")->get();   
        } else {
            $clients = Client::paginate(5);
        }

        return view('components.client.client', ['clients' => $clients]);
    }

    public function create() {
        return view('components.client.clientCreate');
    }

    public function store(Request $request) {

        $client = Client::create([
            'name' => $request->name,
            'company' => $request->company,
        ]);

        return redirect('/client');
    }

    public function edit($id) {
        $clients = Client::find($id);
        
        return view('components.client.clientEdit', ['clients' => $clients]);
    }

    public function update($id, Request $request) {
        $clients = Client::find($id);
        $clients->name = $request->name;
        $clients->company = $request->company;
        $clients->save();

        return redirect('/client');
    }

    public function delete($id) {
        $client = Client::find($id);
        $client->delete();

        return redirect('/client');
    }
}
