<?php

namespace app\Http\Services;

use App\Http\Interfaces\InterestedInterface;
use App\Http\Interfaces\CakeInterface;
use App\Mail\SendInterested;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    protected $cakeInterface;
    protected $interestedInterface;
    protected $sendInterested;

    public function __construct
    (
        CakeInterface $cakeInterface,
        InterestedInterface $interestedInterface,
        SendInterested $sendInterested
    ){
        $this->cakeInterface = $cakeInterface;
        $this->interestedInterface = $interestedInterface;
        $this->sendInterested = $sendInterested;
    }

    public function sendMailInterested()
    {
        $interesteds = $this->interestedInterface->getInterestedList();
        $dados = new \stdClass();
        foreach ($interesteds as $interested){
            $emailDestinatario = $interested->email;
            $cake = $this->cakeInterface->getCakeById($interested->cake_id);
            $getAmnoutCake = $cake->amount;
            $dados->nomeDestinatario = $interested->name;
            $dados->nomeBolo = $cake->name;
            if($interested->sent == 0){
                if($getAmnoutCake > 0){
//              return new SendInterested($dados);
                    Mail::to($emailDestinatario)->queue(new SendInterested($dados));
                    $interested->update(['sent' => 1]);
                }
            }


        }
    }
}

