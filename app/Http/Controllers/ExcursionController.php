<?php

namespace App\Http\Controllers;

use App\Language;
use App\Excursion;
use App\Http\Requests\ExcursionStoreRequest;
use App\Http\Requests\ExcursionUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExcursionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excursions=Excursion::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.excursions.index', compact('excursions', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages=Language::all();
        return view('admin.excursions.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExcursionStoreRequest $request)
    {
        $count=Excursion::where('title', request('title'))->count();
        $slug=Str::slug(request('title'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Excursion::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('title'), '-')."-".$num;
                $num++;
            } else {
                $language=Language::where('slug', request('language_id'))->firstOrFail();
                $data=array('title' => request('title'), 'slug' => $slug, 'description' => request('description'), 'language_id' => $language->id);
                break;
            }
        }

        // Mover imagen a carpeta excursions y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $data['image']=store_files($file, $slug, '/admins/img/excursions/');
        }

        $excursion=Excursion::create($data);

        if ($excursion) {
            return redirect()->route('excursiones.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La excursión ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('excursiones.create')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.'])->withInputs();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Excursions  $excursions
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $excursion=Excursion::where('slug', $slug)->firstOrFail();
        $languages=Language::all();
        return view('admin.excursions.edit', compact("excursion", "languages"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Excursions  $excursions
     * @return \Illuminate\Http\Response
     */
    public function update(ExcursionUpdateRequest $request, $slug)
    {
        $excursion=Excursion::where('slug', $slug)->firstOrFail();
        $language=Language::where('slug', request('language_id'))->firstOrFail();
        $data=array('title' => request('title'), 'description' => request('description'), 'language_id' => $language->id);

        // Mover imagen a carpeta excursions y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $data['image']=store_files($file, $slug, '/admins/img/excursions/');
        }
    
        $excursion->fill($data)->save();

        if ($excursion) {
            return redirect()->route('excursiones.edit', ['slug' => $slug])->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La excursión ha sido editado exitosamente.']);
        } else {
            return redirect()->route('excursiones.edit', ['slug' => $slug])->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Excursions  $excursions
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {
        $excursion=Excursion::where('slug', $slug)->firstOrFail();
        $excursion->fill(['state' => '0'])->save();

        if ($excursion) {
            return redirect()->route('excursiones.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La excursión ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('excursiones.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {
        $excursion=Excursion::where('slug', $slug)->firstOrFail();
        $excursion->fill(['state' => '1'])->save();

        if ($excursion) {
            return redirect()->route('excursiones.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La excursión ha sido activada exitosamente.']);
        } else {
            return redirect()->route('excursiones.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
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
            return redirect()->route('excursiones.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La excursión ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('excursiones.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function search(Request $request) {
        $count=Excursion::where('slug', request('slug'))->count();
        if ($count>0) {
            $excursion=Excursion::where('slug', request('slug'))->first();
            if (!is_null($excursion)) {
                return response()->json(['status' => true, 'title' => $excursion->title, 'description' => $excursion->description]);
            }
        }

        return response()->json(['status' => false]);
    }
}
