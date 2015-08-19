<?php /* Textolite v2.02 */ ini_set('error_reporting',E_ALL);ini_set('display_errors',0);ini_set('log_errors',1);ini_set('error_log','error.log');ini_set('date_default_timezone_set','UTC');version_compare(PHP_VERSION,'5.2','>=')or exit('PHP '.PHP_VERSION.' is not supported');final class a{private $a;private $h;public function __construct(){$this->a['a']=$_GET;$this->a['b']=$_POST;$this->a['c']=$_SERVER;$this->a['d']=$_COOKIE;$this->a['e']=$_FILES;}public function b(){if(isset($this->a['a']['query']))return $this->a['a']['query'];}public function c($a=false,$b=false){if(isset($this->h['c'][$a]))return $this->h['c'][$a];else{$c=strtoupper($a);if(isset($this->a['c'][$c])){if(!$b)$b=$a;return $this->h['c'][$a]=$this->g($this->a['c'][$c],$b);}}}public function d($a=false,$b=false){if($a){if(isset($this->h['b'][$a]))return $this->h['b'][$a];else if(isset($this->a['b'][$a]))return $this->h['b'][$a]=$this->g($this->a['b'][$a],$b);}else if(count($this->a['b']))return true;}public function e($a,$b=false){if(isset($this->h['d'][$a]))return $this->h['d'][$a];else if(isset($this->a['d'][$a]))return $this->h['d'][$a]=$this->g($this->a['d'][$a],$b);}public function f($a){if(isset($this->a['e'][$a]))return $this->a['e'][$a];}private function g($a,$b){if($b&&($c='g_'.$b)&&method_exists($this,$c))return $this->$c($a);else return $a;}private function g_server_protocol($a){preg_match('~^[a-z]{4,5}/[0-9]\.[0-9]$~i',$a,$b);if(isset($b[0]))return $b[0];}private function g_server_name($a){preg_match('~^[a-z0-9-_\.]{2,300}$~i',$a,$b);if(isset($b[0]))return $b[0];}private function g_document_root($a){$a=str_replace('\\','/',$a);if(substr($a,-1)=='/')return substr($a,0,-1);return $a;}private function g_http_accept_language($a){preg_match('~[a-z]{2}~i',strtolower(substr($a,0,2)),$b);if(isset($b[0]))return $b[0];}private function g_remote_addr($a){return $this->g_ip($a);}private function g_server_addr($a){return $this->g_ip($a);}private function g_ip($a){preg_match('~^[a-z0-9.:]{1,40}$~i',$a,$b);if(isset($b[0]))return $b[0];}private function g_sha1($a){preg_match('~^[a-z0-9]{40}$~i',$a,$b);if(isset($b[0]))return $b[0];}}final class b{private $i;private $j;private $k;private $l;public function __construct($a){$this->i=$a;$this->a('Content-type: text/html; charset=utf-8');}public function a($a){return $this->j[]=$a;}public function c($a,$b){return $this->j[]=$this->i.' '.$a.' '.$b;}public function d($a){return $this->j[]='Location: '.$a;}public function e($a,$b=false,$c=false,$d=false,$e=false,$f=false,$g=false){$h['name']=$a;$h['value']=$b;$h['httponly']=$g;$h['expire']=(int)$c;$h['path']=$d;$h['domain']=$e;$h['secure']=(int)$f;$this->k[]=$h;}public function f($a,$b=false,$c=false){$this->e($a,'',time()-60*60,$b,$c);}public function g($a){return $this->l=$a;}public function h(){if(isset($this->j))foreach($this->j as $a)header($a);if(isset($this->k))foreach($this->k as $b)setcookie($b['name'],$b['value'],$b['expire'],$b['path'],$b['domain'],$b['secure'],$b['httponly']);if(isset($this->l))print $this->l;}}final class c{const q="\n";const r='lang.ini';const s='conf.ini';private $q;private $r;private $s;private $t;private $u;private $v;public function __construct($a,$b,$c,$d){$e=str_replace('\\','/',__FILE__);if(stripos($e,$b)!==false)$this->q['a']=dirname($e).'/';else$this->q['a']=$a;$this->q['b']=$b;$this->q['c']=str_ireplace($this->q['b'],'',$this->q['a']);$this->q['d']=$this->p($a);$this->q['e']=$this->p($this->q['c']);$this->s=parse_ini_file($a.self::r,true);$this->t=parse_ini_file($a.self::s,true);$this->u=array('a'=>'<link rel="stylesheet" href="{root}textolite.css?v={version}">','b'=>'<base href="{base}">','c'=>'<ol><li>{type}</li><li>text</li></ol>','d'=>'<ol><li>{type}</li></ol>','e'=>'<div id="textolite-panel"><div><div><h1><span>T</span>exto<span>lite</span></h1><p><span>Standard</span> <span>v2.02</span></p></div>{mode}<ul><li><a>{files}</a><div id="textolite-files"><ol><li>{file_name}</li><li>{file_size}</li><li>{file_changed}</li><li>{file_menu}</li></ol><ul>{filelist}</ul></div></li><li><a>{settings}</a><div id="textolite-settings"><fieldset><legend>{auth}</legend><dl><dt>{new_password}:</dt><dd><input type="password" maxlength="14"><a></a></dd><dt>{login_attempts}:</dt><dd><input type="text" maxlength="2" value="{auth_error_limit}"></dd><dt>{lockout_duration}:</dt><dd><input type="text" maxlength="7" value="{auth_lockout_duration}"></dd><dt>{session_autoreset}:</dt><dd><input type="text" maxlength="3" value="{session_reset}"></dd></dl></fieldset><fieldset><legend>{source_editor}</legend><dl><dt>{code_redraw}:</dt><dd><input type="text" maxlength="7" value="{code_redraw_delay}"></dd><dt>{increase_delay}:</dt><dd><input type="text" maxlength="7" value="{code_redraw_max_delay}"></dd><dt>{size_for_delay}:</dt><dd><input type="text" maxlength="7" value="{code_redraw_max_delay_filesize}"></dd><dt>{size_for_highlight}:</dt><dd><input type="text" maxlength="7" value="{code_highlight_filesize_limit}"></dd></dl></fieldset><fieldset><legend>{system}</legend><dl><dt>{if_file_not_selected}:</dt><dd><input type="text" maxlength="30" value="{default_file}"></dd></dl></fieldset><fieldset><legend>{language}</legend><dl>{langlist}</dl></fieldset><fieldset><legend>{extended}</legend><dl><dt>{activate}:</dt><dd><input type="text" maxlength="7"></dd></dl></fieldset><p><input type="button" value="{save}" disabled></p></div></li></ul><div></div><ul><li><input type="button" value="{save}" disabled></li><li><input type="button" value="{logout}" disabled data-confirm="{not_save}"></li></ul><p><samp data-saving="{saving}" data-saved="{saved}" data-not-saved="{not_saved}" data-reset-session="{reset_session}" data-access-closed="{access_closed}" data-request-rejected="{request_rejected}" data-no-response="{no_response}" data-old-browser="{old_browser}" data-new-version="{new_version}" data-need-update="{need_update}" data-install="{install}" data-not-install="{not_install}" data-download-installer="{download_installer}" data-system-update="{system_update}" data-update-error="{update_error}" data-install-complete="{install_complete}" data-no-connect="{no_connect}" data-password-hashing="{password_hashing}" data-pass-complexity="{pass_complexity}" data-uploading="{uploading}" data-uploading-complete="{uploading_complete}" data-uploading-error="{uploading_error}" data-count-limit="{count_limit}" data-size-limit="{size_limit}" data-file-deletion="{file_deletion}" data-file-deleted="{file_deleted}" data-deletion-error="{deletion_error}" data-show-password="{show_password}" data-hide-password="{hide_password}" data-post-max-size="{post_max_size}" data-upload-max-filesize="{upload_max_filesize}" data-max-file-uploads="{max_file_uploads}" data-session-autoreset="{session_reset}" data-ip="{ip}" data-sip="{sip}" data-root="{root}" data-is-edited="{is_edited}" data-version="{version}"></samp><noscript><samp>{requires_javascript}</samp></noscript><i></i></p></div></div><script src="{root}textolite.js?v={version}"></script><script type="text/template" id="textolite-block"><var class="textolite-block" contenteditable></var></script><script type="text/template" id="textolite-source">{source}</script>','f'=>'<!doctype html><html id="textolite-login"><head><title>{auth} - Textolite</title><meta charset="utf-8"><link rel="stylesheet" href="{root}textolite.css?v={version}"></head><body><fieldset><legend>{auth}</legend><ol data-error-limit="{error_limit}" data-error-count="{error_count}"><li></li></ol><p><samp data-password-hashing="{password_hashing}" data-password-checking="{password_checking}" data-access-granted="{access_granted}" data-access-denied="{access_denied}" data-no-response="{no_response}" data-root="{root}"></samp><noscript><samp>{requires_javascript}</samp></noscript><i></i></p><p><span>{password}:</span><input type="password" data-pass-complexity="{pass_complexity}" maxlength="14"><a data-show-password="{show_password}" data-hide-password="{hide_password}"></a></p><p><input type="button" value="{login}" disabled></p></fieldset><script src="{root}textolite.js?v={version}"></script></body></html>','g'=>'<!doctype html><html id="textolite-error"><head><title>{code} - {{code}} - Textolite</title><meta charset="utf-8"><link rel="stylesheet" href="{root}textolite.css?v={version}"></head><body><samp><span>{code}</span> {{code}}</samp></body></html>','h'=>'<!doctype html><html id="textolite-editor"><head><title>{title} - Textolite</title><meta charset="utf-8"><link rel="stylesheet" href="{root}textolite.css?v={version}"></head><body><ol data-item="<li style=height:0px></li>"></ol><pre contenteditable data-redraw-delay="{redraw_delay}" data-highlight="{highlight}"></pre></body></html>','i'=>'<li><ol class="textolite-folder"><li><a data-url="{url}">{name}</a></li><li>{size}</li><li>{date}</li><li><i title="{add_file}"></i></li></ol><ul></ul></li>','j'=>'<li><ol class="textolite-file"><li><a data-url="{url}">{name}</a></li><li>{size}</li><li>{date}</li><li><i title="{delete_file}"></i><i title="{deletion_confirm}"></i><i title="{deletion_cancel}"></i></li></ol></li>','k'=>'<dd><label>{radio}<em></em>{{lang}}</label></dd>','l'=>'<input type="radio" name="{name}" value="{value}">','m'=>'<input type="radio" name="{name}" value="{value}" checked>');if(stripos($f=$this->h('lang'),',')){if($d&&stripos($f,$d)!==false)$this->r=$d;else if(stripos($f,$c)!==false)$this->r=$c;else$this->r=substr($f,0,2);}else$this->r=substr($f,0,2);}public function __destruct(){if($this->v)$this->j();}public function a(){return $this->r;}public function b(){return $this->q['c'];}public function d(){return $this->q['a'];}public function e(){return $this->q['e'];}public function f(){return $this->q['d'];}public function g(){return $this->q['b'];}public function h($a,$b=false){if($b){if(isset($this->t[$b][$a]))return $this->t[$b][$a];}else if(isset($this->t[$a]))return $this->t[$a];}public function i($a,$b,$c=false){if($c){if(isset($this->t[$c])){$this->v=true;return $this->t[$c][$a]=$b;}}else{$this->v=true;return $this->t[$a]=$b;}}private function j(){foreach($this->t as $a => $b)if(!is_array($b))$c[]=$a.' = '.$b.self::q.self::q;foreach($this->t as$a=>$b){if(is_array($b)){$c[]='['.$a.']'.self::q.self::q;foreach($b as$d=>$e)$c[]="\t".$d.' = '.$e.self::q;$c[]=self::q;}}if($f=fopen($this->q['a'].self::s,'w')){flock($f,LOCK_EX);fwrite($f,implode('',$c));flock($f,LOCK_UN);fclose($f);}}public function k($a,$b=false){if(isset($this->u[$a]))return $this->m($this->l($this->u[$a],$b));}public function l($a,$b){if($b)foreach($b as$c=>$d)$a=str_ireplace('{'.$c.'}',$d,$a);return $a;}public function m($a){preg_match_all('~\{([a-z0-9_]{2,30})\}~i',$a,$b);if($b[1]){$b[1]=array_unique($b[1]);foreach($b[1]as$c)if($d=$this->n($c))$a=str_ireplace('{'.$c.'}',$d,$a);}return $a;}public function n($a){if(isset($this->s[$this->r][$a]))return $this->s[$this->r][$a];}public function o($a){if(isset($this->s['en'][$a]))return $this->s['en'][$a];}public function p($a){if(substr_count($a,'/')>2)return dirname($a).'/';else return '/';}}final class d{const s='1.22';private $s;private $t;private $u;public function __construct($a,$b,$c){$this->s=$a;$this->t=$b;$this->u=$c;}public function a(){$a=$this->t->e('textolite_session','sha1');if($a&&$a==$this->s->h('session'))$this->b();else{$b=$this->s->h('auth_error_list');$c=$this->s->h('auth_error_limit');$d=$this->t->c('remote_addr');if($b&&isset($b[$d]))$e=$b[$d];else$e=0;$f=time();if($this->t->d()&&$this->t->c('http_ajax')){$g=$this->t->d('password','sha1');if($g&&($e<$c||$this->s->h('auth_error_time')+($this->s->h('auth_lockout_duration')*60)<$f)){$h=$this->s->h('password');$i=$this->s->h('pass_complexity_js')*1;$j=$this->s->h('pass_complexity')*1;$x=$j-$i;for($y=0;$y<$x;$y++)$g=sha1($g);if($h==$g){$this->p();if(isset($b[$d])){unset($b[$d]);$this->s->i('auth_error_list',$b);}if($i<5)$this->s->i('pass_complexity_js',15000);else$this->s->i('pass_complexity_js',$i-1);$this->s->i('filelist','');}else{$this->s->i('auth_error_time',$f);$this->s->i($d,$e+1,'auth_error_list');$this->u->c(404,$this->s->o('404'));}}else$this->u->c(404,$this->s->o('404'));}else{if($e<$c||$this->s->h('auth_error_time')+($this->s->h('auth_lockout_duration')*60)<$f){$k['root']=$this->s->b();$k['error_limit']=$c;$k['error_count']=$e;$k['pass_complexity']=$this->s->h('pass_complexity_js');$k['version']=self::s;$this->u->g($this->s->k('f',$k));}else throw new Exception(false,403);}}}public function b(){$a=$this->t->b();if(!$a){if($this->t->c('script_filename')!=str_replace('\\','/',__FILE__))$this->m();throw new Exception($this->s->b().$this->s->h('default_file'),307);}$b=$this->s->f().$a;if($this->t->c('http_ajax')){if($this->t->d('logout')){$this->q();}else if(($c=$this->t->d('save'))&&($d=$this->t->d('token','sha1'))&&$d==$this->t->e('textolite_token','sha1')){$this->u->f('textolite_token');$c=str_replace('</_cript','</script',base64_decode(str_replace('_','a',$c)));$c=str_replace('<_cript','<script',$c);if($e=fopen($b,'w')){flock($e,LOCK_EX);fwrite($e,$c);flock($e,LOCK_UN);fclose($e);$this->s->i('filelist','');}}else if($f=$this->t->d('open')){$f=rawurldecode($f);$g=$this->g($f);if($g===false){$this->s->i('filelist','');$g=$this->g($f);}if($g!==false){if(substr_count($f,'/')==substr_count($this->s->e(),'/'))$this->u->a('X-System-URL: '.$this->s->b());else if(strrpos($f,$this->s->b())!==false)$this->u->a('X-System-Folder: 1');$this->u->g($g);}else$this->u->c(404,$this->s->o('404'));}else if(($f=$this->t->d('upload'))&&($d=$this->t->d('token','sha1'))&&$d==$this->t->e('textolite_token','sha1')){$this->u->f('textolite_token');$f=rawurldecode($f);$h=$this->s->g().$f;$i=$this->t->f('file');if(count($i)&&is_dir($h)){$j='';$k=$this->s->k('j');foreach($i['tmp_name'] as$l=>$m){$n=$this->f($h.$i['name'][$l]);move_uploaded_file($m,$h.$i['name'][$l]);$b=$h.$n;$o['name']=$n;$o['date']=filemtime($b);$o['size']=filesize($b);preg_match('~\.(?:html?|sh?tml?|php|css|js|xml)$~i',$o['name'],$p);if(isset($p[0]))$o['url']=$this->s->b().substr($f,strlen($this->s->e())).$o['name'];else$o['url']=$f.$o['name'];$j.=$this->s->l($k,$o);}$this->s->i('filelist','');$q=$this->j($f);$r=$q['size'];foreach($i['error'] as$l=>$s)if($i['error'][$l])$j='';$this->u->a('X-Folder-Size: '.$r);$this->u->g($j);}else$this->u->c(404,$this->s->o('404'));}else if(($t=$this->t->d('remove'))&&($d=$this->t->d('token','sha1'))&&$d==$this->t->e('textolite_token','sha1')){$this->u->f('textolite_token');$t=rawurldecode($t);$b=$this->s->g().$t;$b=str_replace($this->s->b(),$this->s->e(),$b);if(is_file($b) && unlink($b)){$this->s->i('filelist','');$u=$this->j($this->s->p($t));$this->u->a('X-Folder-Size: '.$u['size']);}else$this->u->c(404,$this->s->o('404'));}else if(($v=$this->t->d('settings'))&&($d=$this->t->d('token','sha1'))&&$d==$this->t->e('textolite_token','sha1')){$this->u->f('textolite_token');if($v['password']){$w=$this->s->h('password');$x=$this->s->h('pass_complexity')-$this->s->h('pass_complexity_js');for($y=0;$y<$x;$y++)$v['password']=sha1($v['password']);if($v['password']!=$w)$this->s->i('password',$v['password']);}if($v['lang']&&$v['lang']!=$this->s->a()){if(stripos($z=$this->s->h('lang'),',')&&stripos($z,$v['lang'])!==false){if($v['lang']!=$this->t->c('http_accept_language'))$this->u->e('textolite_lang',$v['lang'],time()+60*60*24*365,$this->s->b(),false,false,true);else$this->u->f('textolite_lang',$this->s->b());}else$this->u->c(404,$this->s->o('404'));}if($this->s->h('default_file')!==null&&preg_match('~^.{1,30}$~i',$v['default_file'],$p)&&isset($p[0])){$this->s->i('default_file',$v['default_file']);}else$this->u->c(404,$this->s->o('404'));unset($v['password'],$v['lang'],$v['default_file']);foreach($v as$l=>$s)if($this->s->h($l)!==null&&preg_match('~^[0-9]{1,7}$~i',$s,$p)&&isset($p[0]))$this->s->i($l,$s);else$this->u->c(404,$this->s->o('404'));}else if($this->t->d('reload')){$this->p();}else if(($u=$this->t->d('install'))&&($d=$this->t->d('token','sha1'))&&$d==$this->t->e('textolite_token','sha1')){$this->u->f('textolite_token');$w=$this->s->d().'update.php';preg_match('~^[a-z0-9+=/_]+$~i',$u,$p);if(isset($p[0])&&($u=base64_decode(str_replace('_','a',$u)))&&($e=fopen($w,'w'))){flock($e,LOCK_EX);$u=fwrite($e,$u);flock($e,LOCK_UN);fclose($e);if($u){$o=include$w;if($o=='error')$this->u->c(404,$this->s->o('404'));else if(file_exists($this->s->f().$o))$this->u->g($this->s->b().$o);unlink($w);}else$this->u->c(404,$this->s->o('404'));}else$this->u->c(404,$this->s->o('404'));}else$this->u->c(404,$this->s->o('404'));}else{$this->p();if(file_exists($b)){$n=true;$e['is_edited']='';$c=$this->c($b);$f=strtolower(substr($b,strripos($b,'.')+1));preg_match('~^html?|sh?tml?|xml$~i',$f,$p);if(isset($p[0])){if(stripos($c,'<head')!==false&&stripos($c,'<body')!==false){$n=$this->t->e('textolite_html');$e['mode']=$this->s->k('c',array('type'=>'html'));$g=$this->t->d('switch');if(is_numeric($g)){$h=$this->t->d('source');if($h&&($d=$this->t->d('token','sha1'))&&$d==$this->t->e('textolite_token','sha1')){$this->u->a('X-XSS-Protection: 0');$this->u->f('textolite_token');$e['is_edited']='1';$h=str_replace('</_cript','</script',$h);$c=str_replace('<_cript','<script',$h);}if($g==='1'&&!$n){$n=true;$this->u->e('textolite_html',1,time()+60*60*24*90,$this->s->b(),false,false,true);}if($g==='0'&&$n){$n=false;$this->u->f('textolite_html',$this->s->b());}}preg_match('~<title>([^<>]{1,150})</title>~i',$c,$p);if(isset($p[1]))$i['title']=$p[1];else$i['title']=false;}else$e['mode']=$this->s->k('d',array('type'=>'html'));}else$e['mode']=$this->s->k('d',array('type'=>$f));if($n){$j=strlen($c);if($j>$this->s->h('code_redraw_max_delay_filesize'))$i['redraw_delay']=$this->s->h('code_redraw_max_delay');else$i['redraw_delay']=$this->s->h('code_redraw_delay');if($j>$this->s->h('code_highlight_filesize_limit'))$i['highlight']='';else$i['highlight']=1;if(!isset($i['title']))$i['title']=$this->s->b().$a;$i['root']=$this->s->b();$i['version']=self::s;$l=$this->s->k('h',$i);}else{$l=$c;if(stripos($l,'<base')===false){$m=$this->s->e();if($o=strripos($a,'/'))$m.=substr($a,0,$o+1);$l=preg_replace('~<head( +[^>]*?)*?>~i','$0'.$this->s->k('b',array('base'=>$m)),$l);}$l=str_replace('</head>',$this->s->k('a',array('root'=>$this->s->b(),'version'=>self::s)).'</head>',$l);}$c=str_replace('</script','</_cript',$c);$e['source']=str_replace('<script','<_cript',$c);}else{$e['is_edited']='';$e['source']='';$e['mode']=$this->s->k('d',array('type'=>'404'));$l=$this->s->k('g',array('code'=>'404','root'=>$this->s->b(),'version'=>self::s));}$e['root']=$this->s->b();$e['ip']=$this->t->c('remote_addr');$e['sip']=$this->t->c('server_addr');$e['version']=self::s;$e['filelist']=$this->i($this->s->e());$e['pass_complexity']=$this->s->h('pass_complexity_js');$e['session_reset']=$this->s->h('session_reset');$e['post_max_size']=$this->e(ini_get('post_max_size'));$e['upload_max_filesize']=$this->e(ini_get('upload_max_filesize'));$e['max_file_uploads']=ini_get('max_file_uploads');$e['auth_error_limit']=$this->s->h('auth_error_limit');$e['auth_lockout_duration']=$this->s->h('auth_lockout_duration');$e['code_redraw_delay']=$this->s->h('code_redraw_delay');$e['code_redraw_max_delay']=$this->s->h('code_redraw_max_delay');$e['code_redraw_max_delay_filesize']=$this->s->h('code_redraw_max_delay_filesize');$e['code_highlight_filesize_limit']=$this->s->h('code_highlight_filesize_limit');$e['default_file']=$this->s->h('default_file');$e['langlist']=$this->o();$e['source']=str_replace('{','!~!',$e['source']);$l=str_replace('</body>',$this->s->k('e',$e).'</body>',$l);$l=str_replace('!~!','{',$l);$this->u->g($l);}}public function c($a){$b=file_get_contents($a);preg_match('~<meta[^>]+windows-1251~i',$b,$c);if(isset($c[0])){$b=preg_replace('~(<meta[^>]+)windows-1251~i','$1utf-8',$b);$b=iconv('Windows-1251','UTF-8',$b);}return $b;}public function e($a){$a=strtolower(trim($a));switch($a[strlen($a)-1]){case'm':return $a*1048576;case'k':return $a*1024;case'g':return $a*1073741824;default:return $a;}}public function f($a){if(file_exists($a)){preg_match('~\.[a-z0-9]{1,5}$~i',$a,$b);if(isset($b[0]))$c=preg_replace('~\.([a-z0-9]{1,5})$~i','(backup1).$1',$a);else$c+='(backup1)';for($d=1;file_exists($c);$d++)$c=preg_replace('~\(backup'.$d.'\)~i','(backup'.($d+1).')',$c);rename($a,$c);}else$c=$a;return preg_replace('~^.*/~i','',$c);}public function g($a){$b=$this->h($a);if($b!==false){$c='';$d=$this->s->k('i');$e=$this->s->k('j');foreach($b as$f){if(isset($f['list'])){unset($f['list']);$c.=$this->s->l($d,$f);}else$c.=$this->s->l($e,$f);}return $c;}else return false;}public function h($a){$b=$this->k();if($a!='/'){$c=$this->s->e();if($c!='/'){if($a==$c)$d=false;else$d=substr(str_replace($c,'',$a),0,-1);}else$d=substr($a,1,-1);}else$d=false;$e=$b['list'];if($d){$d=explode('/',$d);foreach($d as$f){foreach($e as$g){if($g['name']==$f){$e=$g['list'];break;}}if($e!=$g['list']){$e=false;break;}}}return $e;}public function i($a){$b=$this->j($a);unset($b['list']);return $this->s->k('i',$b);}public function j($b){$a=$this->k($b);if($b!='/'){$c=$this->s->e();if($c!='/'){if($b==$c)$d=false;else$d=substr(str_replace($c,'',$b),0,-1);}else$d=substr($b,1,-1);}else$d=false;$f=$a;if($d){$d=explode('/',$d);foreach($d as$e){foreach($f['list'] as$g){if($g['name']==$e){$f=$g;break;}}if($f!=$g)$f=false;}}return $f;}public function k(){$a=$this->s->h('filelist');if(!$a){$a=$this->l($this->s->e());$this->s->i('filelist',urlencode(serialize($a)));}else$a=unserialize(urldecode($a));return $a;}public function l($a){$b=$this->s->g().$a;if($a=='/')$c['name']=$this->t->c('server_name');else$c['name']=substr($a,strrpos(substr($a,0,-1),'/')+1,-1);$c['date']=filemtime($b);$c['size']=0;$c['url']=$a;$d=$e=array();if($g=opendir($b)){while(($f=readdir($g))!==false){if($f!='.'&& $f!='..'){$h=array();if(is_file($b.$f)){$h['name']=$f;$h['size']=filesize($b.$f);$h['date']=filemtime($b.$f);preg_match('~\.(?:html?|sh?tml?|php|css|js|xml)$~i',$f,$i);if(isset($i[0]))$h['url']=$this->s->b().substr($a,strlen($this->s->e())).$f;else$h['url']=$a.$f;$e[]=$h;}else{$h=$this->l($a.$f.'/');$d[]=$h;}$c['size']+=$h['size'];}}closedir($g);}$c['list']=array_merge($d,$e);return $c;}public function m(){$a=$this->s->d().'.htaccess';if(file_exists($a)){$b=file_get_contents($a);preg_match('~RewriteBase (.+?)\n~i',$b,$c);if(isset($c[0])&&isset($c[1])){if($c[1]!=$this->s->b()){$b=str_replace($c[0],'RewriteBase '.$this->s->b()."\n",$b);$this->n($b);}}else{$b=preg_replace('~(RewriteEngine .+?\n)~i','$1'."\n".'RewriteBase '.$this->s->b()."\n",$b);$this->n($b);}}}public function n($a){if($b=fopen($this->s->d().'.htaccess','w')){flock($b,LOCK_EX);fwrite($b,$a);flock($b,LOCK_UN);fclose($b);}}public function o(){$a='';$b=explode(',',$this->s->h('lang'));$c=$this->s->a();foreach($b as$d){$d=trim($d);if($c==$d)$e=$this->s->k('m',array('name'=>'lang','value'=>$d));else$e=$this->s->k('l',array('name'=>'lang','value'=>$d));$a.=$this->s->k('k',array('radio'=>$e,'lang'=>$d));}return $a;}public function p(){$a=sha1(time().mt_rand());$this->s->i('session',$a);$this->u->e('textolite_session',$a,time()+60*$this->s->h('session_reset'),$this->s->b(),false,false,true);}public function q(){$this->s->i('session','');$this->u->f('textolite_session',$this->s->b());}public function r($a){$this->u->c($a->getCode(),$this->s->o($a->getCode()));if($b=$a->getMessage())$this->u->d($b);$c['code']=$a->getCode();$c['root']=$this->s->b();$c['version']=self::s;$this->u->g($this->s->k('g',$c));}}$e=new a();$f=new b($e->c('server_protocol'));$g=new c(dirname($e->c('script_filename')).'/',$e->c('document_root'),$e->c('http_accept_language'),$e->e('textolite_lang'));$h=new d($g,$e,$f);try{$h->a();}catch(Exception $j){$h->r($j);}$f->h();?>