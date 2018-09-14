<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    public function index()
    {
      $products=Product::paginate(10);
return view('admin.products.index')->with(compact('products'));



    }
    public function create()
    {
return view('admin.products.create');



    }
    public function store(Request $request)
    {
      $messages=[
            'name.required'=>'Es necesario ingresar un nombre para el producto',
            'name.min'=>'El nombre del producto debe tener almenos 3 caracteres',
            'description.required'=>'la Descripcion Es Obligatoria',
            'description.max'=>'La descripcion solo admite 200 caracteres',
            'price.required'=>'Campo precio Obligatorio',
            'price.numeric'=>'Ingrese un precio valido',
            'price.min'=>'no se admiten valores negativos',

            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0',
    ] ;

      $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0',
] ;
$this->validate($request,$rules,$messages);
      $product=new Product();
      $product->name= $request->input('name');
      $product->description= $request->input('description');
      $product->price= $request->input('price');
      $product->long_description= $request->input('long_description');
      $product->save();

      return redirect('/admin/products');



    }
    public function edit($id)
    {





      $product=Product::find($id);
return view('admin.products.edit')->with(compact('product'));



    }
    public function update(Request $request,$id)
    {
      $messages=[
            'name.required'=>'Es necesario ingresar un nombre para el producto',
            'name.min'=>'El nombre del producto debe tener almenos 3 caracteres',
            'description.required'=>'la Descripcion Es Obligatoria',
            'description.max'=>'La descripcion solo admite 200 caracteres',
            'price.required'=>'Campo precio Obligatorio',
            'price.numeric'=>'Ingrese un precio valido',
            'price.min'=>'no se admiten valores negativos',

            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0',
    ] ;

      $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0',
  ] ;
  $this->validate($request,$rules,$messages);

      $product=Product::find($id);
      $product->name= $request->input('name');
      $product->description= $request->input('description');
      $product->price= $request->input('price');
      $product->long_description= $request->input('long_description');
      $product->save();

      return redirect('/admin/products');



    }


    public function destroy($id)
    {

      $product=Product::find($id);

      $product->delete();

      return back();



    }

}
