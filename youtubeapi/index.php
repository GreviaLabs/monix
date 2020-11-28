<?php 

// require_once 'vendor/autoload.php';

function curlget($url,$method = 'get',$param = NULL) {
	// create curl resource
	$ch = curl_init();

	// set url
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	
	if ($method == 'get') {
		if (! empty($param)) {
			$paramget = '?';
			$xx = 1;
			foreach($param as $name => $value) {
				// $paramget .= urlencode($name).'='.urlencode($value).'&';
				$paramget .= $name.'='.$value;
				
				if (count($param) != $xx) $paramget.= '&';
				$xx++;
			}
			$url.= $paramget;
		}
	}

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 80);
	
	
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// $output contains the output string
	$output = curl_exec($ch);
	// debug($url);

	// close curl resource to free up system resources
	curl_close($ch);
	return $output;
}

function debug($x,$die=0) {
	echo "<pre>";
	print_r($x);
	echo "</pre>";
	if ($die) die;
}

// project grevia, not working
// $apikey='AIzaSyA_4eVQFLKDCHOOSIkkSJRXj7WhCz_IqvQ';

// projet firebasenotification
$apikey='AIzaSyAU8xJXSR4a2WnYiA6oaZA2EZyQ2CpawU0';

// $hiturl = '';

// $hiturl.= '&key='.$apikey;

// $client = new Google\Client();
// $client->setApplicationName("Client_Library_Examples");
// $client->setDeveloperKey("YOUR_APP_KEY");

// $service = new Google_Service_Books($client);
// $optParams = array(
  // 'filter' => 'free-ebooks',
  // 'q' => 'Henry David Thoreau'
// );
// $results = $service->volumes->listVolumes($optParams);

// foreach ($results->getItems() as $item) {
  // echo $item['volumeInfo']['title'], "<br /> \n";
// }

// ---------------------------------------------------------

// API YOUTUBE HERE
// https://developers.google.com/youtube/v3/docs/search/list

$hiturl = 'https://youtube.googleapis.com/youtube/v3/search'; 
$param['key'] = $apikey;

// module videos
// $param['part'] = 'snippet,contentDetails,statistics,status,chart';

// module search
// $param['channelId'] = 'UCpPi_tJA2K0_8XDWssROOGQaaa';
$param['q'] = 'rumah%20minimalis';
$param['maxResults'] = 5;

/*
date – Resources are sorted in reverse chronological order based on the date they were created.
rating – Resources are sorted from highest to lowest rating.
relevance – Resources are sorted based on their relevance to the search query. This is the default value for this parameter.
title – Resources are sorted alphabetically by title.
videoCount – Channels are sorted in descending order of their number of uploaded videos.
viewCount – Resources are sorted from highest to lowest number of views. For live broadcasts, videos are sorted by number of concurrent viewers while the broadcasts are ongoing.
// */
$param['order'] = 'date';

$param['part'] = 'snippet';
// $param['videoDuration'] = 'medium';
// $param['videoType'] = 'movie';

// $curlget = curlget($hiturl,'get',$param);
// debug($curlget);

