<?php

namespace App\Jobs;

use App\Voting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StoreVotingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $idUser;
    protected $noUrutPaslon;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($idUser, $noUrutPaslon)
    {
        $this->idUser = $idUser;
        $this->noUrutPaslon = $noUrutPaslon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('StoreVotingJob is processing for user ID: ' . $this->idUser);

        Voting::create([
            'id_user' => $this->idUser,
            'no_urut_paslon' => $this->noUrutPaslon,
        ]);

        Log::info('StoreVotingJob successfully processed for user ID: ' . $this->idUser);
    }

}

