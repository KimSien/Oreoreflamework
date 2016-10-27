# temporary　・・・・


this repository develop is stoped.


next ・・・

naming to. unicellur



---------------
# unicelluar

マイクロフレームワーク。 フレームワークの概念から
最小限のフレームワークとして求めれている機能を実装するのが目的
目的は、このフレームワークを実践レベルで使う事ではなく、有名どころのフレームワーク
の理解をより深める為に作成する所にあります。


----------------

### 最小限の仕様について

1 フレームワークタイプ ディレクトリ、ファイルデザイン -> ＭＶＣ

- モデル
- コントローラー
- ビュー、テンプレート


- オートローダー / PSR-4準拠
	ファサードもしくはＤＩで


- DI / PIMPLEなど前提
[RubyのDIコンテナを20行で書く](http://c4se.hatenablog.com/entry/2015/05/03/004218)
	phpの複雑さを物語ってるかも
[DIとは？DIコンテナとは？試してみた(後編)[PHP][Pimple][DI]](http://shiro-goma.hatenablog.com/entry/2014/06/30/092136)

[pimpleについて](http://iakio.hatenablog.com/entry/2014/02/13/233610)



- ルーター機能  /  URLを解析して指定のデータを読み込む機能

    HTTPリクエスト処理機能　/ リクエスト前、後で
    HTTPリクエストのフィルタリング機能 -> ミドルウェア

- ミドルウェア　/ 代表的なものとして認証機能、広い意味ではルーター機能もミドルウェア


- REST
	GET,POST,DELETE,PUTのサポート
	他の言語と違いphp単体でもGET,POST対応してしまうため、ルーティングや
	REST設計をさほど意識する必要が出てこないのが問題？

  

-　データ、ストレージ関係



- cliコマンドツール



### フロントエンド
- js,jquery


### バックエンド
- mysql

### コーディング規約

[php-fig](https://github.com/php-fig/fig-standards)

- PSR-2
- PSR-4 (オートローダー用)
- PSR-7

- サブツール 2013年と古い　：[PHP Coding Standards Fixer](http://9ensan.com/blog/programming/php/php-psr-coding-standards-fixer/)
- [PHP コードのコーディング規約をチェック](http://tk0miya.hatenablog.com/entry/2013/10/24/172535)


### パッケージ管理ツール

※使用も可能であるが、使用せずとも開発できる

- PHP : composer4
- フロントエンド : webpack



### テストツール
- php-unit
- selniuem


----------------

## 開発手順

[開発手順、詳細はウィキに連動](https://bitbucket.org/toysking2016/unicelluar/wiki/Home)

----------------

## 参考とするフレームワーク群

[PHPフレームワークおすすめ一覧【10選】2015年⇒2016年へ向けて。](http://tech.pjin.jp/blog/2015/11/25/php-framework-2015-2016/)

- [laravel](https://github.com/laravel/laravel)
- [slim](https://github.com/slimphp/Slim)
- [flight](https://github.com/mikecao/flight)
- [phaolcon](https://phalconphp.com/ja/)
・・・etc


その他参考資料

[ミドルウェアベースでPSR7を使った自作フレームワーク](http://wsjp.blogspot.jp/2015/04/psr7.html)

[PHPのフレームワークを作った 2013](http://d.hatena.ne.jp/n314/20130416/1366113782)

