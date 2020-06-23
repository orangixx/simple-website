<!DOCTYPE html>
<html>

<head>
  <title>Sign in - Savi</title>

  <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.bcow.tk/favicons/savi/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.bcow.tk/favicons/savi/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.bcow.tk/favicons/savi/favicon-16x16.png">
  <link rel="manifest" href="https://cdn.bcow.tk/favicons/savi/site.webmanifest">

  <meta charset=UTF-8>
  <meta content="width=device-width,initial-scale=1" name=viewport>

  <link href="https://cdn.jsdelivr.net/npm/material-components-web@6.0.0/dist/material-components-web.min.css" rel="stylesheet" integrity="sha384-A/sGlEeOt+WfGT0Swvzn8fRYcFBytM8stinssAIoqO2XRIsJtWQUe/wBMvptkHjr" crossorigin="anonymous">
  <link href="index.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Material+Icons&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

  <meta content=#5e35b1 name=theme-color>
</head>

<body>
  <header class="mdc-top-app-bar mdc-top-app-bar--fixed mdc-theme--primary" style="height: 5.5em;">
    <div class="mdc-top-app-bar__row">
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <a href="/">
          <span class="mdc-top-app-bar__title"><img src="https://cdn.bcow.tk/logos/savi-box-transparent.svg" width="72px" style="margin-top: 1.25em;"></span>
        </a>
      </section>
    </div>
  </header>

  <br><br><br><br><br><br>

  <h1>Sign in</h1>

  <br>

  <div class="sec1">
    <div class="innerDiv1">
      <h1>
        <a href="https://discord.com/api/oauth2/authorize?client_id=724678546059952228&redirect_uri=https://savi.ogxn.xyz/account/sign-in/complete/&response_type=code&scope=identify">
          <button class="mdc-button mdc-button--raised" id="search" data-mdc-auto-init="MDCRipple">
            <img src="https://cdn.bcow.tk/logos/Discord-Logo-White.svg" class="mdc-icon-button__icon" width="28px" style="margin-right: 10px;" />
            <span class="mdc-button__label">SIGN IN WITH DISCORD</span>
          </button>
        </a>
      </h1>
    </div>
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
  </script>
</body>

</html>