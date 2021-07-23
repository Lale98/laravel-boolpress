<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 11; $i++) {
            
            $newPost = new Post();

            $newPost->title = 'Titolo articolo ' . $i;
            $newPost->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro impedit esse natus, voluptatibus illo fuga aliquid error, at fugit id vitae mollitia eius. Provident est facilis ullam fuga velit voluptatum quos doloribus accusamus tempore maiores necessitatibus dolorum sed impedit reiciendis aliquid ea explicabo cum, beatae consequatur perspiciatis asperiores blanditiis! Quis provident officia ullam a, facere culpa placeat, laborum eius commodi eos nemo modi aperiam voluptate doloremque ducimus eveniet reprehenderit minima dignissimos obcaecati vitae, illum veniam exercitationem. Repellendus ut iure in natus debitis explicabo dolor tempore molestiae assumenda quibusdam? Amet vitae unde corporis dignissimos, ad delectus natus porro error illo et!';
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();
        }
    }
}
