<?php

namespace App\Http\Controllers;

use App\Language;
use App\Gallery;
use App\Category;
use App\Http\Requests\GalleryStoreRequest;
use App\Http\Requests\GalleryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=Gallery::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.galleries.index', compact('galleries', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages=Language::all();
        $categories=Category::all();
        return view('admin.galleries.create', compact('languages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryStoreRequest $request)
    {
        $count=Gallery::where('title', request('title'))->count();
        $slug=Str::slug(request('title'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Gallery::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('title'), '-')."-".$num;
                $num++;
            } else {
                $language=Language::where('slug', request('language_id'))->firstOrFail();
                $category=Category::where('slug', request('category_id'))->firstOrFail();
                $data=array('title' => request('title'), 'slug' => $slug, 'description' => request('description'), 'category_id' => $category->id, 'language_id' => $language->id);
                break;
            }
        }

        // Mover imagen a carpeta galleries y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $data['image']=store_files($file, $slug, '/admins/img/galleries/');
        }

        $gallery=Gallery::create($data);

        if ($gallery) {
            return redirect()->route('galeria.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La galería ha sido registrada exitosamente.']);
        } else {
            return redirect()->route('galeria.create')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.'])->withInputs();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $gallery=Gallery::where('slug', $slug)->firstOrFail();
        $languages=Language::all();
        $categories=Category::all();
        return view('admin.galleries.edit', compact("gallery", "languages", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryUpdateRequest $request, $slug)
    {
        $gallery=Gallery::where('slug', $slug)->firstOrFail();
        $language=Language::where('slug', request('language_id'))->firstOrFail();
        $category=Category::where('slug', request('category_id'))->firstOrFail();
        $data=array('title' => request('title'), 'description' => request('description'), 'category_id' => $category->id, 'language_id' => $language->id);

        // Mover imagen a carpeta galleries y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $data['image']=store_files($file, $slug, '/admins/img/galleries/');
        }

        $gallery->fill($data)->save();

        if ($gallery) {
            return redirect()->route('galeria.edit', ['slug' => $slug])->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La galería ha sido editado exitosamente.']);
        } else {
            return redirect()->route('galeria.edit', ['slug' => $slug])->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $gallery = Gallery::where('slug', $slug)->firstOrFail();
        $gallery->fill(['state' => "0"])->save();

        if ($gallery) {
            return redirect()->route('galeria.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La categoría ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('galeria.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $gallery = Gallery::where('slug', $slug)->firstOrFail();
        $gallery->fill(['state' => "1"])->save();

        if ($gallery) {
            return redirect()->route('galeria.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La categoría ha sido activada exitosamente.']);
        } else {
            return redirect()->route('galeria.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $gallery=Gallery::where('slug', $slug)->firstOrFail();
        $gallery->delete();

        if ($gallery) {
            return redirect()->route('galeria.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La galería ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('galeria.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
