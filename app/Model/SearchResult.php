<?php
App::uses('AppModel', 'Model');
App::uses('simple_html_dom', 'Lib');

/**
 * SearchResult Model
 *
 * @property Search $Search
 * @property Client $Client
 */
class SearchResult extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'search_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'link' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'crawled' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Search' => array(
			'className' => 'Search',
			'foreignKey' => 'search_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function getContacts($id, $website)
	{
		if(!$this->exists($id))
		{
			throw new NotFoundException(__('invalid client id'));
		}
		if(substr($website, -1) === '/')
			$website = substr($website, 0, strlen($website)-1);

		$this->id = $id;
		$contactPages = $this->getContactPages($website);
		
		$facebook = array();
		$twitter = array();
		$phones = array();
		$emails = array();
				
		foreach($contactPages as $page)
		{
			$content = file_get_contents($page);
			
			$phones = array_merge( $phones, $this->findPhones($content) );
			$emails = array_merge( $emails, $this->findEmails($content) );
			
			$dom = new simple_html_dom();

			$dom->load($content);

			$links = $dom->find('a, area');
			
			foreach($links as $a)
			{
				if(stripos($a->href, 'facebook') !== FALSE)
						$facebook[] = $a->href;
				
				if(stripos($a->href, 'twitter') !== FALSE)
						$twitter[] = $a->href;
			}
			$dom->clear();
			unset($dom);
			
			
		}
		$facebookS = implode(';', $facebook);
		$twitterS = implode(';', $twitter);
		$phonesS = implode(';', $phones);
		$emailsS = implode(';', $emails);
		
		$data = array('SearchResult' => array(
			'id' => $id,
			'phone' => $phonesS,
			'email' => $emailsS,
			'facebook' => $facebookS,
			'twitter' => $twitterS
		));
		$this->save($data);
	}
	public function findPhones($text)
	{
		
		$regex = '/(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})' 
				.'(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})' 
				.'[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?/';
		preg_match_all($regex, $text, $matches);
        
        return $matches[0];
	}
	public function findEmails($text)
    {
        
        $pattern="/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
        
        preg_match_all($pattern, $text, $matches);
        
        return $matches[0];
    }

	public function getContactPages($website)
	{
		$content = file_get_contents($website);
		$dom = new simple_html_dom();

		$dom->load($content);

		$contactPages = array();

		$links = $dom->find('a');

		foreach($links as $a)
		{
			if(stripos($a->plaintext, 'contact'))
			{
				$contactPages[] = $this->makeAbsolute($a->href, $website);
				
			}

		}
		
		if(count($contactPages) === 0)
		{
			$DomDocument = new DOMDocument();
			$DomDocument->preserveWhiteSpace = false;
			$DomDocument->load($website . '/sitemap.xml');
			$DomNodeList = $DomDocument->getElementsByTagName('loc');

			foreach($DomNodeList as $url) {
				if(stripos($url->nodeValue, 'contact') !== FALSE)
				{
					$tmp = strtolower(end(explode('.', $url->nodeValue)));
					if(!preg_match("/jpg|jpeg|png|gif|swf/", substr($tmp, -4) ))
						$contactPages[] = $url->nodeValue;
				}
					
			}
			unset($DomDocument);
			
		}
		if(count($contactPages) === 0)
		{
			foreach($links as $a)
			{
				
				if(stripos($a->href, 'contact'))
				{
					$contactPages[] = $this->makeAbsolute($a->href, $website);

				}

			}
		}
		$dom->clear();
		unset($dom);
		return $contactPages;
	}

	public static function makeAbsolute($url, $base) 
	{

		// Return base if no url
		if( ! $url) return $base;

		// Return if already absolute URL
		if(parse_url($url, PHP_URL_SCHEME) != '') return $url;

		// Urls only containing query or anchor
		if($url[0] == '#' || $url[0] == '?') return $base.$url;

		// Parse base URL and convert to local variables: $scheme, $host, $path
		extract(parse_url($base));

		// If no path, use /
		if( ! isset($path)) $path = '/';

		// Remove non-directory element from path
		$path = preg_replace('#/[^/]*$#', '', $path);

		// Destroy path if relative url points to root
		if($url[0] == '/') $path = '';

		if( ! isset($host)) $host = '';
		// Dirty absolute URL
		$abs = "$host$path/$url";

		// Replace '//' or '/./' or '/foo/../' with '/'
		$re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
		for($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {}

		if( ! isset($scheme)) $scheme = '';
		// Absolute URL is ready!
		return $scheme.'://'.$abs;
	}
        
        public function saveSearchResults($search_id, $companies = array()) {
            if (is_array($companies)) {
                debug($companies['company-search']['companies']);
            }
        }
}
