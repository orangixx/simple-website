<?php
$cookieName = "access_token";
if (!isset($_COOKIE[$cookieName])) {
  header("Location: /account/sign-in/");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>My Account - Savi</title>

  <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.bcow.tk/favicons/savi/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.bcow.tk/favicons/savi/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.bcow.tk/favicons/savi/favicon-16x16.png">
  <link rel="manifest" href="https://cdn.bcow.tk/favicons/savi/site.webmanifest">

  <meta charset=UTF-8>
  <meta content="width=device-width,initial-scale=1" name=viewport>

  <link href="https://cdn.bcow.tk/css/material/md-card-vert.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/material-components-web@6.0.0/dist/material-components-web.min.css" rel="stylesheet" integrity="sha384-A/sGlEeOt+WfGT0Swvzn8fRYcFBytM8stinssAIoqO2XRIsJtWQUe/wBMvptkHjr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Material+Icons&display=swap" rel="stylesheet">
  <link href="index.css" rel="stylesheet">

  <meta content=#5e35b1 name=theme-color>
</head>

<body>
  <?php
  $accessToken = $_COOKIE[$cookieName];

  $userData = 'https://discord.com/api/users/@me';

  $user_context_options = array(
    'http' => array(
      'method' => 'GET',
      'header' => 'Authorization: Bearer ' . $accessToken
    )
  );

  $userContext = stream_context_create($user_context_options);
  $userRes = file_get_contents($userData, false, $userContext);

  $userResponse = json_decode($userRes, true);

  $userID = $userResponse["id"];

  $avatarHash = $userResponse["avatar"];
  $username = $userResponse["username"];
  $avatarURL = "https://cdn.discordapp.com/avatars/" . $userID . '/' . $avatarHash . ".png";

  ?>
  <header class="mdc-top-app-bar mdc-top-app-bar--fixed mdc-theme--primary" style="height: 5.5em;">
    <div class="mdc-top-app-bar__row">
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <a href="/">
          <span class="mdc-top-app-bar__title"><img src="https://cdn.bcow.tk/logos/savi-box-transparent.svg" width="72px" style="margin-top: 1.25em;"></span>
        </a>
      </section>
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar" style="margin-top: 1.4em;">
        <button class="material-icons mdc-top-app-bar__action-item mdc-icon-button" aria-label="sign out" onclick="signOut()">exit_to_app</button>
        <a href="/account/" class="mdc-top-app-bar__action-item" aria-label="account"><?php echo ('<img src="' . $avatarURL . '" width="42px" style="border-radius:100%;">'); ?></a>
      </section>
    </div>
  </header>

  <br><br><br><br><br>

  <h1 style="text-align: center;">Hey,
    <?php
    echo ($username);
    ?>!
  </h1>

  <div class="container">
    <section class="md-ui component-card" data-material-ui-component="card">
      <figure class="md-ui card-figure">
        <figcaption class="figure-caption">
          <h1 class="caption-title">Balance</h1>
          <h2 class="caption-subtitle balance">300G</h2>
        </figcaption>
      </figure>
    </section>
    <section class="md-ui component-card" data-material-ui-component="card">
      <figure class="md-ui card-figure">
        <figcaption class="figure-caption">
          <h1 class="caption-title">Recent Transactions</h1>
          <h2 class="caption-subtitle" style="font-size: 18px;">15G - PC Express<br>100G - SMPL Drop Box Yukon</h2>
        </figcaption>
      </figure>
    </section>
    <section class="md-ui component-card" data-material-ui-component="card">
      <figure class="md-ui card-figure">
        <figcaption class="figure-caption">
          <h1 class="caption-title">Send</h1>
          <h2 class="caption-subtitle">
            <div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField" style="width: 100%;">
              <input type="text" class="mdc-text-field__input" style="width: 100%;">
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="to" class="mdc-floating-label">To</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
            <br><br>
            <div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField" style="width: 100%;">
              <input type="text" class="mdc-text-field__input" style="width: 100%;">
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="to" class="mdc-floating-label">Amount</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
            <br><br>
            <button class="mdc-button mdc-button--raised" id="search" data-mdc-auto-init="MDCRipple" onclick="onSearch()">
              <span class="mdc-button__label">SEND</span>
            </button>
          </h2>
        </figcaption>
      </figure>
    </section>
    <section class="md-ui component-card" data-material-ui-component="card">
      <figure class="md-ui card-figure">
        <figcaption class="figure-caption">
          <h1 class="caption-title">Request</h1>
          <h2 class="caption-subtitle">
            <div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField" style="width: 100%;">
              <input type="text" class="mdc-text-field__input" style="width: 100%;">
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="to" class="mdc-floating-label">To</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
            <br><br>
            <div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField" style="width: 100%;">
              <input type="text" class="mdc-text-field__input" style="width: 100%;">
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="to" class="mdc-floating-label">Amount</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
            <br><br>
            <button class="mdc-button mdc-button--raised" id="search" data-mdc-auto-init="MDCRipple" onclick="onSearch()">
              <span class="mdc-button__label">REQUEST</span>
            </button>
          </h2>
        </figcaption>
      </figure>
    </section>
  </div>

  <br><br>

  <footer>
    <div class="footer">
      <p>Copyright © 2020 Savi</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/material-components-web@6.0.0/dist/material-components-web.min.js" integrity="sha384-cBdOLhkb7tUoRLp2RB5N844j6kWBYhDIaLerMreSO5jT721tVAfxCpUM7/n1Qq7l" crossorigin="anonymous"></script>
  <script>
    mdc.autoInit();
    function signOut() {
      document.cookie = "access_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      window.location = "/account/sign-in/"
    }
  </script>
</body>

</html>