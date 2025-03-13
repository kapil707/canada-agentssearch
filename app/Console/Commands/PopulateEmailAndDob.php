<?php

namespace App\Console\Commands;

use App\Models\FormSubmission;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PopulateEmailAndDob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:email_dob_fs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $forms = FormSubmission::where('form_type_id',2)->get();
        $bar = $this->output->createProgressBar(count($forms));
        $bar->start();
        foreach ($forms as $form) {
            $data = $form->form_data;
            $email = $data['email'] ?? null;
            $dob = $data['dob'] ?? null;
            if($email) {
                $form->email = $email;
            }
            if($dob) {
                $form->dob = Carbon::parse($dob);
            }
            $form->steps = 4;
            $form->save();
            $bar->advance();
        }
        $bar->finish();
        return 0;
    }
}
