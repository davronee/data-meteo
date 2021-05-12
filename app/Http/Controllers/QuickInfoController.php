<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Region;
use App\Models\QuickInfo;
use Illuminate\Http\Request;
use App\Libraries\HTML_TO_DOC;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendQuickInfoToTelegramJob;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\QuickInfo\StoreUpdateRequest;
use App\Notifications\QuickInfoPublishedNotification;

class QuickInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['QuickInfoMiddleware', 'isProfileFilled']);
    }

    public function index()
    {
        $info_list = QuickInfo::paginate(50);
        return view('quick-info.index', compact('info_list'));
    }

    public function create()
    {
        $user = auth()->user();
        $regions = Region::all();

        return view('quick-info.create', compact('user', 'regions'));
    }

    public function store(StoreUpdateRequest $request)
    {
        $data = $request->validated();
        $data['is_published'] = 0;
        $data['date'] = date('Y-m-d');
        $data['user_id'] = auth()->user()->id;

        $info = QuickInfo::create($data);

        if(isset($info->id))
            return redirect()->route('quick-info.edit', $info->id);

        return redirect()->back()->with('error', trans('messages.error'));
    }

    public function show(QuickInfo $quickInfo)
    {
        return view('quick-info.view', compact('quickInfo'));
    }

    public function edit(QuickInfo $quickInfo)
    {
        $regions = Region::all();
        return view('quick-info.edit', compact('quickInfo', 'regions'));
    }

    public function update(StoreUpdateRequest $request, QuickInfo $quickInfo)
    {
        $data = $request->validated();
        $data['date'] = date('Y-m-d');

        $quickInfo->fill($data);

        if($quickInfo->save())
            return redirect()->route('quick-info.edit', $quickInfo->id);

        return redirect()->back()->with('error', trans('messages.error'));
    }

    public function destroy(QuickInfo $quickInfo)
    {
        $owner = auth()->user();

        try {
            DB::transaction(function () use ($quickInfo) {
                $quickInfo->delete();
                // TODO: write log
            });
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return redirect()->route('quick-info.index')->with('error', $e->getMessage());
        }

        return redirect()->route('quick-info.index')->with('status', trans('messages.deleted_successfully'));
    }

    /**
     * custom methods which is not resource
     */

    public function doc(Request $request, QuickInfo $quickInfo)
    {
        $htd = new HTML_TO_DOC();
        $content = $quickInfo->info;
        $htd->createDoc($content, "quick-info", true);
    }

    public function pdf(Request $request, QuickInfo $quickInfo)
    {
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Arial'])->loadView('quick-info.pdf', compact('quickInfo'));

        return $pdf->download('quick-info.pdf');
    }

    public function send(Request $request, QuickInfo $quickInfo)
    {
        $quickInfo->is_published = 1;
        $quickInfo->save();

        // create send telegram
        SendQuickInfoToTelegramJob::dispatchNow($quickInfo);

        // send email notification
        Notification::sendNow($quickInfo, new QuickInfoPublishedNotification($quickInfo));

        return redirect()->back()->with('status', trans('messages.sent_successfully'));
    }
}
