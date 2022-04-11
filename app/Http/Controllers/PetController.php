<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class PetController extends Controller
{
    private $pet;

    public function __construct(Pet $pet)
    {
        $this->pet = $pet;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Pet $pet)
    {
        if ($request->user()->cannot('viewAny', $pet)) {
            return response([
                'message' => 'Unauthorized.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        if ($request->user()->type === 'TUTOR') {
            return $request->user()->pets;
        }

        return $this->pet->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pet $pet)
    {
        if ($request->user()->cannot('create', $pet)) {
            return response([
                'message' => 'Unauthorized.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'sex' => ['required', 'max:1', Rule::in(['F', 'M'])],
            'specie' => ['required', 'max:10', Rule::in(['CAT', 'DOG'])],
            'date_of_birth' => 'date',
        ]);

        $petNew = Pet::create([
            'user_id' => $request->user()->id,
            'name' => $validated['name'],
            'sex' => $validated['sex'],
            'specie' => $validated['specie'],
            'date_of_birth' => $validated['date_of_birth']
        ]);

        if ($petNew) {
            return response([
                'message' => 'Pet added successfully.',
                'pet' => $petNew
            ], Response::HTTP_CREATED);
        } else {
            return response([
                'message' => 'Pet registration failed.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pet $pet)
    {
        if ($request->user()->cannot('view', $pet)) {
            return response([
                'message' => 'Unauthorized.'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return $pet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Pet  $Pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet  $pet)
    {
        if ($request->user()->cannot('update', $pet)) {
            return response([
                'message' => 'Unauthorized.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $validated = $request->validate([
            'name' => 'string|max:50',
            'sex' => ['max:1', Rule::in(['F', 'M'])],
            'specie' => ['max:10', Rule::in(['CAT', 'DOG'])],
            'date_of_birth' => 'date',
        ]);

        if ($request->date_of_birth) {
            $pet->update(['age' => Carbon::parse($validated['date_of_birth'])->diff(Carbon::now())->y]);
        }

        $pet->update($request->all());

        return response([
            'message' => 'Pet update successfully.'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pet  $pet)
    {
        if ($request->user()->cannot('delete', $pet)) {
            return response([
                'message' => 'Unauthorized.'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $pet->delete();

        return response([
            'message' => 'Pet deleted successfully.'
        ]);
    }
}
