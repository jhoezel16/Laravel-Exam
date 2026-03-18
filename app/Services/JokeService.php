<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
class JokeService
{
    protected $baseUrl;
    public function __construct(){
        $this->baseUrl = config("exam.jokeBaseUrl");
    }

    public function getRandomJokes():array
    {
        $jokeUrl = "/jokes/programming/ten/";
        $jokeResponse = $this->callJokeAPI($jokeUrl);
        if($jokeResponse["success"]??false){
          $jokeResponse["data"] = collect(json_decode($jokeResponse["data"],1))
                ->slice(0,config("exam.noOfJokes"));
        }
        return $jokeResponse;
    }


    public function callJokeAPI($url):array{
        $return = ["success"=>false,"data"=>[], "status"=>500];
        $response   = Http::baseUrl($this->baseUrl)
                        ->timeout(config('exam.timeout'))
                        ->withHeaders([
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json'
                        ]);
        $response =  $response->get($url);

        $return["data"]=$response?->body();
        $return["status"]=$response?->status();
        if(!$response->successful()){
            logger()->error("[service call error]"
                , ["response"=> $response->body()
                ,"status"=>$response->status()]);
        }
        else{
            $return["success"]=true;
        }
        return $return;
    }
}