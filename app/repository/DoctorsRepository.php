<?php

namespace App\repository;

use App\Models\Doctor;

class DoctorsRepository
{

    private Doctor $model;

    public function __construct()
    {
        $this->model = app(Doctor::class);
    }

    public function updateCurrentCapacityById($id, $capacity)
    {
        return $this->model->query()
            ->where('id', $id)
            ->update([
                'current_capacity' => $capacity
            ]);
    }

    public function getDoctorById($id)
    {
        return $this->model->query()
            ->where('id', $id)
            ->first();
    }

}
