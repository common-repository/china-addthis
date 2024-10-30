<?php

/*
Plugin Name: China-AddThis
Version:     2.8.1
Plugin URI:  http://www.blog.lty0311.com/?p=210
Description: China-AddThis 是专为中国用户设计制作的社会化网络分享小工具，安装简单无需配置和主题修改，删除无任何数据库残留信息。插件启用后会在文章单页的底部添加一些国内流行的社会化分享按钮例如：腾讯微博、新浪微博、腾讯空间、人人网、开心网、豆瓣、百度搜藏等等国内流行的社会化分享服务。
Author:      领头羊网络
Author URI:  http://www.blog.lty0311.com/
*/

// for add to content ...
function China_AddThis($chinaaddthis){
	if(!is_singular()){ return $chinaaddthis; }

	global $post;
	$AddThis = array();
	$pName = rawurlencode($post->post_title);
	$pHref = rawurlencode(get_permalink($post->ID));

	$AddThis['sntwet'] = array('新浪微博', 'http://service.weibo.com/share/share.php?url='.$pHref.'&appkey=4266365489&title='.$pName.'&pic=&ralateUid=1071784047');
	$AddThis['qqtwet'] = array('腾讯微博', 'http://v.t.qq.com/share/share.php?appkey=3ca3911773804940a56b92f47b6b0470&url='.$pHref.'&title='.$pName);
	$AddThis['qqzone'] = array('腾讯空间', 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='.$pHref);
	$AddThis['renren'] = array('人人社区', 'http://share.renren.com/share/buttonshare.do?link='.$pHref.'&title='.$pName);
	$AddThis['kaixin'] = array('开心社区', 'http://www.kaixin001.com/repaste/share.php?rurl='.$pHref.'&rtitle='.$pName);
	$AddThis['douban'] = array('豆瓣社区', 'http://www.douban.com/recommend/?url='.$pHref);
	$AddThis['bdcang'] = array('百度搜藏', 'http://cang.baidu.com/do/add?iu='.$pHref.'&it='.$pName);
	$AddThis['folow5'] = array('Follow5', 'http://www.follow5.com/f5/discuz/sharelogin.jsp?url='.$pHref.'&title='.$pName);
	$AddThis['facebk'] = array('facebook', 'http://www.facebook.com/share.php?u='.$pHref);
	$AddThis['twiter'] = array('twitter', 'http://twitter.com/home?status='.$pName.'-'.$pHref);

	$chinaaddthis .= "\n<!-- China-AddThis Begin -->\n";
	$chinaaddthis .= '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/China-AddThis.css">';
	$chinaaddthis .= '<table id="China-AddThis"><tr><td id="CA-TXT"><i>feihu</i><b>分享到：</b></td>';
	$chinaaddthis .= '</tr><tr><td id="CA-BTN"><br clear="all">';
	foreach($AddThis as $key => $btn){
		$chinaaddthis .= '<a id="'.$key.'" title="'.$btn[0].'" href="'.$btn[1].'" target="_blank">&nbsp;</a>';
	}
	$chinaaddthis .= '<br clear="all"></td></tr></table>';
	$chinaaddthis .= "\n<!-- China-AddThis End -->\n";
	return $chinaaddthis;
}

add_filter('the_content', 'China_AddThis');

?>