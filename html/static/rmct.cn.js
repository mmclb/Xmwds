'use strict';
const $d = document;

function _dateline(c) {
	const b = Math.round(new Date().getTime() / 1000),
		d = Math.round(Date.parse(c) / 1000),
		a = b - d;
	if (a < 300) {
		return "&#21018;&#21018;"
	} else {
		if (a < 3600) {
			return Math.round(a / 60) + "&#20998;&#38047;&#21069;"
		} else {
			if (a < 86400) {
				return Math.round(a / 3600) + "&#23567;&#26102;&#21069;"
			} else {
				if (a < 604800) {
					return Math.round(a / 86400) + "&#22825;&#21069;"
				} else {
					return new Date(d * 1000).toLocaleDateString()
				}
			}
		}
	}
};

function _kb(a) {
	const b = Math.round(a / 1024);
	if (b >= 1024) {
		return Math.round(b / 1024) + "MB"
	}
	return b + "KB"
};
Array.from($d.querySelectorAll('[href*=delete]')).concat(Array.from($d.querySelectorAll('[class=important]'))).forEach(a => {
	a.addEventListener('click', (event) => {
		!confirm('\u786e\u5b9a\uff1f') ? event.preventDefault() : null
	}, false)
});
function getUID() {
	const a = $d.querySelector('[data-tpl=commentlist]');
	return /\/user\/\d+$/.test(a.href || '') ? a.href.replace(/.+\/user\/(\d+)$/, '$1') : 0
}
//function getUID(){const _0xb72f08=$d[_0xb36e('‮35','0U5(')]('body>header>a:last-of-type');return/\/user\/\d+$/['test'](_0xb72f08[_0xb36e('‫36','S@eW')]||'')?_0xb72f08['href'][_0xb36e('‮37','N9Yf')](/.+\/user\/(\d+)$/,'$1'):0x0;}
class TPL {
	static gamesimple(json) {
		return json.games.map(game => {
			return `<li><a href="/game/${game.id}"><img src="/M/i/${game.id}.png"width="46"height="46"alt="${game.name}&#22270;&#26631;"/>${game.chinese||game.name}</a></li>`
		}).join('')
		//><img src="/M/i/${game.id}.png"width="46"height="46"alt="${game.name}&#22270;&#26631;"/>${game.chinese||game.name}</a>
	}
	static commentlist(json) {
		const uid = getUID();
		return json.comments.map(comment => {
		
		//<a href="/info/'.$us['id'].'"><span class="user-img"><img class="Avatar" src="http://thirdqq.qlogo.cn/g?b=oidb&amp;nk='.$us['qq'].'&amp;s=40&amp;t='.$us['up_time'].'" width="24" height="24" alt="头像" />'.$v.'</a><div><p><a href="/info/'.$us['id'].'">'.$us['name'].''.$on_off.''.$dol.'</p><div class="quote small-font"><a href="/info/'.$us['id'].'"></a>
			
			return `<li${comment.users_id==uid?' class="myself"':''}><a href="/user/${comment.users_id}"><img src="${comment.avatar}"width="46"height="46"alt="头像"/></a><div><p>${comment.content}</p>${comment.reply_uid?`<blockquote><a href="/user/${comment.reply_uid}">${comment.reply_nickname}</a>：${comment.reply_content}</blockquote>`:''}<div><a href="/user/${comment.users_id}">${comment.nickname}</a><span>${_dateline(comment.dateline)}</span><a href="/comments/reply/${comment.id}">&#22238;&#22797;</a><a href="/feedbacks/add?games_id=${comment.games_id}&amp;comments_id=${comment.id}">举报</a></div></div></li>`
		}).join('')
	}
	static packagelist(json) {
		var class_value = '';
		switch (json.packages.length) {
			case 1:
				class_value = 1;
				break;
			case 2:
			case 4:
				class_value = 2;
				break;
			default:
				class_value = ''
		}
		$d.querySelector('[data-tpl="packagelist"]').classList.add('package_num' + class_value);
		return json.packages.map(_package => {

			return `<a href="/user/${_package.users_id}" class="rigth"><img class="Avatar" src="${_package.avatar}" alt="头像" width="24" height="24"><a href="/package/${_package.id}"title="${_package.nickname || ''}"><strong>${_package.resolution}</strong><div>v${_package.version}&nbsp;${_kb(_package.size)}&nbsp;${_package.online}&nbsp;${_package['lang']}</div></a>`
		}).join('')
	}
	static screenlist(json) {
		if (!json.screens.length) {
			return ''
		}
		const screens = {};
		json.screens.forEach(screen => {
			if (!screens[screen.resolution]) {
				screens[screen.resolution] = []
			}
			screens[screen.resolution].push(screen)
		});
		return (screens['240×320'] || screens['320×240'] || screens['640×360'] || screens[Object.keys(screens).sort()[0]]).map(screen => {
			return `<img src="/M/s/${screen.id}.png">`
		}).join('')
	}
	static facewall(json) {
		return json.users.map(user => {
			return `<a href="/user/${user.id}"><img src="${user.avatar}"width="46"height="46"/></a>`
		}).join('')
	}
}
$d.querySelectorAll('[data-url]').forEach(dom => {
	fetch(dom.dataset.url, {
		headers: {
			ajax: true
		}
	}).then(res => {
		return res.json()
	}).then(json => {
		dom.insertAdjacentHTML('afterbegin', TPL[dom.dataset.tpl](json))
	}).catch(e => {
		console.log(e)
	})
});
$d.querySelectorAll('[data-href]').forEach(a => {
	a.addEventListener('click', event => {
		if ($d.querySelector('input[name="agreen"]').checked) {
			location.href = event.currentTarget.dataset.href
		} else {
			alert('\u8bf7\u4ed4\u7ec6\u9605\u8bfb\u514d\u8d23\u58f0\u660e\u3002');
			event.preventDefault()
		}
	}, true)
});

