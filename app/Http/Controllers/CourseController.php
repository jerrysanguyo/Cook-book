<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\DataTables\CmsDataTable;
use App\Services\CourseService;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $title = 'Course';
        $resource = 'course';
        $data = Course::getAllCourses();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'title',
            'resource',
            'data',
        ));
    }
    
    public function store(CourseRequest $request)
    {
        $this->courseService->store($request->validated());

        return redirect()
            ->route(Auth::user()->role . '.course.index')
            ->with('success', 'You have added a course successfully!');
    }
    
    public function edit(Course $course)
    {
        $title = 'Course';
        $resource = 'course';

        return view('cms.edit', compact(
            'title',
            'resource',
            'course',
        ));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $this->courseService->update($request->validated(), $course);

        return redirect()
            ->route(Auth::user()->role . '.course.edit', $course)
            ->with('success', 'You have updated a course successfully!');
    }

    public function destroy(Course $course)
    {
        $this->courseService->destroy($course);

        return redirect()
            ->route(Auth::user()->role . '.course.index')
            ->with('success', 'You have deleted a course successfully!');
    }
}
