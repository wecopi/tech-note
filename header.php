<!DOCTYPE html>
<html lang="zh-CN"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php $this->archiveTitle(array('category'=>_t('分类 %s'),'search'=>_t('搜索 %s'),'tag'=>_t('标签 %s'),'author'=>_t('作者 %s')), '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
<link href="https://cdn.bootcdn.net/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
<script>(function(){const t=localStorage.getItem('theme')||'light';document.documentElement.setAttribute('data-theme',t);})();</script></head>
<body><header class="site-header"><div class="container header-flex">
<a href="<?php $this->options->siteUrl(); ?>" style="font-size:22px; font-weight:bold; color:var(--text); text-decoration:none;"><?php $this->options->title(); ?></a>
<nav><a href="<?php $this->options->siteUrl(); ?>" style="color:var(--text); text-decoration:none;">首页</a><span id="theme-toggle" style="cursor:pointer; margin-left:15px; font-weight:bold;">🌓 模式</span></nav>
</div></header>
