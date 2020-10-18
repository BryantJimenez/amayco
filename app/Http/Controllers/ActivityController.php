<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.activities.index', compact('activities', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Activity::where('name', request('name'))->where('lang', request('lang'))->count();
        $slug=Str::slug(request('name')." ".request('lang'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Activity::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('name')." ".request('lang'), '-')."-".$num;
                $num++;
            } else {
                $data=array('name' => request('name'), 'slug' => $slug, 'lang' => request('lang'));
                break;
            }
        }

        $activity=Activity::create($data);

        if ($activity) {
            return redirect()->route('activity.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La Actividad ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('activity.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();
        return view('admin.activities.edit', compact("activity"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $activity=Activity::where('slug', $slug)->firstOrFail();

        $data=array('name' => request('name'), 'slug' => $slug, 'lang' => request('lang'));

        $activity->fill($data)->save();

        if ($activity) {
            return redirect()->route('activity.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La actividad ha sido editado exitosamente.']);
        } else {
            return redirect()->route('activity.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
     public function deactivate(Request $request, $slug) {

        $activity = Activity::where('slug', $slug)->firstOrFail();
        $activity->fill($request->all())->save();

        if ($activity) {
            return redirect()->route('activity.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Actividad ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('activity.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $activity = Activity::where('slug', $slug)->firstOrFail();
        $activity->fill($request->all())->save();

        if ($activity) {
            return redirect()->route('activity.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Actividad ha sido activada exitosamente.']);
        } else {
            return redirect()->route('activity.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
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
            return redirect()->route('activity.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Actividad ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('activity.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
