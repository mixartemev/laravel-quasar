<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProfileController
 */
class ProfileControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $profiles = factory(Profile::class, 3)->create();

        $response = $this->get(route('profile.index'));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProfileController::class,
            'store',
            \App\Http\Requests\ProfileStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $profile = factory(Profile::class)->make();

        $response = $this->post(route('profile.store'), $profile->toArray());

        $response->assertCreated();

        $profiles = Profile::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $profiles);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $profile = factory(Profile::class)->create();

        $response = $this->get(route('profile.show', $profile));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProfileController::class,
            'update',
            \App\Http\Requests\ProfileUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $profile = factory(Profile::class)->create();
        $update = factory(Profile::class)->make();

        $response = $this->put(route('profile.update', $profile), $update->toArray());

        $response->assertOk();
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $profile = factory(Profile::class)->create();

        $response = $this->delete(route('profile.destroy', $profile));

        $response->assertOk();

        $this->assertDeleted($profile);
    }
}
