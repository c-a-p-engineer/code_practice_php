<?php

use PHPUnit\Framework\TestCase;

class Training001Test extends TestCase
{
    /**
     * HelloWorldテスト
     */
    public function testHelloWorld()
    {
        $filePath = __DIR__ . '../training/001/index.php';
        // 解答ファイルが存在するか確認
        if (!file_exists($filePath)) {
            $this->markTestSkipped('File training/001/index.php does not exist.');
            return;
        }

        $port = getenv('PORT') ?: '80';
        $url = "http://localhost:{$port}/001";
        // file_get_contentsを使用してHTTPリクエストを実行
        $response = file_get_contents($url);

        // アサーション（テスト結果の検証）
        $this->assertEquals("Hello, World!", trim($response));
    }
}
