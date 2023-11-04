<?php

namespace App\Console\Commands;

use App\Mail\AppNotifierUpdateClient as MailAppNotifierUpdateClient;
use App\Models\AcademicActivity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class AppNotifierInitClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-init-client {email? : The email client want to notify}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Application Initials to Client';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $version = config('app.version');

        $git_rev = new Process(["git", "rev-parse", "--short", "HEAD"], "./");
        $git_rev->run();
        $commit = trim($git_rev->getOutput());

        $this->line("Init version $version");
        $this->line("Init commit $commit");

        Storage::put(".last_commit", "$commit");
        Storage::put(".last_version", "$version");
        return Command::SUCCESS;
    }
}
