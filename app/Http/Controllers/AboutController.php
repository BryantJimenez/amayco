<?php

namespace App\Http\Controllers;

use App\About;
use App\Http\Requests\AboutUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts=About::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.abouts.index', compact('abouts', 'num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $about=About::where('slug', $slug)->firstOrFail();
        return view('admin.abouts.edit', compact("about"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(AboutUpdateRequest $request,  $slug)
    {
        $about=About::where('slug', $slug)->firstOrFail();
        $data=array('about' => request('about'));
        $about->fill($data)->save();

        if ($about) {
            return redirect()->route('nosotros.edit', ['slug' => $slug])->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La sección quiénes somos ha sido editada exitosamente.']);
        } else {
            return redirect()->route('nosotros.edit', ['slug' => $slug])->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
