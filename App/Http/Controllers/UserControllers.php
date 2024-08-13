<?php

namespace App\Http\Controllers;

class UserControllers extends Controllers
{

    public function index()
    {
        echo "homeControllers index";
    }

    public function create()
    {
        echo "homeControllers create";
    }

    public function store()
    {
        echo "homeControllers store";
    }

    public function edit($id)
    {
        echo "homeControllers edit";
    }

    public function update($id)
    {
        echo "homeControllers update";
    }

    public function delete($id)
    {
        echo "homeControllers delete";
    }
}