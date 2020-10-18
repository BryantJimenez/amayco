<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = AboutUs::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.about.index', compact('abouts', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=AboutUs::where('lang', request('lang'))->count();
        $slug=Str::slug(request('lang'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=AboutUs::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('lang'), '-')."-".$num;
                $num++;
            } else {
                $data=array('description' => request('description'), 'slug' => $slug, 'lang' => request('lang'));
                break;
            }
        }

        $aboutus=AboutUs::create($data);

        if ($aboutus) {
            return redirect()->route('about.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La sección ¿Quiénes Somos? ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('about.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(aboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $about = AboutUs::where('slug', $slug)->firstOrFail();
        return view('admin.about.edit', compact("about"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $slug)
    {
        $aboutus=aboutUs::where('slug', $slug)->firstOrFail();

        $data=array('description' => request('description'), 'slug' => $slug, 'lang' => request('lang'));

        $aboutus->fill($data)->save();

        if ($aboutus) {
            return redirect()->route('about.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La sección ¿Quiénes Somos? ha sido editado exitosamente.']);
        } else {
            return redirect()->route('about.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $aboutus = AboutUs::where('slug', $slug)->firstOrFail();
        $aboutus->fill($request->all())->save();

        if ($aboutus) {
            return redirect()->route('about.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La sección ¿Quiénes Somos? ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('about.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $aboutus = AboutUs::where('slug', $slug)->firstOrFail();
        $aboutus->fill($request->all())->save();

        if ($aboutus) {
            return redirect()->route('about.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La sección ¿Quiénes Somos? ha sido activada exitosamente.']);
        } else {
            return redirect()->route('about.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $aboutus=AboutUs::where('slug', $slug)->firstOrFail();
        $aboutus->delete();

        if ($aboutus) {
            return redirect()->route('about.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La sección ¿Quiénes Somos? ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('about.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
