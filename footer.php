<footer style="text-align:center; padding: 50px 0; border-top: 1px solid var(--border); color:#888; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?>
</footer>
<script src="https://cdn.bootcdn.net/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script>
// 1. 复制代码功能实地修复版
document.querySelectorAll('pre').forEach((block) => {
    // 检查是否已经存在按钮，防止重复创建
    if (block.querySelector('.copy-btn')) return;

    const btn = document.createElement('button');
    btn.className = 'copy-btn';
    btn.innerText = '复制';
    
    btn.onclick = function() {
        // 排除掉按钮本身的文字，只获取代码内容
        const codeElement = block.querySelector('code') || block;
        const textToCopy = codeElement.innerText.replace('复制', '').trim();
        
        navigator.clipboard.writeText(textToCopy).then(() => {
            btn.innerText = '成功!';
            btn.style.background = '#27c93f';
            setTimeout(() => { 
                btn.innerText = '复制'; 
                btn.style.background = 'var(--accent)';
            }, 2000);
        }).catch(err => {
            console.error('复制失败:', err);
            // 兼容性方案：如果是 HTTP 环境（非 HTTPS），clipboard 可能被禁
            const textArea = document.createElement("textarea");
            textArea.value = textToCopy;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            textArea.remove();
            btn.innerText = '成功!';
            setTimeout(() => { btn.innerText = '复制'; }, 2000);
        });
    };
    block.appendChild(btn);
});

// 2. 阅读进度条
window.onscroll = function() {
    let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    const progress = document.getElementById("progress-bar");
    if(progress) progress.style.width = scrolled + "%";
    
    const btt = document.getElementById("back-to-top");
    if(btt) btt.style.display = winScroll > 300 ? "flex" : "none";
};

// 3. 自动生成目录
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
        const widget = document.querySelector('.widget-toc');
        if(widget) widget.style.display = 'none';
    }
}
if(document.getElementById('back-to-top')) document.getElementById('back-to-top').onclick = () => window.scrollTo({top: 0, behavior: 'smooth'});
</script>
</body></html>
