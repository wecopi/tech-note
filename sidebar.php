<div id="sidebar">
    <div class="search-box" style="margin-bottom: 30px;">
        <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
            <input type="text" id="s" name="s" class="search-input" placeholder="搜索运维笔记..." />
        </form>
    </div>
    
    <h3 class="side-title">最新文章</h3>
    <ul class="side-list">
        <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
    </ul>

    <h3 class="side-title">分类目录</h3>
    <ul class="side-list">
        <?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name} ({count})</a></li>'); ?>
    </ul>

    <h3 class="side-title">其他选项</h3>
    <ul class="side-list">
        <?php if($this->user->hasLogin()): ?>
            <li><a href="<?php $this->options->adminUrl(); ?>">进入后台</a></li>
            <li><a href="<?php $this->options->logoutUrl(); ?>" style="color:#ff5f56">安全退出</a></li>
        <?php else: ?>
            <li><a href="<?php $this->options->adminUrl('login.php'); ?>">登录管理</a></li>
        <?php endif; ?>
    </ul>
</div>
