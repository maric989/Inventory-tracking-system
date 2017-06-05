<?php

namespace App\Http\Controllers;

use App\Location;
use App\Notes;
use App\Product;
use Illuminate\Http\Request;
use App\Attribute;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $location = Location::all();

        return view('product.index',compact('products','prod','location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::all();
        $product = Product::all();
        $users = User::all();
        return view('product.create',compact('location','product','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request);*/

        $this->validate(request(), [

            'name' => 'required|min:2',

            'type' => 'required|min:2',

            'serial_no'=>'required',
            
            'unique_id' => 'required',
            
            'date_of_purchase' => 'required,',

            'warrancy' => 'required,'
        ]);

        $product = new Product;

        $product->name = $request->name;
        $product->type = $request->type;
        $product->serial_no = $request->serial_no;
        $product->unique_id = $request->unique_id;
        $product->date_of_purchase = $request->date_of_purc;
        $product->warranty = $request->warranty;
        $product->location_id = $request->location_id;
        $product->user_id = $request->user_id;

        $product->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $attributes = Attribute::all()->where('item_id',$id);
        $notes = Notes::all()->where('item_id',$id);


        return view('product.show',compact('product','attributes','notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit',array('product' => $product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /*dd($request);*/
        $this->validate(request(), [

            'name' => 'required|min:2',
            'type' => 'required|min:2',
            'serial_no' => 'required|min:2',
            'date_of_purchase' => 'required',
            'warranty => required'
        ]);
        $products = Product::find($id);

        $products->name= $request->input('name');
        $products->type= $request->input('type');
        $products->serial_no= $request->input('serial_no');
        $products->unique_id= $request->input('unique_id');
        $products->date_of_purchase= $request->input('date_of_purchase');
        $products->warranty= $request->input('warranty');
        $products->save();

        // redirect
        return redirect('/product');
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('product');
    }


    public function addAttribute(Request $request, Attribute $attribute)

    {

        $attribute->item_id = $request->product_id;
        $attribute->name = $request->name;
        $attribute->value = $request->value;

        $attribute->save();

        return back();
    }

    public function addNotes (Request $request,Notes $notes)
    {

        $notes->body = $request->body;

        $notes->item_id = $request->product_id;

        $notes->save();

        return back();


    }


}
