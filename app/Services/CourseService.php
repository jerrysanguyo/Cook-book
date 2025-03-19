<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function store(array $data): Course
    {
        return Course::create([
            'name' => $data['name'],
            'remarks' => $data['remarks'],
            'added_by' => Auth()->id(),
            'updated_by' => Auth()->id(),
        ]);
    }

    public function update(array $data, Course $course): void
    {
        $course->update([
            'name' => $data['name'],
            'remarks' => $data['remarks'],
            'updated_by' => Auth()->id(),
        ]);
    }

    public function destroy(Course $course): void
    {
        $course->delete();
    }
}