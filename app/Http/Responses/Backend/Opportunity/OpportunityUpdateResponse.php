<?php

namespace App\Http\Responses\Backend\Opportunity;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Opportunity;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class OpportunityUpdateResponse implements Responsable
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'opportunity_title' => 'required',
            'opportunity_point' => 'required|numeric',
            'opportunity_description' => 'required',
            'opportunity_province' => 'required',
            'opportunity_city' => 'required',
            'opportunity_address' => 'required',
            'opportunity_total' => 'required',
            'opportunity_question' => 'required|array',
            'opportunity_question.*' => 'required',
            'answer' => 'required|array',
            'answer.*' => 'required'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors(['msg' => $validator->errors()->first()])
                ->withInput($request->all());
        }

        return $this->update($request);
    }

    protected function update($request)
    {
        $opportunity = Opportunity::where('opportunity_id', $this->id)->firstOrFail();

        $opportunity->update([
            'title' => $request->opportunity_title,
            'point_required' => $request->opportunity_point,
            'image' => !empty($request->opportunity_image)
                ? $this->photo($request->file('opportunity_image'))
                : $opportunity->image,
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

        $this->question($request);

        LogActivity::log($_COOKIE['__idx'], 'Update Data Opportunity '. $opportunity->title .' At ' . date('H:i'), $request);

        return redirect('/admin/opportunity')
            ->with('status', 'success')
            ->with('message', 'Success Updated Opportunity');
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

    protected function question($request)
    {
        collect($request->opportunity_question)->map(function($question, $index) use($request){
            $total_question = count($request->opportunity_question) - 1;
            $question_id = $request->question_id[$index];
            $question = '';

            if ($index < $total_question) {
                Question::where('question_id', $request->question_id[$index])->update([
                    'question' => $question,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }else{
                $question = Question::create([
                    'opportunity_id' => $opportunity->opportunity_id,
                    'question' => $question,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }

            collect($request->answer)->map(function($answer, $idx) use($request, $question, $question_id){
                $total_answer = count($request->answer) - 1;
                $question = !empty($question) ? $question->question_id : $question_id;

                if ($idx < $total_answer) {
                    Answer::where('answer_id', $request->answer_id[$idx])->update([
                        'answer' => $answer,
                        'point' => $request->point[$idx],
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }else{
                    Answer::create([
                        'question_id' => $question,
                        'answer' => $request->answer[$idx],
                        'point' => $request->point[$idx],
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            });

        });
    }
}
