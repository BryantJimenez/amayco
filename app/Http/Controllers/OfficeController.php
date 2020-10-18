<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.offices.index', compact('offices', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Office::where('phone', request('phone'))->where('email', request('email'))->count();
        $slug=Str::slug(request('phone')." ".request('email'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Office::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('phone')." ".request('email'), '-')."-".$num;
                $num++;
            } else {
                $data=array('address' => request('address'), 'slug' => $slug, 'phone' => request('phone'), 'email' => request('email'));
                break;
            }
        }

        $office=Office::create($data);

        if ($office) {
            return redirect()->route('office.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'Los Datos de La Oficina ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('office.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $office = Office::where('slug', $slug)->firstOrFail();
        return view('admin.offices.edit', compact("office"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $office=Office::where('slug', $slug)->firstOrFail();

        $data=array('address' => request('address'), 'slug' => $slug, 'phone' => request('phone'), 'email' => request('email'));

        $office->fill($data)->save();

        if ($office) {
            return redirect()->route('office.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'Los Datos de La Oficina han sido editados exitosamente.']);
        } else {
            return redirect()->route('office.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $office = Office::where('slug', $slug)->firstOrFail();
        $office->fill($request->all())->save();

        if ($office) {
            return redirect()->route('office.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'Los Datos de La Oficina ha sido desactivados exitosamente.']);
        } else {
            return redirect()->route('office.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $office = Office::where('slug', $slug)->firstOrFail();
        $office->fill($request->all())->save();

        if ($office) {
            return redirect()->route('office.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'Los Datos de La Oficina ha sido activados exitosamente.']);
        } else {
            return redirect()->route('office.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $office=Office::where('slug', $slug)->firstOrFail();
        $office->delete();

        if ($office) {
            return redirect()->route('office.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'Los Datos de La Oficina ha sido eliminados exitosamente.']);
        } else {
            return redirect()->route('office.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
