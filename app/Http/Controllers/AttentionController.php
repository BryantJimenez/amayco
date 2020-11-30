<?php

namespace App\Http\Controllers;

use App\Attention;
use App\Http\Requests\AttentionUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attentions=Attention::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.attentions.index', compact('attentions', 'num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $attention=Attention::where('slug', $slug)->firstOrFail();
        return view('admin.attentions.edit', compact("attention"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function update(AttentionUpdateRequest $request, $slug)
    {
        $attention=Attention::where('slug', $slug)->firstOrFail();
        $data=array('attention' => request('attention'), 'schedule' => request('schedule'));
        $attention->fill($data)->save();

        if ($attention) {
            return redirect()->route('atenciones.edit', ['slug' => $slug])->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La atención al cliente ha sido editada exitosamente.']);
        } else {
            return redirect()->route('atenciones.edit', ['slug' => $slug])->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
