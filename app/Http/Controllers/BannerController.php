<?php

namespace App\Http\Controllers;

use App\Language;
use App\Banner;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.banners.index', compact('banners', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages=Language::all();
        return view('admin.banners.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerStoreRequest $request)
    {
        $count=Banner::where('title', request('title'))->count();
        $slug=Str::slug(request('title'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Banner::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('title'), '-')."-".$num;
                $num++;
            } else {
                $language=Language::where('slug', request('language_id'))->firstOrFail();
                $data=array('title' => request('title'), 'slug' => $slug, 'type' => request('type'), 'language_id' => $language->id);
                break;
            }
        }

        // Mover imagen a carpeta banners y extraer nombre
        if ($request->hasFile('archive')) {
            $file=$request->file('archive');
            $data['archive']=store_files($file, $slug, '/admins/img/banners/');
        }

        $banner=Banner::create($data);

        if ($banner) {
            return redirect()->route('banners.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El banner ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('banners.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $banner=Banner::where('slug', $slug)->firstOrFail();
        $languages=Language::all();
        return view('admin.banners.edit', compact("banner", "languages"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, $slug)
    {
        $banner=Banner::where('slug', $slug)->firstOrFail();
        $language=Language::where('slug', request('language_id'))->firstOrFail();
        $data=array('title' => request('title'), 'type' => request('type'), 'language_id' => $language->id);

        // Mover imagen a carpeta homes y extraer nombre
        if ($request->hasFile('archive')) {
            $file=$request->file('archive');
            $data['archive']=store_files($file, $slug, '/admins/img/banners/');
        }

        $banner->fill($data)->save();

        if ($banner) {
            return redirect()->route('banners.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El banner ha sido editado exitosamente.']);
        } else {
            return redirect()->route('banners.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {
        $banner=Banner::where('slug', $slug)->firstOrFail();
        $banner->fill(['state' => '0'])->save();

        if ($banner) {
            return redirect()->route('banners.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El banner ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('banners.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {
        $banner=Banner::where('slug', $slug)->firstOrFail();
        $banner->fill(['state' => '1'])->save();

        if ($banner) {
            return redirect()->route('banners.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El banner ha sido activado exitosamente.']);
        } else {
            return redirect()->route('banners.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $banner=Banner::where('slug', $slug)->firstOrFail();
        $banner->delete();

        if ($banner) {
            return redirect()->route('banners.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'El banner ha sido eliminado exitosamente.']);
        } else {
            return redirect()->route('banners.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
