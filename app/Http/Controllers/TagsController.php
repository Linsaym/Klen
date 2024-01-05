<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Http\Request;

class tagsController extends Controller
{
    public function index()
    {
        return tags::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'color' => ['required'],
        ]);

        return tags::create($data);
    }

    public function show(tags $tags)
    {
        return $tags;
    }

    public function update(Request $request, tags $tags)
    {
        $data = $request->validate([
            'name' => ['required'],
            'color' => ['required'],
        ]);

        $tags->update($data);

        return $tags;
    }

    public function destroy(tags $tags)
    {
        $tags->delete();

        return response()->json();
    }
}
