<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TransactionController
 */
class TransactionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $transactions = factory(Transaction::class, 3)->create();

        $response = $this->get(route('transaction.index'));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TransactionController::class,
            'store',
            \App\Http\Requests\TransactionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $transaction = factory(Transaction::class)->make();

        $response = $this->post(route('transaction.store'), $transaction->toArray());

        $response->assertCreated();

        $transactions = Transaction::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $transactions);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $transaction = factory(Transaction::class)->create();

        $response = $this->get(route('transaction.show', $transaction));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TransactionController::class,
            'update',
            \App\Http\Requests\TransactionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $transaction = factory(Transaction::class)->create();
        $update = factory(Transaction::class)->make();

        $response = $this->put(route('transaction.update', $transaction), $update->toArray());

        $response->assertOk();
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $transaction = factory(Transaction::class)->create();

        $response = $this->delete(route('transaction.destroy', $transaction));

        $response->assertOk();

        $this->assertDeleted($transaction);
    }
}
