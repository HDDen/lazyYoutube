<?php

function flumb_getYoutubeID($txt){
	$splitted = explode(' src=', $txt);
	$result = '';
	
	if (isset($splitted[1])){
	  // убираем концовку
	  $result = $splitted[1];
	  $result = strtok($result, ' ');
 
	  // очищаем кавычки
	  $result = trim($result, '"\'>');
 
	  // имеем ссылку. Достаём id
	  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $result, $match);
	  if (isset($match[1])){
		 $result = $match[1];
	  }
	}
 
	return $result;
 }
 
function flumb_youtubeToDummy($html){
  $youtube_id = flumb_getYoutubeID($html);

  $result = '<div class="youtube-dummy" data-videoid="'.$youtube_id.'"><div class="youtube-dummy__img-wrapper">
      <img alt="Youtube-видео" class="youtube-dummy__img" srcset="https://i.ytimg.com/vi/'.$youtube_id.'/mqdefault.jpg 320w, https://i.ytimg.com/vi/'.$youtube_id.'/hqdefault.jpg 480w, https://i.ytimg.com/vi/'.$youtube_id.'/sddefault.jpg 640w, https://i.ytimg.com/vi/'.$youtube_id.'/maxresdefault.jpg 1280w" height="720" width="1280" sizes="(max-width: 430px) 320px, (max-width: 600px) 480px, (max-width: 640px) 100vw, (max-width: 991px) 640px, 920px" src="https://i.ytimg.com/vi/'.$youtube_id.'/maxresdefault.jpg" loading="lazy" />
  </div></div>';

  return $result;
}
