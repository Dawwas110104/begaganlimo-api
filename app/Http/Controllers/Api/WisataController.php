<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Wisata::all();

        return response()->json([
            'response_code' => 200,
            'message' => 'Success',
            'content' => $content
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = Wisata::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'telp' => $request->telp,
            'desc' => $request->desc,
            'gambar' => $request->gambar,
        ]);

        return response()->json([
            'response_code' => 200,
            'message' => 'Success',
            'content' => $content
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Wisata::where('id', $id)->first();
        return response()->json([
            'response_code' => 200,
            'message' => 'Success',
            'content' => $content
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = Wisata::find($id);
        $content->update($request->all());

        return response()->json([
            'response_code' => 200,
            'message' => 'Success',
            'content' => $content
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Wisata::find($id);
        $content->delete();

        return response()->json([
            'response_code' => 200,
            'message' => 'Success',
            'content' => $content
        ]);
    }
}
