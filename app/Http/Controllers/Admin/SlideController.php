<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Model\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index() {
        $data = Slide::all();
        return view('admin.slide.list', compact('data'));
    }

    public function showAddForm() {
        return view('admin.slide.add');
    }

    public function save(SlideRequest $request) {
        $slide = new Slide();
        $slide->name = $request->name;
        $slide->title = $request->title;

        $imageName = '';
        if($request->has('image')) {
            $img = $request->file('image');
            $imageName = 's_' . rand() . '.' . $img->getClientOriginalExtension();
            $path = public_path('') . '/images/slides/';
            $img->move($path, $imageName);
        }

        $slide->image = $imageName;
        $slide->save();

        return redirect()->route('slide.list')->with('alert-success', 'Thêm slide thành công.');
    }

    public function showUpdateForm($id) {
        $slide = Slide::findOrFail($id);

        return view('admin.slide.update', compact('slide'));
    }

    public function update($id, SlideRequest $request) {
        $slide = Slide::findOrFail($id);
        $slide->name = $request->name;
        $slide->title = $request->title;

        $imageName = $slide->image;
        if($request->has('image')) {
            $img = $request->file('image');
            $imageName = 's_' . rand() . '.' . $img->getClientOriginalExtension();
            $path = public_path() . '/images/slides/';
            $img->move($path, $imageName);
        }

        $slide->image = $imageName;
        $slide->save();
        return redirect()->route('slide.list')->with('alert-success', 'Sửa slide thành công.');
    }

    public function delete($id) {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect()->route('slide.list')->with('alert-success', 'Xóa slide thành công.');
    }
}
