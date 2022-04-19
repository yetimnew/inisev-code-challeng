<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Website;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::all();

        return SubscriptionResource::collection($subscriptions);
    }

    public function store(SubscriptionRequest $request)
    {
        $data = $request->validated();
        $subscribed_user = Subscription::where('user_id', $data['user_id'])
            ->Where('website_id', $data['website_id'])->get()->toArray();

        if (!empty($subscribed_user)) {
            return response()->json(['message' => "Already subscribed!"]);
        }
        return new SubscriptionResource(Subscription::create($data));
    }
}
