<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;
use App\Http\Requests\Developer\Profile\ChangePasswordRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Client::setEndpoint('profile')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->get();

        return view('profile.index', [
            'results' => $results['contents'],
            'type' => 'view'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit()
    {
        $results = Client::setEndpoint('profile')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->get();

        return view('profile.index', [
            'results' => $results['contents'],
            'type' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $results = Client::setEndpoint('profile/update/'.$type)
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setBody(array_to_multipart($request->except('birth_place','birth_place_name', 'city', 'citizenship', 'status_name', 'address_status_name')))
            ->put('multipart');
            \Log::info($results);
        if (isset($results['code']) && $results['code'] == 200) {
            \Session::flash('flash_message', $results['descriptions']);
        }else{
            \Session::flash('error_flash_message', $results['descriptions']);
        }

        return redirect()->route('profile.index-profile');;
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

    /**
     * Update password with new one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $results = Client::setEndpoint('profile/password')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'old_password' => $request->old_password,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ])
            ->put();

        if (isset($results['code']) && $results['code'] == 200) {
            \Session::flash('flash_message', $results['descriptions']);
            return redirect()->back();
        }
        \Session::flash('error_flash_message', $results['descriptions']);
        return redirect()->back()->withInput();
    }
}
