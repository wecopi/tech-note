<footer style="text-align:center; padding: 50px 0; border-top: 1px solid var(--border); color:#888; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?>
</footer>
<div id="back-to-top">↑</div>

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

// 2. 通用复制逻辑 (兼容内网/IP访问)
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

// 3. 文章折叠逻辑 (200字)
function initCollapse() {
    const contents = document.querySelectorAll('.post-content');
    contents.forEach(el => {
        if (el.innerText.length > 200) {
            el.style.maxHeight = '280px';
            el.style.overflow = 'hidden';
            el.style.position = 'relative';
            
            const btn = document.createElement('div');
            btn.innerHTML = '↓ 展开全文';
            btn.style = 'cursor:pointer; text-align:center; padding:10px; color:var(--accent); font-weight:bold;';
            
            btn.onclick = function() {
                if (el.style.maxHeight === '280px') {
                    el.style.maxHeight = 'none';
                    this.innerHTML = '↑ 收起全文';
                } else {
                    el.style.maxHeight = '280px';
                    this.innerHTML = '↓ 展开全文';
                    el.scrollIntoView({behavior: "smooth"});
                }
            };
            el.after(btn);
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initCollapse();
    // 注入代码块复制按钮
    document.querySelectorAll('pre').forEach(pre => {
        pre.style.position = 'relative';
        const btn = document.createElement('button');
        btn.className = 'copy-btn';
        btn.innerText = '复制';
        btn.onclick = function() { doCopy(pre.innerText.replace('复制','').trim(), this); };
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
