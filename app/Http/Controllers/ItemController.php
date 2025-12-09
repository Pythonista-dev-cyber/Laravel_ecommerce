<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Item::paginate(5);
      
        return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('items.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $inputs = $request->all();
        $photo = $request->file('photo');
        if($photo){
            $photo_name="img_".rand(1000,9999).".".$photo->extension();
            $photo->move(public_path('images'),$photo_name);

        }

        $inputs['photo'] = $photo_name;
        Item::create($inputs);
        return redirect()->route('items.index')->with('save','Successfully Saved...');


    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item=Item::find($id);
        $categories=Category::all();
        return view('items.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $category="";
        $photo_name="";
        $new_photo=$request->file('new_photo');

        if($new_photo){
            $new_photo_name="img_".rand(1000,9999).".".$new_photo->extension();
            $new_photo->move(public_path('images'),$new_photo_name);
            $photo_name=$new_photo_name;
        }
        else{
            $photo_name=$request->curr_photo;
        }

        $category_name=$request->new_category;

        if($category_name){
             $category=$category_name;
        }
        else{
            $category=$request->curr_category;
        }

        

        $item=Item::find($id);
        $item->update([
            'category'=>$category,
            'name'=>$request->name,
            'price'=>$request->price,
            'photo'=>$photo_name,
        ]);


        return redirect()->route('items.index')->with('update','Successfully updated...');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        $item->delete();

        return redirect()->route('items.index')->with('delete','Successfully deleted...');
        
    }

    public function search(Request $request){

        $str=$request->search_term;

        $items=Item::where('name','LIKE','%'.$str.'%')
                    ->orWhere('category','LIKE','%'.$str.'%')
                    ->paginate(5);

        $items->appends(['search_term'=>$str]);

        return view('items.index',compact('items'));


    }


}
