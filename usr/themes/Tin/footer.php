
<footer>
	<div class="footer">
    	<p><?php $this->options->copyright(); ?></p>
        <p>Theme Tin by Wind Powered By Typecho</p>
        <?php /*这里版权没有连接，主题没有限制，可以魔改，良心上请保留一份版权，谢谢*/ ?>
    </div>
</footer>

<div id="scrolltop" class="scrolltop">
	<i class="icon-arrow-up"></i>
</div>
<link rel="stylesheet" href="<?php $this->options->themeUrl('OwO/dist/OwO.min.css'); ?>">
<script src="<?php $this->options->themeUrl('OwO/dist/OwO.min.js'); ?>"></script>
<script>
        var OwO_demo = new OwO({
            logo: 'OωO表情',
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '<?php $this->options->themeUrl('OwO/OwO.json'); ?>',
            position: 'down',
            width: '100%',
            maxHeight: '250px'
        });
    </script>
</body>
</html>

