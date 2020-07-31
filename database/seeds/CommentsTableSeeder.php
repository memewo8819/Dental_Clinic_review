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
            ],[
                'clinic_id' => 1,
                'post_name' => 'memewo',
                'text' => '以前通院していた歯医者さんは都合でやっているのか，やっていないのか分からない状況になってしまってました。
                歯の詰め物が取れて，困って，新たな歯医者を探しました。知り合いに聞いた歯医者は，場所を移るため新規は断られました。
                そこで，このクチコミを元に岡田歯科さんへ。
                10年以上，自己流のメンテナンスはしてたものの，歯医者と縁がなく，麻酔とか嫌だなあと思って覚悟してましたが，医療技術，丁寧な対応，進歩してますね。
                とても丁寧に診ていただけたと思いました。
                ありがたいです。',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'clinic_id' => 1,
                'post_name' => '匿名',
                'text' => 'とても良い先生で、人気があります。治療は丁寧だし何年も先のことまで考えて治療してくれます。
                説明も分りやすくしてくれて、素人の私でも理解できます。おすすめです。。
                ありがたいです。',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'clinic_id' => 1,
                'post_name' => 'マロンちゃん',
                'text' => '約8年ぶりぐらいに歯医者に行きました。
                随分と口内環境が悪いと思いながらも、歯医者＝痛いというイメージが強いのでずっと躊躇してました。このクチコミ見て勇気出して行ってみましたが、良かったです！
                完治には少し時間がかかるようですがこの歯医者なら大丈夫そうです！',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($comments as $comment) {
            DB::table('comments')->insert($comment);
        }

    }
}
