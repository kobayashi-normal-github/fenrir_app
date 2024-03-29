<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ResultController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
    // APIキー
    private $api_key;

    public function index(Request $request)
    {
        //  緯度取得
        $inputLatitude = $request->input('latitude');
        //  緯度取得
        $inputLongitude = $request->input('longitude');
        //  検索範囲
        $inputSearchRadius = $request->input('search_radius');
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
                // 'keyword' => '',
                'count' => 100,
                'format' => 'json',
                'lat' => $inputLatitude,
                'lng' => $inputLongitude,
                'range' => $inputSearchRadius,
            ],
        ];

        // HTTPリクエストを送信
        $response = $client->request($method, self::REQUEST_URL, $options);

        // 'format' => 'json'としたのでJSON形式でデータが返ってくるので、連想配列型のオブジェクトに変換
        $restaurants = json_decode($response->getBody(), true)['results'];
        if(!isset($restaurants['results_available']) or $restaurants['results_available']==0){
            return redirect('search')
                ->with('error','対象範囲に飲食店が見つかりませんでした');
        }else{
            $restaurants = $restaurants['shop'];
        }

        // 1ページごとの表示件数
        $perPage = 10;
        // 現在のページを取得
        // $page = Paginator::resolveCurrentPage('page');
        $page = $request->page;
        // ページ番号から表示するデータを指定
        $pageData = collect($restaurants)->slice(($page - 1) * $perPage, $perPage);
        $options = [
                'path' => Paginator::resolveCurrentPath(),
                'query' => $request->query(),
                'fragment' => '',
                'pageName' => 'page',
        ];
        $paginatedRestaurantDatas = new LengthAwarePaginator($pageData, collect($restaurants)->count(), $perPage, $page, $options);
        return view('result', compact('inputLatitude','inputLongitude','inputSearchRadius','request','paginatedRestaurantDatas'));
    }
}
