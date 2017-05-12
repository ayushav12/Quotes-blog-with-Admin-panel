<?php

namespace Blog1\Http\Controllers;

use Blog1\AuthorLog;

use Blog1\Author;

use Blog1\Quote;

use Illuminate\Http\Request; //using the request object

use Blog1\Events\QuoteCreated;

use Illuminate\Support\Facades\Event;

class QuoteController extends Controller
{
    public function getIndex($author=null)
    {
        if(!is_null($author)){
            $quote_author=Author::where('name',$author)->first();
            if($quote_author) {
                $quotes=$quote_author->quotes()->orderBy('created_at','desc')->paginate(6);
            }
        }
        else
        {
    	 $quotes = Quote::orderBy('created_at','desc')->paginate(6);
        }
       return view('index',['quotes'=> $quotes]);

    }

	public function postQuote(Request $request) //this function accept new quotes
	{  
       $this->validate($request, [
           'author' => 'required|max:60|alpha',
           'quote' => 'required|max:500',
           'email' => 'required|email'
        ]);
    //extracting the data using request object
        $authorText = ucfirst($request['author']);
        $quoteText = $request['quote'];

        $author = Author::where('name', $authorText)->first(); //to check if author already exists in the database
        if(!$author){
        	//saving new author name
        	$author=new Author();
        	$author->name = $authorText;
            $author->email=$request['email'];
        	$author->save();
        }
        //creating the quote
        $quote = new Quote();
        $quote->quote=$quoteText;
        $author->quotes()->save($quote); //mapping the quote object to appropriate author

        Event::fire(new QuoteCreated( $author)); //firing the event

        return redirect()->route('index')->with([
                'success'=>'Quote saved!'    
        	]);
        
	}

    public function getDeleteQuote($quote_id)
    {
        $quote=Quote::find($quote_id);
        $author_deleted=false;
        if(count($quote->author->quotes)===1)
        {
            $quote->author->delete();
            $author_deleted=true;
        }
        $msg=$author_deleted ? 'Quote and author deleted!' : 'Quote deleted!';
        $quote->delete();
        return redirect()->route('index')->with(['success' => $msg]);
    }

    public function getMailCallback($author_name)
    {
        $author_log=new AuthorLog();
        $author_log->author=$author_name;
        $author_log->save();
        return view('email.callback',['author'=>$author_name]);
    }
}