<?php

namespace App\Observers;

use App\Models\Student;
use Illuminate\Support\Facades\Log;

class StudentObserver
{
    /**
     * Handle the Student "creating" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function creating(Student $student)
    {
        Log::info('Student is creating '.$student);
    }

    /**
     * Handle the Student "created" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function created(Student $student)
    {
        Log::info('Student is Created '.$student);

        Log::emergency($student);
        Log::alert($student);
        Log::critical($student);
        Log::error($student);
        Log::warning($student);
        Log::notice($student);
        Log::debug($student);
    }

    /**
     * Handle the Student "updating" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updating(Student $student)
    {
        Log::info('Student is Updating '.$student);
    }

    /**
     * Handle the Student "updated" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updated(Student $student)
    {
        Log::info('Student is Updated '.$student);
    }

    /**
     * Handle the Student "deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }
}
