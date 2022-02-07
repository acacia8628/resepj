<?php

namespace App\Http\Controllers;

use App\Http\Requests\Manager\CourseAddRequest;
use App\Http\Requests\Manager\CourseEditRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Shop;

class CourseController extends Controller
{
    public function create()
    {
        //
    }

    public function store(CourseAddRequest $request)
    {
        $course_img_path = $request->file('course_img_file')->store('course_img', 'public');

        Course::create([
            'shop_id' => $request->shop_id,
            'name' => $request->course_name,
            'overview' => $request->course_overview,
            'price' => $request->course_price,
            'course_detail' => $request->course_detail,
            'course_img_path' => $course_img_path
        ]);

        return back();
    }

    public function show($id)
    {
        $course = Course::with(['shop'])->where('id', $id)->first();
        $times = config('times');
        $numbers = config('numbers');

        $items = [
            'course' => $course,
            'times' => $times,
            'numbers' => $numbers,
        ];
        return view('course', $items);
    }

    public function edit($id)
    {
        $shop = Shop::find($id);
        $courses = Course::with(['shop'])
            ->where('shop_id', $id)
            ->get();

        $items = [
            'shop' => $shop,
            'courses' => $courses,
        ];
        return view('manager.course_edit', $items);
    }

    public function update(CourseEditRequest $request, $id)
    {
        $shop_id = $request->input('shop_id');

        if (!empty($request->file('course_img_file'))) {
            $img_path = $request->file('course_img_file')->store('course_img', 'public');

            Course::where('id', $id)
                ->update([
                    'course_img_path' => $img_path,
                ]);
        }

        Course::where('id', $id)
            ->update([
                'shop_id' => $shop_id,
                'name' => $request->course_name,
                'overview' => $request->course_overview,
                'price' => $request->course_price,
                'course_detail' => $request->course_detail,
            ]);
        return back();
    }

    public function destroy($id)
    {
        Course::where('id', $id)->delete();
        return back();
    }
}
