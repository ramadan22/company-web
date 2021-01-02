<?php

namespace App\Http\Responses\Backend\News;

use App\Models\News;
use Illuminate\Support\Str;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class NewsUpdateResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'news_title' => 'required',
            'news_content' => 'required',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors(['msg' => $validator->errors()->first()])
                ->withInput($request->all());
        }

        $this->save($request);

        return redirect('/admin/news')
            ->with('status', 'success')
            ->with('message', 'Success Updated News');
    }

    protected function save($request)
    {
        $news = News::where('news_id', $this->id)->first();

        $news->update([
            'news_title' => $request->news_title,
            'news_content' => $this->content($request->news_content),
            'news_image' => !empty($request->news_image) ? $this->image($request->file('news_image')) : $news->news_image
        ]);

        LogActivity::log($_COOKIE['__idx'], 'Change Data News At ' . date('H:i'), $request);
    }

    protected function content($content)
    {
        @$dom = new \DomDocument();
        @$dom->loadHtml($content);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $file = $img->getAttribute('src');
            $split = explode(';', $file);

            if(count($split) > 1){

                preg_match("/data\:image\/(.*)\;base64/",$file, $extension);
                $image = str_replace('data:image/'.$extension[1].';base64,', '', $file);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10).'.'.$extension[1];

                Storage::disk('public')->put('news/content/' . $imageName, base64_decode($image));
            }
        }

        $content = $dom->saveHTML();

        $contentClean = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', "", $content);
        $contentClean = preg_replace( "/\r|\n/", "", $contentClean);
        $contentClean = str_replace('<html><body>', "", $contentClean);
        $contentClean = str_replace("</body></html>", "", $contentClean);

        return $contentClean;
    }

    protected function image($file)
    {
        $filename = '';
        if (!empty($file)) {
            $filename   = time().'.'.$file->getClientOriginalExtension();
            $image      = file_get_contents($file->getPathName());
            Storage::disk('public')->put("news/thumbnail/".$filename, $image);
        }

        return $filename;
    }
}
