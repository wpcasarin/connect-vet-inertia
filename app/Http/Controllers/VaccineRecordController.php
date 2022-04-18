<?php

namespace App\Http\Controllers;

use App\Models\VaccineRecord;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class VaccineRecordController extends Controller
{

    private $record;

    public function __construct(VaccineRecord $record)
    {
        $this->record = $record;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, VaccineRecord $record)
    {
        $validated = $request->validate([
            'pet_id' => 'required',
            'name' => 'required|string|max:50',
            'next_dose' => 'required|date',
        ]);

        $newRecord = VaccineRecord::create([
            'vet_id' => $request->user()->id,
            'pet_id' => $validated['pet_id'],
            'name' => $validated['name'],
            'next_dose' => $validated['next_dose']
        ]);
        if ($newRecord) {
            return Inertia::location('/my-patients');
        } else {
            return response([
                'message' => 'Pet registration failed.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
