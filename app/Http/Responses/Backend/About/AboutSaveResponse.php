<?php

namespace App\Http\Responses\Backend\About;

use App\Models\About;

class AboutSaveResponse
{
    public function toResponse($request)
    {
        $about = About::first();
        if (!$about) {
            About::create([
                'about_content' => $this->content($request->content)
            ]);
        }else{
            $about->update([
                'about_content' => $this->content($request->content)
            ]);
        }

        return redirect('/admin/aboutus')
            ->with('status', 'success')
            ->with('message', 'Success Updated About Us');
    }

    protected function content($description)
    {
        @$dom = new \DomDocument();
        @$dom->loadHtml($description);
        $images = $dom->getElementsByTagName('img');

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

        return $description;
    }
}
