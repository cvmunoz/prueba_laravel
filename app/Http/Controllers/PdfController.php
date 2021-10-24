<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Inertia::render('Pdf');
    }

    public function subir(Request $request)
 {
    if($request->hasFile('thumbnail')){
            $filename = $request->thumbnail->getClientOriginalName();
            $ruta = public_path("pdf/".$filename);
            //info($filename); //log
        }
       // if($request->hasFile("file"))
       // {
       //      $file=$request->file("file");
            
       //      $nombre = "pdf_".time().".".$file->guessExtension();

       //      $ruta = public_path("pdf/".$nombre);

       //      if($file->guessExtension()=="pdf")
       //      {
       //          copy($file, $ruta);
       //      }
       //      else
       //      {
       //          dd("NO ES UN PDF");
       //      }
       //  }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function show(Pdf $pdf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdf $pdf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pdf $pdf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pdf $pdf)
    {
        //
    }
}
