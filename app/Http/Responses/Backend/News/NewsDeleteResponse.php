<?php

namespace App\Http\Responses\Backend\News;

use App\Models\News;
use App\Models\LogActivity;
use Illuminate\Contracts\Support\Responsable;

class NewsDeleteResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $news = News::where('news_id', $this->id)->delete();

        LogActivity::log($_COOKIE['__idx'], 'Delete Data News At ' . date('H:i'), $request);

        return redirect('/admin/news')
            ->with('status', 'success')
            ->with('message', 'Success Deleted News');
    }
}
