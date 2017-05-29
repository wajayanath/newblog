<?php

use Illuminate\Database\Seeder;
use App\Blog;

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
        $blog_one->meta_title = 'first blog meta title';
        $blog_one->meta_desc = 'first blog meta disc';
        $blog_one->slug = 'first blog slug';
        $blog_one->body = 'first blog first blog first blogs first blog first blog';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'second blog';
        $blog_two->meta_title = 'second blog meta title';
        $blog_two->meta_desc = 'second blog meta disc';
        $blog_two->slug = 'second blog slug';
        $blog_two->body = 'loreum second blog second blog second blog second blog second blog';
        $blog_two->save();
    }
}
 