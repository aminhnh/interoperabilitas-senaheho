<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/darah";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('dashboard', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $parameter = [

        ];

           $client = new Client();
           $url = "http://127.0.0.1:8000/api/darah";
           $response = $client->request('POST', $url, [
               'form_params' => $parameter,
           ]);

           $content = $response->getBody()->getContents();
           $contentArrays = json_decode($content, true);
           if($contentArrays['status'] != true){
           $error = $contentArrays['message'];
               return Redirect::back()->withErrors($error);
           }else{
               return Redirect::route('');
           }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $parameter = [

        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/darah".$id;

        $response = $client->request('PUT', $url, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => http_build_query($parameter),
        ]);

        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
            $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::route('');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        $url = "http://127.0.0.1:8000/api/darah".$id;
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);

        return Redirect::back()->with('success', 'berhasil');
    }
}
