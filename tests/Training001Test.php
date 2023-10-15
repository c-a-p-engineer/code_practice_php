<?php

use PHPUnit\Framework\TestCase;

class Training001Test extends TestCase
{
    /**
     * HelloWorldテスト
     */
    public function testHelloWorld()
    {
        // 環境変数からPORTを取得、未設定なら80をデフォルトとする
        $port = getenv('PORT') ?: '80';

        // file_get_contentsでHTTP GETリクエストを送信
        $response = file_get_contents("http://localhost:{$port}/001");

        // コンテンツの確認
        $this->assertEquals('Hello, World!', $response);
    }
}
