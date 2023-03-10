<?php

namespace app\Http\Services;

use App\Http\Interfaces\InterestedInterface;
use App\Http\Interfaces\CakeInterface;
use App\Mail\SendInterested;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendInterested as interestedJob;

class EmailService
{
    protected $cakeInterface;
    protected $interestedInterface;
    protected $sendInterested;
    protected $interestedJob;

    public function __construct
    (
        CakeInterface $cakeInterface,
        InterestedInterface $interestedInterface,
        SendInterested $sendInterested,
        interestedJob $interestedJob
    ){
        $this->cakeInterface = $cakeInterface;
        $this->interestedInterface = $interestedInterface;
        $this->sendInterested = $sendInterested;
        $this->interestedJob = $interestedJob;
    }

    public function sendMailInterested()
    {
//        $interesteds = $this->interestedInterface->getInterestedList();
//        $dados = new \stdClass();
//        foreach ($interesteds as $interested){
//            $cake = $this->cakeInterface->getCakeById($interested->cake_id);
//            $getAmnoutCake = $cake->amount;
//            $dados->nomeDestinatario = $interested->name;
//            $dados->nomeBolo = $cake->name;
//            $dados->emailDestinatario = $interested->email;
//            if($interested->sent == 0){
//                if($getAmnoutCake > 0){
//                    $this->interestedJob::dispatch($dados)->delay(now());
//                    $interested->update(['sent' => 1]);
//                }
//            }
//
//
//        }
    }
}

