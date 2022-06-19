<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use App\Models\Menu;
use Illuminate\Support\Facades\Session as FacadesSession;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create()
    {
        return view('admin.menus.add', [
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuService->get()
        ]);
    }
    public function store(Request $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }
    public function index()
    {
        return view('admin.menus.list', [
            'title' => 'Danh mục sản phẩm',
            'menus' => $this->menuService->get()
        ]);
    }

    public function show($id)
    {
        return view('admin.menus.edit', [
            'title' => 'Chỉnh sửa danh mục',
            'menu' => $this->menuService->getMenuById($id),
            'menus' => $this->menuService->get()
        ]);
    }
    // // sửa danh mục
    public function update($id, Request $request)
    {
        $this->menuService->update($id, $request);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if ($result)
            return response()->json([
                'error' => false,
                'message' => 'Xóa danh mục thành công'
            ]);
        return response()->json([
            'error' => true
        ]);
    }
}
