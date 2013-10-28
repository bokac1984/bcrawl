<?php
class CrawlerShell extends AppShell {
	public $uses = array('SearchResult');
	
    public function main() {
		$first = $this->SearchResult->find('first', array('conditions' => array( 'SearchResult.crawled' => 0)));
        $id = $first['SearchResult']['id'];
		$website = $first['SearchResult']['website'];
		
		
		
		$this->out(print_r($id));
		$this->out(print_r($website));
    }
}
?>
