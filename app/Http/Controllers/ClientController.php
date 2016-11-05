<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Http\Requests;
use \CodeProject\Client as Client;

class ClientController extends Controller
{
    public function index()
    {
    	return Client::all();
    }

    public function store(Request $request)
    {
    	return Client::create($request->all());
    }

    public function show($id)
    {
    	return Client::find($id);
    }

    public function update(Request $request, $id)
    {
    	Client::find($id)->update($request->all());
    }

    public function delete($id)
    {
    	try{
    		$client = Client::find($id);
        	if ($client) {
        		$client->delete();
        		return response()->json(['success'=>'Cliente excluido com sucesso']);
        	}else{
        		return response()->json(['fail'=>'Cliente nao localizado']);
        	}
	    } catch(\Exception $e){
	        return $e->getMessage();
	    }
    }
}
