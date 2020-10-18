<?php

namespace App\Http\Controllers;

use App\Excursion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ExcursionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excursions = Excursion::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.excursions.index', compact('excursions', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.excursions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Excursion::where('title', request('title'))->where('lang', request('lang'))->count();
        $slug=Str::slug(request('title')." ".request('lang'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Excursion::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('title')." ".request('lang'), '-')."-".$num;
                $num++;
            } else {
                $data=array('title' => request('title'), 'slug' => $slug, 'lang' => request('lang'), 'description' => request('description'));
                break;
            }
        }

        // Mover imagen a carpeta excursions y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/excursions/', $image);
            $data['image']=$image;
        }

        $excursion=Excursion::create($data);

        if ($excursion) {
            return redirect()->route('excursion.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La Excursión ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('excursion.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Excursions  $excursions
     * @return \Illuminate\Http\Response
     */
    public function show(Excursions $excursions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Excursions  $excursions
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $excursion = Excursion::where('slug', $slug)->firstOrFail();
        return view('admin.excursions.edit', compact("excursion"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Excursions  $excursions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $excursion=Excursion::where('slug', $slug)->firstOrFail();

        $data=array('title' => request('title'), 'slug' => $slug, 'lang' => request('lang'), 'description' => request('description'));

        // Mover imagen a carpeta excursions y extraer nombre
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time()."_".$slug;
            $file->move(public_path().'/admins/img/excursions/', $image);
            $data['image'] = $image;
        }

    
        $excursion->fill($data)->save();

        if ($excursion) {
            return redirect()->route('excursion.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Excursión ha sido editado exitosamente.']);
        } else {
            return redirect()->route('excursion.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Excursions  $excursions
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $excursion = Excursion::where('slug', $slug)->firstOrFail();
        $excursion->fill($request->all())->save();

        if ($excursion) {
            return redirect()->route('excursion.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Excurción ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('excursion.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $excursion = Excursion::where('slug', $slug)->firstOrFail();
        $excursion->fill($request->all())->save();

        if ($excursion) {
            return redirect()->route('excursion.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Excurción ha sido activada exitosamente.']);
        } else {
            return redirect()->route('excursion.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $excursion=Excursion::where('slug', $slug)->firstOrFail();
        $excursion->delete();

        if ($excursion) {
            return redirect()->route('excursion.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Excurción ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('excursion.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
