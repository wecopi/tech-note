<footer style="text-align:center; padding: 50px 0; border-top: 1px solid var(--border); color:#888; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?>
</footer>
<div id="back-to-top">↑</div>

<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php $this->footer(); ?>

<script>
// 1. 模式切换逻辑
const themeToggle = document.getElementById('theme-toggle');
if (themeToggle) {
    themeToggle.onclick = () => {
        const theme = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    };
}

// 2. 通用复制逻辑
function doCopy(text, btn) {
    const input = document.createElement("textarea");
    input.value = text;
    document.body.appendChild(input);
    input.select();
    try {
        document.execCommand('copy');
        btn.innerText = '成功!';
        setTimeout(() => { btn.innerText = '复制'; }, 2000);
    } catch (err) { console.error('复制失败'); }
    document.body.removeChild(input);
}

// 3. 增强版文章折叠逻辑 (适配 EditorMD 延迟渲染)
function initCollapse() {
    const contents = document.querySelectorAll('.post-content');
    contents.forEach(el => {
        // 如果高度超过 500px 则折叠
        if (el.scrollHeight > 500) {
            el.style.maxHeight = '400px';
            el.style.overflow = 'hidden';
            el.style.position = 'relative';
            
            const btn = document.createElement('div');
            btn.innerHTML = '↓ 展开全文';
            btn.className = 'fold-btn';
            
            btn.onclick = function() {
                if (el.style.maxHeight === '400px') {
                    el.style.maxHeight = 'none';
                    this.innerHTML = '↑ 收起全文';
                } else {
                    el.style.maxHeight = '400px';
                    this.innerHTML = '↓ 展开全文';
                    el.scrollIntoView({behavior: "smooth"});
                }
            };
            el.after(btn);
        }
    });
}

// 确保在所有资源（包括插件渲染）完成后执行
window.addEventListener('load', () => {
    // 给 EditorMD 一点渲染时间再计算高度
    setTimeout(initCollapse, 500);

    // 注入代码块复制按钮
    document.querySelectorAll('pre').forEach(pre => {
        pre.style.position = 'relative';
        const btn = document.createElement('button');
        btn.className = 'copy-btn';
        btn.innerText = '复制';
        btn.onclick = function() { 
            // 排除复制按钮自身的文字
            let codeText = pre.innerText.replace('复制', '').replace('成功!', '').trim();
            doCopy(codeText, this); 
        };
        pre.appendChild(btn);
    });
    
    // 回到顶部
    const btt = document.getElementById('back-to-top');
    if(btt) btt.onclick = () => window.scrollTo({top: 0, behavior: 'smooth'});
});

window.onscroll = () => {
    const top = document.documentElement.scrollTop;
    const btt = document.getElementById("back-to-top");
    if(btt) btt.style.display = top > 300 ? "flex" : "none";
};
</script>
</body></html>
