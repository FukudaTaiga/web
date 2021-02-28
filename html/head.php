<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php
      $path = "../";
      include($path."_inc/meta.php");
    ?>
    <title>Tiger Study Report: HTMLのheadに含まれるタグとその使い方</title>
  </head>
  <body>
    <div id="wrap">
      <?php
        include($path."_inc/header.php");
      ?>

      <?php
        include($path."_inc/sidenavi.php");
      ?>

      <main>
        <h1>HTMLのhead</h1>
        <section>
          <h2>headタグ</h2>
          <p>
            headタグには文書のメタデータを格納する. 以下のようなタグがある. <br>
            <ul>
              <li> <a href="#title">titleタグ</a> </li>
              <li> <a href="#base">baseタグ</a> </li>
              <li> <a href="#link">linkタグ</a> </li>
              <li> <a href="#script">scriptタグ</a> </li>
              <li> <a href="#style">styleタグ</a> </li>
              <li> <a href="#meta">metaタグ</a> </li>
            </ul>
          </p>
        </section>

        <section id="title">
          <h3>titleタグ</h3>
          <p>
            タイトルを規定するタグである.
            このタグの中ではタグは全て無視され, テキストのみしか書けない.
            タイトルはタブ(検索窓の上にある出っ張った奴)の部分に表示されるものだ. <br>
            このページでは"Tiger Study Report: HTMLのheadに含まれるタグとその使い方"と表示されているはずだ. <br>
            タイトルは文書のコンテンツには関係ないが,
            検索エンジン最適化(<span style="color: red;">SEO</span>)に著しい影響を与えることがあるらしい.
            詳しく調べたら追記する.
            <div class="example">
              <code>
                &lt;title&gt; Tiger Study Report: HTMLのheadに含まれるタグとその使い方 &lt;/title&gt;
              </code>
            </div>
          </p>
        </section>

        <section id="base">
          <h3>baseタグ</h3>
          <p>
            文書中の基底となるURLを定める. 全ての href="..." の前に書かなければならない.
            複数指定すると一番最初のものだけ適用される.
            <div class="example">
              <code>&lt;base href="https://example/aaa"&gt;</code>
            </div>
            例えば,
            &lt;base href="https://example/aaa"&gt;としている場合,
            その下で&lt;a href="bbb.html"&gt;...を記述すると,
            このURLは"https://example/aaa/bbb.html"として解釈される.
            scriptからdocument.baseURIで呼び出すことができる.
          </p>
        </section>

        <section id="link">
          <h3>linkタグ</h3>
          <p>
            linkタグではrel="..."とhref="..."を用いて文書との関係を記述する.
            relでどんな関係なのか, hrefで実際に参照すべきURLを示す.
            よくある例で文書の配置, カラー等を指定する
            スタイルシート(css)を読み込むために使う場合がある.
            <div class="example">
              <code>&lt;link rel="stylesheet" href="base.css"&gt;</code>
            </div>
            「<code>base.css</code>からcssを読み込んでください」という意味になる. <br>
            他に,
            <ul>
              <li>rel="icon": ページのアイコン(ホームに置いたときに表示される奴)指定</li>
              <li>rel="preload": このページの前に読み込むリソース</li>
              <li>rel="alternate stylesheet": 代替のスタイルシート指定</li>
            </ul>
            などがある.
          </p>
        </section>

        <section id="script">
          <h3>scriptタグ</h3>
          <p>
            scriptを埋め込んだり, 参照するのに使用する.
            src="..."で参照する外部のscriptファイル(.jsなど)を指定.
            type="..."でscriptの種類を記述する.
            HTML5ではtypeを省略すると"text/javascript"として解釈される.
            <div class="example">
              直接javascriptを記述する例
              <pre><code>
                &lt;script type="text/javascript"&gt;
                  alert("Hello");
                &lt;/script&gt;
              </code></pre>

              外部ファイルから読み込む例
              <pre><code>
                &lt;script src="aaa/example.js"&gt;&lt;/script&gt;
              </code></pre>
            </div>
          </p>
        </section>

        <section id="style">
          <h3>styleタグ</h3>
          <p>
            cssを直接記述できる. 競合するものがある場合, 後の方が適用される.
            styleを記述する言語をtype等で選択できたりするが, 現状はcssしか利用されておらず,
            余程小規模でなければファイルを分けてlinkで読み込むと思うのであまり覚えなくてよい.
            属性としてスタイルが指定できる, ということが分かっていれば良いだろうか.
          </p>
        </section>

        <section id=meta>
          <h3>metaタグ</h3>
          <p>
            上記のタグで表現できない情報を記述する為のタグ.
            <ul>
              <li>charset: そのページでの文字コード(utf-8やshiftJIS)を指定</li>
              <li>name: 文書の内容に関するメタデータ. 著者やキーワード等. 詳細は下記の例を参照.</li>
            </ul>

            nameの内容はcontentで指定する.
            <div class="example">
              著者:
              <pre><code>
                &lt; meta name="author" content="Fukuda Taiga"&gt;
              </code></pre>
              ページの説明:
              <pre><code>
                &lt;meta name="description" content="Taigaの勉強用ページです. 学んだことをまとめていきます."&gt;
              </code></pre>
              キーワード:
              <pre><code>
                &lt;meta name="keywords" content="
                html, css, javascript, typescript, c++, scala, java, python, formal language
                "&gt;
              </code></pre>
            </div>
          </p>
        </section>
      </main>

      <?php
        include($path."_inc/footer.php");
      ?>
    </div>
  </body>
</html>
