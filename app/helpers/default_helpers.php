<?php


function _l($word)
{

    $files = scandir('app/language/' . ($_COOKIE['lang'] ? $_COOKIE['lang'] : DEFAULT_LANG));

    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;
        require 'app/language/' . ($_COOKIE['lang'] ? $_COOKIE['lang'] : DEFAULT_LANG) . '/' . $file;
    }

    return $lang[$word] ?? $word;
}

function languages()
{

    $files = scandir('app/language/');
    $html = "<div class='div_languages'><select class='languages'>";

    foreach ($files as $k => $file) {
        if ($file == '.' || $file == '..') continue;

        $lang = $file;
        $name = mb_strtoupper($file);

        if ($lang == ($_COOKIE['lang'] ? $_COOKIE['lang'] : DEFAULT_LANG)) {
            $html .= "<option selected value='" . $lang . "'>" . $name . "</option>";
        } else $html .= "<option value='" . $lang . "'>" . $name . "</option>";
    }
    $html .= "</select></div>
                <script>          
                    $('.languages').on('input', function () {
                        $.post({
                            url: 'system/core/lang.php',
                            data: {lang:$(this).val()}
                        }).done(function () {
                            window.location.href = window.location.href;
                        });
                    });
                </script>

                ";
    return $html;
}

function block_success()
{
    $html = "";

    if (isset($_COOKIE['success'])) {

        $html .= "<div class=\"success\">" . $_COOKIE['success'] . "</div>";
        setcookie('success', '0', time() - 30, '/');
    }
    $html .= "<style>
                .success{
                    padding: 5px;
                    background: green;
                    color: #fff;
                    text-align: center;
                }
               </style>";

    return $html;
}

function block_error()
{
    $html = "";

    if (isset($_COOKIE['error'])) {
        $html .= "<div class=\"error\"> " . $_COOKIE['error'] . "</div>";
        setcookie('error', '0', time() - 30, '/');
    }
    $html .= "<style>
                .error{
                    padding: 5px;
                    background: red;
                    color: #fff;
                    text-align: center;
                }
              </style>";

    return $html;
}

function js(){
    $js = scandir('assets/js');
    foreach ($js as $key => $val){
        if ($val == '.' || $val == '..') unset($js[$key]);
        else echo "<script src='assets/js/".$val."'></script>";
    }
}

function css(){
    $css = scandir('assets/css');
    foreach ($css as $key => $val){
        if ($val == '.' || $val == '..') unset($css[$key]);
        else echo "<link rel=\"stylesheet\" href='assets/css/".$val."'></script>";
    }
}

