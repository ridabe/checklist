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

        foreach ($interesteds as $interested){

            $nomeDestinatario = $interested->name;
            $nomeBolo = $this->cakeInterface->getCakeById($interested->cake_id);
            $emailDestinatario = $interested->email;
            Mail::to($emailDestinatario)->send(new SendInterested());
        }
    }
}

