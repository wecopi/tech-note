<footer style="text-align:center; padding: 50px 0; border-top: 1px solid var(--border); color:#888; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?>
</footer>

<script>
// 兼容 IP 访问的强制复制函数
function doCopy(text, btn) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    // 确保 textarea 不会出现在视觉范围内
    textArea.style.position = "fixed";
    textArea.style.left = "-9999px";
    textArea.style.top = "0";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        const successful = document.execCommand('copy');
        if (successful) {
            btn.innerText = '成功!';
            btn.style.background = '#27c93f';
            setTimeout(() => {
                btn.innerText = '复制';
                btn.style.background = '#007bff';
            }, 2000);
        }
    } catch (err) {
        console.error('无法复制', err);
    }
    document.body.removeChild(textArea);
}

// 初始化按钮
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('pre').forEach(pre => {
        // 检查是否已有按钮
        if (pre.querySelector('.copy-btn')) return;
        
        pre.style.position = 'relative';
        const btn = document.createElement('button');
        btn.className = 'copy-btn';
        btn.innerText = '复制';
        
        btn.onclick = function() {
            // 获取代码文本：排除按钮文字
            let codeText = pre.innerText.replace('复制', '').trim();
            doCopy(codeText, this);
        };
        pre.appendChild(btn);
    });
});

// 进度条
window.onscroll = function() {
    let winScroll = document.documentElement.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    const bar = document.getElementById("progress-bar");
    if(bar) bar.style.width = scrolled + "%";
};
</script>
</body></html>
