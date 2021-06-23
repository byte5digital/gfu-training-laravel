<?php

namespace App\Console\Commands;

use App\Jobs\sendMail;
use Illuminate\Console\Command;
use Validator;

class sayHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a test mail to provided address';

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

        $email = $this->ask("What's your mail address?");

        $validation = Validator::make([
            'email'=> $email,
        ],[
            'email' => 'required|email'
        ]);

        if($validation->fails()){
            $this->info('Something went wrong');
            foreach($validation->errors()->all() as $error){
                $this->error($error);
            }
        }else{

            $details = ['email' => $email];
            sendMail::dispatch($details);
            $this->info('Mail sent!');
        }

    }
}
