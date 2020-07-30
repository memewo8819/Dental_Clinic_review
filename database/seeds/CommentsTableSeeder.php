<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        $comments = [
            [
                'clinic_id' => 1,
                'post_name' => 'naomi',
                'text' => 'しらき歯科にテストコメント',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'clinic_id' => 2,
                'post_name' => '男梅',
                'text' => '歯のクリニックZEROにテストコメント',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'clinic_id' => 3,
                'post_name' => 'ryochi',
                'text' => 'たけのこ歯科にテストコメント',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($comments as $comment) {
            DB::table('comments')->insert($comment);
        }

    }
}
