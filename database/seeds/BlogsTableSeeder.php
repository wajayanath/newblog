<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_one = new Blog();
        $blog_one->title = 'first blog';
        $blog_one->body = 'first blog first blog first blogs first blog first blog first blog';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'second blog';
        $blog_two->body = 'second blog second blog second blog second blog second blog second blog ';
        $blog_two->save();
    }
}
