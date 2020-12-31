<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutusController extends Controller
{
    public function index()
    {
        $data = DB::table('aboutus')->get()->first();

        // echo "<pre>";
        //     print_r($data);die();

        return view("admin/pages/aboutus", compact('data'));
    }

    public function edit(Request $request)
    {
        $description = $request->content;
        @$dom = new \DomDocument();
        @$dom->loadHtml($description);
        $images = $dom->getElementsByTagName('img');

        // echo "<pre>";
        //     print_r(@$dom);die();

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            $split = explode(';', $data);

            if(count($split) > 1){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $dataBase64 = base64_decode($data);

                $image_name= "/assets/aboutusImage/" . time().$k.'.png';
                $path = base_path() . $image_name;

                file_put_contents($path, $dataBase64);

                $img->removeAttribute('src');
                $img->setAttribute('src', '..' . $image_name);
            }
        }

        $description = $dom->saveHTML();

        dd($description);

        die();

        DB::table('aboutus')->where('id_aboutus', "1")->update([
            'content'     => $description
        ]);

        return redirect('/admin/aboutus')->with('status', 'success')->with('message', 'Data About Us updated');
    }
}
