<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionStoreRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Http\Resources\Transaction as TransactionResource;
use App\Http\Resources\TransactionCollection;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @param  Request  $request
     * @return TransactionCollection
     */
    public function index(Request $request)
    {
        $transactions = Transaction::all();

        return new TransactionCollection($transactions);
    }

    /**
     * @param  TransactionStoreRequest  $request
     * @return TransactionResource
     */
    public function store(TransactionStoreRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return new TransactionResource($transaction);
    }

    /**
     * @param  Request  $request
     * @param  Transaction  $transaction
     * @return TransactionResource
     */
    public function show(Request $request, Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * @param  TransactionUpdateRequest  $request
     * @param  Transaction  $transaction
     * @return TransactionResource
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction)
    {
        $transaction->update([]);

        return new TransactionResource($transaction);
    }

    /**
     * @param  Request  $request
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Transaction $transaction)
    {
        $transaction->delete();

        return response()->noContent(200);
    }
}
