<?php

namespace App\Observers;

use App\Models\Student;
use Illuminate\Support\Facades\Log;

use App\Mail\StudentMail;
use App\Mail\StudentMarkdownMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;


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
        Log::info('Observer Student is creating '.$student);

        $details = [
            'title' => 'Testing Mail',
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'
        ];
        dispatch(new SendEmailJob($details));
    }

    /**
     * Handle the Student "created" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function created(Student $student)
    {
        Log::info('Observer Student is Created '.$student);

        // Log::emergency($student);
        // Log::alert($student);
        // Log::critical($student);
        // Log::error($student);
        // Log::warning($student);
        // Log::notice($student);
        // Log::debug($student);

        // $details = [
        //     'title' => 'Testing Mail',
        //     'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'
        // ];

        // Mail::to('qdkhan05@gmail.com')->queue(new StudentMail($details));
        // Mail::to('qdkhan05@gmail.com')->queue(new StudentMarkdownMail($details));

        // Mail::to('qdkhan05@gmail.com')->later(now()->addMinutes(1), new StudentMail($details));
        // Mail::to('qdkhan05@gmail.com')->later(now()->addMinutes(1), new StudentMarkdownMail($details));

        // Mail::to('qdkhan05@gmail.com')->send(new StudentMail($details));
        // Mail::to('qdkhan05@gmail.com')->send(new StudentMarkdownMail($details));

        // Using Job
        // dispatch(new SendEmailJob($details));

    }

    /**
     * Handle the Student "updating" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updating(Student $student)
    {
        Log::info('Observer Student is Updating '.$student);
    }

    /**
     * Handle the Student "updated" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updated(Student $student)
    {
        Log::info('Observer Student is Updated '.$student);
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
