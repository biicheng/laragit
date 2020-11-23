<?php
namespace App\Http\Controllers;

use App\Services\InspiringService;
use Illuminate\Http\Request;

use App\User;

class InspiringController extends Controller
{
    private $service;
    public function __construct(){//InspiringService $inspiringService){
        $this->service = (new InspiringService());//->inspire();//$inspiringService;
    }
    /**
     * @return string
     */
    public function inspire()
    {
        #return (new InspiringService())->inspire();
        return $this->service->inspire();
    }

    public function show( $user){
        if((string)$user=='123'){
            return 'yes';
        }
        else{
            return 'error: your name is: '.$user;
        }
    }
}
