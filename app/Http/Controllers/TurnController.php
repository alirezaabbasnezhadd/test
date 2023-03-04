<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurnRequest;
use App\Http\Resources\TurnResource;
use App\repository\DoctorsRepository;
use App\repository\TurnRepository;
use Illuminate\Http\Request;


class TurnController extends Controller
{
    private TurnRepository $TurnRepository;
    private DoctorsRepository $DoctorRepository;

    public function __construct()
    {
        $this->TurnRepository = app(TurnRepository::class);
        $this->DoctorRepository = app(DoctorsRepository::class);
    }

    public function create(TurnRequest $request)
    {
        $userid   = $request->get('userid');
        $doctorId = $request->get('doctorid');

        $this->checkDoctorHaveTurn($doctorId);

        $this->checkUserCanGetTurnWithDoctor($userid, $doctorId);


        $response = $this->TurnRepository->setTurnUser($userid, $doctorId);


        return new TurnResource($response);
    }

    /**
     * @param mixed $userid
     * @param mixed $doctorid
     * @return void
     */
    public function checkUserCanGetTurnWithDoctor(mixed $userid, mixed $doctorid): void
    {
        if ($this->TurnRepository->getTurnUser($userid, $doctorid))
            abort('403', 'You Have Turn With This Doctor');
    }

    /**
     * @return void
     */
    public function checkDoctorHaveTurn($doctorId): void
    {
        $doctor = $this->DoctorRepository->getDoctorById($doctorId);

        if ($doctor->current_capacity < 1)
            abort('403', 'Doctor Do Not Have Capacity');
    }
}
