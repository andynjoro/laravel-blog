<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user for import tasks.';

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
        $name = 'admin';
        $email = $this->ask('Enter an email address for the admin user.');
        $password = $this->secret('Enter a password for the admin user.');

        $validator = Validator::make(
            [
                'email' => $email,
                'password' => $password
            ],
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            $this->error('The admin user was not created:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return 1;
        }

        try {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ]);
        } catch (Exception $exception) {
            $this->error('The admin user was not created:');

            $this->error($exception->getMessage());

            return 1;
        }

        $this->info('The admin user was created successfully.');

        return 0;
    }
}
