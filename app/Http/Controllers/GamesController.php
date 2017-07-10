<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use App\Dict;

class GamesController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user_id = auth()->user()->id;
		
		$game = Game::where('user_id',$user_id)->get();
		foreach($game as $i)
		{
			$i->delete();
		}
		$dict = new Dict;
		$dict = Dict::all()->random(1)[0];
		
		
		$game = new Game;
		$game->answer = strtoupper($dict->word);
		$game->guess = '';
		$game->user_id = $user_id;
		$game->save();
        return view('games.index')->with('letter',str_split($game->answer)[0]);
    }
	
	public function post(Request $request){
		//validate
		$this->validate($request, [
			'guess' => 'alpha'
		]);
		$error = 'noError';
				
		//create game
		$user_id = auth()->user()->id;
		$game = new Game;
		$game = Game::where('user_id',$user_id)->get()[0];
		$split = array(array());
		$answerLetters = str_split($game->answer);
		//validate for if lenght of guess = 5 and if its a real dutch word
		if(strlen($request->input('guess')) != 5){
			$error = 'Your word is not five letter long!';
			if($game->guess == '')
			{
				
				$data = array(
				'words'=>array(),
				'colors'=>array(),
				'correct'=>0,
				'nextLine'=>array($answerLetters[0],'.','.','.','.')
				);
				return view('/games.post')->with($data)->withErrors($error);
			}
		}elseif(count(Dict::where('word',$request->input('guess'))->get())==0)
		{
			$error = 'Not a real dutch word or in word database!';
			if($game->guess == '')
			{
				
				$data = array(
				'words'=>array(),
				'colors'=>array(),
				'correct'=>0,
				'nextLine'=>array($answerLetters[0],'.','.','.','.')
				);
				return view('/games.post')->with($data)->withErrors($error);
			}
		}else{
			if($game->guess == "")
			{
				$game->guess = strtoupper($request->input('guess'));
			}else
			{
				$game->guess = $game->guess . ' ' . strtoupper($request->input('guess'));
			}
		}
		
		$game->save();
		//return Game::all();
		
		$guesses = explode(" ",$game->guess);
		$i = 0;
		foreach($guesses as $guess)
		{
			$split[$i] = str_split($guess);
			$i++;
		}
		
		
		$correct = strtoupper($request->input('guess')) == $game->answer ? 1 : 0;
		
		
		
		$colors=array(array());
		$answerLettersTmp = $answerLetters;
		$splitTmp = $split;
		$nextLine=array($answerLetters[0],'.','.','.','.');
		
		for($i = 0;$i<count($splitTmp);$i++)
		{
			for($j = 0;$j<5;$j++)
			{
				if($answerLettersTmp[$j] == $splitTmp[$i][$j])
				{
					$nextLine[$j] = $answerLettersTmp[$j];
					$colors[$i][$j] = 'red';
					$answerLettersTmp[$j] = 'AA';
					$splitTmp[$i][$j] = 'BB';
					
				}else
				{
					$colors[$i][$j] = 'blue';
				}
			}
			for($j = 0;$j<5;$j++)
			{
				for($k = 0;$k<5;$k++)
				{
					if($splitTmp[$i][$j] == $answerLettersTmp[$k])
					{
						$colors[$i][$j] = '#D7DF01';
						$answerLettersTmp[$k] = '';
						$splitTmp[$i][$j] = '';
					}
				}
			}
			$answerLettersTmp = $answerLetters;
		}
		//$nextLine[0] = $answerLetters[0];
		//foreach($split as $s){
		//	foreach($s as $s2){
		//		echo $s2 . ' ';
		//	}
		//}
		$data = array(
			'words'=>$split,
			'colors'=>$colors,
			'correct'=>$correct,
			'nextLine'=>$nextLine,
			'answer'=>$answerLetters
		);
		if($error != 'noError')
		{
			return view('games.post')->with($data)->withErrors($error);
		}else
		{
			return view('games.post')->with($data);
		}
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
