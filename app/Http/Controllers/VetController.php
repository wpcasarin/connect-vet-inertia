<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VetController extends Controller
{
    private $vet;

    public function __construct(Vet $vet)
    {
        $this->vet = $vet;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->type === 'TUTOR') {
            return $this->vet->all();
        }
        return response([
            'message' => 'Unauthorized.'
        ], Response::HTTP_UNAUTHORIZED);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function show(Vet $vet)
    {
        return $vet;
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
