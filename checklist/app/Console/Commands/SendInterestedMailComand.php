<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Interfaces\InterestedInterface;
use App\Http\Interfaces\CakeInterface;
use App\Mail\SendInterested;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendInterested as interestedJob;

class SendInterestedMailComand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendMail:interested';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispara uma lista de emails para os interessados nos produtos';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CakeInterface $cakeInterface,
                           InterestedInterface $interestedInterface,
                           SendInterested $sendInterested,
                           interestedJob $interestedJob
    )
    {
        $this->info('Iniciando processo de envio de email');
        $interesteds = $interestedInterface->getInterestedList();
        $dados = new \stdClass();
        foreach ($interesteds as $interested){
            $cake = $cakeInterface->getCakeById($interested->cake_id);
            $getAmnoutCake = $cake->amount;
            $dados->nomeDestinatario = $interested->name;
            $dados->nomeBolo = $cake->name;
            $dados->emailDestinatario = $interested->email;
            if($interested->sent == 0){
                if($getAmnoutCake > 0){
                    $interestedJob::dispatch($dados)->delay(now());
                    $interested->update(['sent' => 1]);
                }
            }


        }
        $this->info('Processo finalizado!');


    }
}