$curlget = '
{
  "kind": "youtube#searchListResponse",
  "etag": "jRc7hIu0UtNb71yjaq1JLuwdmrA",
  "nextPageToken": "CAUQAA",
  "regionCode": "ID",
  "pageInfo": {
    "totalResults": 501462,
    "resultsPerPage": 5
  },
  "items": [
    {
      "kind": "youtube#searchResult",
      "etag": "HyZrVL2ae1ak1dlns3zhWTCZxdw",
      "id": {
        "kind": "youtube#video",
        "videoId": "Zqs9D44FyiY"
      },
      "snippet": {
        "publishedAt": "2020-11-28T11:17:37Z",
        "channelId": "UCTe0JTi-AtZ3PTjy2o6M8fg",
        "title": "Review Rumah Minimalis ||sakura school simulator",
        "description": "Assalamualaikum Teman-teman Makasih ya udah singga ke video ini Dan makasih juga buat yg like dan Comen Dan subscribe Kalian boleh kok request ...",
        "thumbnails": {
          "default": {
            "url": "https://i.ytimg.com/vi/Zqs9D44FyiY/default.jpg",
            "width": 120,
            "height": 90
          },
          "medium": {
            "url": "https://i.ytimg.com/vi/Zqs9D44FyiY/mqdefault.jpg",
            "width": 320,
            "height": 180
          },
          "high": {
            "url": "https://i.ytimg.com/vi/Zqs9D44FyiY/hqdefault.jpg",
            "width": 480,
            "height": 360
          }
        },
        "channelTitle": "Nadia Channel",
        "liveBroadcastContent": "none",
        "publishTime": "2020-11-28T11:17:37Z"
      }
    },
    {
      "kind": "youtube#searchResult",
      "etag": "GyCU-qXxM_YefdadGYyc5NT72_8",
      "id": {
        "kind": "youtube#video",
        "videoId": "dHRgDFjxzhI"
      },
      "snippet": {
        "publishedAt": "2020-11-28T11:10:29Z",
        "channelId": "UC_2yxlye4MujUoiIDXWaXOg",
        "title": "review rumah minimalis . . . tapi jelek????",
        "description": "",
        "thumbnails": {
          "default": {
            "url": "https://i.ytimg.com/vi/dHRgDFjxzhI/default.jpg",
            "width": 120,
            "height": 90
          },
          "medium": {
            "url": "https://i.ytimg.com/vi/dHRgDFjxzhI/mqdefault.jpg",
            "width": 320,
            "height": 180
          },
          "high": {
            "url": "https://i.ytimg.com/vi/dHRgDFjxzhI/hqdefault.jpg",
            "width": 480,
            "height": 360
          }
        },
        "channelTitle": "Thavma official",
        "liveBroadcastContent": "none",
        "publishTime": "2020-11-28T11:10:29Z"
      }
    },
    {
      "kind": "youtube#searchResult",
      "etag": "iZpaEnQlqTgN69LkRbYUPEd6scU",
      "id": {
        "kind": "youtube#video",
        "videoId": "-4RU5c-vhfo"
      },
      "snippet": {
        "publishedAt": "2020-11-28T10:54:34Z",
        "channelId": "UCytat4qKgIMl2EvG-TACvZw",
        "title": "Review rumah minimalis || sakura school simulator",
        "description": "maaf kalo Jelek dan ada salah kata karna Dilla baru belajar ngedit dan baru pertama kali nge vlog Vidio ini di you tube maaf kalo editan Dilla kelak dan gk ada ...",
        "thumbnails": {
          "default": {
            "url": "https://i.ytimg.com/vi/-4RU5c-vhfo/default.jpg",
            "width": 120,
            "height": 90
          },
          "medium": {
            "url": "https://i.ytimg.com/vi/-4RU5c-vhfo/mqdefault.jpg",
            "width": 320,
            "height": 180
          },
          "high": {
            "url": "https://i.ytimg.com/vi/-4RU5c-vhfo/hqdefault.jpg",
            "width": 480,
            "height": 360
          }
        },
        "channelTitle": "Dilla Official",
        "liveBroadcastContent": "none",
        "publishTime": "2020-11-28T10:54:34Z"
      }
    }
  ]
}
';

// show response
$html = '';
$yurl = 'https://www.youtube.com/watch?v=';
if (isset($curlget)) 
{
	// debug($curlget);
	$curlget = json_decode($curlget,1);
	// debug($curlget);
	// echo 'samplejson success 1<br/>';
	$html.= '<table class="table table-bordered table-striped table-hover ">';
	$html.= '<tr class="alert-info">';
	$html.= '  <td width=1>#</td>';
	$html.= '  <td>Thumbnail</td>';
	$html.= '  <td>Title & Desc</td>';
	$html.= '  <td>Option</td>';
	$html.= '</tr>';
	if (!empty($curlget['items'])) 
	{
		$listitem = $snippet = NULL;
		$listitem = $curlget['items'];
		// debug($listitem);
		foreach ($listitem as $key => $item) {
			$video_id = $item['id']['videoId'];
			$snippet = $item['snippet'];
			
			$itemurl = $yurl.''.$video_id;
			$thumbnail = '<img src="https://img.youtube.com/vi/'.$video_id.'/0.jpg" style="max-width: 200px"/>';

			$html.= '<tr class="table-info">';
			$html.= '<td>'.$key.'</td>';
			$html.= '<td><a href="'.$itemurl.'" target="blank">'.$thumbnail.'</a></td>';
			$html.= '<td><a href="'.$itemurl.'" target="blank">'.$snippet['title'].'</a><br/><br/>Desc<br/>'.$snippet['description'].'</td>';
			$html.= '<td></td>';
			$html.= '</tr>';
		
		}
	}
	$html.= '</table>';
	// echo $html;
}

?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>
<div class="container">
	<div class="row">
	
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
		<?php echo $html;?>
		</div>
		<div class="col-sm-1"></div>
		
	</div>
<div>
</body>
</html>
