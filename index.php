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
                        <!-- CZLExpress -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-czl"
                                value="https://exp.czl.net/track/?query=" data-placeholder="CZLExpress 国际快递查询">
                            <label for="type-czl"><span style="color:#2ea7e0">CZLExpress</span></label>
                        </li>
                        <!-- DHL -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-dhl"
                                value="https://www.dhl.com/cn-zh/home/tracking.html?submit=1&tracking-id=" data-placeholder="DHL国际快递查询">
                            <label for="type-dhl"><span style="color:#ffff00">DHL</span></label>
                        </li>
                        <!-- UPS -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-ups"
                                value="https://www.ups.com/track?loc=zh_CN&requester=QUIC&tracknum=" data-placeholder="UPS国际快递查询">
                            <label for="type-ups"><span style="color:#a52a2a">UPS</span></label>
                        </li>
                        <!-- FEDEX -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-fedex"
                                value="https://www.fedex.com/fedextrack/?trknbr=" data-placeholder="FEDEX国际快递查询">
                            <label for="type-fedex"><span style="color:#800080">FEDEX</span></label>
                        </li>
                        <!-- 百度 -->
                        <li>
                            <input checked="" hidden="" type="radio" name="type" id="type-baidu"
                                value="https://www.baidu.com/s?wd=" data-placeholder="百度一下">
                            <label for="type-baidu"><span style="color:#2100E0">百度</span></label>
                        </li>

                        <!-- 谷歌 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-google"
                                value="https://www.google.com/search?hl=zh-CN&q=" data-placeholder="谷歌搜索">
                            <label for="type-google">
                                <span style="color:#3B83FA">G</span>
                                <span style="color:#F3442C">o</span>
                                <span style="color:#FFC300">o</span>
                                <span style="color:#4696F8">g</span>
                                <span style="color:#2CAB4E">l</span>
                                <span style="color:#F54231">e</span>
                            </label>
                        </li>

                        <!-- 微博 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-weibo"
                                value="https://s.weibo.com/weibo?q=" data-placeholder="微博热门搜索">
                            <label for="type-weibo"><span style="color:#e91e63">微博</span></label>
                        </li>

                        <!-- 必应 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-bing"
                                value="https://www.bing.com/search?q=" data-placeholder="必应搜索">
                            <label for="type-bing"><span style="color:#1a0dab">Bing</span></label>
                        </li>

                        <!-- 知乎 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-zhihu"
                                value="https://www.zhihu.com/search?type=content&q=" data-placeholder="知乎搜索">
                            <label for="type-zhihu"><span style="color:#0084ff">知乎</span></label>
                        </li>
                        <!-- 京东 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-jd"
                                value="https://search.jd.com/Search?keyword=" data-placeholder="京东搜索">
                            <label for="type-jd"><span style="color:#e33333">京东</span></label>
                        </li>

                        <!-- 淘宝 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-taobao"
                                value="https://s.taobao.com/search?q=" data-placeholder="淘宝搜索">
                            <label for="type-taobao"><span style="color:#ff4400">淘宝</span></label>
                        </li>

                        <!-- 亚马逊 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-amazon"
                                value="https://www.amazon.cn/s?k=" data-placeholder="亚马逊搜索">
                            <label for="type-amazon"><span style="color:#146eb4">亚马逊</span></label>
                        </li>

                        <!-- 豆瓣 -->
                        <li>
                            <input hidden="" type="radio" name="type" id="type-douban"
                                value="https://www.douban.com/search?source=suggest&q=" data-placeholder="豆瓣搜索">
                            <label for="type-douban"><span style="color:#007722">豆瓣</span></label>
                        </li>


                    </ul>

                </div>
            </div>
            <form action="" method="get" target="_blank" id="super-search-fm">
                <input type="text" id="search-text" placeholder="百度一下" style="outline:0" autocomplete="off">
                <style>
                    .submit {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: absolute;
                        top: 0;
                        right: 0;
                        background: none;
                        border: 0;
                        border-radius: 20px;
                        width: 60px;
                        height: 36px;
                        margin: 7px 0 0;
                        line-height: 36px;
                        border-radius: 3px;
                        outline: none;
                    }
                </style>
                <button class="submit" type="submit">
                    <!-- <svg style="margin:auto" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 38C30.3888 38 38 30.3888 38 21C38 11.6112 30.3888 4 21 4C11.6112 4 4 11.6112 4 21C4 30.3888 11.6112 38 21 38Z" fill="none" stroke="#333" stroke-width="4" stroke-linejoin="round"/><path d="M26.657 14.3431C25.2093 12.8954 23.2093 12 21.0001 12C18.791 12 16.791 12.8954 15.3433 14.3431" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M33.2216 33.2217L41.7069 41.707" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> -->
                    <svg style="width: 80%; height: 80%;" viewBox="0 0 48 48" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21 38C30.3888 38 38 30.3888 38 21C38 11.6112 30.3888 4 21 4C11.6112 4 4 11.6112 4 21C4 30.3888 11.6112 38 21 38Z"
                            fill="none" stroke="#333" stroke-width="4" stroke-linejoin="round" />
                        <path
                            d="M26.657 14.3431C25.2093 12.8954 23.2093 12 21.0001 12C18.791 12 16.791 12.8954 15.3433 14.3431"
                            stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M33.2216 33.2217L41.7069 41.707" stroke="#333" stroke-width="4" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
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
                        if (empty($font_icon_url)) {
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
                        $font_icon_url = "/index.php?c=ico&text=" . $link['title'];
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
                        <a rel="nofollow" href="/index.php?cid=<?php echo $category['id']; ?>" title="点此可查看该分类下的所有链接">
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
        !(function () {
            function g() {
                h(), i(), j(), k();
            }
            function h() {
                d.checked = s();
            }
            function i() {
                var a = document.querySelector('input[name="type"][value="' + p() + '"]');
                a && ((a.checked = !0), l(a));
            }
            function j() {
                v(u());
            }
            function k() {
                w(t());
            }
            function l(a) {
                for (var b = 0; b < e.length; b++) e[b].classList.remove("s-current");
                a.parentNode.parentNode.parentNode.classList.add("s-current");
            }
            function m(a, b) {
                window.localStorage.setItem("superSearch" + a, b);
            }
            function n(a) {
                return window.localStorage.getItem("superSearch" + a);
            }
            function o(a) {
                (f = a.target),
                    v(u()),
                    w(a.target.value),
                    m("type", a.target.value),
                    c.focus(),
                    l(a.target);
            }
            function p() {
                var b = n("type");
                return b || a[0].value;
            }
            function q(a) {
                m("newWindow", a.target.checked ? 1 : -1), x(a.target.checked);
            }
            function r(a) {
                return (
                    a.preventDefault(),
                    "" == c.value
                        ? (c.focus(), !1)
                        : (w(t() + c.value),
                            x(s()),
                            s() ? window.open(b.action, +new Date()) : (location.href = b.action),
                            void 0)
                );
            }
            function s() {
                var a = n("newWindow");
                return a ? 1 == a : !0;
            }
            function t() {
                return document.querySelector('input[name="type"]:checked').value;
            }
            function u() {
                return document
                    .querySelector('input[name="type"]:checked')
                    .getAttribute("data-placeholder");
            }
            function v(a) {
                c.setAttribute("placeholder", a);
            }
            function w(a) {
                b.action = a;
            }
            function x(a) {
                a ? (b.target = "_blank") : b.removeAttribute("target");
            }
            var y,
                a = document.querySelectorAll('input[name="type"]'),
                b = document.querySelector("#super-search-fm"),
                c = document.querySelector("#search-text"),
                d = document.querySelector("#set-search-blank"),
                e = document.querySelectorAll(".search-group"),
                f = a[0];
            for (g(), y = 0; y < a.length; y++) a[y].addEventListener("change", o);
            d.addEventListener("change", q), b.addEventListener("submit", r);
        })();

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        //关键词sug
        $(function () {
            //当键盘键被松开时发送Ajax获取数据
            $('#search-text').keyup(function () {
                var keywords = $(this).val();
                if (keywords == '') { $('#word').hide(); return };
            })
            //点击搜索数据复制给搜索框
            $(document).on('click', '#word li', function () {
                var word = $(this).text();
                $('#search-text').val(word);
                $('#word').empty();
                $('#word').hide();
                //$("form").submit();
                $('.submit').trigger('click');//触发搜索事件
            })
            $(document).on('click', '.container,.banner-video,nav', function () {
                $('#word').empty();
                $('#word').hide();
            })

        })

        function gotop() {
            $("html,body").animate({ scrollTop: '0px' }, 600);
        }


        var h = holmes({
            input: '#search-text',
            find: '.link',
            hiddenAttr: true
        });
    </script>
</body>

</html>