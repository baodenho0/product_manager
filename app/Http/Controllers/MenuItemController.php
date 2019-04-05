<?php

namespace App\Http\Controllers;

use App\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{
    public function index($id)
    {
        if (!Auth::user()->hasPermission('read-menus'))
            return response()->json(['status' => 'error', 'message' => 'Không được phép.']);
        $menuItems = MenuItem::where(['menu_id' => $id, 'parent_id' => 0])->orderBy('order', 'asc')->get();
        return view('pages.menus.builder', compact('menuItems'));
    }

    public function update(Request $request, $menuId)
    {
        $menuItems = isset($request->data) ? $request->data : 0;
        $this->prepare($menuItems);
        return $menuItems;
    }

    private function prepare($menuItems, $parent_id = 0, $order = 0)
    {
        foreach ($menuItems as $item) {
            $order++;
            $menu = MenuItem::find($item['id']);
            $menu->parent_id = $parent_id;
            $menu->order = $order;
            $menu->save();
            if (array_key_exists('children', $item)) {
                $this->prepare($item['children'], $item['id'], $order);
            }
        }
    }

    public function updateItem(Request $request, $itemId)
    {
        try {
            if (!Auth::user()->hasPermission('update-menus'))
                return response()->json(['status' => 'error', 'message' => 'Không được phép.']);
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'image' => 'required'
            ], ['title.required' => 'Vui lòng nhập tên menu item.']);
            if (!$validator->fails()) {
                if ($request->hasFile('image')) {

                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                }
                $menuItem = MenuItem::find($itemId);
                $menuItem->title = $request->title;
                $menuItem->url = $request->url;
                $menuItem->target = $request->target;
                $menuItem->icon_class = $request->icon_class;
                if ($request->hasFile('image')) {
                    $menuItem->image_path = 'uploads/' . $imageName;
                }
                $menuItem->route = $request->route;
                $menuItem->parameters = $request->parameters;

                if ($menuItem->save()) {
                    if ($request->hasFile('image')) {
                        $request->image->move(public_path('uploads'), $imageName);
                    }
                    return ['status' => 'success', 'message' => 'Cập nhật menu item thành công.'];
                }
            }
            return ['status' => 'error', 'message' => $validator->errors()->first()];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function storeItem(Request $request, $menuId)
    {
        if (!Auth::user()->hasPermission('create-menus'))
            return response()->json(['status' => 'error', 'message' => 'Không được phép.']);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Vui lòng nhập tên menu item.'
        ]);
        if (!$validator->fails()) {
            if (!empty($request->image)) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            }
            $menuItem = new MenuItem();
            $menuItem->menu_id = $menuId;
            $menuItem->title = $request->title;
            $menuItem->url = $request->url;
            $menuItem->target = $request->target;
            $menuItem->parent_id = 0;
            $menuItem->icon_class = $request->icon_class;
            if (!empty($request->image)) {
                $menuItem->image_path = 'uploads/' . $imageName;
            }
            $menuItem->route = $request->route;
            $menuItem->parameters = $request->parameters;

            if ($menuItem->save()) {
                if (!empty($request->image)) {
                    $request->image->move(public_path('uploads'), $imageName);
                }
                return redirect()->route('menu-builder.index', ['menuId' => 1])->with('success', 'Thêm menu thành công');
            }
        }
    }

    public function showItem($itemId)
    {
        $item = MenuItem::findOrFail($itemId);
        return response()->json($item);
    }

    public function destroyItem($itemId)
    {
        if (!Auth::user()->hasPermission('delete-menus'))
            return response()->json(['status' => 'error', 'message' => 'Không được phép.']);
        $item = MenuItem::findOrFail($itemId);
        if ($item->delete())
            return response()->json(['status' => 'success', 'message' => 'Xóa ' . $item->title . ' thành công.']);
        return ['status' => 'error', 'message' => 'Xóa ' . $item->title . ' không thành công.'];
    }

    public function updateItemAction($id)
    {
        $menuItems = MenuItem::findOrFail($id);
        return view('pages.menus.edit', compact('menuItems'));
    }

    public function submitUpdateItemAction(Request $request, $id)
    {
        try {
            if (!Auth::user()->hasPermission('update-menus'))
                return response()->json(['status' => 'error', 'message' => 'Không được phép.']);
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], ['title.required' => 'Vui lòng nhập tên menu item.']);
            if (!$validator->fails()) {
                if ($request->hasFile('image')) {
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                }
                $menuItem = MenuItem::find($id);
                $menuItem->title = $request->title;
                $menuItem->url = $request->url;
                $menuItem->target = $request->target;
                $menuItem->icon_class = $request->icon_class;
                if ($request->hasFile('image')) {
                    $menuItem->image_path = 'uploads/' . $imageName;
                }
                $menuItem->route = $request->route;
                $menuItem->parameters = $request->parameters;

                if ($menuItem->save()) {
                    if ($request->hasFile('image')) {
                        $request->image->move(public_path('uploads'), $imageName);
                    }
                    return redirect()->route('menu-builder.index', ['menuId' => 1])->with('success', 'Thêm menu thành công');
                }
            }
            return ['status' => 'error', 'message' => $validator->errors()->first()];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

}
