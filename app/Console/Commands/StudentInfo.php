<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;

class StudentInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $input['fname'] = $this->ask('Input Your First Name ?');
        $input['lname'] = $this->ask('Input Your Last Name ?');
        $input['mobile'] = $this->ask('Input Your mMobile Number ?');

        // $student = new Student;
        // $student->fname = $input['fname'];
        // $student->lname = $input['lname'];
        // $student->mobile = $input['mobile'];
        // $student->save();
        Student::create($input);
        // $this->info('Record Inserted in Student Table ');

        $this->confirm('Want to continue ?');
        $this->table(['ID','First Nmae','Last Name', 'Mobile'],
            Student::all(['id','fname','lname', 'mobile'])
        );
        
    }
}
