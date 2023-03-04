<?php

namespace Tests\Unit\repository;

use App\repository\TurnRepository;
use Tests\TestCase;

class DoctorsRepositoryTest extends TestCase
{


    private TurnRepository $turn;

    public function test_create_turn_user()
    {
        $this->turn = new TurnRepository();

        $response = $this->turn->setTurnUser(rand(1, 10000), rand(1, 10000));
        dd($response);


    }
}
