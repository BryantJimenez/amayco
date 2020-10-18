<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::where('state', '=', '1')->orderBy('id', 'DESC')->get();
        $num = 1;
        return view('admin.reservations.index', compact('reservations', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Reservation::where('reservation', request('reservation'))->where('lang', request('lang'))->count();
        $slug=Str::slug(request('reservation')." ".request('lang'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Reservation::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=Str::slug(request('reservation')." ".request('lang'), '-')."-".$num;
                $num++;
            } else {
                $data=array('type' => request('type'), 'slug' => $slug, 'reservation' => request('reservation'), 'lang' => request('lang'));
                break;
            }
        }

        $reservation=Reservation::create($data);

        if ($reservation) {
            return redirect()->route('reservation.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La Reservación ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('reservation.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $reservation = Reservation::where('slug', $slug)->firstOrFail();
        return view('admin.reservations.edit', compact("reservation"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $reservation=Reservation::where('slug', $slug)->firstOrFail();

        $data=array('type' => request('type'), 'slug' => $slug, 'reservation' => request('reservation'), 'lang' => request('lang'));

        $reservation->fill($data)->save();

        if ($reservation) {
            return redirect()->route('reservation.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Reservación han sido editada exitosamente.']);
        } else {
            return redirect()->route('reservation.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $slug) {

        $reservation = Reservation::where('slug', $slug)->firstOrFail();
        $reservation->fill($request->all())->save();

        if ($reservation) {
            return redirect()->route('reservation.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Reservaación ha sido desactivada exitosamente.']);
        } else {
            return redirect()->route('reservation.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate(Request $request, $slug) {

        $reservation = Reservation::where('slug', $slug)->firstOrFail();
        $reservation->fill($request->all())->save();

        if ($reservation) {
            return redirect()->route('reservation.index')->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Reservaación ha sido activada exitosamente.']);
        } else {
            return redirect()->route('reservation.index')->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug) {
        $reservation=Reservation::where('slug', $slug)->firstOrFail();
        $reservation->delete();

        if ($reservation) {
            return redirect()->route('reservation.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Reservaación ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('reservation.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
