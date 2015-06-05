<?
    //Credits must stay intact
    //Script by s.samiuddin
    //For more scripts and tutorials visit http://www.webdevtown.com
    //If this script is uploaded on any website without credits, it will be taken down.
	
	class webDevTown{
		
		//Loads file and provides and provides arrays to start method.
		static function load_files($website_url){
			$proxy_list			= file("proxies.txt");
			$useragent_list		= file("useragents.txt");
			$referal_list		= file("referals.txt");
			self::start($proxy_list, $referal_list, $useragent_list, $website_url);
		}
	
		//These three method below just randomize useragents, referal and proxy from the lists.
		private function random_useragent($useragent_list){
			$random_useragent = array_rand($useragent_list);
			return $useragent_list[$random_useragent];		
		}
		
		private function random_referal($referal_list){			
			$random_referal = array_rand($referal_list);	
			return $referal_list[$random_referal];
		}
		
		private function random_proxy($proxy_list){
			$random_proxy = array_rand($proxy_list);
			return $proxy_list[$random_proxy];
		}
		
		//Sends headers
		static function start($proxy_list, $referal_list, $useragent_list, $website_url){
			$ch = curl_init();
			
			$headers = array(
				"Accept: application/json, text/javascript, */*; q=0.01",
				"Accept-Language: en-US,en;q=0.5",
				"Accept-Encoding: gzip, deflate",
				"Content-Type: application/x-www-form-urlencoded; charset=UTF-8"
			);
			
			
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL, $website_url);
			curl_setopt($ch, CURLOPT_USERAGENT, self::random_useragent($useragent_list));
			curl_setopt($ch, CURLOPT_REFERER, self::random_referal($referal_list));			
			curl_setopt($ch, CURLOPT_PROXY, self::random_proxy($proxy_list));
			
			curl_exec($ch);
			curl_close($ch);
		}
		
	}
	
	?>