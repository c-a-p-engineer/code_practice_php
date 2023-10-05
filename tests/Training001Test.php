<?php

use PHPUnit\Framework\TestCase;

class Training001Test extends TestCase
{
    // cURLでデータを取得する関数
    private function fetchFromUrl($url, &$httpCode = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $output;
    }
    /**
     * @test
     * @testdox HelloWorld
     */
    public function test()
    {
        // HTTPステータスコードを格納する変数
        $httpCode = null;

        // fetchFromUrl関数を使用してデータを取得
        $output = $this->fetchFromUrl("http://localhost/001/index.php", $httpCode);

        // HTTPステータスコードが404の場合はテストをスキップ
        if ($httpCode === 404) {
            $this->markTestSkipped('Received 404 from localhost, skipping test.');
            return;
        }

        // cURLが失敗した場合はテストをスキップ
        if ($output === false) {
            $this->markTestSkipped('Could not connect to localhost, skipping test.');
            return;
        }

        // 出力が"Hello, World!"であるかをテスト
        $this->assertEquals("Hello, World!", trim($output));
    }
}
