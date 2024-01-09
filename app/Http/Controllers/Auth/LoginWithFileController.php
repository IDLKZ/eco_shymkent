<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginWithFileController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
           'file' => 'required|file'
        ]);
        if ($request->file('file')->getClientOriginalExtension() === 'pfx') {
            $fileData = file_get_contents($request['file']);
            $decryptedData = json_decode(Crypt::decrypt($fileData), 1);
            if ($this->isValidUser($decryptedData)) {
                if (Auth::user()->role_id == env('APP_ADMIN_ROLE', 1)) {
                    return redirect()->intended(RouteServiceProvider::AdminHome);
                } else if (Auth::user()->role_id == env('APP_MODER_ROLE', 2)) {
                    return redirect()->intended(RouteServiceProvider::ModerHome);
                }
                else if (Auth::user()->role_id == 3) {
                    return redirect()->intended(RouteServiceProvider::MayorHome);
                }
                else if (Auth::user()->role_id == 4) {
                    return redirect()->intended(RouteServiceProvider::AgronomHome);
                }
                else if (Auth::user()->role_id == 5) {
                    return redirect()->intended(RouteServiceProvider::ConsumerHome);
                }
                else if (Auth::user()->role_id == 6) {
                    return redirect()->intended(RouteServiceProvider::ChefHome);
                }
                else if (Auth::user()->role_id == 7) {
                    return redirect()->intended(RouteServiceProvider::AgronomistHome);
                }
                else if (Auth::user()->role_id == 8) {
                    return redirect()->intended(RouteServiceProvider::BrigadiertHome);
                }
                else {
                    return abort(404);
                }
            } else {
                toastr('Неправильные данные!', 'error');
                return redirect()->back();
            }
        } else {
            toastr('Не валидный файл!', 'error');
            return redirect()->back();
        }
    }

    private function isValidUser($fileData): bool
    {
        return Auth::attempt(['email' => $fileData['email'], 'password' => $fileData['password']]);
    }
}
