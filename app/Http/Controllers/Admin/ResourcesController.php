<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Categories;
use App\Models\Resources;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        $resources = Resources::query()->paginate(10);
        return view('admin.resources.index')->with('resources', $resources);
    }

    public function create() {

        $resource = new Resources();

        return view('admin.resources.create', [
            'resource' => $resource,
            'categories' => Categories::all()
        ]);
    }

    public function update(Request $request, Resources $resource) {
        if($this->validatedAndSave($request, $resource)) {
            return redirect()->route('admin.resources.index')->with('success', 'Источник изменен успешно!');
        } else {
            return redirect()->route('admin.resources.index')->with('error', 'Ошибка изменения источника!');
        }
    }

    public function store(Request $request)
    {
        $resource = new Resources();

        if($this->validatedAndSave($request, $resource)) {
            return redirect()->route('admin.resources.index')->with('success', 'Источник добавлен успешно!');
        } else {
            return redirect()->route('admin.resources.index')->with('error', 'Ошибка добавления источника!');
        }
    }

    public function edit(Resources $resource) {
        return view('admin.resources.create', [
            'resource' => $resource,
            'categories' => Categories::all(),
            'category_id' => $resource->category->id
        ]);
    }

    public function destroy(Resources $resource) {
        if ($resource->delete()) {
            return redirect()->route('admin.resources.index')->with('success', 'Источник удален.');
        } else {
            return redirect()->route('admin.resources.index')->with('error', 'Ошибка удаления источника.');
        }
    }

    private function validatedAndSave(Request $request, Resources &$resource) {
        $this->validate($request, Resources::rules(), [] , Resources::attrNames());
        return $resource->fill($request->all())->save();
    }

}
