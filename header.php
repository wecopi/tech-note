<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->archiveTitle(array('category'=>_t('分类 %s'),'search'=>_t('搜索 %s'),'tag'=>_t('标签 %s'),'author'=>_t('作者 %s')), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link href="https://cdn.bootcdn.net/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <style>
        /* 强制修复布局与深色模式 */
        :root { --bg: #ffffff; --text: #333; --border: #eee; }
        [data-theme="dark"] { --bg: #1a1a1a; --text: #eeeeee; --border: #333; }
        
        body { background-color: var(--bg) !important; color: var(--text) !important; transition: background 0.3s, color 0.3s; margin: 0; }
        .site-header { border-bottom: 1px solid var(--border); padding: 15px 0; background: var(--bg); }
        .header-flex { display: flex; justify-content: space-between; align-items: center; max-width: 1000px; margin: 0 auto; padding: 0 20px; }
        
        /* 移除“模式”文字后的样式 */
        #theme-toggle { font-size: 20px; user-select: none; }
        nav a { margin-right: 15px; font-weight: 500; }
    </style>
    <script>
        // 页面加载时立即应用主题，防止白光闪烁
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
</head>
<body>
<header class="site-header">
    <div class="container header-flex">
        <a href="<?php $this->options->siteUrl(); ?>" style="font-size:22px; font-weight:bold; color:var(--text); text-decoration:none;">
            <?php $this->options->title(); ?>
        </a>
        <nav>
            <a href="<?php $this->options->siteUrl(); ?>" style="color:var(--text); text-decoration:none;">首页</a>
            <span id="theme-toggle" onclick="
                const current = document.documentElement.getAttribute('data-theme');
                const target = current === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', target);
                localStorage.setItem('theme', target);
            " style="cursor:pointer; margin-left:15px;">🌓</span>
        </nav>
    </div>
</header>
