<?php

namespace App\Http\Responses\Frontend\Career;

use App\Models\Opportunity;
use App\Models\OpportunityApply;
use Illuminate\Support\Facades\Mail;
use App\Models\OpportunityAttachment;
use App\Mail\PassedJobApplicationNotification;
use Illuminate\Contracts\Support\Responsable;

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
            return redirect()->back()
                ->with('status', 'failed')
                ->with('message', 'Something went wrong, Please try again');
        }

    }

    protected function process($request)
    {
        $opportunity = Opportunity::where('opportunity_id', $request->opportunity)->first();
        $pointReceived = $this->calculatePoint($request);
        $creatLogApply = $this->logApplyOpportunity($request, $pointReceived, $opportunity);
        $saveAttachment = isset($request->attachment) ? $this->saveAttachment($request) : null

        $payload = [
            'email' => $request->email ?? 'seagleax700@gmail.com',
            'opportunity' => $opportunity->title
        ];

        if ($pointReceived >= $opportunity->point_required) {
            Mail::to($user)->send(new PassedJobApplicationNotification($payload));
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
        OpportunityApply::create([
            'opportunity_id' => $request->opportunity,
            'point_result' => $point,
            'user_id' => 1,
            'is_passed' => $point >= $opportunity->point_required ? 1 : 0
        ]);
    }

    protected function saveAttachment($request)
    {
        // insert attachment here
    }
}
