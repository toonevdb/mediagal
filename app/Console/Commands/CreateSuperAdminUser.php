<?php

namespace MediaGal\Console\Commands;

use Hash;
use MediaGal\User;
use Illuminate\Console\Command;

class CreateSuperAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mediagal:superadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a superadmin user account';

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
        $name = $this->ask('What is the name of the user?');
        $email = $this->ask('What is the email of the user?');
        $password = $this->secret('Please provide a password');
        $passRepeat = $this->secret('Please repeat the provided password');

        if (!empty($name) && !empty($email) && !empty($password) && $password === $passRepeat) {
            $user = User::create([
                'name'       => $name,
                'email'      => $email,
                'password'   => Hash::make($password),
                'superadmin' => true,
            ]);

            $this->info('Created new superadmin user with ID #'.$user->id);

            return;
        }

        $this->error('Incorrect input!');
    }
}
