<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\DomCrawler\Client;


class SimpleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
	
	public function test_displays_home_page()
	{	
		$html = $this->call('GET','/')->getContent();
		$this->see('Welcome to lingo',$html,'h1');
		
		//probeersels
		//$crawler = new crawler($html);
		//$found = $crawler->filter("body:contains('Welcome to lingo')");
		//$this->assertGreaterThan(0,count($found));
		
		
		//$client = new Client();
		//$url_to_traverse = 'lingo.dev';
		
		//$crawler = $client->request('GET', $url_to_traverse);
		
		//$crawler = $this->client->request('GET', '/');
		//$found = $crawler->filter("body:contains('Welcome to lingo')");
		//die(var_dump($found));
		//$this->assertTrue(strpos($response->getContent(), 'Welcome to lingo') !== false);
		//$this->assertTrue(strpos($response->getContent(), 'This is lingo, groen groen') !== false);
	}
	
	protected function see($text,$html,$element = 'body')
	{
			$crawler =  new crawler($html);
			$found = $crawler->filter("{$element}:contains('{$text}')");
			$this->assertGreaterThan(0,count($found),'expected to see {$text} within the view');
	}
	
}
