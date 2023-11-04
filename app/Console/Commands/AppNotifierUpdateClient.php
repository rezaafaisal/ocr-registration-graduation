<?php

namespace App\Console\Commands;

use App\Mail\AppNotifierUpdateClient as MailAppNotifierUpdateClient;
use App\Models\AcademicActivity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class AppNotifierUpdateClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-update-client {--unsend} {--changes} {email? : The email client want to notify}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Application Updates to Client';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = config('app.name');

        $git_rev = new Process(["git", "rev-parse", "--short", "HEAD"], "./");
        $git_rev->run();
        $commit = trim($git_rev->getOutput());
        $last_commit = Storage::get(".last_commit") ?? $commit;

        $version = config('app.version');
        $last_version = Storage::get(".last_version") ?? $version;

        $git_log = new Process(['git', 'log', '--pretty=- %s', "$commit...$last_commit"], "./");
        $git_log->run();
        $changes = trim($git_log->getOutput());

        $this->option('changes') && $this->line("Changes\n$changes");

        $email = $this->argument('email');

        if (!$email) {
            $email = env('MAIL_CLIENT');
        }
        if (!$email) {
            $this->error("Mail Client Empty");
            return Command::INVALID;
        }
        $this->line("Notify Update to Client: $email");
        try {
            if (!$this->option('unsend')) {
                Mail::to($email)->send(new MailAppNotifierUpdateClient($name, $version, $last_version, $changes));
            }
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return Command::FAILURE;
        }
        Storage::put(".last_commit", "$commit");
        Storage::put(".last_version", "$version");
        $this->info("Notify Update to Client success");
        return Command::SUCCESS;
    }
}
