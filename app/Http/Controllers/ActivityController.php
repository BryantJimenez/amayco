<?php

namespace App\Http\Controllers;

use App\Language;
use App\Activity;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities=Activity::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.activities.index', compact('activities', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages=Language::all();
        return view('admin.activities.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityStoreRequest $request)
    {
        $count=Activity::where('name', request('name'))->count();
        $slug=Str::slug(request('name'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Activity::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('name'), '-')."-".$num;
                $num++;
            } else {
                $language=Language::where('slug', request('language_id'))->firstOrFail();
                $data=array('name' => request('name'), 'slug' => $slug, 'language_id' => $language->id);
                break;
            }
        }

        $activity=Activity::create($data);

        if ($activity) {
            return redirect()->route('actividades.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La actividad ha sido registrada exitosamente.']);
        } else {
            return redirect()->route('actividades.create')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.'])->withInputs();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $activity=Activity::where('slug', $slug)->firstOrFail();
        $languages=Language::all();
        return view('admin.activities.edit', compact("activity", "languages"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, $slug)
    {
        $activity=Activity::where('slug', $slug)->firstOrFail();
        $language=Language::where('slug', request('language_id'))->firstOrFail();
        $data=array('name' => request('name'), 'language_id' => $language->id);
        $activity->fill($data)->save();

        if ($activity) {
            return redirect()->route('actividades.edit', ['slug' => $slug])->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La actividad ha sido editada exitosamente.']);
        } else {
            return redirect()->route('actividades.edit', ['slug' => $slug])->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
     public function deactivate(Request $request, $slug) {

        $activity=Activity::where('slug', $slug)->firstOrFail();
        $activity->fill(['state' => "0"])->save();

        if ($activity) {
            return redirect()->route('actividades.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La actividad ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('actividades.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $activity=Activity::where('slug', $slug)->firstOrFail();
        $activity->fill(['state' => "1"])->save();

        if ($activity) {
            return redirect()->route('actividades.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La actividad ha sido activada exitosamente.']);
        } else {
            return redirect()->route('actividades.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $activity=Activity::where('slug', $slug)->firstOrFail();
        $activity->delete();

        if ($activity) {
            return redirect()->route('actividades.index')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La actividad ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('actividades.index')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
