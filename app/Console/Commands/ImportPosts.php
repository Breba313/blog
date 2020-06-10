<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use GuzzleHttp\Client;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importPosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import posts from API REST';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $n = 0;
        $dataPost = [];
        $client = new Client(['base_uri' => env('API_POSTS')]);     //  Connection to API REST 
        $response = $client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents());   //  Get data
        foreach ($data->data as $key => $post) {
            if (Post::where('title', '=', $post->title)->count() == 0) {    //  Validate that the post is not already registered
                $dataPost = (array) $post;
                $post = $this->createPost($dataPost);                   //  Create the post
                if ($post) {
                    $n++;
                }
            }
        }
        $this->info($n.' posts were imported.');
    }

    /**
     * Create a new post
     *
     * @param  array  $data
     * @return \App\Models\Post
     */
    protected function createPost(array $data)
    {
        return Post::create([
            'title' => $data['title'],
            'description' => $data['description'],         
            'publication_date' => $data['publication_date'],
            'user_id' => 1,
        ]);
    }
}
