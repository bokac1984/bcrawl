<?php
class CrawlerShell extends AppShell {
	public $uses = array('SearchResult');
	
    public function main() {
		$first = $this->SearchResult->find('first', array('conditions' => array( 'SearchResult.crawled' => 0)));
        
		$this->out(print_r($first));
    }
}
?>
