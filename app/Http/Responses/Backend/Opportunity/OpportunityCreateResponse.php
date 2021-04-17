<?php

namespace App\Http\Responses\Backend\Opportunity;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Opportunity;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class OpportunityCreateResponse implements Responsable
{
    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'opportunity_title' => 'required',
            'opportunity_point' => 'required|numeric',
            'opportunity_image' => 'required|file',
            'opportunity_description' => 'required',
            'opportunity_province' => 'required',
            'opportunity_city' => 'required',
            'opportunity_address' => 'required',
            'opportunity_total' => 'required',
            'opportunity_question' => 'required|array',
            'opportunity_question.*' => 'required',
            'answer_0' => 'required|array',
            'point_0' => 'required|array',
            'answer_0.*' => 'required',
            'point_0.*' => 'required',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors(['msg' => $validator->errors()->first()])
                ->withInput($request->all());
        }

        return $this->save($request);
    }

    protected function save($request)
    {
        $opportunity = Opportunity::create([
            'title' => $request->opportunity_title,
            'point_required' => $request->opportunity_point,
            'image' => $this->photo($request->file('opportunity_image')),
            'description' => $request->opportunity_description,
            'other' => [
                'total_opportunity' => $request->opportunity_total,
                'location' => [
                    'province' => $request->opportunity_province,
                    'city' => $request->opportunity_city,
                    'address' => $request->opportunity_address
                ]
            ]
        ]);

        $this->question($request, $opportunity);

        LogActivity::log($_COOKIE['__idx'], 'Create Data Opportunity At ' . date('H:i'), $request);

        return redirect('/admin/opportunity')
            ->with('status', 'success')
            ->with('message', 'Success Created Opportunity');
    }

    protected function photo($file)
    {
        $filename = '';
        if (!empty($file)) {
            $filename   = time().'.'.$file->getClientOriginalExtension();
            $image      = file_get_contents($file->getPathName());
            Storage::disk('public')->put("opportunity/".$filename, $image);
        }

        return $filename;
    }

    protected function question($request, $opportunity)
    {
        collect($request->opportunity_question)->map(function($question, $index) use($opportunity, $request){
            $question = Question::create([
                'opportunity_id' => $opportunity->opportunity_id,
                'question' => $question,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            collect($request['answer_'.$index])->map(function($answer, $key) use($question, $request, $index){
                Answer::create([
                    'question_id' => $question->question_id,
                    'answer' => $answer,
                    'point' => $request['point_'.$index][$key],
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            });
        });
    }
}
