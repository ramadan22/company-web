<?php

namespace App\Http\Responses\Backend\Opportunity;

use App\Models\Opportunity;
use App\Models\LogActivity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class OpportunityCreateResponse implements Responsable
{
    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'opportunity_title' => 'required',
            'point_required' => 'required|numeric',
            'opportunity_image' => 'required|file',
            'opportunity_description' => 'required',
            'opportunity_province' => 'required',
            'opportunity_city' => 'required',
            'opportunity_address' => 'required',
            'opportunity_total' => 'required',
            'opportunity_question' => 'required|array',
            'opportunity_question.*' => 'required',
            'opportunity_answer' => 'required|array',
            'opportunity_answer.*' => 'required'
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
        Opportunity::create([
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_photo' => $this->photo($request->file('admin_photo')),
            'admin_description' => $request->admin_description,
            'admin_password' => Hash::make($request->admin_password),
            'admin_address' => $request->admin_address
        ]);

        LogActivity::log($_COOKIE['__idx'], 'Create Data Opportunity At ' . date('H:i'), $request);

        return redirect('/admin/admin')
            ->with('status', 'success')
            ->with('message', 'Success Created Opportunity');
    }

    protected function photo($request)
    {
        $filename = '';
        if (!empty($file)) {
            $filename   = time().'.'.$file->getClientOriginalExtension();
            $image      = file_get_contents($file->getPathName());
            Storage::disk('public')->put("admin/profile/".$filename, $image);
        }

        return $filename;
    }
}
