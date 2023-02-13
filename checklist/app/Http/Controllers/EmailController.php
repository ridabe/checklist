<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\EmailService;
use Illuminate\Http\Response;
use App\Exceptions\Handler;

class EmailController extends Controller
{
    protected $service;

    public function __construct
    (
        EmailService $service
    ){
        $this->service = $service;
    }

    public function sendMail()
    {
        return $this->service->sendMailInterested();
    }

}
