<?php

namespace App\repository;

use App\Models\Turn;

class TurnRepository
{

    const ACTIVE = 'active';
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private mixed $model;

    public function __construct()
    {
        $this->model = app(turn::class);
    }

    public function getTurnUser($userId, $doctorId)
    {
        return $this->model->query()
            ->where('user_id', $userId)
            ->where('doctor_id', $doctorId)
            ->first();
    }

    public function setTurnUser($userId, $doctorId)
    {
        return $this->model->query()
            ->create([
                'user_id'   => $userId,
                'doctor_id' => $doctorId,
            ]);
    }
}
