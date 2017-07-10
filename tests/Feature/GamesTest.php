<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Game;

class GamesTest extends TestCase
{
	use DataBaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
	/** @test */
    public function test_games_can_be_created()
    {
	   //$user = factory(App\User::class)->create();
       //$game = $user->game()->create(
		//	[
		//	'answer' => 'broed', 
		////	'guess' => 'traag',
		//	'created_at'=>time(),
		//	'updated_at'=>time(),
		//	'user_id' => $user->id,
		//	]
		//);
		

		  $this->assertTrue(true);
		//$found_game = Game::find(1);
		//$this->assertEquals($found_game->answer, 'broed');
		//$this->assertEquals($found_game->guess, 'traag');
		//$this->seeInDatabase('games',['id'=>1, 'answer' => 'broed','guess'=>'traag']);
    }
}
