<footer style="text-align:center; padding: 50px 0; border-top: 1px solid var(--border); color:#888; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?>
</footer>
<div id="back-to-top">↑</div>

<script>
// --- 1. 黑暗模式切换 ---
const themeToggle = document.getElementById('theme-toggle');
if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
}

// --- 2. 文章折叠功能 (针对首页列表) ---
function initPostCollapse() {
    // 仅在非文章详情页执行（如果有 .post-content 且是列表形态）
    const posts = document.querySelectorAll('.post-item .post-content');
    posts.forEach(post => {
        if (post.innerText.length > 200) {
            post.classList.add('post-item-collapse');
            const btn = document.createElement('div');
            btn.className = 'read-more-toggle';
            btn.innerText = '↓ 展开阅读全文';
            btn.onclick = function() {
                if (post.classList.contains('post-item-collapse')) {
                    post.classList.remove('post-item-collapse');
                    post.classList.add('post-item-expanded');
                    this.innerText = '↑ 收起全文';
                } else {
                    post.classList.add('post-item-collapse');
                    post.classList.remove('post-item-expanded');
                    this.innerText = '↓ 展开阅读全文';
                    window.scrollTo({top: post.offsetTop - 100, behavior: 'smooth'});
                }
            };
            post.after(btn);
        }
    });
}

// --- 3. 初始化 ---
document.addEventListener('DOMContentLoaded', function() {
    initPostCollapse(); // 执行折叠逻辑
    
    // 注入复制按钮
    document.querySelectorAll('pre').forEach(pre => {
        pre.style.position = 'relative';
        const btn = document.createElement('button');
        btn.className = 'copy-btn';
        btn.innerText = '复制';
        btn.onclick = function() {
            const textArea = document.createElement("textarea");
            textArea.value = pre.innerText.replace('复制','').trim();
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            btn.innerText = '成功!';
            setTimeout(() => { btn.innerText = '复制'; }, 2000);
        };
        pre.appendChild(btn);
    });
    
    const bttBtn = document.getElementById('back-to-top');
    if(bttBtn) bttBtn.onclick = () => window.scrollTo({top: 0, behavior: 'smooth'});
});

window.onscroll = function() {
    let winScroll = document.documentElement.scrollTop || document.body.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    if(document.getElementById("progress-bar")) document.getElementById("progress-bar").style.width = scrolled + "%";
    const btt = document.getElementById("back-to-top");
    if(btt) btt.style.display = winScroll > 300 ? "flex" : "none";
};
</script>
</body></html>
