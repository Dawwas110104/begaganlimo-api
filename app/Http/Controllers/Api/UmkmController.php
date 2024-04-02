<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Umkm::all();

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
        $postObj = new Umkm();

        $gambar = '';
        $path = '';
        if($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName(); // get the file name
            $getfilenamewitoutext = pathinfo($filename, PATHINFO_FILENAME); // get the file name without extension
            $getfileExtension = $request->file('image')->getClientOriginalExtension(); // get the file extension
            $createnewFileName = time().'_'.str_replace(' ','_', $getfilenamewitoutext).'.'.$getfileExtension; // create new random file name
            $img_path = $request->file('image')->storeAs('public/post_img', $createnewFileName); // get the image path
            $postObj->image = $createnewFileName; // pass file name with column

            $gambar = $createnewFileName;
            $path = $img_path;
        }

        $content = Umkm::create([
            'nama' => $request->nama,
            'penjual' => $request->penjual,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'telp' => $request->telp,
            'desc' => $request->desc,
            'gambar' => $gambar,
        ]);

        return response()->json([
            'response_code' => 200,
            'message' => 'Success',
            'content' => $content,
            'img_path' => $path
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
        $content = Umkm::where('id', $id)->first();
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
        $content = Umkm::find($id);
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
        $content = Umkm::find($id);
        $content->delete();

        return response()->json([
            'response_code' => 200,
            'message' => 'Success',
            'content' => $content
        ]);
    }
}
