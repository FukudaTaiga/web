<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php
      $path = "../";
      include($path."_inc/meta.php");
    ?>
    <title>Tiger Study Report: HTMLのbodyに含まれるタグとその使い方</title>
  </head>
  <body>
    <div class="wrap">
      <?php
      include($path."_inc/header.php");
      ?>

      <?php
      include($path."_inc/sidenavi.php");
      ?>

      <main>
        <h1>HTMLのbody</h1>

        <section>
          <h2>bodyタグ</h2>
          <p>
            このタグの中でwebページとして表示されるメインの部分を記述する.
            特に何かの要素を含まなければいけない・含んではいけないといった制限はない.
            そのため, 私が利用したことのあるもので必要なものをまとめていくことにする.
            有用なものはどんどん追記していく.
            各要素内には配置できるタグのルールがあり,
            <span style="color: red;"> コンテンツモデル </span>と
            <span style="color: red;"> カテゴリ </span>によって規定されている.
            これに関しては<a href="<?php echo $path; ?>html/modelcategory.php"> 後々 </a>追記しおく.
          </p>
        </section>

        <section>
          <h3>本題に入る前に</h3>
          <p>
            最初に <span class="red">div</span>, <span class="red">span</span>という二つのタグについて説明する.
            これらのタグはそれ単体では<em>意味を持たない</em>. <br>
            では, なぜこれらのタグを利用するのか.
            これらのタグはclass, id, style等のグローバル属性と共に使うことで真価を発揮するのだ. <br>
            文書の構成で「この部分のレイアウトをまとめて扱いたいなあ」,「この文字だけ色を変えたいなあ」など
            の構想が生まれてくることは容易に想像できるだろう. <br>
            ノートにペンで書くとき, 「ここに題名かいて～, 右側には余白を作って計算エリアにしようかな」とか
            「この用語は大事っぽいから赤にしとこう」と考えるのと同じだ. <br>
            そのような要望をhtmlで実現する場合にdiv, spanが活躍するのだ.
            divは <span class="red">block要素</span> であり,
            spanは <span class="red">inline要素</span>という違いがある.
            つまり,
            <ul style="list-style: none;">
              <li>文章のかたまり(段落など)をひとまとまりで扱いたい &#8658; divタグ</li>
              <li>文章中の一部(単語など)をひとまとまりで扱いたい &#8658; spanタグ</li>
            </ul>
            と使い分ければよい.

            <div class="example">
              divの例:
              <pre><code>
                &lt;div style=&quot;
                  background-color: black;
                  color: white;
                &quot;&gt;
                 divで囲まれたblock. &lt;br&gt;
                 ここに書いた内容がまとめて一つのもののように扱われる. &lt;br&gt;
                 aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.
                &lt;/div&gt;
              </code></pre>

              表示:
              <div style="
                background-color: black;
                color: white;
              ">
                divで囲まれたblock. <br>
                ここに書いた内容がまとめて一つのもののように扱われる. <br>
                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.
              </div>

              <br>

              spanの例:
              <pre><code>
                &lt;span style=&quot;background-color: black;color: white;&quot;&gt;spanで囲まれた文字&lt;/span&gt;ここは囲まれてない.
              </code></pre>

              表示:
              <span style="background-color: black;color: white;">spanで囲まれた文字</span>ここは囲まれてない.
            </div>
          </p>
        </section>

        では, 本題に入ることにする. 目的別に使い方, 例, 注意点等まとめていく.

        <section id="grouping">
          <h3>構造を表すタグ</h3>
          <p>
            以下のタグで構造を表すことができる.
            ただし, これは直接本文の構造になるかというとそうでもないかもしれない.
            もう少し調べる.
            <ul>
              <li> header </li>
              <li> main </li>
              <li> footer </li>
            </ul>

            <h4> header </h4>
            <p>
              ヘッダーを表すタグ. webページの構造としてheader(≠head部分)を表すことができるのはもちろん,
              sectionやarticleのヘッダーとしても使える.
              つまり, 1ページに一つといった決まりはない.
            </p>

            <h4> main </h4>
            <p>
              ページのメインとなるコンテンツを配置する. 一つのページに一つだけ.
              このタグで表すのはそのページに特有のコンテンツで,
              ページ全体で共有するもの(ヘッダー, フッター, ナビとか)は入れない.
            </p>

            <h4> footer </h4>
            <p>
              webページのフッターを表す. header同様, 1ページに一つといった決まりはなく,
              sectionやarticleのヘッダーとしても使える.
            </p>
          </p>
        </section>

        <section id="sectioning">
          <h3>セクションを表すタグ(区分コンテンツ)</h3>
          <p>
            以下の四つのタグがある.
            <ul>
              <li> article </li>
              <li> section </li>
              <li> aside </li>
              <li> nav </li>
            </ul>
            これらは文章のセクションを表すもので, 文章の表示自体には影響しないが, 文章構造を表す.
            HTML5より前はこれらの機能がなかったため, divタグによって同様のものを表現していた.
            <h4>article</h4>
            <p>
              ページと独立して成り立つようなコンテンツを表す. 記事のリンクとかだろうか？
            </p>

            <h4>section</h4>
            <p>
              一般的な意味でのセクションを表す. このタグの中では見出しをつけるべきとされている.
            </p>

            <h4>aside</h4>
            <p>
              ページとの関連が薄い副次的な内容を表す.
            </p>

            <h4>nav</h4>
            <p>
              ナビゲーションを表す. サイト全体のリンクをまとめたり, 用途ごとに飛べるようにしたり.
            </p>

            これらのセクションに関して, 可能な限り
            <a href="#heading">見出し</a>をつけることが推奨されている.
            ただし, aside, navは見出しに意味がない場合もあるので無理につける必要は無いとのこと.
          </p>
        </section>

        <section id="heading">
          <h3>見出しを表すタグ</h3>
          <p>
            これには以下のタグがある.
            <ul>
              <li>h1</li>
              <li>h2</li>
              <li>h3</li>
              <li>h4</li>
              <li>h5</li>
              <li>h6</li>
            </ul>
            hの後ろについてる数字が小さい程大きな見出しだ.
            hタグを利用するということは暗黙の内にsectionを作ることに相当する.
          </p>
          <div class="example">
            <h1>h1タグだよ</h1>
            <br>
            <h2>h2タグだよ</h2>
            <br>
            <h3>h3タグだよ</h3>
            <br>
            <h4>h4タグだよ</h4>
            <br>
            <h5>h5タグだよ</h5>
            <br>
            <h6>h6タグだよ</h6>
          </div>
          これらのタグはある意味当然だが, 構造的に1, 2, ～, 6と順番に使われるべきである.
          単に文字の大きさを変えたいだけならcssのfont-sizeプロパティで制御する.
        </section>

        <section id="paragraph">
          <h3>パラグラフを表すタグ</h3>
          <p>
            pによって段落を表す.
          </p>
        </section>

        <section id="Emphasis">
          <h3>強調を表すタグ</h3>
          強調するためのタグには以下がある.
          <ul>
            <li> strong </li>
            <li> em </li>
            <li> mark </li>
            <li> b </li>
          </ul>
        </section>
      </main>

      <?php
      include($path."_inc/footer.php");
      ?>
    </div>
  </body>
</html>
