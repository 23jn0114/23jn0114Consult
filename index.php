<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>株式会社Jecコンサルティング</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?consulting') no-repeat center center;
            background-size: cover;
            color: black;
            padding: 100px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3em;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.2em;
        }
        .services, .contact {
            padding: 50px 0;
        }
        footer {
            background: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">株式会社Jecコンサルティング</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">サービス</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">お問い合わせ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="hero">
        <div class="container">
            <h1>株式会社Jecコンサルティング</h1>
            <p>あなたのビジネスを次のレベルへ</p>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">サービス1</h5>
                            <p class="card-text">ビジネス戦略とコンサルティング</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">サービス2</h5>
                            <p class="card-text">マーケティングとブランディング</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">サービス3</h5>
                            <p class="card-text">ITソリューションとサポート</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>お問い合わせ</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // フォームからのデータを取得
                $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
                $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
                $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
                $timestamp = date("Y-m-d H:i:s");

                // CSVファイルのパス
                $file = 'contacts.csv';

                // CSVファイルが存在しない場合、ヘッダー行を追加
                if (!file_exists($file)) {
                    $header = ['名前', 'メールアドレス', 'メッセージ', '送信日時'];
                    $fp = fopen($file, 'w');
                    fputcsv($fp, $header);
                } else {
                    $fp = fopen($file, 'a');
                }

                // データをCSVファイルに追加
                $data = [$name, $email, $message, $timestamp];
                fputcsv($fp, $data);

                // ファイルを閉じる
                fclose($fp);

                // ユーザーに成功メッセージを表示
                echo "<div class='alert alert-success'>お問い合わせ内容を送信しました。</div>";
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="お名前" required>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレス" required>
                </div>
                <div class="form-group">
                    <label for="message">メッセージ</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="メッセージ" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">送信</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2025 株式会社Jecコンサルティング. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>