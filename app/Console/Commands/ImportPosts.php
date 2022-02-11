<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Services\PostService;

use Illuminate\Support\Facades\Http;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import posts from external API';

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
     * @return int
     */
    public function handle()
    {
        $user = User::where('name', 'admin')->first();

        if (!$user) {
            $this->error('An admin user was not found:');

            $this->error('Create an admin user using the command "artisan user:create-admin".');

            return 1;
        }

        $importURL = config('services.posts_import_url');

        $response = Http::get($importURL);

        if ($response->status() != 200) {
            $this->error('An error occured while fetching posts.');

            return 1;
        }
        
        $posts = $response->json();

        $postService = new PostService;

        foreach ($posts['data'] as $post) {
            try {
                $postService->createUserPost($user, $post);
            } catch (Exception $exception) {
                $this->error('Unable to import post');
    
                $this->error($exception->getMessage());
            }

            $this->info('Post imported successfully.');
        }

        return 0;
    }
}
