<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'sara',
            'email' => 'sara@gmail',
            'password' => '13334'
        ];
//        $user = User::create($data);
        $fetch = User::all();
        return $fetch;

        //  $user = new User();
//        $user->name = 'Sara';
//        $user->email = 'Sara@gmail';
//        $user->password = '1233';
//        $user->save();
        //selecting
//        $user = User::all();
//        return $user;
//        User::where('id',5)->delete();
        //        DB::insert('insert into users (name,email,password) values (?,?,?)',[
//            'Esraa','Esraa@gmail.com','12345'
//        ]);
//        DB::update('update users set name = ? where id = 1',['Maged']);
//        $users = DB::select('select * from users');
//        return $users;
//        DB::delete('delete from users where id = 1');
        //another way for Database queries
//        DB::table('users')->insert(['name'=>'Esraa','email'=>'esraa@yahoo','password'=>'pass']);
//        $query = DB::table('users')->select('name')->get();
//        return $query;
//        DB::table('users')->where('id','>',1)->delete();
        return "Hello World";
    }

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile("image")) {
            user::uploadAvatar($request->image);
            return  redirect()->back()->with('message','Uploaded Done');
        }
        return redirect()->back()->with('error',"Can't Upload");
    }
}
