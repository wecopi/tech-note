<footer style="text-align:center; padding: 50px 0; border-top: 1px solid var(--border); color:#888; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?>
</footer>

<div id="back-to-top">↑</div>

<script>
// 1. 模式切换
const themeToggle = document.getElementById('theme-toggle');
if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
}

// 2. 复制代码函数
function doCopy(text, btn) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-9999px";
    document.body.appendChild(textArea);
    textArea.select();
    try {
        if (document.execCommand('copy')) {
            btn.innerText = '成功!';
            btn.style.background = '#27c93f';
            setTimeout(() => { btn.innerText = '复制'; btn.style.background = '#007bff'; }, 2000);
        }
    } catch (err) { console.error('Copy failed', err); }
    document.body.removeChild(textArea);
}

// 3. 滚动监听
window.onscroll = function() {
    let winScroll = document.documentElement.scrollTop || document.body.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    
    // 进度条
    const bar = document.getElementById("progress-bar");
    if(bar) bar.style.width = scrolled + "%";
    
    // 回到顶部按钮显示/隐藏
    const btt = document.getElementById("back-to-top");
    if(btt) {
        if (winScroll > 300) {
            btt.style.display = "flex";
        } else {
            btt.style.display = "none";
        }
    }
};

// 4. 初始化
document.addEventListener('DOMContentLoaded', function() {
    // 注入复制按钮
    document.querySelectorAll('pre').forEach(pre => {
        pre.style.position = 'relative';
        const btn = document.createElement('button');
        btn.className = 'copy-btn';
        btn.innerText = '复制';
        btn.onclick = function() { doCopy(pre.innerText.replace('复制','').trim(), this); };
        pre.appendChild(btn);
    });
    
    // 回到顶部点击事件
    const bttBtn = document.getElementById('back-to-top');
    if(bttBtn) {
        bttBtn.onclick = () => window.scrollTo({top: 0, behavior: 'smooth'});
    }
});
</script>
</body></html>
