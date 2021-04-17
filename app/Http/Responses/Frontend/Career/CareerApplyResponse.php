<?php

namespace App\Http\Responses\Frontend\Career;

use App\Models\Opportunity;
use App\Models\OpportunityApply;
use Illuminate\Support\Facades\Mail;
use App\Models\OpportunityAttachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;
use App\Mail\PassedJobApplicationNotification;

class CareerApplyResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $this->process($request);

            return redirect('/career')
                ->with('status', 'success')
                ->with('message', 'Your application has been sent!');

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()
                ->with('status', 'failed')
                ->with('message', 'Something went wrong, Please try again');
        }

    }

    protected function process($request)
    {
        $opportunity = Opportunity::where('opportunity_id', $request->opportunity)->first();
        $pointReceived = $this->calculatePoint($request);
        $saveAttachment = isset($request->attachment) ? $this->saveAttachment($request) : null;
        $creatLogApply = $this->logApplyOpportunity($request, $pointReceived, $opportunity);

        if ($creatLogApply) return redirect()->back();

        if ($pointReceived >= $opportunity->point_required && env('APP_ENV') == 'production') {
            Mail::to($request->email)->send(new PassedJobApplicationNotification([
                'email' => $request->email ?? '',
                'opportunity' => $opportunity->title
            ]));
        }
    }

    protected function calculatePoint($request)
    {
        $defaultPoint = [];
        for ($index = 0; $index < $request->total_question; $index++) {
            $answer = (int) $request['opportunity_'.$index];
            array_push($defaultPoint, $answer);
        }

        return collect($defaultPoint)->sum();
    }

    protected function logApplyOpportunity($request, $point, $opportunity)
    {
        $check = OpportunityApply::where('opportunity_id', $request->opportunity)
            ->where('email', $request->email)
            ->first();

        if (!$check) {
            OpportunityApply::create([
                'opportunity_id' => $request->opportunity,
                'point_result' => $point,
                'email' => $request->email,
                'is_passed' => $point >= $opportunity->point_required ? 1 : 0
            ]);
        }

        return $check;
    }

    protected function saveAttachment($request)
    {
        for ($index = 0; $index < count($request->attachment); $index ++) {
            $filename = '';
            $file = $request->attachment[$index] ?? '';
            if (isset($file)) {
                $filename   = time().'.'.$file->getClientOriginalExtension();
                $image      = file_get_contents($file->getPathName());
                $original_name = $file->getClientOriginalName();

                Storage::disk('public')->put("document/".$filename, $image);
            }

            OpportunityAttachment::create([
                'opportunity_id' => $request->opportunity,
                'email' => $request->email,
                'file' => $filename,
                'original_name' => $original_name
            ]);
        }
    }
}
