<?php

namespace App\Http\Controllers;

use App\User;
use App\Setting;
use App\Http\Requests\ImageUpdateRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Requests\ContactStoreRequest;
use Illuminate\Http\Request;
use App\Notifications\MessageContactNotification;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageEdit() {
        $setting=Setting::where('id', 1)->firstOrFail();
        return view('admin.settings.images', compact("setting"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageUpdate(ImageUpdateRequest $request) {

        $setting=Setting::where('id', 1)->firstOrFail();
        $data=[];

        // Mover imagen a carpeta settings y extraer nombre
        if ($request->hasFile('about_banner')) {
            $file=$request->file('about_banner');
            $data['about_banner']=store_files($file, 'banner-nosotros', '/admins/img/settings/');
        }

        // Mover imagen a carpeta settings y extraer nombre
        if ($request->hasFile('gallery_banner')) {
            $file=$request->file('gallery_banner');
            $data['gallery_banner']=store_files($file, 'banner-galeria', '/admins/img/settings/');
        }

        // Mover imagen a carpeta settings y extraer nombre
        if ($request->hasFile('activity_banner')) {
            $file=$request->file('activity_banner');
            $data['activity_banner']=store_files($file, 'banner-actividad', '/admins/img/settings/');
        }

        // Mover imagen a carpeta settings y extraer nombre
        if ($request->hasFile('contact_banner')) {
            $file=$request->file('contact_banner');
            $data['contact_banner']=store_files($file, 'banner-contacto', '/admins/img/settings/');
        }

        $setting->fill($data)->save();

        if ($setting) {
            return redirect()->route('imagenes.edit')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'Los ajustes de las imagenes han sido editados exitosamente.']);
        } else {
            return redirect()->route('imagenes.edit')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactEdit() {
        $setting=Setting::where('id', 1)->firstOrFail();
        return view('admin.settings.contact', compact("setting"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactUpdate(ContactUpdateRequest $request) {

        $setting=Setting::where('id', 1)->firstOrFail();
        $setting->fill($request->all())->save();

        if ($setting) {
            return redirect()->route('contactos.edit')->with(['alert' => 'sweet', 'type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'Los ajustes de contacto han sido editados exitosamente.']);
        } else {
            return redirect()->route('contactos.edit')->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function send(ContactStoreRequest $request) {
        $setting=Setting::where('id', 1)->firstOrFail();

        $contact=new User;
        $contact->email=$setting->email;
        $contact->name=request('name');
        $contact->email_contact=request('email');
        $contact->message= request('message');
        $contact->notify(new MessageContactNotification());

        if ($contact) {
            return redirect()->back()->with(['alert' => 'lobibox', 'type' => 'success', 'title' => 'Envio exitoso', 'msg' => 'El mensaje ha sido enviado exitosamente.']);
        } else {
            return redirect()->back()->with(['alert' => 'lobibox', 'type' => 'error', 'title' => 'Envio fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.'])->withInputs();
        }
    }
}
