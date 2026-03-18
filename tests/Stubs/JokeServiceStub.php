<?php
namespace Tests\Stubs;

use App\Services\JokeService;

class JokeServiceStub extends JokeService
{
    public function getRandomJokes():array
    {
        $jokes = [["type"=>"programming",
                    "setup"=>"3 SQL statements walk into a NoSQL bar. Soon, they walk out",
                    "punchline"=>"They couldn't find a table.",
                    "id"=>369],
                   ["type"=>"programming",
                    "setup"=>"What is the most used language in programming?",
                    "punchline"=>"Profanity.",
                    "id"=>381],
                   ["type"=>"programming",
                    "setup"=>"Why did the programmer always carry a pencil?",
                    "punchline"=>"They preferred to write in C#.",
                    "id"=>448]];
        return [
            'success' => true,
            'data' => collect($jokes),
            "status"=>200
        ];
    }
}