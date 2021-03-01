<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php
      $path = "../";
      include($path."_inc/meta.php");
    ?>
    <title>Tiger Study Report: そもそもPHPとは・何に使われているのか</title>
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
        <h1>そもそもPHPって何？</h1>
        <section>
          <h2>phpとは</h2>
          <p>
            <a href="https://ja.wikipedia.org/wiki/PHP_(%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0%E8%A8%80%E8%AA%9E)">
              wikipedia
            </a>によると
            <blockquote cite="https://ja.wikipedia.org/wiki/PHP_(%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0%E8%A8%80%E8%AA%9E)">
              PHP（ピー・エイチ・ピー）は "The PHP Group" によって
              コミュニティベースで開発されているオープンソースの汎用プログラミング言語および
              その公式の処理系であり、
              特にサーバーサイドで動的なウェブページを作成するための機能を多く備えていることを特徴とする。
              名称の PHP は再帰的頭字語として、 "PHP: Hypertext Preprocessor" を意味するとされており、
              「PHPはHTMLのプリプロセッサである」とPHP自身を再帰的に説明している。
            </blockquote>
            とある.
            phpの由来についてはいまいちよくわからないが,
            サーバーで動的にwebページを生成する為に使える機能が多くあるということだ.
          </p>
        </section>

        <section>
          <h3>サーバーサイドとクライアントサイド</h3>
          <p>
            上記の中で <span class="red">サーバーサイド</span> という言葉が出てきたが,
            これは何を意味するのだろうか. この説明にはwebページの動作を簡単に説明する必要がある. <br>
            <div class="center">
              <img src="<?php echo $path; ?>img/serverAndClient.png" alt="サーバーとクライアント">
            </div>
            普段ページを表示する際には上記のように通信がされている
            (厳密にリクエストを送っているのはブラウザかもしれないが).
            ユーザーがページを読み込もうとすると, サーバーはリクエストされたページを返す. <br>
            このとき, HTMLのみの場合は返されたもの(~.html)をブラウザが読み込んで
            ブラウザ側で表示する.
            つまりサーバー側で動かすプログラムがない場合,
            ページを表示しているのはブラウザだから,
            サーバーはリクエストに対してファイルを返すことしかしない.<br>
            一方で, サーバー側にphp, Node.jsなどで書かれたプログラムがあると,
            サーバーはプログラムに沿ってhtmlファイルを生成し, それをユーザーに返す.
            これの何が嬉しいかというと, ファイルを共通化してメンテナンス性を上げたり,
            似たような処理をまとめて書けたり,
            サーバーのデータベースを利用した処理を行うことができることだろう.
            これらはhtml単体では絶対にできない.
          </p>
        </section>

        <section>
          <h3>phpとjavascriptの違い</h3>
          <p>
            昨今ではjavascriptでもサーバーサイドの処理を扱うことができるようだが,
            ここでは一旦それらは忘れて, 元々の特徴について考える.
            上記の図で言うと, サーバーサイドで動くのがphp,
            クライアントサイドで動くのがjvascriptである. <br>
            phpでは先に挙げたようにデータベースを利用したり, 一般的な計算ができる一方で,
            webサイトをブラウザ側で動的に動かすといった処理はできない. <br>
            javascriptはwebサイトをブラウザ側で動かすことができる一方,
            サーバーのデータが必要になるような処理はできない(方法はあるが, 元々はできない). <br>
            phpはサーバーに動作環境があればユーザーに関係なく動作する.
            一方javascriptは,
            ブラウザでjavascriptを無効化している等, ユーザーの環境によって動作しない場合がある
            ことは忘れてはならないだろう.
            それぞれ得意なことが違うのでどちらでもできる処理だったとしても
            適切な方を選択して使えるようにしたい.
          </p>
        </section>
      </main>

      <?php
        include($path."_inc/footer.php");
      ?>
    </div>
  </body>
</html>
