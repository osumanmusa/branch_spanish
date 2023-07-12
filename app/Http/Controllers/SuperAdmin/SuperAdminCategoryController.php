<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use DB;



class SuperAdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::select('*')->paginate(20);
        
        return Inertia::render('SuperAdmin/Category/index',[
            'category'=> $category

        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
                
        $cat=Category::select('*')
        ->whereIn('category_name',[$request->name])
        ->get();


    if($cat->isNotEmpty()){
        $errormessage = 'Sorry, Category exist';
        return redirect()->back()->with('errormessage',$errormessage);
        

    }
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $category_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('img/category/'), $category_image);


       $category = Category::create([
           'category_name' => $request->name,
           'category_image' => $category_image,
       ]);
       if($category){
        $successmessage = 'Category Created Successsfully';
        return redirect()->back()->with('successmessage',$successmessage);
       }
       else{

           return back();
       }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        
        $delcard=Category::findOrFail($id);
        
        $delcard->delete();
        
        $successmessage = 'Deleted Successsfully';
        return redirect()->route('superadmin.category.index')->with('successmessage',$successmessage);
    }
}
