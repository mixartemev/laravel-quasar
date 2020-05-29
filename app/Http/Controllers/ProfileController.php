<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\Profile as ProfileResource;
use App\Http\Resources\ProfileCollection;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ProfileCollection
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();

        return new ProfileCollection($profiles);
    }

    /**
     * @param \App\Http\Requests\ProfileStoreRequest $request
     * @return \App\Http\Resources\Profile
     */
    public function store(ProfileStoreRequest $request)
    {
        $profile = Profile::create($request->all());

        return new ProfileResource($profile);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Profile $profile
     * @return \App\Http\Resources\Profile
     */
    public function show(Request $request, Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * @param \App\Http\Requests\ProfileUpdateRequest $request
     * @param \App\Profile $profile
     * @return \App\Http\Resources\Profile
     */
    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $profile->update([]);

        return new ProfileResource($profile);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();

        return response()->noContent(200);
    }
}
