<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeControllers extends Controllers
{
    public function index()
    {
        echo "homeControllers index <br><br>";
        $user = new User();

        // ORM TEST

//        $user->insert([
//            "name" => "alireza",
//            "email" => "alireza@gmail.com"
//        ]);
//----------------------------------------------------------
//        var_dump($user->find(12)->name);
//----------------------------------------------------------
//        $user->find(13)->update([
//            "name" => "ahmadreza",
//            "email" => "ahmadreza@gmail.com"
//        ]);
//----------------------------------------------------------
//        $users = $user->get();
//        foreach ($users as $user){
//            echo $user->name;
//            echo "<br>";
//        }
//----------------------------------------------------------
//        $user->delete(13);
//----------------------------------------------------------
//        $users = $user->where('id','>',11)->get();
//        foreach ($users as $user) {
//            echo $user->name;
//            echo "<br>";
//        }
//----------------------------------------------------------
//        $users = $user->orderBy('id',"DESC")->get();
//        foreach ($users as $user) {
//            echo $user->name;
//            echo "<br>";
//        }
//----------------------------------------------------------
//        $users = $user->limit(0,2)->get();
//        foreach ($users as $user) {
//            echo $user->name;
//            echo "<br>";
//        }


    }
}