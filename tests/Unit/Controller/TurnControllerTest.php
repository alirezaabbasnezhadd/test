<?php

namespace Tests\Unit\Controller;

use App\Http\Controllers\TurnController;
use App\Http\Requests\TurnRequest;
use PHPUnit\Framework\TestCase;

class TurnControllerTest extends TestCase
{
    private TurnController $turn;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_with_wrong_user_id()
    {
        $this->turn = new TurnController();
        $request = app(TurnRequest::class);
        $data = [
            'userid'   => 1,
            'doctorid' => 1,
        ];
        $this->test = new TurnRequest($data);
        $response = $this->turn->create($this->test);
        dd($response);
    }
}
