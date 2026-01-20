<div id="sidebar">
    <div class="widget" style="margin-bottom: 30px;">
        <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
            <input type="text" id="s" name="s" class="search-input" placeholder="输入关键字搜索..." />
        </form>
    </div>

    <div class="widget" style="margin-bottom: 30px;">
        <div class="side-title">最新文章</div>
        <ul class="side-list">
            <?php 
            // 修正 widget 调用方式，确保在各种环境下都能稳定获取
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=5')->to($recent);
            if($recent->have()):
                while($recent->next()): ?>
                    <li><a href="<?php $recent->permalink(); ?>"><?php $recent->title(); ?></a></li>
                <?php endwhile;
            endif; ?>
        </ul>
    </div>

    <div class="widget" style="margin-bottom: 30px;">
        <div class="side-title">分类目录</div>
        <ul class="side-list">
            <?php 
            $this->widget('Widget_Metas_Category_List')->to($categories);
            if($categories->have()):
                while($categories->next()): ?>
                    <li><a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?> (<?php $categories->count(); ?>)</a></li>
                <?php endwhile;
            endif; ?>
        </ul>
    </div>

    <div class="widget" style="margin-bottom: 30px;">
        <div class="side-title">文章归档</div>
        <ul class="side-list">
            <?php 
            $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')->to($archives);
            if($archives->have()):
                while($archives->next()): ?>
                    <li><a href="<?php $archives->permalink(); ?>"><?php $archives->date(); ?> (<?php $archives->count(); ?>)</a></li>
                <?php endwhile;
            else: ?>
                <li style="color:#888; font-size:13px;">暂无归档数据</li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="widget">
        <div class="side-title">管理控制台</div>
        <ul class="side-list">
            <?php if($this->user->hasLogin()): ?>
                <li><a href="<?php $this->options->adminUrl(); ?>">进入后台 (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>">退出登录</a></li>
            <?php else: ?>
                <li><a href="<?php $this->options->adminUrl('login.php'); ?>">管理员登录</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
