<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidate;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['teste' => 'teste']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->getResponseJson(['teset' => 'teste'], 'sucess', '', [], Response::HTTP_CREATED);

        try {
            $input = $request->all();

            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);

            return $this->getResponseJson($user, 'sucess', '', [], Response::HTTP_CREATED);
        } catch (ValidationException $validationException) {
            return $this->getResponseJson([], 'error', $validationException->getMessage(), [], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return $this->getResponseJson([], 'error', $exception->getMessage(), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();

            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            return response()->json(['sucesso' => 'sucesso'], Response::HTTP_CREATED);
        } catch (ValidationException $validationException) {
            return response()->json(['message' => $validationException->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
