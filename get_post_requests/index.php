<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/active_section.php">
    <link rel="icon" href="img/logo_100x100.png">
    <title>Home - Topaz Group</title>
</head>

<!-- Get active section and content of the input form. -->
<?php
    $active_section = $_GET["section"];
    $input_str = $_GET["input"];
    include "php/script.php"; // filter function
?>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__content">
                <div class="header__menu menu">
                    <nav class="menu__body">
                        <ul class="menu__list">
                        <!-- A certain section will be highlighted depending on the $active_section value from GET request. -->
                            <li><a href="index.php?section=home" class="menu__link <?php if ($active_section == "home") echo "menu__active"?>">Home</a></li>
                            <li><a href="index.php?section=works" class="menu__link <?php if ($active_section == "works") echo "menu__active"?>">Works</a></li>
                            <li><a href="index.php?section=news" class="menu__link <?php if ($active_section == "news") echo "menu__active"?>">News</a></li>
                            <li><a href="index.php?section=contact" class="menu__link <?php if ($active_section == "contact") echo "menu__active"?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main class="page">
            <div class="page__container _container">
                <form action="" method="get" class="page__form form">
                    <input type="text" name="section" value="<?= htmlentities($_GET['section'],ENT_QUOTES); ?>" class="display-none"> 
                    <input type="text" placeholder="Your crazy input..." name="input" value="<?= htmlentities($_GET['input'],ENT_QUOTES); ?>" class="form__input">
                    <input type="submit" value="Enter" class="form__submit">
                </form>
                <!-- Render tables only if input form contains something. -->
                <?php if (isset($input_str)): ?>
                    <!-- Parse input form content, filter values and sort them lexicographically. -->
                    <?php 
                        $input_list = preg_split("/,\s*/", $input_str, 0, PREG_SPLIT_NO_EMPTY);
                        $filtered_list = filter($input_list);
                        sort($filtered_list, SORT_STRING);
                    ?>
                    <div class="output__container _container">
                        <table class="table">
                            <tr class="table__row">
                                <th class="table__header">Input</th>
                            </tr>
                            <!-- Place each input value in it's table row. -->
                            <?php foreach ($input_list as $input_value): ?>
                                <tr class="table__row">
                                    <td class="table__data"><?php echo $input_value ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <table class="table">
                            <tr class="table__row">
                                <th class="table__header">Output</th>
                            </tr>
                            <!-- Place each filtered value in it's table row. -->
                            <?php foreach ($filtered_list as $filtered_value): ?>
                                <tr class="table__row">
                                    <td class="table__data"><?php echo $filtered_value ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </main>
        <footer class="footer">
            <div class="footer__content _content">
                <div class="footer__social social">
                    <a href="" class="social__item icon-youtube"></a>
                    <a href="" class="social__item icon-telegram"></a>
                    <a href="" class="social__item icon-instagram"></a>
                </div>
                <div class="footer__copyright">Copyright ©2021 All rights reserved</div>
            </div>
        </footer>
    </div>
</body>
</html> 