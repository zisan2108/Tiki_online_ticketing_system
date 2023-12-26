<?php

namespace App\Http\Controllers;

use App\Models\Tiki;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TikiController extends Controller
{
    
    public function index()
    {
        $ticket = Tiki::get();
        return view('admin.tiki.index', compact('ticket'));
    }

    public function create()
    {
        return view('admin.tiki.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'quantity' => ['required'],
            'status' => ['required'],
        ]);

        $ticket = new Tiki();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->quantity = $request->quantity;
        $ticket->status = $request->status;
        $ticket->save();
        toastr()->success('Created Successfully');
        return redirect()->route('ticket.index');
    }


    public function edit(string $id)
    {
        $ticket = Tiki::findOrFail($id);
        return view('admin.tiki.edit', compact('ticket'));
    }


    public function update(string $id, Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
        ]);

        $ticket = Tiki::findOrFail($id);
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->quantity = $request->quantity;
        $ticket->status = $request->status;
        $ticket->save();
        toastr()->success('Updated Successfully');
        return redirect()->route('ticket.index');
    }

    public function destroy(string $id)
    {
        $ticket = Tiki::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => 'Successfully Deleted']);
    }
}
