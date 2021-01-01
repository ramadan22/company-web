<?php

namespace App\Http\Responses\Backend\News;

use App\Models\News;
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

        return redirect('/admin/news')
            ->with('status', 'success')
            ->with('message', 'Success Deleted News');
    }
}
