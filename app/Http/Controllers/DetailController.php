<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class DetailController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
    // APIキー
    private $api_key;

    public function index(Request $request)
    {
        // dump($request);
        //  緯度取得
        $inputLatitude = $request->input('latitude');
        //  緯度取得
        $inputLongitude = $request->input('longitude');
        //  検索範囲
        $inputSearchRadius = $request->input('search_radius');
        //  検索時のページ
        $inputPage = $request->input('page');
        //  お店ID取得
        $shop_id = $request->route('id');
        // インスタンス生成
        $client = new Client();
        // HTTPリクエストメソッド
        $method = 'GET';
        // APIキーを取得
        $this->api_key = config('hotpepper.api_key');

        // APIキーや検索ワードなどの設定を記述
        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'id' => $shop_id,
                'format' => 'json',
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];
        if(!isset($restaurants['results_available']) or $restaurants['results_available']==0){
            return redirect('search');
        }else{
            $restaurants = $restaurants['shop'];
        }
        return view('detail', compact('inputLatitude','inputLongitude','inputSearchRadius','inputPage','request','restaurants'));
    }
}
