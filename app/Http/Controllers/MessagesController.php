<?php

namespace App\Http\Controllers;


use DB;
use App\Message;
use Illuminate\Http\Request;
use App\Repositories\Messages;
use App\Repositories\CacheMessages;
use App\Repositories\MessagesInterface;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Support\Facades\Cache;
use App\Events\MessageWasReceived;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $messages;
    function __construct(MessagesInterface $messages)
    {
        $this->messages = $messages;
        $this->middleware('auth', ['except' => ['create', 'store']]);        
    }


    public function index()
    { 
        //
        //$messages = DB::table('messages')->get();
        $messages =  $this->messages->getPaginated();
        return view('messages.index', compact('messages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        //Forma 1
        // DB::table('messages')->insert([
        //         "nombre" => $request->input('nombre'),
        //         "email" => $request->input('email'),
        //         "mensaje" => $request->input('mensaje'),
        //         "created_at" => Carbon::now(),
        //         "updated_at" => Carbon::now()
        // ]);


        //Forma 2
        // $message = new Message;
        // $message->nombre = $request->input('nombre');
        // $message->email = $request->input('email');
        // $message->mensaje = $request->input('mensaje');

        // $message->save();

        $message = $this->messages->store($request);

        event(new MessageWasReceived($message));
        return redirect()->route('mensajes.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$message = DB::table('messages')->where('id', $id)->first();
        $message = $this->messages->findById($id);
        return view('messages.show', compact('message'));
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
        //$message = DB::table('messages')->where('id', $id)->first();
        $message = $this->messages->findById($id);
        return view('messages.edit', compact('message'));

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
        //  DB::table('messages')->where('id', $id)->update([
        //         "nombre" => $request->input('nombre'),
        //         "email" => $request->input('email'),
        //         "mensaje" => $request->input('mensaje'),
        //         "updated_at" => Carbon::now()
        // ]);

        $message = $this->messages->update($request, $id);
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    
    {
        $this->messages->destroy($id);
        return redirect()->route('mensajes.index');
    }
}
