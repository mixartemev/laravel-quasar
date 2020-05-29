<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServerStoreRequest;
use App\Http\Requests\ServerUpdateRequest;
use App\Http\Resources\Server as ServerResource;
use App\Http\Resources\ServerCollection;
use App\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ServerCollection
     */
    public function index(Request $request)
    {
        $servers = Server::all();

        return new ServerCollection($servers);
    }

    /**
     * @param \App\Http\Requests\ServerStoreRequest $request
     * @return \App\Http\Resources\Server
     */
    public function store(ServerStoreRequest $request)
    {
        $server = Server::create($request->all());

        return new ServerResource($server);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Server $server
     * @return \App\Http\Resources\Server
     */
    public function show(Request $request, Server $server)
    {
        return new ServerResource($server);
    }

    /**
     * @param \App\Http\Requests\ServerUpdateRequest $request
     * @param \App\Server $server
     * @return \App\Http\Resources\Server
     */
    public function update(ServerUpdateRequest $request, Server $server)
    {
        $server->update([]);

        return new ServerResource($server);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Server $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Server $server)
    {
        $server->delete();

        return response()->noContent(200);
    }
}
