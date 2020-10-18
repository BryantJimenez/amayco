<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homes = Home::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.home.index', compact('homes', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Home::where('title_one', request('title_one'))->where('lang', request('lang'))->count();
        $slug=Str::slug(request('title_one')." ".request('lang'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Home::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('title_one')." ".request('lang'), '-')."-".$num;
                $num++;
            } else {
                $data=array('title_one' => request('title_one'), 'title_two' => request('title_two'), 'title_three' => request('title_three'), 'slug' => $slug, 'lang' => request('lang'), 'type' => request('type'));
                break;
            }
        }

        // Mover imagen a carpeta homes y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/homes/', $image);
            $data['image']=$image;
        }

        $home=Home::create($data);

        if ($home) {
            return redirect()->route('home.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La home-page ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('home.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $home = Home::where('slug', $slug)->firstOrFail();
        return view('admin.home.edit', compact("home"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $home=Home::where('slug', $slug)->firstOrFail();

         $data=array('title_one' => request('title_one'), 'title_two' => request('title_two'), 'title_three' => request('title_three'), 'slug' => $slug, 'lang' => request('lang'), 'type' => request('type'));

        // Mover imagen a carpeta homes y extraer nombre
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time()."_".$slug;
            $file->move(public_path().'/admins/img/homes/', $image);
            $data['image'] = $image;
        }

        $home->fill($data)->save();

        if ($home) {
            return redirect()->route('home.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La home-page ha sido editado exitosamente.']);
        } else {
            return redirect()->route('home.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $home = Home::where('slug', $slug)->firstOrFail();
        $home->fill($request->all())->save();

        if ($home) {
            return redirect()->route('home.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Home-Page ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('home.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $home = Home::where('slug', $slug)->firstOrFail();
        $home->fill($request->all())->save();

        if ($home) {
            return redirect()->route('home.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Home-Page ha sido activado exitosamente.']);
        } else {
            return redirect()->route('home.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $home=Home::where('slug', $slug)->firstOrFail();
        $home->delete();

        if ($home) {
            return redirect()->route('home.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Home-Page ha sido eliminado exitosamente.']);
        } else {
            return redirect()->route('home.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
