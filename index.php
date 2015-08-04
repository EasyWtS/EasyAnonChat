<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Anonymous public chat">
    <link rel="icon" href="/favicon.ico">
    <title>EasyAnonChat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/styles/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <div class="header">
        <nav>
          <div class="pull-right">
            <h4>
              <span class="label label-info">Online: <span id="online">0</span></span>
            </h4>
          </div>
        </nav>
        <h3 class="text-muted">EasyAnonChat</h3>
      </div>

      <div class="chat">
        <div id="messages">
        </div>
        <div>
        </div>
      </div>

      <div class="row info">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
      </div>

      <footer class="footer">
        <p>2015 | EasyWtS</p>
      </footer>

    </div>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="/scripts/ie10-viewport-bug-workaround.js"></script>
    <script src="/scripts/counter.js"></script>
    <script src="/scripts/chat.js"></script>
  </body>
</html>
