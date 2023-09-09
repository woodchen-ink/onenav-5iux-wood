<?php
//获取图标显示方式
$link_icon = $theme_config->link_icon;

?>

<!DOCTYPE html>
<html lang="zh-cmn-Hans">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>
        <?php echo $site['title']; ?> -
        <?php echo $site['subtitle']; ?>
    </title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>" />
    <meta name="description" content="<?php echo $site['description']; ?>" />
    <link rel="shortcut icon" href="https://cdn-img.czl.net/2023/06/20/649168ec9d6a8.ico">
    <?php
    if (empty($theme_config->shortcut_icon)) {
        ?>
        <link rel="shortcut icon" href="templates/<?php echo $template; ?>/32.png?v=1.0.1" />
    <?php } else { ?>
        <link rel="shortcut icon" href="<?php echo $theme_config->shortcut_icon; ?>" />
    <?php } ?>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <!--UC强制全屏-->
    <meta name="browsermode" content="application">
    <!--UC应用模式-->
    <meta name="x5-fullscreen" content="true">
    <!--QQ强制全屏-->
    <meta name="x5-page-mode" content="app">
    <!--QQ应用模式-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" id="font-awesome-css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" type="text/css" media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holmes.js/1.17.3/js/holmes.js"></script>
    <script src="templates/<?php echo $template; ?>/sou.js"></script>
    <link rel='stylesheet' href='templates/<?php echo $template; ?>/style.css?v=<?php echo $info->version; ?>'>
    <?php echo $site['custom_header']; ?>
    <style>
        html {
            height: 100%;
            overflow: hidden;
        }

        body {
            height: calc(100vh - 66px);
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background: #ffffff00 !important;
            overflow: auto;
        }
    </style>

</head>

