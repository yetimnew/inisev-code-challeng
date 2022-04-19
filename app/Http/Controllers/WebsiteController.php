<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Http\Resources\WebsiteResource;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WebsiteResource::collection(Website::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebsiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebsiteRequest $request)
    {
        $data = $request->validated();
        return new WebsiteResource(Website::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        return new WebsiteResource($website);
    }


    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        $website->update($request->validate());

        return new websiteResource($website);
    }


    public function destroy(Website $website)
    {
        $website->delete();

        return response('', 204);
    }
}
