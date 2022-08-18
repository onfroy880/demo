<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MainControllers extends Controller
{
    //route d'index
    public function index()
    {
        $id = 0;
        $products = Products::all()->sortByDesc('created_at');
        return view('welcome', compact('products', 'id'));
    }

    //enregistrer un produit
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        
        Products::create([
            'NamePro' => $request->name,
            'Price' => $request->price,
            'Quantity' => $request->quantity,
            'Description' => $request->description,
        ]);

        return Redirect()->back();

    }

    //enregistrer un produit en mis a jour
    public function check(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        
        Products::where('id', $request->id)->update([
            'NamePro' => $request->name,
            'Price' => $request->price,
            'Quantity' => $request->quantity,
            'Description' => $request->description,
        ]);

        return Redirect()->route('index');

    } 

    //delete product
    public function delete(Request $request)
    {
        Products::where('id', $request->id)->delete();
        return Redirect()->back();
    }

    //update product
    public function update(Request $request)
    {
        $products = Products::all()->where('id', $request->id);
        return view('update', compact('products'));
    }
}
