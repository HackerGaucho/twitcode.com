<!DOCTYPE html>
<!---
HERE BE DRAGONS!

                                                  .~))>>
                                                 .~)>>
                                               .~))))>>>
                                             .~))>>             ___
                                           .~))>>)))>>      .-~))>>
                                         .~)))))>>       .-~))>>)>
                                       .~)))>>))))>>  .-~)>>)>
                   )                 .~))>>))))>>  .-~)))))>>)>
                ( )@@*)             //)>))))))  .-~))))>>)>
              ).@(@@               //))>>))) .-~))>>)))))>>)>
            (( @.@).              //))))) .-~)>>)))))>>)>
          ))  )@@*.@@ )          //)>))) //))))))>>))))>>)>
       ((  ((@@@.@@             |/))))) //)))))>>)))>>)>
      )) @@*. )@@ )   (\_(\-\b  |))>)) //)))>>)))))))>>)>
    (( @@@(.@(@ .    _/`-`  ~|b |>))) //)>>)))))))>>)>
     )* @@@ )@*     (@)  (@) /\b|))) //))))))>>))))>>
   (( @. )@( @ .   _/  /    /  \b)) //))>>)))))>>>_._
    )@@ (@@*)@@.  (6///6)- / ^  \b)//))))))>>)))>>   ~~-.
 ( @jgs@@. @@@.*@_ VvvvvV//  ^  \b/)>>))))>>      _.     `bb
  ((@@ @@@*.(@@ . - | o |' \ (  ^   \b)))>>        .'       b`,
   ((@@).*@@ )@ )   \^^^/  ((   ^  ~)_        \  /           b `,
     (@@. (@@ ).     `-'   (((   ^    `\ \ \ \ \|             b  `.
       (*.@*              / ((((        \| | |  \       .       b `.
                         / / (((((  \    \ /  _.-~\     Y,      b  ;
                        / / / (((((( \    \.-~   _.`" _.-~`,    b  ;
                       /   /   `(((((()    )    (((((~      `,  b  ;
                     _/  _/      `"""/   /'                  ; b   ;
                 _.-~_.-~           /  /'                _.'~bb _.'
               ((((~~              / /'              _.'~bb.--~
                                  ((((          __.-~bb.-~
                                              .'  b .~~
                                              :bb ,' 
                                              ~~~~
--->
<head>
  <meta charset="utf-8">
  <title><?php print htmlentities($title);?>
  </title>
  <?php
    asset([
        'css/style.css',
        'js/jquery-3.6.0.min.js',
        'js/jquery.pjax.min.js',
        'js/loadingoverlay.min.js',
        'js/script.js'
    ]);
  ?>
</head>
<body>
  <header>
    <section>
      <?php
  print '<h1><a href="/">'.e(SITE_NAME, false).'</a></h1>';
  ?>
    </section>
    <section>
      <?php
    view("form/search");
  ?>
    </section>
    <?php
  if (isset($isAuth) and $isAuth) {
      print '<section><b>';
      print $isAuth['name'];
      print '</b> &bull; ';
      $href=SITE_URL."/logout?tokenExpiration=".$isAuth['token_expiration'];
      print '<a href="'.$href.'">'.__('Sair', false).'</a></section>';
  }
  ?>
  </header>
