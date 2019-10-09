<?php

namespace App\Http\Controllers;
use App\Http\Requests\registerRequest;
use Illuminate\Http\Request;
use Session;
use Validator;
use App\User;


class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function checkRegister(registerRequest $request)

    {

//        dd($request->all());
//        echo $request['name'];
//        echo $request['email'];
//        echo $request['password'];
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('register')->with('message','đăng ký thành công');
//        $validator = Validator::make($request->all(), $rules, $message);
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//        else{
//            User::create([
//                'name' => $request['name'],
//                'email' => $request['email'],
//                'password' => bcrypt($request['password']),
//            ]);
//            User::create($request->all());
//            return redirect('login')->with('message','đăng ký thành công');
//
//        }
    }
}
