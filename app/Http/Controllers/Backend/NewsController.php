<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// responses
use App\Http\Responses\Backend\News\NewsResponse;
use App\Http\Responses\Backend\News\NewsAddResponse;
use App\Http\Responses\Backend\News\NewsCreateResponse;
use App\Http\Responses\Backend\News\NewsEditResponse;
use App\Http\Responses\Backend\News\NewsUpdateResponse;
use App\Http\Responses\Backend\News\NewsDeleteResponse;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->newsResponse = new NewsResponse;
        // $this->newsAddResponse = new NewsAddResponse;
        // $this->newsCreateResponse = new NewsCreateResponse;
        // $this->newsEditResponse = new NewsEditResponse;
        // $this->newsUpdateResponse = new NewsUpdateResponse;
        // $this->newsDeleteResponse = new NewsDeleteResponse;
    }

    public function index()
    {
        return $this->newsResponse
            ->toResponse();
    }

    public function add(Request $request)
    {
        $title = $request->title;
        $thumbnail = $request->file('thumbnail');
        $content = $request->content;

        $fileName = time().'.png';
        $path = base_path() . "/assets/newsImage/thumbnail/";

        $thumbnail->move($path, $fileName);

        @$dom = new \DomDocument();
        @$dom->loadHtml($content);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            $split = explode(';', $data);

            if(count($split) > 1){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $dataBase64 = base64_decode($data);

                $image_name= "/assets/newsImage/contentImage/" . time().$k.'.png';
                $path = base_path() . $image_name;

                file_put_contents($path, $dataBase64);

                $img->removeAttribute('src');
                $img->setAttribute('src', '..' . $image_name);
            }
        }

        $content = $dom->saveHTML();

        $contentClean = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', "", $content);
        $contentClean = preg_replace( "/\r|\n/", "", $contentClean);
        $contentClean = str_replace('<html><body>', "", $contentClean);
        $contentClean = str_replace("</body></html>", "", $contentClean);

        DB::table('news')->insert([
            'title' => $title,
            'thumbnail' => '../assets/newsImage/thumbnail/' . $fileName,
            'content' => $contentClean,
            'created_date' => date('Y-m-d H:i:s'),
            'is_delete' => '0'
        ]);

        return redirect('/admin/news')->with('status', 'success')->with('message', 'News data has been added');
    }

    public function getEdit(Request $request){
        $data = DB::table('news')->where('id_news', $request->id)->get()->first();

        return json_encode($data);
    }

    public function edit(Request $request){
        $id = $request->id;
        $title = $request->title;
        $content = $request->content;

        @$dom = new \DomDocument();
        @$dom->loadHtml($content);
        $images = $dom->getElementsByTagName('img');

        if($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $fileName = time().'.png';
            $path = base_path() . "/assets/newsImage/thumbnail/";

            $thumbnail->move($path, $fileName);
            @unlink($path . str_replace("../assets/newsImage/thumbnail/", "", $request->old_image));
            $image = '../assets/newsImage/thumbnail/' . $fileName;
        } else {
            $image = $request->old_image;
        }

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            $split = explode(';', $data);

            if(count($split) > 1){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $dataBase64 = base64_decode($data);

                $image_name= "/assets/newsImage/contentImage/" . time().$k.'.png';
                $path = base_path() . $image_name;

                file_put_contents($path, $dataBase64);

                $img->removeAttribute('src');
                $img->setAttribute('src', '..' . $image_name);
            }
        }

        $content = $dom->saveHTML();

        $contentClean = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', "", $content);
        $contentClean = preg_replace( "/\r|\n/", "", $contentClean);
        $contentClean = str_replace('<html><body>', "", $contentClean);
        $contentClean = str_replace("</body></html>", "", $contentClean);

        DB::table('news')->where('id_news', $id)->update([
            'title' => $title,
            'thumbnail' => $image,
            'content' => $contentClean
        ]);

        return redirect('/admin/news')->with('status', 'success')->with('message', 'News data has been Edited');
    }

    public function delete($id){
        DB::table('news')->where('id_news', $id)->update([
            'is_delete'     => "1"
        ]);

        return redirect('/admin/news')->with('status', 'success')->with('message', 'Data has been deleted!');
    }
}
