<?php

namespace App\Http\Controllers;

use App\Language;
use App\Transfer;
use App\Http\Requests\TransferStoreRequest;
use App\Http\Requests\TransferUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers=Transfer::orderBy('id', 'DESC')->get(); 
        $num=1;
        return view('admin.transfers.index', compact('transfers', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages=Language::all();
        return view('admin.transfers.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferStoreRequest $request)
    {
        $count=Transfer::where('title', request('title'))->count();
        $slug=Str::slug(request('title'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Transfer::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('title'), '-')."-".$num;
                $num++;
            } else {
                $language=Language::where('slug', request('language_id'))->firstOrFail();
                $data=array('title' => request('title'), 'slug' => $slug, 'description' => request('description'), 'language_id' => $language->id);
                break;
            }
        }

        $transfer=Transfer::create($data);

        if ($transfer) {
            return redirect()->route('traslados.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La sección ¿Quiénes Somos? ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('traslados.create')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.'])->withInputs();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $transfer=transfer::where('slug', $slug)->firstOrFail();
        $languages=Language::all();
        return view('admin.transfers.edit', compact("transfer", "languages"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(TransferUpdateRequest $request,  $slug)
    {
        $transfer=Transfer::where('slug', $slug)->firstOrFail();
        $language=Language::where('slug', request('language_id'))->firstOrFail();
        $data=array('title' => request('title'), 'description' => request('description'), 'language_id' => $language->id);
        $transfer->fill($data)->save();

        if ($transfer) {
            return redirect()->route('traslados.edit', ['slug' => $slug])->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Traslado ha sido editado exitosamente.']);
        } else {
            return redirect()->route('traslados.edit', ['slug' => $slug])->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $transfer=Transfer::where('slug', $slug)->firstOrFail();
        $transfer->fill(['state' => "0"])->save();

        if ($transfer) {
            return redirect()->route('traslados.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El traslado ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('traslados.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $transfer=Transfer::where('slug', $slug)->firstOrFail();
        $transfer->fill(['state' => "1"])->save();

        if ($transfer) {
            return redirect()->route('traslados.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El traslado ha sido activado exitosamente.']);
        } else {
            return redirect()->route('traslados.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $transfer=Transfer::where('slug', $slug)->firstOrFail();
        $transfer->delete();

        if ($transfer) {
            return redirect()->route('traslados.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'El traslado ha sido eliminado exitosamente.']);
        } else {
            return redirect()->route('traslados.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
