<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\cart;
use App\Models\copy;
use App\Models\User;
use App\Models\category;
use App\Models\sendMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class operatuerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categorys = category::get();
        $books = book::get();
        return view('Operatuer_funcs.addBook', compact('categorys', 'books'));
    }

    public function index1()
    {
        //
        $user = auth()->user()->id;
        $categorys = category::get();
        $books = book::where('user_id', $user)->paginate(4);
        // dd($books);
        return view('Operatuer_funcs.gestion_of_books', compact('categorys', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = auth()->user()->id;
        // dd($user);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'number' => 'required|integer',
            'price' => 'required|numeric|gt:0', 
            'language' => 'required|string|max:50',
            'writer' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorys_id' => 'required', 
        ]);
        

        $imagePath = $request->file('image')->store('book_img', 'public');
        // dd($imagePath);

        book::create([
            'name' => $request->name,
            'description' => $request->description,
            'number' => $request->number,
            'price' => $request->price,
            'language' => $request->language,
            'writer' => $request->writer,
            'image' => $imagePath,
            'categorys_id' => $request->categorys_id,
            'user_id' => $user,
        ]);
        return redirect()->route('gestion_of_books')->with('success', 'book updated successfully');

        
    }
    public function addBookreserv(Request $request){
        // dd($request);
        $user = auth()->user()->id;
        $request->validate([
            'book_id' => 'required',
            'price' => 'required|numeric|gt:0',
            'number' => 'required|integer',
            
        ]);
        copy::create([
            'book_id' => $request->book_id,
            'price_of_reserv' => $request->price_of_reserv,
            'number' => $request->number,
            'user_id' => $user,
        ]);
        return redirect()->route('gestion_of_books')->with('success', 'book updated successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Book $book)
    {
        //
        $categorys = category::get();
        return view('Operatuer_funcs.editBook', compact('book', 'categorys'));
    }
    public function reservationform(Request $request, Book $book)
    {
        //
        return view('Operatuer_funcs.reservationform', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'number' => 'required',
            'price' => 'required',
            'language' => 'required',
            'writer' => 'required',
            'categorys_id' => 'required',
        ]);
        
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('book_img', 'public');
            $book->update(['image' => $imagePath]);
        }
        // dd($request);
    
        $book->update($request->except('image'));

        return redirect()->route('gestion_of_books')->with('success', 'Book updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('gestion_of_books')->with('success', 'Book deleted successfully');
    }

    public function getAllBooks1(){
        $books = book::paginate(6);
        // $copys = copy::get();
        $categorys = category::get();
        return view('AllBoks', compact('books', 'categorys'));
    }

    public function getAllBooks(){
        $books = Book::orderBy('id', 'desc')->take(4)->get();
        $categorys = category::orderBy('id', 'desc')->take(15)->get();
        $copys = copy::get();

        return view('welcome', compact('books', 'copys', 'categorys'));
    }
    
    

    // function for count lktoba 
    public function count(){
        
        return view('welcome', compact('resultsOfCount'));

    }

    // function dial reservation dbook
    public function reservBook(Request $request) {
        // dd($request);
        $currentDateTime = now();
        $threeDaysAgo = $currentDateTime->subDays(3);
        $bookId = $request->input('book_id');
        $book = Book::findOrFail($bookId);
        $user = Auth::user();
        $copyid = $request->input('copy_id');
        $blackListe = cart::where('user_id', $user->id)
                            ->where('copy_id', $copyid)
                            ->where('isReturn', 0)
                            ->where('check', 1)
                            ->where('updated_at', '<=', $threeDaysAgo)
                            ->exists();
        
 
        // Check if the user has already reserved the book
        $existingReservation = Cart::where('user_id', $user->id)
                                    ->where('copy_id', $copyid)
                                    ->where('type', 'reserv')
                                    ->where('isReturn', 0)
                                    ->exists();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'You already reserved this book.');
        }
         elseif ($blackListe){
            return redirect()->back()->with('error', 'You have to return our book first.');
        }
        // Check if there are available copies of the book
        if ($request->input('number') > 0 ) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->book_id = null;
            $cart->copy_id = $copyid;
            $cart->type = $request->type;
            $cart->qnt = 1; 
            $cart->copy->decrement('number');
            $cart->save();

            return redirect()->back()->with('success', 'Book reserved successfully.');
        } else {
            return redirect()->back()->with('error', 'Sorry, no copies available for reservation.');
        }
    }
    public function singlePage(Request $request, Book $book){
        // dd($book);
        $books = book::get();
        $copys = copy::get();
        $categorys = category::get();
        return view('singleBook', compact('book', 'copys'));
    }
    
    public function gettreedays(Request $request){
        $currentDateTime = now();
        $threeDaysAgo = $currentDateTime->subDays(3);
        $threeDaysRecords = cart::where('type', 'reserv')
                                ->where('check', 1)
                                ->where('updated_at', '<=', $threeDaysAgo)
                                ->get();
        $checkIfWeSendMail = sendMail::where('isSend', 1)->get();

        return view('TreeDaysBook', compact('threeDaysRecords', 'checkIfWeSendMail'));
    }


    public function isReturn(){
        $checkMail = sendMail::where('isSend' , 1)->get();
        return view('isReturnBook' , compact('checkMail'));

    }

    public function isReturnUpdate(Request $request, sendMail $id) {
        $cart = $id->book->cart;
        $cart->isReturn = true;
        $cart->update();
    
        // Check if $id->user->cart is not null and not empty
        if ($id->user->cart) {
            foreach ($id->user->cart as $index) {
                // Check if $index->copy exists and is not null
                if ($index->copy) {
                    $index->copy->increment('number');
                }
            }
        }
    
        // Save changes to $id
        $id->save();
    
        return redirect()->back()->with('success', 'Return status updated successfully.');
    }
    
    



   



    public function sendMailToAll(Request $request)
    {
        // Loop through all user ids and book names
    try{
        foreach ($request->user_ids as $index => $userId) {
            
            $user = User::findOrFail($userId);
            $bookName = $request->book_names[$index];

            // Create a record in the sendMail table
            sendMail::create([
                'user_id' => $userId,
                'book_id' => $bookName,
                'isSend' => $request->sendingEmail,
            ]);

            // Send email to each user
            Mail::send('emails.Book_mail', ['user' => $user, 'bookName' => $bookName], function ($message) use ($user) {
                $message->to($user->email)->subject('Subject of the email');
            });
    }
   
    return  redirect()->back()->with('success', 'Emails sent successfully to all users.');

    }catch(Exception $e){
        return  redirect()->back()->with('error', 'you dont have users tosend email for hem.');
    }
        
    }

    public function stockfinish(){
        $booksFinish = book::where('number', '<=',  5)->get();
        // dd();
        return view('stockFinish' , compact('booksFinish'));
    }

}


