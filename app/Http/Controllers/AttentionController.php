<?php

namespace App\Http\Controllers;

use App\Attention;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attentions = Attention::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.attentions.index', compact('attentions', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attentions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Attention::where('attention', request('attention'))->count();
        $slug=Str::slug(request('attention'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Attention::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('attention'), '-')."-".$num;
                $num++;
            } else {
                $data=array('attention' => request('attention'), 'slug' => $slug);
                break;
            }
        }

        $attention=Attention::create($data);

        if ($attention) {
            return redirect()->route('attention.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El Horario de Atención al cliente ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('attention.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function show(Attention $attention)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $attention = Attention::where('slug', $slug)->firstOrFail();
        return view('admin.attentions.edit', compact("attention"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $attention=Attention::where('slug', $slug)->firstOrFail();

        $data=array('attention' => request('attention'), 'slug' => $slug);

        $attention->fill($data)->save();

        if ($attention) {
            return redirect()->route('attention.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Horario de Atención al cliente ha sido editado exitosamente.']);
        } else {
            return redirect()->route('attention.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attention  $attention
     * @return \Illuminate\Http\Response
     */
     public function deactivate(Request $request, $slug) {

        $attention = Attention::where('slug', $slug)->firstOrFail();
        $attention->fill($request->all())->save();

        if ($attention) {
            return redirect()->route('attention.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Horario de Atención al cliente ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('attention.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $attention = Attention::where('slug', $slug)->firstOrFail();
        $attention->fill($request->all())->save();

        if ($attention) {
            return redirect()->route('attention.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Horario de Atención al cliente ha sido activada exitosamente.']);
        } else {
            return redirect()->route('attention.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $attention=Attention::where('slug', $slug)->firstOrFail();
        $attention->delete();

        if ($attention) {
            return redirect()->route('attention.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'El Horario de Atención al cliente ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('attention.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
