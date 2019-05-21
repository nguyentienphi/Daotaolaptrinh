<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function index(){

        $data['categories'] = $this->categoryService->getAll();

        $data['activeMenu'] = ['menu' => 'categories', 'item' => 'list_category'];

        return view('admin.categories.index', $data);
    }

    /**
     * Function show view create user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['activeMenu'] = ['menu' => 'categories', 'item' => 'add_category'];

        return view('admin.categories.add', $data);
    }

    /**
     * @param Request $request
     */
    public function store(CategoryRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
        ];

        if ($this->categoryService->createCategory($data)) {
            return redirect()->route('admin.categories.index');
        }
    }

    /**
     * Function edit user
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category){

        $data['category'] = $category;

        return view('admin.categories.edit', $data);
    }

    /**
     * Function update user
     *
     * @param EditUserRequest $request
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = [
            'name' => $request->name,
        ];

        if ($this->categoryService->updateCategory($data, $category)) {
            return redirect()->route('admin.categories.index');
        }
    }

    /**
     * Function delete user and relation
     *
     * @param User $user
     * @return array
     *
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $category->delete();

            DB::commit();

            return redirect()->route('admin.categories.index');

        } catch (ModelNotFoundException $e) {
            DB::rollback();
        }
    }
}
