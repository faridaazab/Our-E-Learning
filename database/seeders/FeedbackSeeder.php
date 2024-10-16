<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feedback = Feedback::create([
            'feedback'=>'bveyghf8uhef hebfcuehfh gbfiugbeufg iuhefue',
            'course_id'=>3,
            'student_id'=>4
        ]);

        $feedback = Feedback::create([
            'feedback'=>'hybhsdcduhwcheuhcnfcb bciebc bcibeic bifjd9djh ojdowjd ',
            'course_id'=> 1,
            'student_id'=> 4
        ]);

        $feedback = Feedback::create([
            'feedback'=>'jhhd udbihfch hfchnwfoc ihndowd indiwjnd ',
            'course_id'=> 2,
            'student_id'=> 5
        ]);

        $feedback = Feedback::create([
            'feedback'=>'jhiwj whdihf39 idfhwjf iwdhjwf jwd0j3w owjd3dn ',
            'course_id'=> 3,
            'student_id'=> 6
        ]);

        $feedback = Feedback::create([
            'feedback'=>'bveyghf8uhef hebfcuehfh gbfiugbeufg uhiwdb',
            'course_id'=> 2,
            'student_id'=> 7,
        ]);

        $feedback = Feedback::create([
            'feedback'=>'hdwih dhwhnfcnhe biwcfbwf hwinf iwbhfiwnf iwfbwihnf',
            'course_id'=> 1,
            'student_id'=> 4,
        ]);

        $feedback = Feedback::create([
            'feedback'=>'kndxiwhd bdwibw whndhnfn wnhdfonwfn wndfownfo winhfwnf',
            'course_id'=> 3,
            'student_id'=> 5
        ]);
    }
}
