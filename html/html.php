<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php
      $path = "../";
      include($path."_inc/meta.php");
    ?>
    <title>Tiger Study Report:HTMLの全体像と構成要素・その使い方</title>
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
        <section>
          <h2>html</h2>
          <p>
            以下にhtmlタグのひな形を載せておく.
            それぞれの意味・用途をまとめていく.
            <div class="example">
              <pre><code>
              &lt;!DOCTYPE html&gt;
                &lt;html lang=&quot;en&quot; dir=&quot;ltr&quot;&gt;
                  &lt;head&gt;
                    ここに何か書くよ
                  &lt;/head&gt;
                  &lt;body&gt;
                    ここに何か書くよ
                  &lt;/body&gt;
              &lt;/html&gt;
              </code></pre>
            </div>
          </p>
        </section>

        <section>
          <h3> <code>&lt;!DOCTYPE html&gt;</code> </h3>
          <p>
            これはソースコードがHTML, XHTMLで記述されていることを示す為に文書の先頭に記述する. <br>
            HTMLのバージョン・DTD(Document Type Definition)等指定できるらしいが,
            私は初学者で特に必要性を感じていないため, 利用する機会があり学んだ場合はまとめようと思う.
            このまま記述するとHTML5の使用で解釈されることになる.
          </p>
        </section>

        <section>
          <h3>htmlタグ</h3>
          <p>
             html文書の開始・終了を示すタグ.
             <code>&lt;!DOCTYPE html&gt;</code>以外は全てこのタグの中に記述されているはず. <br>
            <code>&lt;head&gt; &lt;/head&gt;</code> <code>&lt;body&gt; &lt;/body&gt;</code>
            の二つを配置する. <br>
            特にここで指定するものとして言語や方向がある.
            上記の例で&lt;html lang=&quot;en&quot; dir=&quot;ltr&quot;&gt;となっている部分だ.
            これらが何を意味するかというと,
            <ul style="list-style: none;">
              <li>lang=en: ページ内の言語が英語だという意味. 日本語ならja.</li>
              <li>dir=ltr: 読む方向が左(Left)から(To)右(Right)という意味. アラビア語等ならrtlになるだろう.</li>
            </ul>
            そんなに難しいことはない.
          </p>
        </section>

        <section>
          <h3>headタグ</h3>
          <p>
            このタグの中では
            メタデータ(コンピュータが読む為のデータ)が格納される.
            例えば, タイトル, スタイルシート(cssの情報), script情報, 外部ソースとの関係,
            文書内のリンクのルート等.
            詳しくは <a href="<?php echo $path; ?>html/head.php">ここに</a>. <br>
            <code>&lt;head&gt;</code> は省略できるが, HTML5対応ブラウザでは自動的に生成されるらしい.
            (<a href="https://developer.mozilla.org/ja/docs/Web/HTML/Element/head">参照</a>)
          </p>

          <h3>bodyタグ</h3>
          <p>
            このタグの中にメインとなるコンテンツを記述する.
            大量になってしまうので詳しくは<a href="<?php echo $path; ?>html/body.php">ここに</a>.
          </p>
        </section>
      </main>

      <?php
        include($path."_inc/footer.php");
      ?>
    </div>
  </body>
</html>