<body>
    <!-- 返回顶部按钮 -->
    <div id="top"></div>
    <div class="top">
        <a href="javascript:;" title="返回顶部" onclick="gotop()"><i class="fa fa-arrow-up"></i></a>
    </div>
    <!-- 返回顶部END -->
    <script>
        $.get("index.php?c=bing", function (data, status) {
            var bg_img = 'https://cn.bing.com' + data.images[0].url;
            $("#banner_bg img").attr("src", bg_img);
            bg_html = "<style> html{background:url('" + bg_img + "') no-repeat center/cover;}</style>";
            $("body").append(bg_html);
        });
    </script>
    <!--topbar开始-->
    <style>
        .navbar-toggler svg {
            width: 24px;
            height: 24px;
        }

        .navbar-toggler .bi-list-nested {
            display: none;
        }

        .navbar-toggler.collapsed .bi-list-nested {
            display: block;
        }

        .navbar-toggler.collapsed .bi-x {
            display: none;
        }

        .navbar-toggler .bi-x {
            display: block;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="position: absolute; z-index: 10000;">
        <a class="navbar-brand logo" href="/" title="<?php echo $site['subtitle']; ?>">
            <h1>
                <?php echo $site['title']; ?>
            </h1>
        </a>
        <button class="navbar-toggler collapsed" style="border: none; outline: none;" type="button"
            data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05"
            aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="bi bi-list-nested" fill="currentColor"
                id="list-nested">
                <path fill-rule="evenodd"
                    d="M4.5 11.5A.5.5 0 015 11h10a.5.5 0 010 1H5a.5.5 0 01-.5-.5zm-2-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm-2-4A.5.5 0 011 3h10a.5.5 0 010 1H1a.5.5 0 01-.5-.5z">
                </path>
            </svg><span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" id="x">
                    <path fill-rule="evenodd"
                        d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z"></path>
                    <path fill-rule="evenodd"
                        d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z"></path>
                </svg></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav mr-auto menu">
                <!-- 遍历父级分类 -->
                <?php foreach ($category_parent as $key => $category) {
                    # code...
                    ?>
                    <li class="nav-item active nav-cat">
                        <i class='<?php echo $category['font_icon']; ?>'></i>
                        <a class="nav-link" title="<?php echo $category['description']; ?>"
                            href="/index.php?cid=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                    </li>
                <?php } ?>
                <!-- 遍历父级分类END -->
                <!-- 管理员按钮 -->
                <li class="nav-item active nav-cat">
                    <i class='fa fa-dashboard'></i>
                    <a class="nav-link" href="/index.php?c=admin" title="OneNav后台管理" target="_blank">后台管理</a>
                </li>
                <!-- 管理员按钮END -->
            </ul>
            <style>
                #he-plugin-simple {
                    z-index: 1000;
                }
            </style>
            <!-- 和风天气 -->
            <div id="he-plugin-simple"></div>
            <script>
                WIDGET = {
                    "CONFIG": {
                        "modules": "10234",
                        "background": "1",
                        "tmpColor": "FFFFFF",
                        "tmpSize": "16",
                        "cityColor": "FFFFFF",
                        "citySize": "16",
                        "aqiColor": "FFFFFF",
                        "aqiSize": "16",
                        "weatherIconSize": "24",
                        "alertIconSize": "18",
                        "padding": "10px 10px 10px 10px",
                        "shadow": "1",
                        "language": "auto",
                        "borderRadius": "16",
                        "fixed": "true",
                        "vertical": "top",
                        "horizontal": "left",
                        "right": "10",
                        "top": "20",
                        "key": "8951ba8468d74bc1a365cd22455c9687"
                    }
                }
            </script>
            <script src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0"></script>
            <!-- 天气END -->
        </div>
    </nav>
    <!--topbar结束-->
    <div class="container" style="margin-top: 100px; position: relative; z-index: 100;">
        <!--搜索开始-->
        <div id="search" class="s-search">
            <div id="search-list" class="hide-type-list">
                <div class="search-group group-a s-current" style="padding-left: 20px">
                    <ul class="search-type">
                        <li><input checked="" hidden="" type="radio" name="type" id="type-baidu"
                                value="https://www.baidu.com/s?wd=" data-placeholder="百度一下"><label
                                for="type-baidu"><span style="color:#2100E0">百度</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-google"
                                value="https://www.google.com/search?hl=zh-CN&q=" data-placeholder="谷歌搜索"><label
                                for="type-google"><span style="color:#3B83FA">G</span><span
                                    style="color:#F3442C">o</span><span style="color:#FFC300">o</span><span
                                    style="color:#4696F8">g</span><span style="color:#2CAB4E">l</span><span
                                    style="color:#F54231">e</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-weibo"
                                value="https://s.weibo.com/weibo?q=" data-placeholder="微博热门搜索"><label
                                for="type-weibo"><span style="color:#e91e63">微博</span></label></li>
                    </ul>
                </div>
            </div>
            <form action="https://www.baidu.com/s?wd=" method="get" target="_blank" id="super-search-fm">
                <input type="text" id="search-text" placeholder="百度一下" style="outline:0" autocomplete="off">
                <button class="submit" type="submit"><svg style="width: 20px; height: 20px; margin:7px 0; color: #29f;"
                        class="icon" aria-hidden="true">
                        <use xlink:href="#icon-sousuo"></use>
                    </svg></button>
                <ul id="word" style="display: none;"></ul>
            </form>
            <div class="set-check hidden-xs">
                <input type="checkbox" id="set-search-blank" class="bubble-3" autocomplete="off">
            </div>
        </div>

        <!-- 返回按钮 -->
        <?php if (isset($_GET['cid'])) { ?>
            <div class="close">
                <a href="/" title="点此返回首页">
                    << 返回</a>
            </div>
        <?php } ?>
        <!-- 返回按钮END -->
        <!-- 获取图标 -->
        <?php
        function rel2abs($rel, $base)
        {
            /* return if already absolute URL */
            if (parse_url($rel, PHP_URL_SCHEME) != '')
                return $rel;

            /* queries and anchors */
            if ($rel[0] == '#' || $rel[0] == '?')
                return $base . $rel;

            /* parse base URL and convert to local variables: $scheme, $host, $path */
            extract(parse_url($base));

            /* remove non-directory element from path */
            $path = preg_replace('#/[^/]*$#', '', $path);

            /* destroy path if relative url points to root */
            if ($rel[0] == '/')
                $path = '';

            /* dirty absolute URL */
            $abs = "$host$path/$rel";

            /* replace '//' or '/./' or '/foo/../' with '/' */
            $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
            for ($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {
            }

            /* absolute URL is ready! */
            return $scheme . '://' . $abs;
        }

        function get_favicon($url)
        {
            // 从 URL 中提取域名
            $domain = parse_url($url, PHP_URL_HOST);
            $port = parse_url($url, PHP_URL_PORT);

            // 构造缓存文件的路径
            if ($port) { // 如果 URL 中包含端口
                $cache_file = "cache/$domain.$port.ico";
            } else { // 如果 URL 中不包含端口
                $cache_file = "cache/$domain.ico";
            }

            // 如果缓存文件存在，直接返回
            if (file_exists($cache_file)) {
                return $cache_file;
            }

            // 创建一个上下文，设置超时时间为 1 秒
            $context = stream_context_create(
                array(
                    'http' => array(
                        'timeout' => 1
                    )
                )
            );

            // 尝试从 favicon.ico 地址获取
            $favicon_url = "https://$domain/favicon.ico";
            $favicon = @file_get_contents($favicon_url, false, $context);

            // 如果获取失败，尝试解析 HTML 来查找 favicon
            if ($favicon === FALSE) {
                // 下载首页 HTML
                $html = @file_get_contents($url, false, $context);
                if ($html !== FALSE) {
                    // 创建一个 DOMDocument 对象并加载 HTML
                    $doc = new DOMDocument();
                    @$doc->loadHTML($html);

                    // 查找所有 <link> 标签
                    $links = $doc->getElementsByTagName('link');
                    foreach ($links as $link) {
                        // 检查 rel 属性是否包含 "icon"
                        if (strpos($link->getAttribute('rel'), 'icon') !== FALSE) {
                            // 获取 href 属性
                            $favicon_url = $link->getAttribute('href');

                            // 如果 href 是相对路径，那么转换为绝对路径
                            if (!preg_match('#^https?://#i', $favicon_url)) {
                                $favicon_url = rel2abs($favicon_url, $url);
                            }

                            // 尝试从 <link> 标签的 href 地址获取
                            $favicon = @file_get_contents($favicon_url, false, $context);
                            if ($favicon !== FALSE) {
                                break;
                            }
                        }
                    }
                }
            }

            // 如果仍然获取失败，返回默认图标
            if ($favicon === FALSE) {
                return 'static/images/default.png';
            }

            // 将 favicon 保存到缓存文件
            file_put_contents($cache_file, $favicon);
            return $cache_file;
        }

        ?>
        <!-- 获取图标结束 -->


        <!-- 遍历分类目录 -->
        <?php foreach ($categorys as $key => $category) {
            $fid = $category['id'];
            $links = $get_links($fid);
            ?>
            <ul class="mylist row">
                <li class="title" id="category-<?php echo $category['id']; ?>">
                    <i class='<?php echo $category['font_icon']; ?>'></i>
                    <?php echo $category['name']; ?>
                </li>

                <!-- 遍历链接 -->
                <?php 
                $cache_file = 'cache/icons.json';

                // 从文件中读取缓存数据
                if (file_exists($cache_file)) {
                    $cache = json_decode(file_get_contents($cache_file), true);
                } else {
                    $cache = array();
                }
                
                foreach ($links as $key => $link) {
                    // 根据用户的设置显示链接图标显示方式
                    if ($link_icon == "custom") {
                        $font_icon_url = $link['font_icon'];
                
                        // 如果用户选择了自定义图标，但是却没有设置图标，则用默认图标
                        if( empty($font_icon_url) ) {
                            $url = $link['url'];
                            // 检查缓存
                            if (isset($cache[$url])) {
                                $font_icon_url = $cache[$url];
                            } else {
                                // 从网络获取 favicon，并将其添加到缓存中
                                $font_icon_url = get_favicon($url);
                                $cache[$url] = $font_icon_url;
                                // 将缓存数据写回文件
                                file_put_contents($cache_file, json_encode($cache));
                            }
                        }
                    } else {
                        $font_icon_url = "/index.php?c=ico&text=".$link['title'];
                    }
                
                    // 判断是否是直连模式
                    if ($site['link_model'] === 'direct') {
                        $url = $link['url'];
                    } else {
                        $url = '/index.php?c=click&id=' . $link['id'];
                    }
                    ?>
                    <li class="col-3 col-sm-3 col-md-3 col-lg-1 link">
                        <a rel="nofollow" href="<?php echo $url; ?>" title="<?php echo $link['description']; ?>"
                            target="_blank">
                            <img src="<?php echo $font_icon_url; ?>" alt="" />
                            <span>
                                <?php echo $link['title']; ?>
                            </span>
                        </a>
                    </li>
                <?php } ?>
                <!-- 遍历链接END -->

                <!-- 更多链接 -->
                <?php
                if (!isset($_GET['cid']) && get_links_number($fid) > $link_num) {
                    ?>
                    <li class="col-3 col-sm-3 col-md-3 col-lg-1 link">
                        <a rel="nofollow" href="/index.php?cid=<?php echo $category['id']; ?>" title="点此可查看该分类下的所有链接！">
                            <img src="/index.php?c=ico&text=M" alt="" />
                            <span>查看更多</span>
                        </a>
                    </li>
                <?php } ?>
                <!-- 更多链接END -->
            </ul>
        <?php } ?>
        <!-- 遍历分类目录END -->
    </div>

    <script>
        eval(function (e, t, a, c, i, n) {
            if (i = function (e) { return (e < t ? "" : i(parseInt(e / t))) + (35 < (e %= t) ? String.fromCharCode(e + 29) : e.toString(36)) }, !"".replace(/^/, String)) {
                for (; a--;) n[i(a)] = c[a] || i(a);
                c = [function (e) { return n[e] }], i = function () { return "\\w+" }, a = 1
            }
            for (; a--;) c[a] && (e = e.replace(new RegExp("\\b" + i(a) + "\\b", "g"), c[a]));
            return e
        }('!2(){2 g(){h(),i(),j(),k()}2 h(){d.9=s()}2 i(){z a=4.8(\'A[B="7"][5="\'+p()+\'"]\');a&&(a.9=!0,l(a))}2 j(){v(u())}2 k(){w(t())}2 l(a){P(z b=0;b<e.O;b++)e[b].I.1c("s-M");a.F.F.F.I.V("s-M")}2 m(a,b){E.H.S("L"+a,b)}2 n(a){6 E.H.Y("L"+a)}2 o(a){f=a.3,v(u()),w(a.3.5),m("7",a.3.5),c.K(),l(a.3)}2 p(){z b=n("7");6 b||a[0].5}2 q(a){m("J",a.3.9?1:-1),x(a.3.9)}2 r(a){6 a.11(),""==c.5?(c.K(),!1):(w(t()+c.5),x(s()),s()?E.U(b.G,+T X):13.Z=b.G,10 0)}2 s(){z a=n("J");6 a?1==a:!0}2 t(){6 4.8(\'A[B="7"]:9\').5}2 u(){6 4.8(\'A[B="7"]:9\').W("14-N")}2 v(a){c.1e("N",a)}2 w(a){b.G=a}2 x(a){a?b.3="1a":b.16("3")}z y,a=4.R(\'A[B="7"]\'),b=4.8("#18-C-19"),c=4.8("#C-12"),d=4.8("#17-C-15"),e=4.R(".C-1b"),f=a[0];P(g(),y=0;y<a.O;y++)a[y].D("Q",o);d.D("Q",q),b.D("1d",r)}();', 62, 77, "||function|target|document|value|return|type|querySelector|checked||||||||||||||||||||||||||var|input|name|search|addEventListener|window|parentNode|action|localStorage|classList|newWindow|focus|superSearch|current|placeholder|length|for|change|querySelectorAll|setItem|new|open|add|getAttribute|Date|getItem|href|void|preventDefault|text|location|data|blank|removeAttribute|set|super|fm|_blank|group|remove|submit|setAttribute".split("|"), 0, {}));
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>