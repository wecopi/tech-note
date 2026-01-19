<footer style="text-align:center; padding: 50px 0; border-top: 1px solid var(--border); color:#888; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?>
</footer>
<script src="https://cdn.bootcdn.net/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script>
// 1. 复制功能逻辑
document.querySelectorAll('pre').forEach((block) => {
    const btn = document.createElement('button');
    btn.className = 'copy-btn';
    btn.innerText = '复制';
    btn.onclick = function() {
        const text = block.innerText.replace('复制', '').trim();
        navigator.clipboard.writeText(text).then(() => {
            btn.innerText = '成功!';
            setTimeout(() => { btn.innerText = '复制'; }, 2000);
        });
    };
    block.appendChild(btn);
});

// 2. 进度条与返回顶部
window.onscroll = function() {
    let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    if(document.getElementById("progress-bar")) document.getElementById("progress-bar").style.width = scrolled + "%";
    if(document.getElementById("back-to-top")) document.getElementById("back-to-top").style.display = winScroll > 300 ? "flex" : "none";
};

// 3. 自动生成目录 (TOC)
const tocContent = document.getElementById('toc-content');
if (tocContent) {
    const hs = document.querySelectorAll('.post-content h2, .post-content h3');
    if (hs.length > 0) {
        let html = '<ul style="padding-left:10px; list-style:none;">';
        hs.forEach((h, i) => {
            const id = 'heading-' + i;
            h.setAttribute('id', id);
            html += '<li style="margin-bottom:8px; margin-left:' + (h.tagName === 'H3' ? '15px' : '0') + '"><a href="#' + id + '" style="color:inherit; text-decoration:none; font-size:13px; opacity:0.8;">' + h.innerText + '</a></li>';
        });
        html += '</ul>';
        tocContent.innerHTML = html;
    } else {
        document.querySelectorAll('.widget-toc').forEach(el => el.style.display = 'none');
    }
}

// 4. 图片灯箱
document.querySelectorAll('.post-content img').forEach(img => {
    img.style.cursor = 'zoom-in';
    img.onclick = function() {
        const lb = document.getElementById('lightbox');
        if(lb) {
            lb.style.display = 'flex';
            lb.querySelector('img').src = this.src;
        }
    };
});
if(document.getElementById('lightbox')) document.getElementById('lightbox').onclick = function() { this.style.display = 'none'; };
if(document.getElementById('back-to-top')) document.getElementById('back-to-top').onclick = () => window.scrollTo({top: 0, behavior: 'smooth'});

// 5. 模式切换
if(document.getElementById('theme-toggle')) document.getElementById('theme-toggle').onclick = () => {
    const r = document.documentElement;
    const n = r.getAttribute('data-theme')==='dark'?'light':'dark';
    r.setAttribute('data-theme',n); localStorage.setItem('theme',n);
};
</script>
</body></html>
