<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php
      $path = "../";
      include($path."_inc/meta.php");
    ?>
    <title>Tiger Study Report: PHPでできること・基本的な文法(代入, if, for, whileなど)</title>
  </head>
  <body>
    <div id="wrap">
      <?php
        include($path."_inc/header.php");
      ?>

      <?php
        include($path."_inc/sidenavi.php");
      ?>

      <?php
        $count = 1;
      ?>

      <main>
        <h1>PHPの基本文法</h1>
        <section>
          <h2>大前提に</h2>
          <p>
            phpはweb系の処理にとても向いていて, HTMLを混ぜて書くことができる.
            さながらHTMLの中で言語を使っているかのように(実際は逆だが).
            何なら設定すれば~.htmlにあるphpを実行させたりもできる.
            実際にどんな風に混ぜて書くかというと,
            scriptの中に書かれているものがphpの処理,
            scriptの外に書いてあるものはそのまま出力するという形式になっている.
            つまり, (ほとんどがHTMLだろうが,)もはや別になにを書いても良い.
            それがHTMLとして解釈されるものならブラウザで変換されるというだけだ.
          </p>
        </section>

        <section>
          <h2>基本</h2>
          <p>
            <h3>phpスクリプト</h3>
            <p>
              phpスクリプトは &lt;?php ~ ?&gt;のように書く. 他にも書き方はあるらしいが,
              とりあえずこれで統一しとけばいい気がする. <br>
              行末には;付ける. c++とかと一緒. <br>
              コメントは//. 複数行なら/* ~ */.
            </p>

            <h3>文字列</h3>
            <p>
              ""で囲む書き方と, ''囲む書き方がある.
              変数展開, エスケープ(\~と書かないといけないやつ)に差がある.
              <ul>
                <li>
                  "": 変数が展開され, 特殊文字は特殊文字として表示される. エスケープする文字は$ \ "
                </li>
                <li>
                  '': 変数が展開されず, 特殊文字もそのまま表示される. エスケープする文字は'
                </li>
              </ul>
              <div class="example">
                <pre>
                  &lt;?php
                    $a = 0;

                    echo "a = $a  &lt;br&gt;";
                    echo 'a = $a &lt;br&gt;';
                  ?&gt;
                </pre>

                出力:
                <div class="center">
                  <?php
                    $a = 0;

                    echo "a = {$a} <br>";
                    echo 'a = {$a} <br>';
                  ?>
                </div>
              </div>

              一応, ヒアドキュメント(echo<<<終端文字列)というような書き方もあるが,
              長い文章を出力しないなら, 気を付けなければならないポイントもおおいので必要ない. <br>
              文字列の結合は <span class="bold">.</span> で行う.
              <div class="example">
                <pre>
                  &lt;?php
                    $string_1 = "nihon";
                    $string_2 = "go";

                    echo $string_1.$string_2."to"."eigo";
                  ?&gt;
                </pre>

                出力:
                <div class="center">
                  <?php
                    $string_1 = "nihon";
                    $string_2 = "go";

                    echo $string_1.$string_2."to"."eigo";
                  ?>
                </div>
              </div>
            </p>

            <h3>出力方法</h3>
            出力方法として, echo, printがある.
            以前(php7.0より前)は機能的な差もあったようだが, 今はあまり気にしなくてよさそう.
            いずれも関数ではないので, echo(~)やprint(~)なる書き方は避けるべき.
            主な違いとして,
            <ul>
              <li> echoはリスト形式で引数を取ることができ, 返り値がない. (Unit, void) </li>
              <li> printは単一引数で常に1を返す. </li>
            </ul>
            がある. 基本はechoでいい. <br>
            似たものでprintfがあるが, これは組み込みの関数でc, java等と同じ形式で書ける.
            <div class="center">
              printf("Hello {$world} %s", $ex);
            </div>
            のような書き方もできるが, $worldに"%"が含まれる場合など意図した動作にならない場合があるので,
            <div class="center">
              printf("Hello %s %s", $world, $ex);
            </div>
            と書くべき.
          </p>
        </section>

        <section>
          <h2>phpの変数</h2>
          <p>
            phpの変数は三種類のスコープがある.
            <ol>
              <li> ローカル </li>
              <li> グローバル: それ以外の部分で宣言された変数 </li>
              <li> スーパーグローバル </li>
            </ol>

            <h3> <?php echo $count; $count++; ?>. ローカル変数</h3>
            <p>
              関数の内部で宣言された変数.
              ただし, <span class="fuchsia">global</span>キーワードを付けられた変数はglobal
              として扱われる.
              注意しなければならないのは, 関数内部で変数を使う場合だ.
              このような場合はたとえ関数外部でグローバル宣言されていても,
              関数内では直接使えない. この場合にglobalキーワードが必要になる.
              <div class="example">
                <pre>
                  &lt;?php
                    $a = 0;

                    function f() {
                      //echo $a; undefinedになる.
                      global $a;
                      echo $a; // 0.
                    }

                    f();
                  ?&gt;
                </pre>

                出力:
                <div class="center">
                  <?php
                    $a = 0;

                    function f() {
                      //echo $a; undefinedになる.
                      global $a;
                      echo $a; // 0.
                    }
                    f();
                  ?>
                </div>
              </div>
              しかし, このような場合は引数としてグローバル変数を与えるべきではないだろうか.
            </p>

            <h3> <?php echo $count; $count++; ?>. グローバル変数 </h3>
            <p>
              上記以外で利用された変数は全てグローバル変数になる.
              注意しなければならないのは, for文などで利用される変数もローカルでないことくらいか.
              <div class="example">
                <pre>
                  &lt;?php
                    $a = 0;

                    for ($a = 1; $a < 5; $a++) {}

                    echo $a; //0でない.
                  ?&gt;
                </pre>

                出力:
                <div class="center">
                  <?php
                    $a = 0;

                    for ($a = 1; $a < 5; $a++) {}

                    echo $a; //5
                  ?>
                </div>
              </div>
            </p>

            <h3> <?php echo $count; $count = 0; ?>. スーパーグローバル変数 </h3>
            <p>
              任意のスコープから利用できる変数.
              phpが機能の提供の為に利用している変数と捉えてよさそう.
              多少間違っている部分もあるかもしれないが, 最低限知っておけばよさそうな情報に以下がある.
              <ul>
                <li> $GLOBALS: 変数名からグローバル変数への参照を持つMap. </li>
                <li> $_SERVER: サーバーの情報, 環境情報を提供する変数. </li>
                <li> $_GET: get methodで送られたクエリ(URLの?以降の部分). </li>
                <li> $_POST: post methodで送られたクエリ(URLの?以降の部分). </li>
                <li> $_FILES: HTTP POSTで送られたファイル情報のMap? </li>
                <li> $_COOKIE: cookie情報の連想配列. </li>
                <li> $_SESSION: 使用できるセッション変数を含むMap. </li>
                <li> $_REQUEST: $_GET, $POST, $SESSIONをまとめたMap. </li>
                <li> $_ENV: システムの環境変数を与えるMap. </li>
              </ul>
            </p>
          </p>

          <h2>変数の代入</h2>
          <p>
            オブジェクトは参照渡し, それ以外は値渡し.
            明示的に参照で渡す場合は&amp;$varみたいに書く.
          </p>
        </section>

        <section>
          <h2> phpの型 </h2>
          <p>
            phpでは動的型付けを行う言語なのでコードを書く中で明示的に型を
            使うことはあまりなさそう.
            phpでは以下のように自動で型変換を行う.
            <div class="example">
              <pre>
                &lt;?php
                  $a = 10000;
                  $b = "2054";

                  echo $a - $b, "&lt;br&gt;";
                  echo $a.$b;
                ?&gt;
              </pre>

              出力:
              <div class="center">
                <?php
                  $a = 10000;
                  $b = "2054";

                  echo $a - $b, "<br>";
                  echo $a.$b;
                ?>
              </div>
            </div>

            変数の型と内容を出力してくれる便利な関数としてvar_dump()がある.
            echo等と同様にデバッグで使えそう.
          </p>
        </section>
      </main>

      <?php
        include($path."_inc/footer.php");
      ?>
    </div>
  </body>
</html>
