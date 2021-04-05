<?php

namespace App\Repositories;

use App\Models\Blocks;
use App\Models\ContactRequests;
use App\Models\News;
use App\Models\Option;
use App\Models\Program;
use App\Models\TextBlock;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use http\Env\Request;

class MainRepository
{
    public function getNews($limit = 10)
    {
        $news = News::where('title->' . \App::getLocale(), '!=', '')->where('status', 1)->orderBy('date', 'DESC')->limit($limit)->get();
        return $news;
    }
    public function getPrograms($limit = 3)
    {
        $programs = Program::where('title->' . \App::getLocale(), '!=', '')->where('status', 1)->orderBy('id', 'DESC')->limit($limit)->get();
        return $programs;
    }
    public function getBanners()
    {
        $data = TextBlock::where('name','like','%mainbanner%')->where('status',1)->orderBy('title->ru', 'asc')->get();
        if ($data) {
            return $data;
        }
        return false;
    }

    public function getVacancies($limit = 20)
    {
        $data = Blocks::where([
            'type'   => 1,
            'status' => 1,
        ])->orderBy('order', 'asc')
            ->paginate($limit);

        return $data;
    }

    public function getContacts()
    {
        return static::getContact();
    }

    public static function getContact()
    {
        $contacts = Option::whereIn('name', ['address', 'teslNumber', 'adminEmail', 'iframeMaps'])->get();
        $arr = [
            'address' => '',
            'telNumber' => '',
            'adminEmail' => '',
            'iframeMaps' => '',
        ];

        if ($contacts) {
            foreach ($contacts as $contact) {
                if ($contact->name == 'address') {
                    $arr['address'] = $contact->json_field;
                }
                if ($contact->name == 'telNumber') {
                    $arr['telNumber'] = $contact->text_field;
                }
                if ($contact->name == 'adminEmail') {
                    $arr['adminEmail'] = $contact->text_field;
                }
                if ($contact->name == 'iframeMaps') {
                    $arr['iframeMaps'] = $contact->text_field;
                }
            }
        }
        return $arr;
    }

    public function getContactList($limit = 20)
    {
        $data = Blocks::where([
            'type'      => 2,
            'status'    => 1
        ])
            ->orderBy('order', 'asc')
            ->paginate($limit);
        return $data;
    }

    public function createContactRequest(Request $request)
    {
        $data = $request->except(['_token', 'g-recaptcha-response']);
        $model = new ContactRequests();
        if ($model->fill($data)->save()) {
            return $this->send($model);
        }
        return false;
    }

    public function send(ContactRequests $model)
    {
        $client     = new Client();
        $uri        = "https://api.telegram.org/bot" . env('TELEGRAM_SECRET_KEY')."/sendMessage";

        $text       = "<b>Request #".$model->id."</b>&#10;&#10;";
        $text      .= "<b>Имя:</b> ".$model->name."&#10;";
        $text      .= "<b>Email:</b> ".$model->email."&#10;";
        $text      .= "<b>Тема:</b> ".$model->subject."&#10;&#10;";
        $text      .= $model->message;

        $params     = [
            'chat_id'       => env('TELEGRAM_CHAT_ID'),
            'text'          => $text,
            'parse_mode'    => 'HTML',
        ];

        $response   = $client->post($uri, [RequestOptions::JSON => $params]);
        $data       = json_decode($response->getBody(), true);

        if (!empty($data['ok']) && $response->getStatusCode() == 200) {
            $model->checked = true;
            return $model->save();
        }

        return false;
    }
}
