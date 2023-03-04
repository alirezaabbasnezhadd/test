<?php

namespace App\Observers;

use App\Models\Turn;
use App\repository\DoctorsRepository;

class TurnObserver
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private mixed $doctor;

    public function __construct()
    {
        $this->doctor = app(DoctorsRepository::class);
    }

    public function created(Turn $turn)
    {
        $doctor = $this->doctor->getDoctorById($turn->doctor_id);
        $doctor->current_capacity = $doctor->current_capacity - 1;
        $this->doctor->updateCurrentCapacityById($turn->doctor_id, $doctor->current_capacity);
    }

}
