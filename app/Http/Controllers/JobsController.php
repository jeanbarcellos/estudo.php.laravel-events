<?php

namespace App\Http\Controllers;

use App\Events\Job\JobCreatedEvent;
use App\Events\Job\JobDeletedEvent;
use App\Events\Job\JobUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')->get();

        return response()->json($jobs);
    }

    public function show($id)
    {
        $job = Job::with('company')->find($id);

        if (!$job) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($job);
    }

    public function store(Request $request)
    {
        $job = new Job();
        $job->fill($request->all());

        $job->save();

        app('events')->dispatch(new JobCreatedEvent($job));

        return response()->json($job, 201);
    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $job->fill($request->all());

        $job->save();

        app('events')->dispatch(new JobUpdatedEvent($job));

        return response()->json($job);
    }

    public function destroy($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $job->delete();

        app('events')->dispatch(new JobDeletedEvent($job));

        return response()->json($job);
    }
}