function Dialog(message='') {
	var dlg = $d.querySelector('dialog');
	if (!dlg) {
		dlg = $d.createElement('dialog');
		dlg.innerHTML = '<h2><a href="#close">关闭</a>消息提示</h2><p></p>';
		$d.body.appendChild(dlg);
		dlg.querySelector('a[href="#close"]').addEventListener('click',(event)=>{
			event.preventDefault();
			dlg.close();
		},true);
	}
	dlg.lastChild.innerHTML = message;
	dlg.showModal();
}

if (/games\/uploadGame$/.test($d.URL)) {
	$d.querySelector('form[enctype="multipart/form-data"]').addEventListener('submit', (event) => {
		event.preventDefault();
		event.currentTarget.querySelector('input[type="submit"]').disabled = 'disabled';
		const files = $d.getElementsByName('files[]')[0].files;
		const myform = new FormData();
		for(var file of files){
			if (/\.(?:sisx?|n-gage)$/.test(file.name)) {
				myform.append('files[]', file);
			}
		}
		Dialog('正在上传，请勿关闭本窗口…');
		fetch('/games/uploadGame', {
			credentials: 'include',
			method: 'POST',
			body: myform,
			headers: {
				ajax: 'true'
			}
		}).then(res => {
			return res.json();
		}).then(json => {
			console.log(json);
			alert('上传成功，请等待管理员审核，点击后继续上传其他游戏。');
			location.href = '/games/uploadGame';
		}).catch(e => {
			console.log(e);
		});
	}, true);
};


   $('#tab span').click(function(){
	$navEx = $('#tab').nextAll();
	$index = $(this).index();
	$('#tab span').removeClass('cur');
	$('#tab span').eq($index).addClass('cur');
	for($ii=0;$ii<$navEx.length;$ii++){
		$item = $($navEx[$ii]);
		if($index == 0){
			$item.show();
		}else{
			$item.hide();
		}
		if($item.hasClass('app_comment')){
			$item.show();
			break;
		}
	}
})

function go(){
	const go_page = Number($d.getElementsByName('go_page')[0].value);
	if(!go_page){
		alert('请输入正确的页码。');
	}
	const url_obj = new URL(location.href);
	const new_url = url_obj.origin+url_obj.pathname.replace(/\/\d+$/,'')+'/'+go_page+url_obj.search;
	location.href = new_url;
}
const pager = $d.querySelector('.pager span');
if(pager){
	const page_arr = pager.textContent.match(/\d+/g);
	if(page_arr&&page_arr.length===2){
		const page = Number(page_arr[0]);
		const pages = Number(page_arr[1]);
		if(pages>5){
			pager.parentElement.insertAdjacentHTML('beforeEnd',`<div>页码:<input type="number" name="go_page" size="5" maxlength="6" min="1" max="${pages}" step="1" /><input type="button" value="跳转" onclick="go()" /></div>`);
		}
	}
}