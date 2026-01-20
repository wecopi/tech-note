<?php $this->need('header.php'); ?>
<div class="container main-wrapper">
    <div id="main">
        <?php if ($this->have()): ?>
            <?php while($this->next()): ?>
            <article style="margin-bottom: 50px; border-bottom: 1px solid var(--border); padding-bottom: 30px;">
                <h2 style="margin:0;">
                    <a href="<?php $this->permalink() ?>" style="color:var(--accent); text-decoration:none; font-size: 26px;">
                        <?php $this->title() ?>
                    </a>
                </h2>
                <div style="font-size:13px; color:#888; margin:12px 0;">
                    <?php $this->date(); ?> | 分类: <?php $this->category(','); ?>
                </div>
                
                <div class="post-content editormd-html-preview">
                    <?php $this->content('阅读全文 &raquo;'); ?>
                </div>
            </article>
            <?php endwhile; ?>
            
            <div class="pagination" style="margin-bottom: 40px;">
                <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            </div>
            
        <?php else: ?>
            <p>暂时没有文章。</p>
        <?php endif; ?>
    </div>
    <?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
