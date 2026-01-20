<?php $this->need('header.php'); ?>
<div id="progress-bar"></div>
<div class="container main-wrapper">
    <div id="main">
        <article>
            <h1 style="color:var(--text); margin-top:0;"><?php $this->title() ?></h1>
            <div style="font-size:13px; color:#888; margin-bottom:20px;"><?php $this->date(); ?></div>
            <div id="toc-mobile" class="widget-toc" style="display:none;"></div>
            
            <div class="post-content editormd-html-preview" id="post-content">
                <?php $this->content(); ?>
            </div>
            
        </article>
    </div>
    <div id="sidebar">
        <div id="toc-container" class="widget-toc">
            <h3 style="margin-top:0; font-size:15px;">文章目录</h3>
            <div id="toc-content"></div>
        </div>
        <?php $this->need('sidebar.php'); ?>
    </div>
</div>
<div id="back-to-top">↑</div>
<div id="lightbox" class="lightbox"><img src="" alt="放大图"></div>
<?php $this->need('footer.php'); ?>
