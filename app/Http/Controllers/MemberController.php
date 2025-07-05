<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index() {
        return response()->json(Member::all());
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'join_date' => 'required|date',
            'worker_category' => 'nullable|string',
            'ministry_group' => 'nullable|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);


        $member = Member::create($validated);

        return response()->json($member, 201);
    }

    public function update(Request $request, $id)
        {
            $member = Member::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:members,email,' . $member->id,
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'birthdate' => 'required|date',
                'join_date' => 'required|date',
                'worker_category' => 'nullable|string',
                'ministry_group' => 'nullable|string',
                'status' => 'required|string|in:Active,Inactive',
            ]);

            $member->update($validated);

            return response()->json($member, 200);
        }

}