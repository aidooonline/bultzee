<?php

namespace App\Http\Controllers;

use App\Stream;
use App\User;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams = Stream::where('created_by', \Auth::user()->creatorId())->get();

        return view('stream.index', compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Stream $stream
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Stream $stream
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Stream $stream)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Stream $stream
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stream $stream)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Stream $stream
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stream $stream)
    {
        $stream->delete();

        return redirect()->route('stream.index')->with(
            'success', 'Stream Deleted!'
        );
    }

    public function streamstore(Request $request, $title, $name, $id)
    {
        $user      = \Auth::user()->id;
        $validator = \Validator::make(
            $request->all(), [
                               'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        if(!empty($request->attachment))
        {
            $filenameWithExt = $request->file('attachment')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('attachment')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('upload/profile/');
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('attachment')->storeAs('upload/profile/', $fileNameToStore);
        }

        Stream::create(
            [
                'user_id' => $user,
                'log_type' => $request->log_type,
                'file_upload' => !empty($request->attachment) ? $fileNameToStore : '',
                'remark' => json_encode(
                    [
                        'owner_name' => \Auth::user()->username,
                        'stream_comment' => $request->stream_comment,
                        'title' => $title,
                        'data_id' => $id,
                        'user_name' => $name,
                    ]
                ),
                'created_by' => \Auth::user()->creatorId(),
            ]
        );

        return redirect()->back()->with('success', __('Stream Successfully Created.'));
    }
}