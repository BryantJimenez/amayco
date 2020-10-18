<?php

namespace App\Http\Controllers;

use App\Galery;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries = Galery::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.galeries.index', compact('galeries', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.galeries.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Galery::where('title', request('title'))->where('lang', request('lang'))->count();
        $slug=Str::slug(request('title')." ".request('lang'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Galery::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('title')." ".request('lang'), '-')."-".$num;
                $num++;
            } else {
                $data=array('title' => request('title'), 'category_id' => request('category_id'), 'description' => request('description'), 'slug' => $slug, 'lang' => request('lang'));
                break;
            }
        }

        // Mover imagen a carpeta galerys y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/galeries/', $image);
            $data['image']=$image;
        }

        $galery=Galery::create($data);

        if ($galery) {
            return redirect()->route('galery.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La Galería ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('galery.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $galery = Galery::where('slug', $slug)->firstOrFail();
        $category = Category::all();
        return view('admin.galeries.edit', compact("galery", "category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $galery=Galery::where('slug', $slug)->firstOrFail();

        $category=Category::where('id', request('category_id'))->firstOrFail();

         $data=array('title' => request('title'), 'category_id' => $category->id, 'description' => request('description'), 'slug' => $slug, 'lang' => request('lang'));

        // Mover imagen a carpeta galerys y extraer nombre
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time()."_".$slug;
            $file->move(public_path().'/admins/img/galeries/', $image);
            $data['image'] = $image;
        }

        $galery->fill($data)->save();

        if ($galery) {
            return redirect()->route('galery.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Galería ha sido editado exitosamente.']);
        } else {
            return redirect()->route('galery.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $galery = Galery::where('slug', $slug)->firstOrFail();
        $galery->fill($request->all())->save();

        if ($galery) {
            return redirect()->route('galery.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Categoría ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('galery.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $galery = Galery::where('slug', $slug)->firstOrFail();
        $galery->fill($request->all())->save();

        if ($galery) {
            return redirect()->route('galery.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Categoría ha sido activada exitosamente.']);
        } else {
            return redirect()->route('galery.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $galery=Galery::where('slug', $slug)->firstOrFail();
        $galery->delete();

        if ($galery) {
            return redirect()->route('galery.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Galería ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('galery.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
