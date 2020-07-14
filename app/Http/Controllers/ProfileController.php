<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\Profile as ProfileResource;
use App\Http\Resources\ProfileCollection;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @param  Request  $request
     * @return ProfileCollection
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();

        return new ProfileCollection($profiles);
    }

    /**
     * @param  ProfileStoreRequest  $request
     * @return ProfileResource
     */
    public function store(ProfileStoreRequest $request)
    {
        $profile = Profile::create($request->all());

        return new ProfileResource($profile);
    }

    /**
     * @param  Request  $request
     * @param  Profile  $profile
     * @return ProfileResource
     */
    public function show(Request $request, Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * @param  ProfileUpdateRequest  $request
     * @param  Profile  $profile
     * @return ProfileResource
     */
    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $profile->update([]);

        return new ProfileResource($profile);
    }

    /**
     * @param  Request  $request
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();

        return response()->noContent(200);
    }
}
