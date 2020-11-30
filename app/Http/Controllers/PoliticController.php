<?php

namespace App\Http\Controllers;

use App\Politic;
use App\Http\Requests\PoliticUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PoliticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $politics=Politic::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.politics.index', compact('politics', 'num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $politic
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $politic=Politic::where('slug', $slug)->firstOrFail();
        return view('admin.politics.edit', compact("politic"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $politic
     * @return \Illuminate\Http\Response
     */
    public function update(PoliticUpdateRequest $request, $slug)
    {
        $politic=Politic::where('slug', $slug)->firstOrFail();
        $data=array('booking' => request('booking'), 'cancellations' => request('cancellations'));
        $politic->fill($data)->save();

        if ($politic) {
            return redirect()->route('politicas.edit', ['slug' => $slug])->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'Las politicas han sido editadas exitosamente.']);
        } else {
            return redirect()->route('politicas.edit', ['slug' => $slug])->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
