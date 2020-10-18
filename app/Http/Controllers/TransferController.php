<?php

namespace App\Http\Controllers;

use App\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::where('state', '=', '1')->orderBy('id', 'DESC')->get(); 
        $num = 1;
        return view('admin.transfers.index', compact('transfers', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transfers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Transfer::where('lang', request('lang'))->count();
        $slug=Str::slug(request('lang'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Transfer::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('lang'), '-')."-".$num;
                $num++;
            } else {
                $data=array('description' => request('description'), 'slug' => $slug, 'lang' => request('lang'), 'name' => request('name'));
                break;
            }
        }

        $transfer=Transfer::create($data);

        if ($transfer) {
            return redirect()->route('transfer.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La sección ¿Quiénes Somos? ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('transfer.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $transfer = transfer::where('slug', $slug)->firstOrFail();
        return view('admin.transfers.edit', compact("transfer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request,  $slug)
    {
        $transfer=Transfer::where('slug', $slug)->firstOrFail();

        $data=array('description' => request('description'), 'slug' => $slug, 'lang' => request('lang'), 'name' => request('name'));

        $transfer->fill($data)->save();

        if ($transfer) {
            return redirect()->route('transfer.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Traslado ha sido editado exitosamente.']);
        } else {
            return redirect()->route('transfer.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $transfer = Transfer::where('slug', $slug)->firstOrFail();
        $transfer->fill($request->all())->save();

        if ($transfer) {
            return redirect()->route('transfer.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Traslado ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('transfer.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $transfer = Transfer::where('slug', $slug)->firstOrFail();
        $transfer->fill($request->all())->save();

        if ($transfer) {
            return redirect()->route('transfer.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Traslado ha sido activado exitosamente.']);
        } else {
            return redirect()->route('transfer.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
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
            return redirect()->route('transfer.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'El Traslado ha sido eliminado exitosamente.']);
        } else {
            return redirect()->route('transfer.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
