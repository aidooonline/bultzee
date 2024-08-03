<?php

namespace App\Http\Controllers;

use App\Account;
use App\CaseType;
use App\CommonCase;
use App\Contact;
use App\Invoice;
use App\Stream;
use App\Task;
use App\User;
use App\UserDefualtView;
use Illuminate\Http\Request;

class CommonCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('Manage CommonCase'))
        {
            $cases = CommonCase::where('created_by', \Auth::user()->creatorId())->get();

            $defualtView         = new UserDefualtView();
            $defualtView->route  = \Request::route()->getName();
            $defualtView->module = 'commoncases';
            $defualtView->view   = 'list';
            User::userDefualtView($defualtView);

            return view('commoncase.index', compact('cases'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        if(\Auth::user()->can('Create CommonCase'))
        {
            $status       = CommonCase::$status;
            $account      = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account->prepend('--', '');
            $contact_name = Contact::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $contact_name->prepend('--', '');
            $case_type    = CaseType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $priority     = CommonCase::$priority;
            $user         = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user->prepend('--', 0);
            return view('commoncase.create', compact('status', 'account', 'user', 'case_type', 'priority', 'contact_name', 'type', 'id'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()->can('Create CommonCase'))
        {
            $validator = \Validato::make(
                $request->all(), [
                                   'name' => 'required|max:120',
                                   'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            if(!empty($request->attachments))
            {
                $filenameWithExt = $request->file('attachments')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('attachments')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('upload/profile/');
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('attachments')->storeAs('upload/profile/', $fileNameToStore);
            }

            $commoncase                = new CommonCase();
            $commoncase['user_id']     = $request->user;
            $commoncase['name']        = $request->name;
            $commoncase['number']      = $this->caseNumber();
            $commoncase['status']      = $request->status;
            $commoncase['account']     = $request->account;
            $commoncase['priority']    = $request->priority;
            $commoncase['contact']    = $request->contacts;
            $commoncase['type']        = $request->type;
            $commoncase['description'] = $request->description;
            $commoncase['attachments'] = !empty($request->attachments) ? $fileNameToStore : '';
            $commoncase['created_by']  = \Auth::user()->creatorId();
            $commoncase->save();

            Stream::create(
                [
                    'user_id' => \Auth::user()->id,'created_by' => \Auth::user()->creatorId(),
                    'log_type' => 'created',
                    'remark' => json_encode(
                        [
                            'owner_name' => \Auth::user()->username,
                            'title' => 'commoncase',
                            'stream_comment' => '',
                            'user_name' => $commoncase->name,
                        ]
                    ),
                ]
            );

            return redirect()->back()->with('success', __('common case Successfully Created.'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\CommonCase $commonCase
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(\Auth::user()->can('Show CommonCase'))
        {
            $commonCase = CommonCase::find($id);

            return view('commoncase.view', compact('commonCase'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\CommonCase $commonCase
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user()->can('Edit CommonCase'))
        {
            $commonCase = CommonCase::find($id);
            $status     = CommonCase::$status;
            $account    = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account->prepend('--', '');
            $contacts   = Contact::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $contacts->prepend('--', '');
            $type       = CaseType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $priority   = CommonCase::$priority;
            $user       = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user->prepend('--', 0);
            // get previous user id
            $previous = CommonCase::where('id', '<', $commonCase->id)->max('id');
            // get next user id
            $next = CommonCase::where('id', '>', $commonCase->id)->min('id');

            $parent = 'case';
            $tasks  = Task::where('parent', $parent)->where('parent_id', $commonCase->id)->get();

            $log_type = 'commoncase comment';
            $streams  = Stream::where('log_type', $log_type)->get();

            return view('commoncase.edit', compact('commonCase', 'status', 'user', 'priority', 'type', 'contacts', 'account', 'tasks', 'streams','previous','next'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\CommonCase $commonCase
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('Edit CommonCase'))
        {
            $commonCase = CommonCase::find($id);
            $validator  = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:120',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $commonCase['user_id']     = $request->user;
            $commonCase['name']        = $request->name;
            $commonCase['status']      = $request->status;
            $commonCase['account']     = $request->account;
            $commonCase['priority']    = $request->priority;
            $commonCase['contact']    = $request->contacts;
            $commonCase['type']        = $request->type;
            $commonCase['description'] = $request->description;
            $commonCase['created_by']  = \Auth::user()->creatorId();
            $commonCase->update();

            Stream::create(
                [
                    'user_id' => \Auth::user()->id,'created_by' => \Auth::user()->creatorId(),
                    'log_type' => 'updated',
                    'remark' => json_encode(
                        [
                            'owner_name' => \Auth::user()->username,
                            'title' => 'commonCase',
                            'stream_comment' => '',
                            'user_name' => $commonCase->name,
                        ]
                    ),
                ]
            );

            return redirect()->back()->with('success', __('Cases Successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CommonCase $commonCase
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user()->can('Delete CommonCase'))
        {
            $commonCase = CommonCase::find($id);
            $commonCase->delete();

            return redirect()->back()->with('success', 'Common Case ' . $commonCase->name . ' Deleted!');
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function grid()
    {
        $commonCases = CommonCase::where('created_by', \Auth::user()->creatorId())->get();

        $defualtView         = new UserDefualtView();
        $defualtView->route  = \Request::route()->getName();
        $defualtView->module = 'commoncases';
        $defualtView->view   = 'grid';
        User::userDefualtView($defualtView);

        return view('commoncase.grid', compact('commonCases'));
    }
    function caseNumber()
    {
        $latest = CommonCase::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->number + 1;
    }
}