<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('dashboard.category.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $slug = Str::slug($request->name, '-');

        if (Category::where('slug', $slug)->count() !== 0) {
            date_default_timezone_set('Asia/Dhaka');
            $slug = $slug . '-' . date('dh-is');
        }

        $validated = $request->validated();

        Category::create( $validated + ['slug'  => $slug] );

        return redirect()->route('categories.index')->with('message', 'Category created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $slug = Str::slug($request->name, '-');

        if (Category::where('slug', $slug)->count() !== 0) {
            date_default_timezone_set('Asia/Dhaka');
            $slug = $slug . '-' . date('dh-is');
        }



        $validated = $request->validated();
        $category->update($validated + [ 'slug' => $slug ]);
        return back()->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('message', 'Category deleted successfully');
    }
}
