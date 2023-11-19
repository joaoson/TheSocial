<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="writePostStyle.css">
    <title>Document</title>
</head>
<body>
<main>
        <section id="feed">
            <h2>Main Posts</h2>
            <div class="results">
                <form action="writePost_php.php" id="writeForm" method="post">
                    <div class='textarea'>
                        <label for="content">Write your content here: </label>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>
                        <button type="submit">Post</button>
                    </div>
                </form>
            </div>
        </section>
</main>
</body>
</html>